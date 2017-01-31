<?php 
include 'inc/config.php';
include 'inc/Database.php';
	$min = $_GET['min'];
	$max = $_GET['max'];
	$db = new Database();
	$all = '';
	  $query = 'SELECT * FROM products WHERE  price>='.$min.' and price<='.$max;
      $post = $db->select($query);
      $rows = array();
      if($post){
      while($result = $post->fetch_assoc()){  
      $all .= '<li id="1"><img src="' . $result['image'] .
  '" class="items" alt="" /><br clear="all" /><div>'. $result['name'] .'</div><div>Price - $'. $result['price'] .'</div><button>ADD TO CART</button></li>';

      }
      echo $all;
      }else{
      	echo "<h2>No result found</h2>";
      }