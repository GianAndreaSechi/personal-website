<?php
    include "header.php";
?>
<meta name="og:description" content="I am the creator of NearMe Data, a dashboard that allows showing pandemic data (provided by the Italian Government) in a simple and clear way.">
<meta name="description" content="I am the creator of NearMe Data, a dashboard that allows showing pandemic data (provided by the Italian Government) in a simple and clear way.">
<meta name="og:title" content="NearMe Data | COVID19 pandemic progress dashboard">
<title>NearMe Data | COVID19 pandemic progress dashboard</title>
</head>

<body>
  <?php include "nav-menu.php" ?>

      <div class="container">
        <div class="col-md-12 detail-container">
          <h1>NearMe Data</h1>
          <div class="row">
            <div class="col-md-8">
              <h5>Description</h5>
              <p>
                I am the creator of NearMe Data.<br><br>
                During the COVID19 pandemic, I had a hard time finding correct and clear information about the daily infections, and vaccines, in Italy.<br>
                This is why I decided to develop a specific section in my own NearMe project (called NearMe Data) that allows to keep track of the pandemic data (provided by the Italian Government) in a simple and clear way.<br><br>
                The application is entirely developed using Bootstrap, HTML5, JQuery to read GitHub's Italian Civil Protection dataset and PHP.
              </p>
            </div>
            <div class="col-md-4">
              <h5>Technology</h5>
              <p>
                Link: <a href="https://www.gianandreasechi.com/COVID19/index.php" title="NearMe Data" target="_blank">View app</a>
                <hr>
                The application is entirely developed using JQuery to get data from the GitHub's Italian Civil Protection and to calculate ratio and math operations.
                <ul>
                  <li>HTML/CSS</li>
                  <li>Bootstrap</li>
                  <li>JQuery/Ajax</li>
                  <li>Php</li>
                  <li>JSON from GitHub's Repository</li>
                </ul>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="container work-container no-padding text-center">
          <div class="row">
              <div class="col-md-4">
                  <div class="col-md-12 work-card no-shadow">
                      <img src="img/projects/NearMe/Thumbs/nearme-data.png" class="img-fluid" alt="NearMe Data Home"/>
                      <div class="work-description">
                        <a href="img/projects/NearMe/nearme-data.png" data-lightbox="NearMeData" data-title="Home page" title="NearMe Data Home"><i class="fas fa-expand-alt"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="col-md-12 work-card no-shadow">
                      <img src="img/projects/NearMe/Thumbs/nearme-data-vaccines.png" class="img-fluid" alt="NearMe Data Vaccies"/>
                      <div class="work-description">
                        <a href="img/projects/NearMe/nearme-data-vaccines.png" data-lightbox="NearMeData" data-title="Vaccines" title="NearMe Data Vaccies"><i class="fas fa-expand-alt"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="col-md-12 work-card no-shadow">
                      <img src="img/projects/NearMe/Thumbs/nearme-data-sources.png" class="img-fluid" alt="NearMe Data Sources"/>
                      <div class="work-description">
                        <a href="img/projects/NearMe/nearme-data-sources.png" data-lightbox="NearMeData" data-title="Sources" title="NearMe Data Sources"><i class="fas fa-expand-alt"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php
        include "footer-main.php";
        include "footer-include.php";
      ?>
