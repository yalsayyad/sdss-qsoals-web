<?php
    $all_attributes = array(
        'qid' => array('type' => 'numeric', 'name' => 'Quasar ID'),
        'sid' => array('type' => 'numeric', 'name' => 'System ID'),
        'zab' => array('type' => 'numeric', 'name' => 'ZAB'),
        'plate' => array('type' => 'numeric', 'name' =>
            'Spectroscopic plate number'),
        'fiber' => array('type' => 'numeric', 'name' =>
            'Spectroscopic fiber number'),
        'zab' => array('type' => 'numeric', 'name' => 'ZAB'),
        'mjd' => array('type' => 'numeric', 'name' =>
            'Modified Julian Date of spectroscopic observation'),
        'z' => array('type' => 'numeric', 'name' => 'z'),
        'zHW10' => array('type' => 'numeric', 'name' => 'zHW10'),
        'imag' => array('type' => 'numeric', 'name' => 'imag'),
        'lam_low' => array('type' => 'numeric', 'name' => 'lam_low'),
        'lam_high' => array('type' => 'numeric', 'name' => 'lam_high'),
        'grade' => array('type' => 'categorical', 'name' => 'Grade'),
        'badratioflag' => array('type' => 'categorical',
            'name' => 'Bad Ratio Flag'),
        'systype' => array('type' => 'numeric', 'name' => 'System Type'),
        'beta' => array('type' => 'numeric', 'name' => 'Beta'),
        'w_ion' => array('type' => 'categorical', 'name' => 'w_ion'),
        'lid' => array('type' => 'numeric', 'name' => 'Absorption line number'),
        'obs_lam' => array('type' => 'numeric', 'name' => 'obs_lam'),
        'wobs' => array('type' => 'numeric', 'name' => 'wobs'),
        'wobserr' => array('type' => 'numeric', 'name' => 'wobserr'),
        'Wrest' => array('type' => 'numeric', 'name' => 'Wrest'),
        'Wresterr' => array('type' => 'numeric', 'name' => 'Wresterr'),
        'ion_lam' => array('type' => 'numeric', 'name' => 'ion_lam'),
        'ion_name' => array('type' => 'categorical', 'name' => 'ion_name'),
        'ly_a' => array('type' => 'numeric', 'name' => 'ly_a'),
        'deltaz' => array('type' => 'numeric', 'name' => 'deltaz'),
        'deltav' => array('type' => 'numeric', 'name' => 'deltav'),
        'SN' => array('type' => 'numeric', 'name' => 'SV'),
        'FWHM' => array('type' => 'numeric', 'name' => 'FWHM'),
        'gr_flag' => array('type' => 'categorical', 'name' => 'gr_flag'),
        'specid' => array('type' => 'numeric', 'name' => 'Spectroscopic ID'),
        'sdssname' => array('type' => 'numeric',
            'name' => 'Object Designation (hhmmss.ss+ddmmss.s)'),
        'ra' => array('type' => 'numeric', 'name' => 'R.A. (in degrees)'),
        'decl' => array('type' => 'numeric', 'name' => 'Dec. (in degrees)'),
        'redshift' => array('type' => 'numeric', 'name' => 'Redshift'),
        'psfmag_u' => array('type' => 'numeric', 'name' => 'u PSF magnitude'),
        'psfmagerr_u' => array('type' => 'numeric',
            'name' => 'error in u PSF magnitude'),
        'psfmag_g' => array('type' => 'numeric', 'name' => 'g PSF magnitude'),
        'psfmagerr_g' => array('type' => 'numeric',
            'name' => 'g PSF magnitude error'),
        'psfmag_i' => array('type' => 'numeric', 'name' => 'i PSF magnitude'),
        'psfmagerr_i' => array('type' => 'numeric',
            'name' => 'i PSF magnitude error'),
        'psfmag_r' => array('type' => 'numeric', 'name' => 'r PSF magnitude'),
        'psfmagerr_r' => array('type' => 'numeric',
            'name' => 'r PSF magnitude error'),
        'psfmag_z' => array('type' => 'numeric', 'name' => 'z PSF magnitude'),
        'psfmagerr_z' => array('type' => 'numeric',
            'name' => 'z PSF magnitude error'),
        'a_u' => array('type' => 'numeric',
            'name' => 'Galactic absoption in u band'),
        'lgnh' => array('type' => 'numeric',
            'name' => 'log [Galactic HI column density]'),
        'firstmag' => array('type' => 'numeric',
            'name' => 'FIRST peak flux density'),
        'first_sn' => array('type' => 'numeric',
            'name' => 'S/N ratio for FIRST flux'),
        'first_sep' => array('type' => 'numeric',
            'name' => 'SDSS/FIRST separation (arc seconds)'),
        'lg_rass_rate' => array('type' => 'numeric',
            'name' => 'log RASS BSC/FSC full band count rate (counts/second)'),
        'rass_sn' => array('type' => 'numeric',
            'name' => 'S/N ratio for RASS count rate'),
        'rass_sep' => array('type' => 'numeric',
            'name' => 'SDSS/RASS seperation (arc seconds)'),
        'twomassmagerr_j' => array('type' => 'numeric',
            'name' => '2MASS J magnitude error'),
        'twomassmag_j' => array('type' => 'numeric',
            'name' => '2MASS J magnitude'),
        'twomassmagerr_h' => array('type' => 'numeric',
            'name' => '2MASS H magnitude error'),
        'twomassmag_h' => array('type' => 'numeric',
            'name' => '2MASS H magnitude'),
        'twomassmagerr_k' => array('type' => 'numeric',
            'name' => '2MASS K magnitude error'),
        'twomassmag_k' => array('type' => 'numeric',
            'name' => '2MASS K magnitude'),
        'twomass_sep' => array('type' => 'numeric',
            'name' => 'SDSS/2MASS separation (arc seconds)'),
        'twomass_flag' => array('type' => 'numeric', 'name' => '2MASS Flag'),
        'm_i' => array('type' => 'numeric', 'name' => 'M_i'),
        'delgi' => array('type' => 'numeric',
            'name' => 'Delta (g-i) offset in magnitudes of the quasar'),
        'morphology' => array('type' => 'options',
            'options' => array('point source', 'extended'),
            'name' => 'Morphology flag'),
        'scienceprimary' => array('type' => 'options',
            'options' => array(
                  'Object is not SCIENCEPRIMARY', 'Object is SCIENCEPRIMARY'),
            'name' => 'SCIENCEPRIMARY flag'),
        'mode' => array('type' => 'numeric', 'name' => 'SDSS MODE flag'),
        'uniform' => array('type' => 'options', 'options' => array(
                'not selected with final algorithm',
                'selected with final algorithm'),
            'name' => 'Uniform target selection flag'),
        'bestprimtarget' => array('type' => 'numeric',
            'name' => 'Target selection flag (BEST)'),
        'ts_b_lowz' => array('type' => 'options', 'options' => array(
                'not targeted as low-z quasar', 'targeted as low-z quasar'),
            'name' => 'Low-z Quasar (color selection only) flag'),
        'ts_b_hiz' => array('type' => 'options', 'options' => array(
                'not targeted as high-z quasar', 'targeted as high-z quasar'),
            'name' => 'High-z Quasar (color selection only) flag'),
        'ts_b_first' => array('type' => 'options', 'options' => array(
                'not targeted as FIRST', 'targeted as FIRST'),
            'name' => 'FIRST target flag'),
        'ts_b_rosat' => array('type' => 'options', 'options' => array(
                'not targeted as ROSAT', 'targeted as ROSAT'),
            'name' => 'ROSAT target flag'),
        'ts_b_serendip' => array('type' => 'options', 'options'=> array(
                'not targeted as serendipity', 'targeted as serendipity'),
            'name' => 'Serendipity target flag'),
        'ts_b_star' => array('type' => 'options', 'options'=> array(
                'not targeted as star', 'targeted as star'),
            'name' => 'Star target flag'),
        'ts_b_gal' => array('type' => 'options', 'options'=> array(
                'not targeted as galaxy', 'targeted as galaxy'),
            'name' => 'Galaxy target flag'),
        'run_best' => array('type' => 'numeric',
            'name' => 'SDSS Imaging number for photometric measurements'),
        'mjd_best' => array('type' => 'numeric',
            'name' => 'Modifed Julian Date of imaging observation'),
        'rerun_best' => array('type' => 'numeric',
            'name' => 'SDSS Photometric Processing Rerun number'),
        'camcol_best' => array('type' => 'numeric',
            'name' => 'SDSS Camera Column Number'),
        'field_best' => array('type' => 'numeric',
            'name' => 'SDSS Frame number'),
        'obj_best' => array('type' => 'numeric',
            'name' => 'SDSS Object number'),
        'targprimtarget' => array('type' => 'numeric',
            'name' => 'Target selection flag (TARGET)'),
        'ts_t_lowz' => array('type' => 'options', 'options'=> array(
                'not targeted as low-z quasar', 'targeted as low-z quasar'),
            'name' => 'Low-z Quasar (color selection only) target flag'),
        'ts_t_hiz' => array('type' => 'options', 'options' => array(
                'not targeted as high-z quasar', 'targeted as high-z quasar'),
            'name' => 'High-z Quasar (color selection only) target flag'),
        'ts_t_first' => array('type' => 'options', 'options' => array(
                'not targeted as FIRST', 'targeted as FIRST'),
            'name' => 'FIRST target flag'),
        'ts_t_rosat' => array('type' => 'options', 'options' => array(
                'not targeted as ROSAT', 'targeted as ROSAT'),
            'name' => 'ROSAT target flag'),
        'ts_t_serendip' => array('type' => 'options', 'options'=> array(
                'not targeted as serendipity', 'targeted as serendipity'),
            'name' => 'Serendipity target flag'),
        'ts_t_star' => array('type' => 'options', 'options'=> array(
                'not targeted as star', 'targeted as star'),
            'name' => 'Star target flag'),
        'ts_t_gal' => array('type' => 'options', 'options'=> array(
                'not targeted as galaxy', 'targeted as galaxy'),
            'name' => 'Galaxy target flag'),
        't_psfmag_u' => array('type' => 'numeric',
            'name' => 'u PSF magnitude (TARGET)'),
        't_psfmagerr_u' => array('type' => 'numeric',
            'name' => 'error in u PSF magnitude (TARGET)'),
        't_psfmag_g' => array('type' => 'numeric',
            'name' => 'g PSF magnitude (TARGET)'),
        't_psfmagerr_g' => array('type' => 'numeric',
            'name' => 'g PSF magnitude error (TARGET)'),
        't_psfmag_r' => array('type' => 'numeric',
            'name' => 'r PSF magnitude (TARGET)'),
        't_psfmagerr_r' => array('type' => 'numeric',
            'name' => 'r PSF magnitude error (TARGET)'),
        't_psfmag_i' => array('type' => 'numeric',
            'name' => 'i PSF magnitude (TARGET)'),
        't_psfmagerr_i' => array('type' => 'numeric',
            'name' => 'i PSF magnitude error (TARGET)'),
        't_psfmag_z' => array('type' => 'numeric',
            'name' => 'z PSF magnitude (TARGET)'),
        't_psfmagerr_z' => array('type' => 'numeric',
            'name' => 'z PSF magnitude error (TARGET)'),
        'objid' => array('type' => 'numeric', 'name' => 'BestObjID'),
        'oldname_type' => array('type' => 'categorical',
            'name' => 'Object Name Prefix if previously published'),
        'oldname_desig' => array('type' => 'categorical',
            'name' => 'Object Name if previously published'),
        'lon' => array('type' => 'numeric', 'name' => 'R.A.'),
        'lat' => array('type' => 'numeric', 'name' => 'Declination (degrees)'),
        'geopoint' => array('type' => 'numeric',
            'name' => 'Binary representation of lon/lat'),
        'qso_z_hw' => array('type' => 'numeric', 'name' => 'qso_z_hw'),
        'qso_imag' => array('type' => 'numeric', 'name' => 'qso_imag'),
        'sys_lam_low' => array('type' => 'numeric',
            'name' => 'Lower wavelength limit of the SDSS spectrograph'),
        'sys_lam_high' => array('type' => 'numeric',
            'name' => 'Upper wavelength limit of the SDSS spectrograph'),
        'sys_grade' => array('type' => 'categorical',
            'name' => 'Confidence grade assigned to the absorption system'),
        'sys_badratioflag' => array('type' => 'categorical',
            'name' => 'sys_badratioflag'),
        'sys_systype' => array('type' => 'categorical',
            'name' => 'System type'),
        'sys_beta' => array('type' => 'numeric',
            'name' => 'Velocity (v/c) of the absorber in the QSO rest-frame'),
        'sys_w_ion' => array('type' => 'categorical',
            'name' => 'Weak ion presence'),
        'line_obs_lam' => array('type' => 'numeric',
            'name' => 'Observed wavelength'),
        'line_w_obs' => array('type' => 'numeric',
            'name' => 'Observer-frame equivalent width in Angstroms'),
        'line_w_obserr' => array('type' => 'numeric',
            'name' => '1-sigma error (in Angstroms) on the observer-frame
            equivalent width'),
        'line_w_rest' => array('type' => 'numeric',
            'name' => 'Rest-frame equivalent width in Angstroms'),
        'line_w_resterr' => array('type' => 'numeric',
            'name' => '1-sigma error (in Angstroms) rest-frame
            equivalent width'),
        'line_ion_lam' => array('type' => 'numeric',
            'name' => 'Laboratory wavelength of transition (Angstroms)'),
        'line_ion_name' => array('type' => 'categorical',
            'name' => 'Name of species'),
        'line_ly_a' => array('type' => 'options', 'options' => array('
                longward of Ly-a emission line',
                'Shortward of Ly-a emission line'),
            'name' => 'ly_a'),
        'line_deltaz' => array('type' => 'numeric', 'name' =>
            'Difference between redshift of the line and
            average redshift of system'),
        'line_deltav' => array('type' => 'numeric',
            'name' => 'Velocity difference'),
        'line_snr' => array('type' => 'numeric', 'name' =>
            'Significance of the line in standard deviations from error'),
        'line_fwhm' => array('type' => 'numeric',
            'name' => 'FWHM of the line (pixels)'),
        'line_gr_flag' => array('type' => 'categorical', 'name' => 'gr_flag'));
    $table_attributes =
      array(
        'cat_line' =>
          array('all' => array(
            'qid', 'sid', 'lid', 'obs_lam', 'wobs', 'wobserr', 'Wrest',
            'Wresterr', 'ion_lam', 'ion_name', 'ly_a', 'deltaz', 'deltav', 'SN',
            'FWHM', 'gr_flag')),
        'cat_sys' =>
            array('all' => array(
              'qid', 'sid', 'zab', 'lam_low', 'lam_high', 'grade',
              'badratioflag', 'systype', 'beta', 'w_ion')),
        'cat_qso' =>
            array('all' => array(
              'qid', 'plate', 'fiber', 'mjd', 'z', 'zHW10', 'imag', 'specid')),
        'cat_join_all_mv' =>
            array('System' => array(
                'sid', 'sys_lam_low', 'sys_lam_high', 'sys_grade',
                'sys_badratioflag', 'sys_systype', 'sys_beta', 'sys_w_ion'),
              'Quasar' => array('qid', 'qso_z_hw', 'qso_imag'),
              'Line' => array('lid',
                'line_obs_lam', 'line_w_obs', 'line_w_obserr', 'line_w_rest',
                'line_w_resterr', 'line_ion_lam', 'line_ion_name', 'line_ly_a',
                'line_deltaz', 'line_deltav', 'line_snr', 'line_fwhm',
                'line_gr_flag'),
              'Other' => array ('specid', 'sdssname', 'ra', 'decl', 'redshift',
                'psfmag_u','psfmagerr_u', 'psfmag_g', 'psfmagerr_g', 'psfmag_r',
                'psfmagerr_r', 'psfmag_i', 'psfmagerr_i', 'psfmag_z',
                'psfmagerr_z', 'a_u', 'lgnh', 'firstmag', 'first_sn',
                'first_sep','lg_rass_rate', 'rass_sn', 'rass_sep',
                'twomassmag_j', 'twomassmagerr_j', 'twomassmag_h',
                'twomassmagerr_h', 'twomassmag_k', 'twomassmagerr_k',
                'twomass_sep', 'twomass_flag', 'm_i', 'delgi', 'morphology',
                'scienceprimary', 'mode', 'uniform', 'bestprimtarget',
                'ts_b_lowz', 'ts_b_hiz', 'ts_b_first', 'ts_b_rosat',
                'ts_b_serendip', 'ts_b_star', 'ts_b_gal', 'run_best',
                'mjd_best', 'mjd', 'plate', 'fiber', 'rerun_best',
                'camcol_best', 'field_best', 'obj_best', 'targprimtarget',
                'ts_t_lowz', 'ts_t_hiz', 'ts_t_first', 'ts_t_rosat',
                'ts_t_serendip', 'ts_t_star', 'ts_t_gal', 't_psfmag_u',
                't_psfmagerr_u', 't_psfmag_g', 't_psfmagerr_g', 't_psfmag_r',
                't_psfmagerr_r', 't_psfmag_i', 't_psfmagerr_i', 't_psfmag_z',
                't_psfmagerr_z', 'objid', 'oldname_type', 'oldname_desig',
                'lon', 'lat', 'geopoint')),
        'cat_join' =>
            array('all' => array(
              'qid','sid','lid','plate','fiber','mjd','redshift','imag',
              'specid','zab','lam_low','lam_high','res','grade','badratioflag',
              'systype','beta','w_ion','obs_lam','wobs','wobserr','Wrest',
              'Wresterr','ion_lam','ion_name','ly_a','deltaz','deltav','SN',
              'FWHM','gr_flag')));
    $tables =
        array('cat_sys' => 'Systems', 'cat_line' => 'Lines',
        'cat_qso' => 'Quasars', 'cat_join_all_mv' => 'Join Table (All)',
        'cat_join' => 'Join Table');

    function constructQueryString($attribute, $params){
        global $all_attributes;
        $type = $all_attributes[$attribute]['type'];
        if ($type == 'numeric'){
            $m = $params["{$attirbute}_m"];
            $val = $params["{$attribute}_val"];
            $modifiers = array('equal' => '==', 'less_than' => '<',
              'less_than_equal' => '<=', 'greater_than' => '>',
              'greater_than_equal' => '>=');
            if ($m == 'between'){
              $val2 = $params[$attribute . '_val2'];
              return "$attribute > $val AND $attribute < $val2";
            } else {
        $modifier = $modifiers[$m];
        return "$attribute $modifier $val";
            }
        } else {
            $values = $params["{$attribute}"];
            foreach($values as &$value){
              $value = "'" . $value . "'";
            }
            $value_string = implode(",", $values);
            return "$attribute IN ($value_string)";
        }
    }
    function joinQuery($joinVal, $params, $limit, $offset){
      $columns = $params['column'];
      $table = $params['table'];
      $current_page = $params['page'];
      $offset = 30 * ($current_page - 1);
      foreach($columns as &$column){
        $column = "cat_join_all_mv." . $column;
      }
      $params['column'] = array($joinVal);
      $params['join_option'] = 'none';
      $innerquery = renderQuery($params, 0);
      $query = renderSelect($columns, $limit, $table);
      $query .= " INNER JOIN ($innerquery)";
      $query .= " AS innerTable ON innerTable.$joinVal = $table.$joinVal";
      if ($limit){
          $column_string = implode(',', $columns);
          $query .= " GROUP BY $column_string";
          $query .= " LIMIT 30 OFFSET $offset";
      }
      return $query;
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
        $table = $params['table'];
        $attributes = $params['attribute'];
        $current_page = $params['page'];
        $offset = 30 * ($current_page - 1);
        if ($params['join_option'] != 'none'){
          return joinQuery($params['join_option'], $params, $limit, $offset);
        }
        $query_clauses = array();
        $query = renderSelect($params['column'], $limit, $table);
        if ($params['search_space'] != 'full'){
          $values = $params['search_space_values'];
          $query_clauses[] = "{$params['search_space']} IN ($values)";
        }
        foreach($attributes as $attribute){
            $query_clauses[] = constructQueryString($attribute, $params);
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
        return $query;
    }
?>
