<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="robots" content="noindex, nofollow"/>
<title>LOGIN</title>
<link href=" assets/css/superhero-bootstrap.min.css" rel="stylesheet"/>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>      
</head>
<body>
<div class="container" style="margin-top: 30px;">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Silahkan masuk User</h3>
            </div>
            <div class="panel-body">
                <form class="form-signin" action="?act=loginuser" method="post">                        
                <?php if( $_POST ) include'aksi.php' ?>
                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="Username" name="loguser" autofocus />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="Password" name="logpass" /> 
                </div>       
                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>                
                </form> 
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="index.php" class="footer-link">Masuk sebagai Admin</a></div>  
            </div>
            </div>
        </div> 
    </div>    
</div>
</html>
