<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Termini savjetovanja - Salvus d.o.o.</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="./src/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
</head>

<body>
  <?php
  if (isset($_SESSION['message']) && $_SESSION['message']) {
    echo '<p class="notification w3-panel w3-card ' . ($_SESSION['color']) . ' w3-padding-48">' . '<span onclick="this.parentElement.style.display=\'none\'"
    class="w3-button w3-display-topright">X</span>' . ($_SESSION['message']) . '</p>';
    unset($_SESSION['message']);
  }
  ?>
  <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index: 3; width: 320px; display: none; top: 0;" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" class="w3-bar-item w3-button w3-hide-large w3-border-bottom w3-right w3-xxlarge"><i class="fa fa-remove w3-margin-left"></i></a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-large">
      <h3 class="w3-padding-16"><b>Salvus</b></h3>
    </a>
    <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-grey w3-large"><i class="fa fa-globe w3-margin-right"></i> Zemlja (<span id="country-btn"></span>)</a>
    <div id="Demo1" class="w3-hide w3-animate-left">
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="setCountry('Hrvatska');w3_close();" id="firstTab">
        <div class="w3-container">
          <span class="fi fi-hr"></span> <span class="w3-opacity w3-large">Hrvatska</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="setCountry('Srbija');w3_close();">
        <div class="w3-container">
          <span class="fi fi-rs"></span> <span class="w3-opacity w3-large">Srbija</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="setCountry('Bosna');w3_close();">
        <div class="w3-container">
          <span class="fi fi-ba"></span> <span class="w3-opacity w3-large">Bosna</span>
        </div>
      </a>
    </div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-grey w3-large w3-green" onclick="showTable(getCountry())"><i class="fa fa-table w3-margin-right"></i> Prikaži tablicu</a>
    <a id="myBtn" onclick="myFunc('Demo2')" href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-grey w3-large"><i class="fa fa-code w3-margin-right"></i> Kopiranje za web</a>
    <div id="Demo2" class="w3-hide w3-animate-left">
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-gold" onclick="copyForSolgar(getCountry());w3_close();" id="firstTab">
        <div class="w3-container">
          <span class="w3-large">Solgar</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-blue" onclick="copyForMicrolife(getCountry());w3_close();">
        <div class="w3-container">
          <span class="w3-large">Microlife</span>
        </div>
      </a>
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-grey" onclick="copyForMevFeller(getCountry());w3_close();">
        <div class="w3-container">
          <span class="w3-large">MEV Feller</span>
        </div>
      </a>
    </div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-hover-light-grey w3-large" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-upload w3-margin-right"></i> Upload tablice</a>
  </nav>
  <div id="id01" class="w3-modal" style="z-index: 4;">
    <div class="w3-modal-content w3-animate-zoom">
      <div class="w3-container w3-padding w3-green">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
        <h2>Upload tablice</h2>
      </div>
      <div class="w3-panel">
        <form method="POST" action="./api/upload.php" enctype="multipart/form-data">
          <div class="w3-section w3-padding-16">
            <input type="file" name="uploadedFile" required />
          </div>
          <div class="w3-section w3-padding-8">
            <input type="radio" id="hrvatska" name="country" value="hrvatska">
            <span class="fi fi-hr"></span> <label for="hrvatska">Hrvatska</label><br>
            <input type="radio" id="srbija" name="country" value="srbija">
            <span class="fi fi-rs"></span> <label for="srbija">Srbija</label><br>
            <input type="radio" id="bosna" name="country" value="bosna" required>
            <span class="fi fi-ba"></span> <label for="bosna">Bosna</label><br><br>
          </div>
          <div class="w3-section w3-padding-16">
            <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel &nbsp;<i class="fa fa-remove"></i></a>
            <input type="submit" value="Prenesite" name="uploadBtn" class="w3-button w3-green w3-right">
          </div>
        </form>
      </div>
    </div>
  </div>
  <header class="w3-container w3-top w3-hide-large w3-green w3-xlarge w3-padding">
    <a href="javascript:void(0)" class="w3-button w3-green w3-margin-right" onclick="w3_open()">☰</a>
    <span>Salvus</span>
  </header>
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  <div class="w3-main" style="margin-left:340px;margin-right:40px;margin-bottom: 80px;">
    <div class="w3-container" style="margin-top:80px" id="showcase">
      <h1 class="w3-jumbo"><b>Termini savjetovanja</b></h1>
      <h1 class="w3-xxxlarge w3-text-green" id="country"><b>Odaberite zemlju iz izbornika</b></h1>
      <hr style="width:50px;border:5px solid #04AA6D" class="w3-round">
    </div>
    <table id="termini"></table>
  </div>
  <script src="./src/app.js"></script>
  <script src="./src/helper-scripts.js"></script>
  <script src="./src/copy-for-web.js"></script>
  <script>
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

    function showTable(country) {
      let countryName = country.toLowerCase();
      document.getElementById('termini').innerHTML = ' ';
      w3_close();
      fetch('./api/api-' + countryName + '.php')
        .then((response) => response.json())
        .then((data) => {
          getData(data);
        });
    }
  </script>
</body>

</html>