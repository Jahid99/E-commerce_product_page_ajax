<?php 
include 'inc/config.php';
include 'inc/Database.php';
	$min = $_POST['min'];
	$max = $_POST['max'];
	$db = new Database();

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

$sql = 'SELECT COUNT(id) FROM products WHERE  price>='.$min.' and price<='.$max;
$query = mysqli_query($db->link, $sql);
$row = mysqli_fetch_row($query);
$total_r= $row[0];

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
      //$dataString .= $name.'|'.$image.'|'.$price.'||';
      $dataString .= $name.'|'.$image.'|'.$price.'|'.$total_r.'||';
      }
      echo $dataString;
    }
    
   }
    
