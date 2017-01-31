<?php 
include 'inc/config.php';
include 'inc/Database.php';
	$db = new Database();


if(isset($_REQUEST["value"])){
	$value = $_GET['value'];
       	if($value=='low_to_high'){
       $query = "SELECT * FROM products ORDER BY price";
      $post = $db->select($query);
      $rows = array();
      while($result = $post->fetch_assoc()){
        $rows[] = $result;

      }
     
      

  echo json_encode($rows); 
	}else if($value=='high_to_low'){
		$query = "SELECT * FROM products ORDER BY price DESC";
      $post = $db->select($query);
      $rows = array();
      while($result = $post->fetch_assoc()){
        $rows[] = $result;

      }
     
      

  echo json_encode($rows); 
	}else if($value=='a_z'){
    $query = "SELECT * FROM products ORDER BY name";
      $post = $db->select($query);
      $rows = array();
      while($result = $post->fetch_assoc()){
        $rows[] = $result;

      }
     
      

  echo json_encode($rows); 
  }else if($value=='z_a'){
    $query = "SELECT * FROM products ORDER BY name DESC";
      $post = $db->select($query);
      $rows = array();
      while($result = $post->fetch_assoc()){
        $rows[] = $result;

      }

      

  echo json_encode($rows); 
  }else{
    $query = "SELECT * FROM products";
      $post = $db->select($query);
      $rows = array();
      while($result = $post->fetch_assoc()){
        $rows[] = $result;

      }  

  echo json_encode($rows); 
  }


}else{
	echo "not found";
}

 ?>