<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/admin/homepage_admin.php">Badger Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/admin/admin_functions/add_product.php">Add Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/admin_functions/all_products.php">See All Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/admin_functions/upload_image.php">Upload Image</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/admin_functions/logout.php ">Logout</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
<div class="wrapper">



<?php
require_once('connection.php');

