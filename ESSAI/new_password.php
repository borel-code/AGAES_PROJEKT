<?php 
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);

 if(isset($_GET['toksend'])){  
$toksendvalue = $_GET['toksend'] ;
$token_hash = hash('sha256', $toksendvalue);
$exist=existoken($bdda,$token_hash);
if($exist==0){

}
else{
    echo " 
    <!DOCTYPE html>
<html >
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Mot de passe oublié</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'>
  <!-- Font Awesome -->
  <link rel='stylesheet' href='../plugins/fontawesome-free/css/all.min.css'>
  <!-- icheck bootstrap -->
  <link rel='stylesheet' href='../plugins/icheck-bootstrap/icheck-bootstrap.min.css'>
  <!-- Theme style -->
  <link rel='stylesheet' href='../dist/css/adminlte.min.css'>
</head>
<body class='hold-transition login-page'>
<div class='login-box'>
  <div class='login-logo'>
     
  </div>
  <!-- /.login-logo -->
  <div class='card'>
    <div class='card-body login-card-body'>
      <p class='login-box-msg'>Nouveau mot de passe
       
      </p>

      <form  action='forgot-password.php' method='POST'>
        <div class='input-group mb-3'>
          <input   name='newpass'  class='form-control' placeholder='Nouveau mot de passe' required>
          <div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fas fa-lock'></span>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <button type='submit' name='new' class='btn btn-primary btn-block'>Valider</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class='mt-3 mb-1'>
        <a href='loginf.php'>Se connecter</a>
      </p>
       
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src='../plugins/jquery/jquery.min.js'></script>
<!-- Bootstrap 4 -->
<script src='../plugins/bootstrap/js/bootstrap.bundle.min.js'></script>
<!-- AdminLTE App -->
<script src='../dist/js/adminlte.min.js'></script>
</body>
</html>

    ";
}
}




    ?>