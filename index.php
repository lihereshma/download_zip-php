

<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Download Zip</title>
  <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="favicon.ico">
  <!--font-awesome link for icons-->
  <link rel="stylesheet" media="screen" href="assets/vendor/fontawesome-free-5.13.0-web/css/all.min.css">
  <!-- Slick CSS files-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="assets/vendor/slick/slick-theme.css">
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="assets/css/style.css">
</head>

<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
      <div class="wrapper">
        <h1>download as zip</h1>
      </div>      
    </header>
    <!--header section end-->
    <!--main section start-->
    <main>
      <div class="wrapper">
        <div class="single-slider">
          <ul class="slider">
            <?php
              $fileToZip = array("linkedIn.png", "instagram.png", "facebook.png", "twitter.png");
              foreach($fileToZip as $image) {
                echo '
                  <li>
                    <img class="pic" src="assets/images/' . $image . '">
                  </li>
                ';
              }
            ?>
          </ul>
          <form action="index.php" method="POST">
            <div>
              <input type="submit" value="download" name="download">
            </div>          
          </form>
          <?php
            if(isset($_POST['download'])) {
              $zip = new ZipArchive;
              $zip_name = time().'.zip';
              if($zip->open($zip_name, ZipArchive::CREATE) === TRUE) {
                foreach($fileToZip as $file){
                  $zip->addFile("assets/images/".$file, $file);
                }
                $zip->close();
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.$zip_name.'');
                readfile($zip_name);
              }
            }
          ?>
        </div>
        
        <ul class="multiple-slider">           
          <li>
            <ul class="slider">
              <?php
                $images = array("3f.png", "3m.png");
                foreach($images as $image) {
                  echo '
                    <li>
                      <img class="pic" src="assets/images/' . $image . '">
                    </li>
                  ';
                }
              ?>
            </ul>
            <div>
              <a href="#FIXME" class="downloadbtn">download</a>
            </div>
          </li> 
          <li>
            <ul class="slider">
              <?php
                $images = array("8f.png", "8m.png");
                foreach($images as $image) {
                  echo '
                    <li>
                      <img class="pic" src="assets/images/' . $image . '">
                    </li>
                  ';
                }
              ?>
            </ul>
            <div>
              <a href="#FIXME" class="downloadbtn">download</a>
            </div>
          </li>                           
        </ul>
      </div>
    </main>
    <!--main section end-->

  </div>
  <!--container end-->

  <script src="assets/vendor/jquery-3.4.1.min.js"></script>
  <script src="assets/vendor/jquery-migrate-1.2.1.min.js"></script>
  <script src="assets/vendor/slick/slick.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>