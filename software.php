<?php include 'mainheader.php';?>
<style>
body{
	margin-top:60px;
}
</style>
<body>
<div class="container">
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h3><strong>Did you know: Shapeoko uses standard gcode.</strong></h3>
		<h5>That's right! No proprietary nonsense going on here. If your software package can export regular ol' gcode, then Shapeoko can understand it. Easy. Peasy.</h5>
	</div>
	<div class="row">
		<h1>Workflow Overview</h1>
		<h1><small>With these three software packages shown below, you can go from idea to cutting a part on the Shapeoko.</small></h1>
		<hr>
		<div class="row">
			<div class="col-xs-4">
				<h1>Draw<span class="glyphicon glyphicon-chevron-right pull-right"></span></h1>
				<img class="img-thumbnail thumbnail" src="images/inkscape.png"></img>
				<p><strong>Inkscape</strong> is a free and open source, cross platform vector drawing program. With it you can create amazing designs in a format that can be easily converted to run on the Shapeoko</p>
				<a class="btn btn-primary btn-block" href="http://www.inkscape.com" target="_blank">Inkscape.com</a>
			</div>
			<div class="col-xs-4">
				<h1>Create Toolpaths<span class="glyphicon glyphicon-chevron-right pull-right"></span></h1>
				<img class="img-thumbnail thumbnail" src="images/makercam.png"></img>
				<p><strong>makerCAM</strong> is a free and open source, flash based package that runs in the browser. MakerCam allows you to create and generate toolpaths from your <em>svg</em> files, and to create basic shapes and objects.</p>
				<a class="btn btn-primary btn-block" href="http://www.makercam.com" target="_blank">makerCAM.com</a>
			</div>
			<div class="col-xs-4">
				<h1>Cut<span class="glyphicon glyphicon-saved pull-right"></span></h1>
				<img class="img-thumbnail thumbnail" src="images/ugs.png"></img>
				<p><strong>Universal Gcode Sender Universal</strong> (UGS for short) is a Java based GRBL compatible cross platform G-Code sender. UGS is the interface between your computer and the arduino which controls the Shapeoko CNC machine.</p>
				<a class="btn btn-primary btn-block" href="https://github.com/winder/Universal-G-Code-Sender" target="_blank">View on Github</a>
			</div>
		</div>
	</div>

	<hr></br>
  
	<div class="well">
			<h3>Learn more about the software workflow by visiting our community supported wiki pages! <a class="btn btn-default" href="http://www.shapeoko.com/wiki/index.php/Software" target="_blank">Click here to dig in</a></h2>
			
	</div>

</div><!--end container-->
</body>

