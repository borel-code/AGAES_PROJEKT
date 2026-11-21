 <?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
$_SESSION['mordre']= $_POST['ordre'];
$model=$_POST['model']; 
if($model==1){
   header('location:insertvubullanelev.php');
} 
if($model==2){
   header('location:insertvubullanelevcomp.php');
}
if($model==3){
   header('location:insertvubullanelevcomp2.php');
}
 ?>