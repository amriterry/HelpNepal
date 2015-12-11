<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help Nepal :: <?php echo $title; ?></title>

    <!-- Bootstrap CSS -->

    <link href="favicon.ico" rel="icon" />
    <link href="favicon.ico" rel="shortcut/icon" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="packages/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/app.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php if(isset($_SESSION['user_login'])): ?>
<nav class="navbar navbar-inverse navbar-fixed">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo basename("index.php"); ?>">
                <img src="public/img/icon24.png" /> Help Nepal</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo basename("index.php"); ?>">Home</a></li>
                <li><a href="<?php echo basename("index.php"); ?>">List Feeds</a></li>
                <li><a href="<?php echo basename("add.php"); ?>">Add New Feed</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo basename("logout.php"); ?>">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div id="main-wrapper">

    <div class="jumbotron fixed" id="top-heading">
        <div class="content">
            <h1 class="text-center">Help Nepal</h1>
            <h4 class="text-center">helping people by people...</h4>
        </div>
    </div>

    <div id="wrapper">

    <?php endif; ?>
