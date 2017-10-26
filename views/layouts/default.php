<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Check24 Blog</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .banner{
            height: 100px;
            background: $ccc;
        }
        ul.navbar-nav{
            margin: auto;
            float: none;
            width: 300px;
        }
        .footer{
            margin-top: 100px;

            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="banner">
    </div>
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <li><a href="/?action=home">Home</a></li>
            <?php
            if (!isset($_SESSION['uid']) or !$_SESSION['uid']) {
                ?>
                <li><a href="/?action=login">Login</a></li>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION['uid']) and $_SESSION['uid']) {
                ?>
                <li><a href="/?action=add-entry">Add Entry</a></li>
                <li><a href="/?action=logout">Logout</a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
    <?php require_once 'views/'.$view.'.php'; ?>

    <div class="footer">
        &copy;<?php echo date("Y");?> <a href="/?action=imprint">Imprint</a>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>