<?php
  if(isset($_POST)) {
    if(isset($_POST['data'])) {
      $image_src =json_decode(urldecode($_POST['data']), true);
      $image_src = array_unique($image_src);

      if(extension_loaded('zip')) {      
        foreach (glob("*.zip") as $filename) {
          unlink($filename);
        }
        if(isset($image_src) and count($image_src) > 0) {
          
          $zip = new ZipArchive;
          $zip_name = time().'.zip';
          if($zip->open($zip_name, ZipArchive::CREATE) === TRUE) {
            foreach($image_src as $file){
              $download_file = file_get_contents($file);
              $zip->addFromString(basename($file), $download_file);
            }
            $zip->close();
            echo $zip_name;
          }
        }
      }
    }
  }
?>     