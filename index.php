<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description"
    content="Explore comprehensive European population statistics and demographic data on our website. Discover the latest trends, insights, and analysis of population dynamics across European countries. Stay informed with accurate information and visualizations.">
  <meta name="keywords"
    content="European population Demographic data Population statistics, European countries Population dynamics, European demographics Population trends, European census data Population analysis, European population growth Population density, Birth rate in Europe, Death rate in Europe, European migration trends, Age distribution in Europe">
  <meta name="author" content="Uros Zikic">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- navbar:BOOSTRAP -------------------------------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">EuroProject</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">



      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2 search-country" type="search" placeholder="Search" aria-label="Search">
        <button onclick="search()" name="search"
          class=" btn btn-outline-success my-2 my-sm-0 searchSubmit">Search</button>

      </div>
    </div>
    </div>
  </nav>

  <!-- class="form-control mr-sm-2 search-country"class="form-inline" -->

  <h1 class="text-center text-white">European Population Statistics</h1>

  <div class="content-container">

    <div class="country-info-container">
      <div class="country-info ">
        <h2 class="country-name"></h2>
        <!-- flags -->
        <div class="flags-container">
          <div class="col--4">
            <img src="" alt="National Flag" class="national-flag">
          </div>
          <div class="col--4">
            <img src="" alt="Coat of Arms" class="coat-of-arms">
          </div>
          <div class="col--4">
            <img src="" alt="United Nations" class="united-nations-flag">
          </div>
        </div>
        <!-- end flags -->
        <!-- geo -->
        <div class="geo-container">
          <div class="region"></div>
          <p class="sub-region"></p>
          <p class="capital"></p>
          <p class="land-lock"></p>
          <p class="independence"></p>
          <p class="population"></p>
          <div class="geo-map-container"></div>
        </div>

        <div class="phantom"></div>
      </div>

      <!-- end geo -->
    </div>
    <div class="statistics ">
      <iframe src="info.php" height="450px" width="100%" title="population statistics" id="phpframe"></iframe>
    </div>
    <!-- end container -->
  </div>



  <script src="script.js" type="text/javascript" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>