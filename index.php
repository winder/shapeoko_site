<?php include('mainheader.php');?>
<style>
.thumbnail img { min-height:300px; height:300px; }
</style>
<!-- Carousel -->
<div id="myCarousel" class="carousel slide">
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/inventables_Shapeoko_v21201_more.jpg">
      <div class="container">
      </div>
    </div>
  </div>
</div>
<!-- /.carousel -->

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-md-4 text-center">
      <img class="img" src="images/oshw-logo.png">
      <h2>CC BY-SA</h2>
      <p>Contribute, Remix, Tweak, and Improve. Sources available at Github.</p>
      <p><a class="btn btn-default" href="https://github.com/shapeoko/Shapeoko_2">View Sources »</a></p>
    </div>
    <div class="col-md-4 text-center">
      <img class="img" src="images/community-roundtable.jpg" height="166px">
      <h2>Community Supported</h2>
      <p>Join 1,000s of Shapeoko users to discuss everything from troubleshooting to new project ideas.</p>
      <p><a class="btn btn-default" href="http://www.shapeoko.com/forum">View Forum »</a></p>
    </div>
    <div class="col-md-4 text-center">
      <img class="img" src="images/200px-MediaWiki.png" height="166px">
      <h2>Shared Knowledge</h2>
      <p>A community curated wiki with build details, hello worlds, upgrade ideas and more.</p>
      <p><a class="btn btn-default" href="http://www.shapeoko.com/wiki">View Wiki »</a></p>
    </div>
  </div><!-- /.row -->


  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image pull-right img-thumbnail img-round" src="images/inventables_Shapeoko_v21068.jpg">
    <h2 class="featurette-heading">No Fabrication. <span class="text-muted"></span></h2>
    <p class="lead">If you can tighten a bolt, you can assemble Shapeoko. The closest you'll come to fabricating during the assembly process is tapping the rails. Outside of that, the entire assembly process involves screws, washers, and nuts. Easy. Peasy.</p><p><a class="btn btn-default" href="http://docs.shapeoko.com">See Docs »</a></p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image pull-left img-thumbnail img-round" src="images/inventables_Shapeoko_v21082.jpg">
    <h2 class="featurette-heading">Small Footprint. <span class="text-muted">Big Results.</span></h2>
    <p class="lead">We tried getting the best working area vs footprint ration possible. The new Shapeoko 2 will consume 500mm x 500mm of desk space. The working envelope of that area is roughly 300mm x 300mm!</p><p><a class="btn btn-default" href="#specs">See Specs »</a></p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image pull-right img-thumbnail img-round" src="images/belts_closeup.jpg">
    <h2 class="featurette-heading">Belt Driven<span class="text-muted"> For speed, smoothness, and ease of assembly</span></h2>
    <p class="lead">Shapeoko 2 utilizes GT2 belting to drive both the X and Y axis. These belts give you great repeatability, wicked accuracy (.1mm), and a quiet ride. Add to that the belts are so easy to assemble a child could do it. And trust us, they have.</p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image pull-left img-thumbnail img-round" src="images/500px-Opensource.svg.png">
    <h2 class="featurette-heading">Open Source Software<span class="text-muted"> Free and well documented.</span></h2>
    <p class="lead">What good is a machine if you dont' have the software or knowledge to use it? We've tried solving this problem by providing a well documented Open Source toolchain for everyone to start with.</p><p><a class="btn btn-default" href="#">Software Details »</a></p>
  </div>
  <!-- /END THE FEATURETTES -->

<!--BEGIN Spec TABLE-->
<hr class="featurette-divider">

<h1>Specifications<small> of default configuration</small></h1>

