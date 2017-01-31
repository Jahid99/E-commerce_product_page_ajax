<?php 
include 'inc/config.php';
include 'inc/Database.php';
  $db = new Database();
$min = $_POST['min'];
  $max = $_POST['max'];
  // Make the script run only if there is a page number posted to this script
if(isset($_POST['pn'])){
  $rpp = preg_replace('#[^0-9]#', '', $_POST['rpp']);
  $last = preg_replace('#[^0-9]#', '', $_POST['last']);
  $pn = preg_replace('#[^0-9]#', '', $_POST['pn']);

  // This makes sure the page number isn't below 1, or more than our $last page
  if ($pn < 1) { 
      $pn = 1; 
  } else if ($pn > $last) { 
      $pn = $last; 
  }

  // This sets the range of rows to query for the chosen $pn
  $limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
  $dataString = '';
  $query = 'SELECT * FROM products WHERE  price>='.$min.' and price<='.$max.' '.$limit;
      $post = $db->select($query);
      if($post){
      while($result = $post->fetch_assoc()){
      $name = $result["name"];
      $image = $result["image"];
      $price = $result["price"];
      $dataString .= $name.'|'.$image.'|'.$price.'||';
      }
    }
    echo $dataString;
    exit();
}
 ?>