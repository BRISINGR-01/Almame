<?php
// recieves filename

//these are just in case setting headers forcing it to always expire
header('Cache-Control: no-cache, must-revalidate');

//  $data = file_get_contents('php://stdin');
$data = file_get_contents('php://input');

$filename = "images/".$_GET['filename'];
if (file_put_contents($filename, $data)) {
  if (filesize($filename) != 0) {
    echo "File transfer completed.";
  } else {
    header("HTTP/1.0 400 Bad Request");
    echo "Void file.";
  }
} else {
  header("HTTP/1.0 400 Bad Request");
  echo "File transfer fail.";
}

?>