<div class="container">
  <div class="row">
    <div class="col-md-6">
        <table class="table technical-table table-hover" id="specs">
          <tbody>
              <tr>
                <td><strong>Footprint</strong></td>
                <td>550mm x 500mm</td>
              </tr>
              <tr>
                <td><strong>Cutting Area</strong></td>
                <td>300mm x 300mm x 50mm</td>
              </tr>
              <tr>
                <td><strong>Power Supply</strong></td>
                <td>24VDC</td>
              </tr>
              <tr>
                <td><strong>Controller</strong></td>
                <td>Arduino Based</td>
              </tr>
              <tr>
                <td><strong>Collet Size</strong></td>
                <td>1/8" (3.175mm)</td>
              </tr>
              <tr>
                <td><strong>Expandable</strong></td>
                <td><span class="glyphicon glyphicon-ok"></span> Yes</td>
              </tr>
              <tr>
                <td><strong>Motor Size</strong></td>
                <td>nema 17 (nema 23 compatible)</td>
              </tr>
              <tr>
                <td><strong>Belting</strong></td>
                <td>GT2 (open ended)</td>
              </tr>
              <tr>
                <td><strong>Pulley Size</strong></td>
                <td>2mm Pitch (20 tooth)</td>
              </tr>
              <tr>
                <td><strong>Rapid Speed</strong></td>
                <td>2000mm/min (80ipm)</td>
              </tr>
              <tr>
                <td><strong>Frame</strong></td>
                <td>Powder Coated 12ga Steel Plates</td>
              </tr>
              <tr>
                <td></td>
                <td>20mm x 20mm Aluminum Extrusion</td>
              </tr>
              <tr>
                <td><strong>Rail System</strong></td>
                <td>MakerSlide</td>
              </tr>              
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <a href="Shapeoko_2_dimensioned.pdf" target="_blank"><img src="images/Shapeoko_2_dimensioned.png" width="500px"></a>
      </div>
</div><!--end row-->
</div><!--end container-->


<!--BEGIN COMPARISON TABLE-->
<hr class="featurette-divider">

<h1>Comparison<small> of similar machines</small></h1>

<div class="container">
  <div class="row">
    <table class="table table-bordered" id="comp">
        <thead>
        <tr class="active">
          <th>Make</th>
          <th>Shapeoko</th>
          <th>Shapeoko</th>
          <th>Probotix</th>
          <th>Zen Toolworks</th>
          <th>myDIYCNC</th>
        </tr>
        <tr class="active">
          <th>Model</th>
          <th>v1</th>
          <th class="warning">v2</th>
          <th>Fireball v90</th>
          <th>12 x 12 (F8)</th>
          <th>"Sprite"</th>
        </tr>  
        </thead>
        <tbody>    
        <tr>
          <td>Mechanical Kit</td>
          <td>$229</td>
          <td class="warning">$299</td>
          <td>$599</td>
          <td>$679</td>
          <td>n/a</td>
        </tr>
        <tr>
          <td>Complete Kit</td>
          <td>$649</td>
          <td class="warning">$649</td>
          <td>$1009</td>
          <td>$1199</td>
          <td>$595</td>
        </tr>
        <tr>
          <td>Footprint</td>
          <td>375mm x 375mm</td>
          <td class="warning">550mm x 500mm</td>
          <td>627mm x 676mm</td>
          <td>533mm x 533mm</td>
          <td>241mm x 356mm</td>
        </tr>
        <tr>
          <td>Working Area (X/Y/Z)</td>
          <td>150mm x 150mm x 75mm</td>
          <td class="warning">300mm x 300mm x 75mm</td>
          <td>457mm x 305mm x 75mm</td>
          <td>305mm x 305mm x 50mm</td>
          <td>178mm x 330mm x 94mm</td>
        </tr>
        <tr>
          <td>Stepper Motors</td>
          <td>Nema 17</td>
          <td class="warning">Nema 17 or 23</td>
          <td>Nema 23</td>
          <td>Nema 23</td>
          <td>Nema 17</td>
        </tr>
        <tr>
          <td>Drive Mechanism</td>
          <td>Belts/Screw</td>
          <td class="warning">Belts/Screw</td>
          <td>Screws</td>
          <td>Screws</td>
          <td>Screws</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!--END COMPARISON TABLE-->
<hr>

<div class="container">
  <div class="row">
    <h1>Machine Gallery</h1>
    <div class="row">
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="machines/cpt_kirk.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 2" href="#"><img class="thumbnail img-responsive" src="machines/criznach.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 3" href="#"><img class="thumbnail img-responsive" src="machines/Gadroc.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 4" href="#"><img class="thumbnail img-responsive" src="machines/IC.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 5" href="#"><img class="thumbnail img-responsive" src="machines/jarretl.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 6" href="#"><img class="thumbnail img-responsive" src="machines/LTMNO.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 8" href="#"><img class="thumbnail img-responsive" src="machines/northbear.JPG" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 9" href="#"><img class="thumbnail img-responsive" src="machines/robcee.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 10" href="#"><img class="thumbnail img-responsive" src="machines/samc99us.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 12" href="#"><img class="thumbnail img-responsive" src="machines/wlanfox.jpg" height="300px"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 13" href="#"><img class="thumbnail img-responsive" src="machines/zerblatt007.jpg" height="300px"></a></div>
    </div>
  </div>
</div>

</body>
</html>