<?php include 'includes/header.html' ?>
<ul class="breadcrumbs">
<li><a href="./home.php">Home</a></li>
<li><a href="./catalog.php">Catalog</a></li>
</ul>


<div class="col_2">
<div id="navWrap">
 <div id="nav">
	<ul  class="alt1">
	<li> <a href="#description">Description </a></li>
	<li> <a href="#downloads"> Downloads </a></li>
	<li> <a href="./dbsearch/tables.php"> Explore Database </a></li>
	</ul>
	 <br class="clearLeft" />
    </div>
    </div>
</div>



<script type='text/javascript'>
//<![CDATA[ 

  /* JavaScript code will go here */
  
$(function() {
    // Stick the #nav to the top of the window
    var nav = $('#nav');
    var navHomeY = nav.offset().top;
    var isFixed = false;
    var $w = $(window);
    $w.scroll(function() {
        var scrollTop = $w.scrollTop();
        var shouldBeFixed = scrollTop > navHomeY;
        if (shouldBeFixed && !isFixed) {
            nav.css({
                position: 'fixed',
                top: 0,
                left: nav.offset().left,
                width: nav.width()
            });
            isFixed = true;
        }
        else if (!shouldBeFixed && isFixed)
        {
            nav.css({
                position: 'static'
            });
            isFixed = false;
        }
    });
});
​
//]]>  
</script>


<div class="col_10" data-spy="scroll" data-target=".navbar">
blah blah

<section id="description">
<h1> desription></h1>
<p> blah blah blah
   The recently-completed SDSS Quasar Absorption Line (QSOALS) catalog ... blah blah blah
    
    
    	Lorem ipsum dolor sit amet, consectetuer <em>adipiscing elit</em>, sed diam nonummy nibh euismod 
	tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis 
	nostrud exerci tation <strong>ullamcorper suscipit lobortis</strong> nisl ut aliquip ex ea commodo consequat. 
	Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>

	<p>El illum dolore eu <span class="icon" data-icon="2"></span> feugiat nulla facilisis at vero eros et accumsan et iusto odio 
	dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam 
	liber tempor cum soluta nobis eleifend <code>&lt;h1&gt;Sample Code&lt;/h1&gt;</code> option 
	congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
	
	<p>
	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis 
	nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse 
	molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim 
	qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum 
	soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
<section id="Downloads">
<h1> downloads</h1>

<p> blah blah blah

<p> blah blah blah

   The recently-completed SDSS Quasar Absorption Line (QSOALS) catalog ... blah blah blah
    
    
    	Lorem ipsum dolor sit amet, consectetuer <em>adipiscing elit</em>, sed diam nonummy nibh euismod 
	tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis 
	nostrud exerci tation <strong>ullamcorper suscipit lobortis</strong> nisl ut aliquip ex ea commodo consequat. 
	Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>

	<p>El illum dolore eu <span class="icon" data-icon="2"></span> feugiat nulla facilisis at vero eros et accumsan et iusto odio 
	dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam 
	liber tempor cum soluta nobis eleifend <code>&lt;h1&gt;Sample Code&lt;/h1&gt;</code> option 
	congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
	
	<p>
	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis 
	nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse 
	molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim 
	qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum 
	soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
</div>

