 <?php session_cache_limiter('private_no_expire,must-revalidate');
session_start();
 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h5>Connexion</h5>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    
      <form>
         

        <div class="row">
           
          <!-- /.col -->
          <div class="input-group mb-3">
            <a href="loginf.php" name="envoi" class="btn btn-danger btn-block" value="send">Administration</a>
          </div>
          <div class="input-group mb-3">
            <a href="login6.php" name="envoi" class="btn btn-success btn-block" value="send">Enseignant</a>
          </div>
           <div class="input-group mb-3">
            <a href="moncompte.php" name="envoi" class="btn btn-primary btn-block" value="send">Parent/Elève</a>
          </div><a class="button button-primary" href="index.php"><i class="fas fa-arrow-left text-muted">Retour</i></a>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
         
      </div>
      <!-- /.social-auth-links -->
 
       
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
</body>
</html>
