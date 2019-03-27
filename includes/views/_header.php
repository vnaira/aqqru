<!DOCTYPE html> 
<html> 
	<head> 
	<title><?php echo formatTitle($title)?></title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i"
              rel="stylesheet">

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
              integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link rel="stylesheet" href="assets/css/style.css" />

        <!-- JavaScript Libraries -->
        <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
<!--        <script src="lib/jquery/jquery-migrate.min.js"></script>-->
        <script type="text/javascript" src="js/drag.js"></script>
        <script src="js/main.js"></script>

</head> 
<body> 

<div data-role="page">

	<div data-role="header" data-theme="b">
<!--	    <a href="./" data-icon="home" data-iconpos="notext" data-transition="fade">Home</a>-->
		<h1><?php echo $title?></h1>
	</div>

	<div data-role="content">