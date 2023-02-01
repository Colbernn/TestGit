<?php
session_start(); //pour utiliser les variables de session
?>

<!doctype html>
<html lang="french">
<head>
    <title>Arborescence</title>
    <meta charset="utf-8">
    <link href="./lib/css/style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<header id="header">
    <img id="lrdg" src="./images/BanniereRefugeGeekV1.3 (1).png" alt="Banniere" />
</header>
<nav id="nav">
    <?php
    if(file_exists('./lib/php/menu.php')){
        include ('./lib/php/menu.php');
    }
    ?>
</nav>
<section id="main">
    <?php
    if(!isset($_SESSION['page'])){
        $_SESSION['page']= "accueil.php";
    }
    if(isset($_GET['page'])){
        $_SESSION['page'] = $_GET['page'];
    }
    $path = './pages/'.$_SESSION['page'];
    //print "path = ".$path;
    if(file_exists($path)){
        include ($path);
    }else {
        include ('./pages/page404.php');
    }

    ?>
</section>
</body>
<footer id="footer">Footer</footer>
</html>
