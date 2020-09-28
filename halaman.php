<?php

include 'functions.php';
//if(empty($_SESSION[login]))
    //header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Download demo source code data mining clustering metode k-means berbasis web dengan PHP dan MySQL"/>
    <meta name="keywords" content="Data Mining, Clustering, K-Means, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery"/>
    <meta name="author" content="Data Mining"/>
    <link rel="icon" href="assets/images/favicon.ico"/>
    <!-- <link rel="canonical" href="https://sarjanakomedi.com/demo/k-means" />-->
    
    <title>Sistem Rekomendasi</title>
    <link href="assets/css/superhero-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>           
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="?m=ekstra"><span class="glyphicon glyphicon-th-large"></span>Ekstrakurikuler</a></li>
            <li><a href="?m=datasiswa"><span class="glyphicon glyphicon-user"></span>Data Siswa</a></li>
            <li><a href="?m=rating"><span class="glyphicon glyphicon-star"></span>Data Rating</a></li>  
            <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span>Rekomendasi</a></li>    
            <li><a href="?m=tambah"><span class="glyphicon glyphicon-tasks"></span> Hasil</a></li>   
            </ul> 
            
            <ul class="nav navbar-nav navbar-right"> 
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>                        
            </ul>      
        </div>
    </nav>
    <div class="container">
    <?php
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
            include 'home.php';
    ?>
    </div> 
    <footer class="footer bg-primary">
      <div class="container">
        <p>Skripsi Sistem Rekomedasi &copy; <?=date('Y')?> Aditya Arya Putra | TI16A1 <em class="pull-right"></em></p>
      </div>
    </footer>
</html>