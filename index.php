<?php
require_once 'master.php';
master :: head();
master :: navbar();

?>
<head>
  <title>Tsugicloud</title>
</head>
<html>
<script>
function doLocalSearchPHPCrawl() {
    fetch('localsearchphp/crawl.php')
        .then(response => response.json())
        .then(result => {
        setTimeout(() => { doLocalSearchPHPCrawl(); }, 60000);
        })
    .catch(err => console.log(err))
}

setTimeout(() => { doLocalSearchPHPCrawl(); }, 5000);
</script>  
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/ArtAndFeminism_MoMA18_-_30_-_Editing_with_Megan_Wacha.jpg/1024px-ArtAndFeminism_MoMA18_-_30_-_Editing_with_Megan_Wacha.jpg" class="d-block w-100" alt="Banner1">
      <div class="carousel-caption d-none d-md-block">
        <h5>A Place like no other</h5>
        <p>Tsugicloud comes with you along everywhere whether you are a novice or a Pro</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/200131-D-RQ659-0001.JPG/1024px-200131-D-RQ659-0001.JPG" class="d-block w-100" alt="Banner2">
      <div class="carousel-caption d-none d-md-block">
        <h5>Enhance your Productivity</h5>
        <p>Whether you are an instructor or a student, Tsugicloud enhances your productivity like a rocket</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Junction_2015.jpg/1024px-Junction_2015.jpg" class="d-block w-100" alt="Banner3">
      <div class="carousel-caption d-none d-md-block">
        <h5>You are in Safehands</h5>
        <p>We've got an amazing community of opensource contributors which is ever growing and evolving</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>
<!--
<div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
      <h2 style="color:#0275d8">Get Started</h2>
      <p>A place for anyone just getting started on Tsugicloud just like you. Read our docs to get started.  </p>
      <button type="button" class="btn btn-primary">Learn More</button>
    </div>
    <div class="col">
    <h2 style="color:#292b2c">Customizable</h2>
    <p>Experience TsugiCloud the way you want including UI/UX. After all you decide how your tools gonna look like. </p>
    <button type="button" class="btn btn-secondary">Learn More</button>
    </div>
    <div class="col">
    <h2 style="color:#5cb85c">User Protectable</h2>
    <p>All your data will be ending up in your server. So there's no hassle or third party requirments which 
      means no chance of breach at all.
    </p>
    <button type="button" class="btn btn-success">Learn More</button>
    </div>
    
  </div>
</div>
<br>
<div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
      <h2 style="color:#d9534f">Everyone is heard</h2>
      <p>Everyone matters in our community since it's built from scratch because of open source developers like you </p>
      <button type="button" class="btn btn-danger">Learn More</button>
    </div>
    <div class="col">
    <h2 style="color:#f0ad4e">Unlimited Opportunity</h2>
    <p>Since TsugiCloud is built for educators & like minded people, the opportunities it provide are endless </p>
    <button type="button" class="btn btn-warning">Learn More</button>
    </div>
    <div class="col">
    <h2 style="color:#5bc0de">LTI Compatibility</h2>
    <p>TsugiCloud is LTI Compatible which means hassle free LTI intergration with your favorite LMS whether it's Blackboard or canvas. </p>
    <button type="button" class="btn btn-info">Learn More</button>
    </div>
    
  </div>
</div>
-->
<br>
</html>
