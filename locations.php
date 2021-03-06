<!DOCTYPE HTML>
<html>
    <head>
  		<!-- Returns all of the locations that KTCS has  -->
  		<!-- finished i think -->
        <meta charset="utf-8">
        <meta http-equiv="X UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Kingston Car Share (K-Town Car Share)">
        <meta name="author" content="Michael Sakamoto, Ito (Jose) Matsuda, Jack (Yilun) Xiao">
        <title>KTCS Locations</title>

        <!-- Bootstrap Base CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Animate.css -->
         <link rel="stylesheet" type="text/css" href="css/animate.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="font-a/css/font-awesome.css">
        <!-- Custom Page Styling CSS -->
         <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Page Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
    </head>
<body>

<?php
//Create a user session or resume an existing one
session_start();
?>
<div class="container-fluid locations">
<div class="row">
<div class="col-md-12 location-area">
    <h1>Current KTCS Locations</h1>

<?php
  // include database connection
    include_once 'config/connection.php'; 
	$query = "SELECT * FROM `parking location`";
	// http://php.net/manual/en/mysqli-result.fetch-assoc.php
    $result = mysqli_query($con,$query);

    // error check
    if (!$result) {
    echo "Could not successfully run query ($query) from DB: " . mysql_error();
    exit;
}
	if ($result = $con->query($query)){
		while ($row = $result->fetch_assoc()){
			printf("Address: %s \t; Spaces Available: (%d)", $row["Address"],$row["Number of Spaces"]);
			echo "<br>";
		}
	}
	// optional clean up here if you want, go to site linked above
?>

<?php
if(isset($_POST['returnBtn'])){
	session_destroy();
	header("Location: home.php"); // or wherever you want it to return
	die(); 
	}
?>

<!-- Webpage Content -->

    <form class="location-results" name='returnPrev' id='returnPrev' action='locations.php' method='post'>
        <!-- Submit -->
        <input type='submit' name='returnBtn' id='returnBtn' value='Return Home' /> 
    </form>
</div>
</div>
</div>
</body>
</html>