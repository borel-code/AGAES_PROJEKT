<?php  
$nom=$_POST['voir'];
$direct="sujet/".$nom;
 echo"<HTML>
    <BODY><CENTER>
        <embed src='".$direct."' width='900px' height='1000px' type='application/pdf'>
            </CENTER> </BODY>
</HTML>";
?>