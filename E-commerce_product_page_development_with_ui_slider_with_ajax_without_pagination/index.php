<?php 
include 'inc/config.php';
include 'inc/Database.php';
	$db = new Database();
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | About :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link href='http://fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>	
		<link rel="stylesheet" href="js/jquery-ui.min.css">
		<link href="css/style1.css" rel="stylesheet" />
	</head>
	<script>
var nums;
  function get_twn(){
    document.getElementById('title').innerHTML = '';
    document.getElementById('range').innerHTML = '';
    var e = document.getElementById('province');    
    var val = e.options[e.selectedIndex].value;
    var hr = new XMLHttpRequest();
        hr.onreadystatechange = function(){
        if (hr.readyState==4 && hr.status==200){            
            nums = JSON.parse(hr.responseText);
            var len = nums.length;
            for(i=0;i<len;i++){
            document.getElementById('title').innerHTML += '<li id="1"><img src="' + nums[i].image +'" class="items" alt="" /><br clear="all" /><div>'+nums[i].name+'</div><div>Price - $'+nums[i].price+'</div><button>ADD TO CART</button></li>';
          }
        }
    }
hr.open("GET", "test.php?value=" + val, true);
  hr.send();      
}
</script>
	<body>	
		<div class="wrap">
		<!----start-Header---->
		<div class="header">
			
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="store.html">Store</a></li>
				<li><a href="#">Featured</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    <div class="content-grids">

<div align="left" style="min-height:800px;">
	
	<div id="cart_wrapper" align="center">
	
		<form action="#" id="cart_form" name="cart_form">
		
			<div class="cart-info"> </div>
			
			<div class="cart-total">
			
				<b>Total Charges:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $<span>0</span>
				
				<input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0" />
			</div>
			
			<button type="submit" id="Submit">CheckOut</button>
		
		</form>
	</div>
	
	<div id="wrap" align="center">

		<br>
	
		<ul id="title">

<?php	
	  $query = "SELECT * FROM products";
      $post = $db->select($query);
      $rows = array();
      while($result = $post->fetch_assoc()){ ?>
      
			<li id="1">
				<img src="<?php echo $result['image']; ?>" class="items" alt="" />
				
				<br clear="all" />
				<div><?php echo $result['name']; ?></div>
				<div>Price - $<?php echo $result['price']; ?></div>
				<button>ADD TO CART</button>
			</li>
					
		<?php } ?>	
			
			<br clear="all" />
		</ul>
		<br clear="all" />
	</div>
</div>
	    </div>
		    </div>
		    	<div class="content-sidebar">
		    		<h4>Sort by</h4>
						<select id="province" onchange="get_twn()">
<option value="default">Default</option>
<option value="low_to_high">Price(Low to High)</option>
<option value="high_to_low">Price(High to Low)</option>
<option value="a_z">Name(A - Z)</option>
<option value="z_a">Name(Z - A)</option>
</select>
<div class="container" ><br>
 <!-- slider --> 
 <div id="slider"></div><br/>
 Range: <span id='range'></span>
 </div>

		    </div>
		    </div>
		    <div class="clear"> </div>
		    </div>
	<div class="footer">
			<div class="wrap">
			<div class="section group">
				    <div style="padding:20px">
              <center><h2 style="color:#fff">Footer Part</h2></center>
            </div>
            
		
		</div>
		</div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>

   <script type="text/javascript">
  $(document).ready(function(){
 // Initializing slider
 $( "#slider" ).slider({
  range: true,
  min: 100,
  max: 1500,
  values: [ 300, 800 ],
  slide: function( event, ui ) {

   // Get values
   var min = ui.values[0];
   var max = ui.values[1];
   $('#range').text(min+' - ' + max);
   // AJAX request
   $.ajax({
    url: 'getData.php',
    type: 'get',
    data: {min:min,max:max},
    success: function(html){
    	document.getElementById("province").selectedIndex = "0";

      $("#title").html(html);
    } 
   });
  }
 });
});</script>


	</body>
</html>

