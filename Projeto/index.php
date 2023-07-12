<?php
//This line will make the page auto-refresh each 15 seconds
$page = $_SERVER['PHP_SELF'];
$sec = "300000";
?>


<html>
<head>
<!--//I've used bootstrap for the tables, so I inport the CSS files for taht as well...-->
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">		
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
	
	
	
	
	
<body>    

//Again for the third table for text send. We create the table with all the values from the database	
<?php

include("database_connect.php");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM ESPtable2");//table select

   echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Send Text to Noobix</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>Text</td>        
      </tr>  
		";

while($row = mysqli_fetch_array($result)) {


	echo "<tr class='success'>";
	
     $column11 = "TEXT_1"; 
    $current_text_1 = $row['TEXT_1'];
	
		
	echo "<td><form action= update_values.php method= 'post'>
  	<input style='width: 100%;' type='text' name='value' value=$current_text_1  size='100'>
  	<input type='hidden' name='column' value=$column11 >
  	<input type= 'submit' name= 'change_but' style='text-align:center' value='Send'></form></td>";
	
    echo "</tr>
	  </tbody>";      
}

	  echo" </table>
<br>";
$result = mysqli_query($con,"SELECT * FROM ESPtable2");//table select

while($row = mysqli_fetch_array($result)) {

    echo "<tr class='success'>";
    
    $column1 = "RECEIVED_NUM1";
    $column2 = "RECEIVED_NUM2";
    $column3 = "RECEIVED_NUM3";
	
    $current_num_1 = $row['RECEIVED_NUM1'];
	$current_num_2 = $row['RECEIVED_NUM2'];
	$current_num_3 = $row['RECEIVED_NUM3'];
    $current_num_4 = $row['RECEIVED_NUM4'];
  

    echo "<table class='table' style='font-size: 30px;'>
	<thead>
		<tr>
		<th>Numeric controls</th>	
		</tr>
	</thead>
	
    <tbody>
      <tr class='active'>
        <td>CONTROL NUMBER 1</td>
        <td>CONTROL NUMBER 2</td>
        <td>CONTROL NUMBER 3</td>
      </tr>
    <tr class='success'>
	<td>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_1  size='15' >
  	<input type='hidden' name='column' style='width: 120px;' value=$column1 ></form></td>


  	<td>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_2  size='15' >
  	<input type='hidden' name='column' style='width: 120px;' value=$column2 ></form></td>
  	
  	<td>
  	<input type='text' name='value' style='width: 120px;' value=$current_num_3  size='15' >
  	<input type='hidden' name='column' style='width: 120px;' value=$column3 ></form></td>
  	</tr>
  	
    
<br>
";
}
?>
