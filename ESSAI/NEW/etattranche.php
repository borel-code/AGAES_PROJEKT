<?php 
function inscription($cl,$an,$stat){
    if($an=='2021/2022'){
      $anc=$stat;
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="A" ) {
        return "25000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="A" ) {
        return "25000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="A" ) {
        return "25000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="A" ) {
        return "40000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="A" ) {
        return "30000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="A" ) {
        return "30000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="A" ) {
        return "50000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="A" ) {
        return "50000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="A" ) {
        return "55000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="A" ) {
        return "55000";
         } 
     
     
     
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="N" ) {
        return "25000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="N" ) {
        return "25000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="N" ) {
        return "25000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="N" ) {
        return "40000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="N" ) {
        return "30000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="N" ) {
        return "30000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="N" ) {
        return "50000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="N" ) {
        return "50000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="N" ) {
        return "55000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="N" ) {
        return "55000";
         } 
      }
   }







   function tranche1($cl,$an,$stat){
    if($an=='2021/2022'){
      $anc=$stat;
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="A" ) {
        return "55000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="A" ) {
        return "55000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="A" ) {
        return "55000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="A" ) {
        return "85000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="A" ) {
        return "60000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="A" ) {
        return "60000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="A" ) {
        return "95000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="A" ) {
        return "95000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="A" ) {
        return "105000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="A" ) {
        return "105000";
         } 
     
     
     
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="N" ) {
        return "55000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="N" ) {
        return "55000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="N" ) {
        return "55000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="N" ) {
        return "85000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="N" ) {
        return "60000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="N" ) {
        return "60000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="N" ) {
        return "95000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="N" ) {
        return "95000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="N" ) {
        return "105000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="N" ) {
        return "105000";
         } 
      }
   }


   function tranche2($cl,$an,$stat){
    if($an=='2021/2022'){
      $anc=$stat;
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="A" ) {
        return "80000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="A" ) {
        return "80000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="A" ) {
        return "80000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="A" ) {
        return "85000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="A" ) {
        return "90000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="A" ) {
        return "90000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="A" ) {
        return "95000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="A" ) {
        return "95000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="A" ) {
        return "105000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="A" ) {
        return "105000";
         } 
     
     
     
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="N" ) {
        return "80000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="N" ) {
        return "80000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="N" ) {
        return "80000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="N" ) {
        return "85000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="N" ) {
        return "90000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="N" ) {
        return "90000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="N" ) {
        return "95000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="N" ) {
        return "95000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="N" ) {
        return "105000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="N" ) {
        return "105000";
         } 
      }
   }


   function tranche3($cl,$an,$stat){
    if($an=='2021/2022'){
      $anc=$stat;
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="A" ) {
        return "80000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="A" ) {
        return "80000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="A" ) {
        return "80000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="A" ) {
        return "85000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="A" ) {
        return "90000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="A" ) {
        return "90000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="A" ) {
        return "95000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="A" ) {
        return "95000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="A" ) {
        return "105000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="A" ) {
        return "105000";
         } 
     
     
     
      if(($cl=="6EME-1" OR $cl=="6EME-2" OR $cl=="6EME-3") AND $anc=="N" ) {
        return "80000";
         }  
       if(($cl=="5EME-1" OR $cl=="5EME-2" OR $cl=="5EME-3") AND $anc=="N" ) {
        return "80000";
         } 
       if(( $cl=="4ESP-1" OR $cl=="4ESP-2" OR $cl=="4ESP-3" OR $cl=="4ALL-1") AND $anc=="N" ) {
        return "80000";
         } 
      if(( $cl=="3ESP-1" OR $cl=="3ESP-2" OR $cl=="3ESP-3" OR $cl=="3ALL-1") AND $anc=="N" ) {
        return "85000";
         } 
      if((  $cl=="2NDE-C1" OR $cl=="2NDE-C2" OR $cl=="2NDE-A4-ALL" OR $cl=="2NDE-A4-ESP") AND $anc=="N" ) {
        return "90000";
         } 
      if(($cl=="2NDE-STT" ) AND $anc=="N" ) {
        return "90000";
         } 
      if((  $cl=="1ERE-D1" OR $cl=="1ERE-D2" OR $cl=="1ERE-D3" OR $cl=="1ERE-C" OR $cl=="1ERE-A4-ALL" OR $cl=="1ERE-A4-ESP") AND $anc=="N" ) {
        return "95000";
         } 
      if(( $cl=="1ERE-ACC" OR $cl=="1ERE-CG") AND $anc=="N" ) {
        return "95000";
         } 
      if(( $cl=="TLE-D1" OR $cl=="TLE-D2" OR $cl=="TLE-C" OR $cl=="TLE-A4-ALL" OR $cl=="TLE-A4-ESP" ) AND $anc=="N" ) {
        return "105000";
         } 
      if((  $cl=="TLE-ACC" OR $cl=="TLE-CG") AND $anc=="N" ) {
        return "105000";
         } 
      }
   }
   ?> 