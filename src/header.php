<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Welcome to Exhibition</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div class="container">
    <div class="text-center">
        <div class="jumbotron">
            <h4 class="section-title text-uppercase"><strong>Welcome to Exhibition Manager</strong></h4>
            <ul class="nav nav-pills" style="display: inline-block;">
                <li class="<?php if(basename($_SERVER['PHP_SELF'], '.php') === 'page-exhibitor-form') echo 'active' ?>"><a href="/src/map.php">Booth Registration</a></li>
                <!--<li class="<?php /*if(basename($_SERVER['PHP_SELF'], '.php') === 'page-exhibitor-form') echo 'active' */?>"><a href="/src/page-exhibitor-form.php">Exhibitor Register</a></li>-->
                <li class="<?php if(basename($_SERVER['PHP_SELF'], '.php') === 'page-international-visitor-form') echo 'active' ?>"><a href="/src/page-international-visitor-form.php">International Visitor</a></li>
            </ul>
        </div>
    </div>