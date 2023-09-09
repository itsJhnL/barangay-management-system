<?php
 session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BMIS</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <link href="../../includes/assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <!-- to disable scroll bar but scroll is working -->
    <style>
        body::-webkit-scrollbar{
            display: none;
            }
    </style>

<body class="sb-nav-fixed container-fluid">

    <!-- to keep show dropdown list -->
    <?php include ('active.php') ?>

    <!-- to include each part of the page. -->
    <?php include 'navbar-top.php'; ?>

    <div id="layoutSidenav">

    <?php include 'sidebar.php'; ?>

    <div id="layoutSidenav_content">
        <main>