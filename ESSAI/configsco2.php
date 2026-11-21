<?php  
session_cache_limiter('private_no_expire,must-revalidate');session_start();
require 'connectC.php';  require '../inscripfunction.php'; require '../lesmenus.php';
require '../lesmenushoriz.php'; require '../lesmenushoriz2.php'; require '../listabrvtype.php'; 
 set_time_limit(2000);


 $trueadmin=idamin($bdda,$_SESSION['util'],$_SESSION['mtp']);
 if($trueadmin!=0 
 AND ($_SESSION['code']==50 OR $_SESSION['code']==1
 OR $_SESSION['code']==2 OR $_SESSION['code']==3
 OR $_SESSION['code']==5 OR $_SESSION['code']==7) ){ 
   

 
 
if(!empty($_POST['send'])){
$classe=array();
$classe=$_POST['cls'];
$classe[]=$_SESSION['schuleconfigsco'];
if(!empty($classe)){
  
$total=count($classe); echo $total;
if($total>0){
    $in=$_POST['inscripn']; // type 0 pour inscrip
    $ia=$_POST['inscripa'];
    $t1n=$_POST['tranche1n'];// type 1 pour tranche 1
    $t1a=$_POST['tranche1a'];
    $t2n=$_POST['tranche2n'];// type 2 pour tranche 2
    $t2a=$_POST['tranche2a'];
    $t3n=$_POST['tranche3n'];// type 3 pour tranche 3
    $t3a=$_POST['tranche3a'];
    $fn=$_POST['fraisn']; // type 4 pour frais
    $fa=$_POST['fraisa'];
    $totaln=$in+$t1n+$t2n+$t3n;
        $totala=$ia+$t1a+$t2a+$t3a;
    //verifsco($bdda,$idcl,$stat,$an,$type)
    for($i=0;$i<$total;$i++){ 
        $kls=$classe[$i];   
        $vin=verifsco($bdda,$kls,'N',$_SESSION['annee'],0); // VERIF EXIST INSCRIP ANC
        $via=verifsco($bdda,$kls,'A',$_SESSION['annee'],0);
        $vt1n=verifsco($bdda,$kls,'N',$_SESSION['annee'],1);// VERIF EXIST TRANCH1 ANC
        $vt1a=verifsco($bdda,$kls,'A',$_SESSION['annee'],1);
        $vt2n=verifsco($bdda,$kls,'N',$_SESSION['annee'],2);
        $vt2a=verifsco($bdda,$kls,'A',$_SESSION['annee'],2);
        $vt3n=verifsco($bdda,$kls,'N',$_SESSION['annee'],3);
        $vt3a=verifsco($bdda,$kls,'A',$_SESSION['annee'],3);
        $vfn=verifsco($bdda,$kls,'N',$_SESSION['annee'],4);
        $vfa=verifsco($bdda,$kls,'A',$_SESSION['annee'],4);
        if($vin==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('0','N',$_SESSION['annee'],$kls,$in,'0'));
        }
        if($vin!=0){
            $r="UPDATE cordon SET tant='".$in."' WHERE id='".$vin."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }

        if($via==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('0','A',$_SESSION['annee'],$kls,$ia,'0'));
        }
        if($via!=0){
            $r="UPDATE cordon SET tant='".$ia."' WHERE id='".$via."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }


        if($vt1n==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('1','N',$_SESSION['annee'],$kls,$t1n,'0'));
        }
        if($vt1n!=0){
            $r="UPDATE cordon SET tant='".$t1n."' WHERE id='".$vt1n."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
        if($vt1a==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('1','A',$_SESSION['annee'],$kls,$t1a,'0'));
        }
        if($vt1a!=0){
            $r="UPDATE cordon SET tant='".$t1a."' WHERE id='".$vt1a."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }


        if($vt2n==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('2','N',$_SESSION['annee'],$kls,$t2n,'0'));
        }
        if($vt2n!=0){
            $r="UPDATE cordon SET tant='".$t2n."' WHERE id='".$vt2n."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
        if($vt2a==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('2','A',$_SESSION['annee'],$kls,$t2a,'0'));
        }
        if($vt2a!=0){
            $r="UPDATE cordon SET tant='".$t2n."' WHERE id='".$vt2a."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }


        if($vt3n==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('3','N',$_SESSION['annee'],$kls,$t3n,'0'));
        }
        if($vt3n!=0){
            $r="UPDATE cordon SET tant='".$t3n."' WHERE id='".$vt3n."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
        if($vt3a==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('3','A',$_SESSION['annee'],$kls,$t3a,'0'));
        }
        if($vt3a!=0){
            $r="UPDATE cordon SET tant='".$t3a."' WHERE id='".$vt3a."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }



        if($vfn==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('4','N',$_SESSION['annee'],$kls,$fn,'0'));
        }
        if($vfn!=0){
            $r="UPDATE cordon SET tant='".$fn."' WHERE id='".$vfn."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
        if($vfa==0){
            $req = $bdda->prepare('INSERT INTO cordon(type,stat,anens,idcl,tant,sup) VALUES(?,?,?,?,?,?)'); 
            $req->execute(array('4','A',$_SESSION['annee'],$kls,$fa,'0'));
        }
        if($vfa!=0){
            $r="UPDATE cordon SET tant='".$fa."' WHERE id='".$vfa."' AND anens='".$_SESSION['annee']."'";
            $req=$bdda->query($r);
        }
         
        $r="UPDATE eleve SET cout='".$totaln."' WHERE niveauelev='".$kls."' AND statut='N' AND anelev='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
        $r="UPDATE eleve SET cout='".$totala."' WHERE niveauelev='".$kls."' AND statut='A' AND anelev='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
        $r="UPDATE eleve SET reste=cout-total WHERE niveauelev='".$kls."' AND anelev='".$_SESSION['annee']."'";
        $req=$bdda->query($r);
    }
}
}
}
else{
   
    
    $classe=array();
     
    $classe[]=$_SESSION['schuleconfigsco'];
    if(!empty($classe)){
      
    $total=count($classe); echo $total;
    if($total>0){
        
        //verifsco($bdda,$idcl,$stat,$an,$type)
        for($i=0;$i<$total;$i++){ 
            $kls=$classe[$i];   
            $vin=verifsco($bdda,$kls,'N',$_SESSION['annee'],0); // VERIF EXIST INSCRIP ANC
            $via=verifsco($bdda,$kls,'A',$_SESSION['annee'],0);
            $vt1n=verifsco($bdda,$kls,'N',$_SESSION['annee'],1);// VERIF EXIST TRANCH1 ANC
            $vt1a=verifsco($bdda,$kls,'A',$_SESSION['annee'],1);
            $vt2n=verifsco($bdda,$kls,'N',$_SESSION['annee'],2);
            $vt2a=verifsco($bdda,$kls,'A',$_SESSION['annee'],2);
            $vt3n=verifsco($bdda,$kls,'N',$_SESSION['annee'],3);
            $vt3a=verifsco($bdda,$kls,'A',$_SESSION['annee'],3);
            $vfn=verifsco($bdda,$kls,'N',$_SESSION['annee'],4);
            $vfa=verifsco($bdda,$kls,'A',$_SESSION['annee'],4);
            
            if($vin!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
     
            if($via!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
    
     
            if($vt1n!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
            
            if($vt1a!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
     
            if($vt2n!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
             
            if($vt2a!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
     
            if($vt3n!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
            
            if($vt3a!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
     
            if($vfn!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
            
            if($vfa!=0){
                $r="UPDATE cordon SET sup='1' WHERE idcl='".$kls."' AND anens='".$_SESSION['annee']."'";
                $req=$bdda->query($r);
            }
             
    
        }
    }
    }

}

 header('location:configsco.php');



}
?>