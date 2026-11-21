 <?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
$_SESSION['mordre']= $_POST['ordre'];
$model=$_POST['model']; 
if($model==1){
   header('location:insertvubullan.php');
} 
if($model==2){
   header('location:insertvubullancomp.php');
}
if($model==3){
   header('location:insertvubullancomp2.php');
}
 ?>