<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Icons CDN Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Css file load -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/scroll_anim.css">
    <link rel="stylesheet" href="./css/title_animation.css">




    <!-- favicon icone link -->
    <link rel="icon" type="image/png" href="./favicon/favicon-48x48.png" sizes="48x48" />
    <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
    <link rel="shortcut icon" href="./favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./favicon/site.webmanifest" />



    <!-- Bootstrap charts link -->
    <link rel="stylesheet" href="../contrast-bootstrap-pro/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../contrast-bootstrap-pro/css/cdb.css" />
    

    <!-- line chart cdn link -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script src="../contrast-bootstrap-pro/js/cdb.js">
        
    </script>
    <script src="../contrast-bootstrap-pro/js/bootstrap.min.js">
    </script>
    <script src="https://kit.fontawesome.com/9d1d9a82d2.js" crossorigin="anonymous"></script>

    <title class="page-title">
        <?php
            $filename = basename($_SERVER['PHP_SELF'], ".php");
            $page_title = ucfirst(str_replace("_", " ", $filename)); // Fixed the assignment

            if($page_title === "Index"){ // Corrected condition to check if the page is "Index"
                echo "Dashboard";
            } else {
                echo $page_title;
            }
        ?>
    </title>

</head>
<body>

    <?php 
        if(isset($_SESSION['is_login'])){
            include("./includes/gen_navber.php");
        }
    ?>




<div id="particles-js"></div>
