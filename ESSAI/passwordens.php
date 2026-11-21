 <?php 
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);
$message=" ";
 $token = bin2hex(random_bytes(32));
        $token_hash = hash('sha256', $token); // On stocke le hash
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
 
if (isset($_POST['new'])) {
    $email = $_POST['email'];

    // Vérifie si l'email existe (mais on affiche toujours le même message pour la sécu)
    $isexist=existemailensg($bdda,$email);
    
    
    if ($isexist==1) {
        // 1. Génère un token ultra sécurisé (64 caractères)
        $token = bin2hex(random_bytes(32));
        $token_hash = hash('sha256', $token); // On stocke le hash
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // 2. Supprime les anciens tokens et insère le nouveau
         $r="DELETE FROM passwordforget WHERE email='".$email."'";
  $req=$bdda->query($r);
   $req = $bdda->prepare("INSERT INTO passwordforget (email,tokenhash,expiredate) 
VALUES( ?,?,?)"); 
 $req->execute(array($email,$token_hash,$expires));

       
        // 3. Envoie le mail
        $link = lienacces()."/new_passwordens.php?toksend=$token";
        
        $subject = "Réinitialisation du mot de passe-Enseignant";
        $body = "Cliquez ici pour réinitialiser : $link - Valable 1h";
        $headers = "From: ".emailhebergement();
 
        mail($email, $subject, $body, $headers);
        
            $message = "Un lien a été envoyé à cette adresse email.";
    }
    
    
}



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
      <p class='login-box-msg'>Avez-vous oublié votre mot de passe? Vous pouvez le réinitialiser ici.
      </br> <b>".$message."</b>
      </p>

      <form  action='passwordens.php' method='POST'>
        <div class='input-group mb-3'>
          <input type='email' name='email'  class='form-control' placeholder='Email' required>
          <div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fas fa-envelope'></span>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <button type='submit' name='new' class='btn btn-primary btn-block'>Envoyer</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class='mt-3 mb-1'>
        <a href='login6.php'>Se connecter</a>
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

?>