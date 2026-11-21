  <?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
$_SESSION['momatri']= $_POST['matri'];
$model=$_POST['model']; 
if($model==1){
   header('location:insertvubulltrimelev.php');
} 
if($model==2){
   header('location:insertvubulltrimelevcomp.php');
}
if($model==3){
   header('location:insertvubulltrimelevcomp2.php');
}
 ?>