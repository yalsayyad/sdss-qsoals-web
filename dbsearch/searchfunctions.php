<?php
    include_once 'searchvars.php';
    function isTable($table_name){
	global $tables;
        return isset($tables[$table_name]);
    }
    function isAttribute($attribute_name){
        global $all_attributes;
        return isset($all_attributes[$attribute_name]);
    }
    function constructQueryString($attribute, $params, $current_count){
        global $all_attributes;
        if (isset($all_attributes[$attribute])){
            $results = array('param_count' => $current_count);
            $type = $all_attributes[$attribute]['type'];
            if ($type == 'numeric' || $type == 'similar'){
                $m = $params["{$attribute}_m"];
                $val = $params["{$attribute}_val"];
		if ($type == 'numeric') {
	                $modifiers = array('equal' => '==', 'less_than' => '<',
        	            'less_than_equal' => '<=', 'greater_than' => '>',
                	    'greater_than_equal' => '>=');
                	if ($m == 'between'){
                    		$val2 = $params[$attribute . '_val2'];
                    		$results['new_params'][] = $val;
                    		$results['new_params'][] = $val2;
                    		$current_count += 1;
                    		$results['query_string'] = "$attribute > \${$current_count} AND $attribute < \$";
                    		$current_count += 1;
                    		$results['query_string'] .= $current_count;
			} else {
                    		$modifier = $modifiers[$m];
                    		$current_count += 1;
                    		$results['new_params'][] = $val;
                    		$results['query_string'] = "$attribute $modifier \${$current_count}";
                	}
		} else {
			if ($m == 'begins_with'){
				$results['new_params'][] = $val . '%';
			} elseif ($m == 'ends_with'){			
				$results['new_params'][] = '%' . $val;
			} elseif ($m == 'contains'){
				$results['new_params'][] = '%' . $val . '%';
			} else {
				$results['new_params'][] = $val;
			}
			$current_count += 1;
			$results['query_string'] = "$attribute LIKE \${$current_count}";
		}
	    } else {
                $values = $params["{$attribute}"];
                $current_count += 1;
                $results['new_params'][] = '{' . implode(', ', $values) . '}';;
                $results['query_string'] = "$attribute = ANY(\${$current_count})";
            }
            $results['param_count'] = $current_count;
            return $results; 
        } else {
            return NULL;
        }   
    }


    function joinQuery($joinVal, $params, $limit, $offset){
      if (in_array($joinVal, array('sid', 'lid', 'qid'))) {
        $columns = $params['column'];
        $table = $params['table'];
        $current_page = $params['page'];
        $offset = 30 * ($current_page - 1);
        foreach($columns as &$column){
            $column = "cat_join_all_mv." . $column;
        }
	$params['join_option'] = 'none';        
        $params['column'] = array($joinVal);
	$innerquery = renderQuery($params, 0);
	$query = renderSelect($columns, $limit, $table);
	$query .= ' INNER JOIN (';
        $query .= $innerquery['query'];
        $query .= ") AS innerTable ON innerTable.$joinVal = $table.$joinVal";
        if ($limit){
          $column_string = implode(',', $columns);
          $query .= " GROUP BY $column_string";
          $query .= " LIMIT 30 OFFSET $offset";
        }
	return array('query' => $query, 'params' => $innerquery['params']);
      }
      else {
        return NULL;
      }
    }

    function renderSelect($columnslist, $limit, $table){
      $columns = implode(',', $columnslist);
      if ($limit){
          return "SELECT $columns, COUNT(*) OVER () as count FROM $table";
      } else {
          return "SELECT DISTINCT $columns FROM $table";
      }
    }

    function renderQuery($params, $limit){
        global $all_attributes;
        $table = $params['table'];
        $param_count = 0;
        $query_params = array();
        $attributes = $params['attribute'];
        $current_page = $params['page'];
        $offset = 30 * ($current_page - 1);
        array_filter($params['column'], "isAttribute");
        if ($params['join_option'] != 'none'){
          return joinQuery($params['join_option'], $params, $limit, $offset);
        }
        $query_clauses = array();
        $query = renderSelect($params['column'], $limit, $table);
        if ($params['search_space'] != 'full' && isAttribute($params['search_space'])){
          $values = '{' . $params['search_space_values'] . '}';
          $param_count += 1;
          $query_clauses[] = "{$params['search_space']} = ANY(\${$param_count})";
          $query_params[] = $values;
        }
        foreach($attributes as $attribute){
            $query_info = constructQueryString($attribute, $params, $param_count);
            $query_clauses[] = $query_info['query_string'];
            $query_params = array_merge($query_params, $query_info['new_params']);
	    $param_count = $query_info['param_count'];
        }
        if (!empty($query_clauses)){
            $query .= ' WHERE ';
            $query .= implode(' AND ', $query_clauses);
        }
        if ($limit){
            $columns = implode(',', $params['column']);
            $query .= " GROUP BY $columns";
            $query .= " LIMIT 30 OFFSET $offset";
        }
        return array('query' => $query, 'params' => $query_params);
    }
?>
