<?php 
include 'inc/config.php';
include 'inc/Database.php';
  $db = new Database();

$sql = "SELECT COUNT(id) FROM products";
$query = mysqli_query($db->link, $sql);
$row = mysqli_fetch_row($query);
$total_rows = $row[0];
// Specify how many results per page
$rpp = 12;
// This tells us the page number of our last page
$last = ceil($total_rows/$rpp);
// This makes sure $last cannot be less than 1
if($last < 1){
  $last = 1;
}
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
	
<script type="text/javascript">
  var max = 1500;
  var min = 100;
  var pn = 1;
</script>
<script>
var nums;
  function get_twn(){
    document.getElementById('title').innerHTML = '';
    var e = document.getElementById('province');    
    var val = e.options[e.selectedIndex].value;
    var hr = new XMLHttpRequest();
        hr.onreadystatechange = function(){
        if (hr.readyState==4 && hr.status==200){
             
            nums = JSON.parse(hr.responseText);
            var len = nums.length;
            for(i=0;i<=len;i++){
            document.getElementById('title').innerHTML += '<h2>'+nums[i].name+'</h2>' +' '+ nums[i].price+'<br>';
        
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
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="store.html">Store</a></li>
				<li><a href="store.html">Featured</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
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
		

<ul id="results_box">

<strong>Move the range slider</strong>

		</ul>
			
			
			<br clear="all" />
		
		<br clear="all" />
	
		<div id="pagination_controls"></div>
		

	</div>
	
		
</div>

		    </div>
		    </div>
		    	<div class="content-sidebar">
		    		<h4>Sort by</h4>
		

<div id="pagination_controls"></div>
		
		<div id="title"></div>
		<div class="container" >
 <!-- slider --> 
 <div id="slider"></div><br/>
 Range: <span id='range'></span>

 </div><br><hr>
 <h2>Show only:</h2><br>
            <select id="province" onchange="callme('yes')">
<option value="12">Default</option>
<option value="8">8 products per page</option>
<option value="4">4 products per page</option>
</select>

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
  <script>
var rpp = <?php echo $rpp; ?>; // results per page
var last = <?php echo $last; ?>; // last page number
function request_page(pn){
  var results_box = document.getElementById("results_box");
  var pagination_controls = document.getElementById("pagination_controls");
  //results_box.innerHTML = "loading results ...";
  var hr = new XMLHttpRequest();
    hr.open("POST", "test.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
      var dataArray = hr.responseText.split("||");
      var html_output = "";
        for(i = 0; i < dataArray.length - 1; i++){
        var itemArray = dataArray[i].split("|");
        html_output += '<li id="1"><img src="' + itemArray[1] +
  '" class="items" alt="" /><br clear="all" /><div>'+itemArray[0]+'</div><div>Price - $'+itemArray[2]+'</div><button>ADD TO CART</button></li>';
      }
      results_box.innerHTML = html_output;
      }
    }
    hr.send("rpp="+rpp+"&last="+last+"&pn="+pn+"&min="+min+"&max="+max);
  // Change the pagination controls
  var paginationCtrls = "";
    // Only if there is more than 1 page worth of results give the user pagination controls
    if(last != 1){
    if (pn > 1) {
      paginationCtrls += '<button onclick="request_page('+(pn-1)+')">&lt;</button>';
      }
    paginationCtrls += ' &nbsp; &nbsp; <b>Page '+pn+' of '+last+'</b> &nbsp; &nbsp; ';
      if (pn != last) {
          paginationCtrls += '<button onclick="request_page('+(pn+1)+')">&gt;</button>';
      }
    }
  pagination_controls.innerHTML = paginationCtrls;
}
</script>


  <script type="text/javascript">

  var rpp = <?php echo $rpp; ?>; // results per page
  var last = <?php echo $last; ?>; // last page number

  $(document).ready(function(){
 // Initializing slider
 $( "#slider" ).slider({
  range: true,
  min: 100,
  max: 1500,
  values: [ 100, 1500 ],
  slide: function( event, ui ) {

   // Get values
   min = ui.values[0];
   max = ui.values[1];
   $('#range').text(min+' - ' + max);


  var results_box = document.getElementById("results_box");
  var pagination_controls = document.getElementById("pagination_controls");
  results_box.innerHTML = "Loading....";
  var hr = new XMLHttpRequest();
    hr.open("POST", "getData.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
      var dataArray = hr.responseText.split("||");
    
       results_box.innerHTML = "No result found";
      var html_output = "";
        for(i = 0; i < dataArray.length - 1; i++){
        var itemArray = dataArray[i].split("|");
        html_output += '<li id="1"><img src="' + itemArray[1] +
  '" class="items" alt="" /><br clear="all" /><div>'+itemArray[0]+'</div><div>Price - $'+itemArray[2]+'</div><button>ADD TO CART</button></li>';
      }
 
      last = Math.ceil(itemArray[3]/rpp);
      results_box.innerHTML = html_output;

      }
    }

hr.send("rpp="+rpp+"&last="+last+"&pn="+pn+"&min="+min+"&max="+max);

  var paginationCtrls = "";
    
    if(last != 1){
    if (pn > 1) {
      paginationCtrls += '<button onclick="request_page('+(pn-1)+')">&lt;</button>';
      }

    paginationCtrls += ' &nbsp; &nbsp; <b>Pages '+pn+' of '+last+'</b> &nbsp; &nbsp; ';

      if (pn != last) {
          paginationCtrls += '<button onclick="request_page('+(pn+1)+')">&gt;</button>';
      }
    }
  pagination_controls.innerHTML = paginationCtrls;


  }
 });
});</script>
   
<script type="text/javascript">

function callme(req){
  pn = 1;

  if(req != undefined){
  var e = document.getElementById('province');    
    var val = e.options[e.selectedIndex].value;
    rpp = val;

}
	  var results_box = document.getElementById("results_box");
  var pagination_controls = document.getElementById("pagination_controls");

  var hr = new XMLHttpRequest();
    hr.open("POST", "getData.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
      var dataArray = hr.responseText.split("||");
     
      var html_output = "";
        for(i = 0; i < dataArray.length - 1; i++){
        var itemArray = dataArray[i].split("|");
        html_output += '<li id="1"><img src="' + itemArray[1] +
  '" class="items" alt="" /><br clear="all" /><div>'+itemArray[0]+'</div><div>Price - $'+itemArray[2]+'</div><button>ADD TO CART</button></li>';
      }
   
      last = Math.ceil(itemArray[3]/rpp);

      if(last != 1){
    if (pn > 1) {
      paginationCtrls += '<button onclick="request_page('+(pn-1)+')">&lt;</button>';
      }

    paginationCtrls += ' &nbsp; &nbsp; <b>Pages '+pn+' of '+last+'</b> &nbsp; &nbsp; ';

      if (pn != last) {
          paginationCtrls += '<button onclick="request_page('+(pn+1)+')">&gt;</button>';
      }
    }
  pagination_controls.innerHTML = paginationCtrls;

      results_box.innerHTML = html_output;

      }
    }

hr.send("rpp="+rpp+"&last="+last+"&pn="+pn+"&min="+min+"&max="+max);
// Change the pagination controls
  var paginationCtrls = "";
    // Only if there is more than 1 page worth of results give the user pagination controls

}

</script>
<script type="text/javascript">callme();</script>
	</body>
</html>

