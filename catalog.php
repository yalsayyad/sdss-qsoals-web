<?php
$page_title = "Catalog";
include 'includes/header.html';
require_once 'includes/funcs.inc';
?>

<ul class="breadcrumbs">
<li><a href="./index.php">Home</a></li>
<li><a href="./catalog.php">Catalog</a></li>
</ul>

<!-- This sets up the floating navigation bar to the left -->
<style type="text/css">
.column{padding:20px;}
</style>

<div class="col_2">
<div id="navWrap">
 <div id="nav">
	<ul  class="alt1">
	<li> <a href="#download"> Download </a></li>
	<li> <a href="#description">Description </a></li>
	<li> <a href="#examples">Code Examples </a></li>
	</ul>
	 <br class="clearLeft" />
    </div>
    </div>
</div>



<div class="col_10" data-spy="scroll" data-target=".navbar">
<h2> <em>[Britt's Page]</em> </h2>
<p> Include as many sections and as much info as we need:
<section id="download">
<h3> Download</h3>
<p>
	The FITS table containing the full output from our DR7 QSOALS
        pipeline can be downloaded here:<br>
        <a hfref="data/DR7_QSOALS_catalog_071614.tar.gz"> DR7
        Master Catalog (Last updated July 16, 2014)</a>



<section id="description">
<h3> Description </h3>

<p>Tables to list the columns and data types. For example:
<p>
<!-- Table -->
<table class="tight striped">
<thead><tr>
	<th>Name</th>
	<th>Type</th>
	<th>Description</th>
</tr></thead>
<tbody><tr>
	<td>plate</td>
	<td>int</td>
	<td>SDSS spectroscopic plate number</td>
</tr><tr>
<tbody><tr>
	<td>fiber</td>
	<td>int</td>
	<td>SDSS spectroscopic fiber number</td>
</tr><tr>
<tbody><tr>
	<td>mjd</td>
	<td>int</td>
	<td>Modified Julian Date of observation</td>
</tr><tr>
<tbody><tr>
	<td>z_qso</td>
	<td>float</td>
	<td>Quasar redshift (Hewett & Wild 2010)</td>
</tr><tr>
<tbody><tr>
	<td>imag</td>
	<td>float</td>
	<td>Quasar i-band PSF magnitude</td>
</tr><tr>

<tbody><tr>
	<td>ra_deg</td>
	<td>float</td>
	<td>Right ascension of quasar (degrees)</td>
</tr><tr>
	<td>dec_deg</td>
	<td>float</td>
	<td>Declination of quasar (degrees)</td>
</tr><tr>
<tbody><tr>
	<td>ra_hex</td>
	<td>float</td>
	<td>Right ascension of quasar (hexigesimal)</td>
</tr><tr>
	<td>dec_hex</td>
	<td>float</td>
	<td>Declination of quasar (hexigesimal)</td>
</tr><tr>
	<td>BAL_flag</td>
	<td>float</td>
	<td>Broad Absorption Line (BAL) quasar flag </td>
</tr><tr>
	<td>...</td>
	<td>...</td>
	<td>...</td>
</tr></tbody>
</table>


<section id="examples">
<h3> Code Examples </h3>

	<p> Britt, lots of options for code formatting. 
<pre>
import pyfits
data = pyfits.open('DR7_QSOALS_catalog_071614.fits')
</pre>

There's also an inline tag <code> data = pyfits.open('DR7_QSOALS_catalog_071614.fits')</code>

	<p>
		<ul class="tabs left">
		<li><a href="#tabr1">Tab1</a></li>
		<li><a href="#tabr2">Tab2</a></li>
		<li><a href="#tabr3">Tab3</a></li>
		</ul>

		<div id="tabr1" class="tab-content">Tab1</div>
		<div id="tabr2" class="tab-content">Tab2</div>
		<div id="tabr3" class="tab-content">Tab3</div>
</p
</div>

