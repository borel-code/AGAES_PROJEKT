  <?php 
session_cache_limiter('private_no_expire,must-revalidate');session_start();
$_SESSION['mordre']= $_POST['ordre'];
$model=$_POST['model']; 
if($model==1){
   header('location:insertvubulltrim.php');
} 
if($model==2){
   header('location:insertvubulltrimcomp.php');
}
if($model==3){
   header('location:insertvubulltrimcomp2.php');
}
 ?>