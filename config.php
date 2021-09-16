<?php
session_start();

$new_post = filter_input(INPUT_POST, 'new_post');
// $new_post = filter_input(INPUT_POST, 'new_post', FILTER_SANITIZE_SPECIAL_CHARS);

// Generate ID
function id(){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randstring = '';
  $i=0;
  while ($i <= 6) {
    $randstring .= $characters[rand(0, strlen($characters))];
    $i++;
  }
  return $randstring;
}
$id=id();

if($new_post) {
    $contents = $_SESSION["twtxt"];
    $contents .= "\n" . date("Y-m-d\TH:i:s\Z") . "\t(#" . $id . ")\t" ;
    $contents .= "$new_post";
    $_SESSION["twtxt"] = $contents;

    header("Refresh:0; url=index.html");
    //header("Location: index.html");
    exit;
} else {
	  //header("Location: index.html");
    echo "Opps something went wrong...\n\nCheck the error_log on the server";
    exit;
}
?>
