<?php 
require '../lienC2.php';
 
function urlracine(){
  return "http://localhost/ETAB2022_2023/AGAES/";
}

function datacol(){
  return "college1test";
}

function dataprim(){
  return "bddeclic";
}

function difflien($lien,$lien1){
    $val=0;
    if($lien==$lien1){
        $val=1;
    }
    return $val;
}

function format($date){
	$a=substr($date,0,4);
	
	$m=substr($date,5,2);
	
	$j=substr($date,8,2);
	
	$dat=$j.".".$m.".".$a;
	return $dat;
	} 
	function format2($date){
		$j=substr($date,0,2);
		
		$m=substr($date,3,2);
		
		$a=substr($date,6,4);
		
		$dat=$a.".".$m.".".$j;
		return $dat;
		} 



function deletefolder($folder){
    if(is_dir($folder)){
      $objs=scandir($folder);
      foreach($objs as $obj){
        if($obj!= "." && $obj!=".."){
          if(is_dir($folder."/".$obj)){
            deletefolder($folder."/".$obj);
          }
          else{
            unlink($folder."/".$obj);
          }
          
        }
        
      }
      rmdir($folder);
    }
   
  }


function $bddt->$bddt,$idetablier,$idas){//note trimestre en une matière 

  
  $v="SELECT idinscrit,idetablier,idas FROM  inscrit" ;
  $reponse = $bddt->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
    if($donnees['idetablier']==$idetablier AND $donnees['idas']==$idas){
        $true=$donnees['idinscrit'];  
    }
  } 
  $reponse->closeCursor(); 
   
  return $true;
   
  }


  function payeinscri($bddt,$idinscrit){//note trimestre en une matière 

  
  $v="SELECT idinscrit,montant FROM  versement" ;
  $reponse = $bddt->query($v);
  $true=0;
  while ($donnees = $reponse->fetch())
  {
    if($donnees['idinscrit']==$idinscrit){
        $true+=$donnees['montant'];  
    }
  } 
  $reponse->closeCursor(); 
   
  return $true;
   
  }

  function infoschool($bddt,$idetablier){//note trimestre en une matière 
 
  $name="@";
  $v="SELECT * FROM  etablier" ;
  $reponse = $bddt->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
  if($donnees['idetablier']==$idetablier){
        $name=$donnees['idetablier']."@".$donnees['nometab']."@".$donnees['numetab']."@".$donnees['villetab']."@".$donnees['qtieretab']."@".$donnees['nomadm']."@".$donnees['numadm']."@".$donnees['lien']."@".$donnees['lienparent']."@".$donnees['user']."@".$donnees['motp']."@".$donnees['base']."@".$donnees['initial'];  
    }
  } 
  $reponse->closeCursor(); 
  return $name;
  }

  function infoinscrit($bddt,$idetablier,$idas){//note trimestre en une matière 

  $name="@";
  $v="SELECT * FROM inscrit" ;
  $reponse = $bddt->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
  if($donnees['idetablier']==$idetablier AND $donnees['idas']==$idas){
        $name=$donnees['idinscrit']."@".$donnees['cout']."@".$donnees['totalavance']."@".$donnees['datedeb']."@".$donnees['dateproro']."@".$donnees['idleiter'];  
    $true=1;
      }
  } 
  $reponse->closeCursor(); 
  return $name;
  }

function infoi1stnscrit($bddt,$idetablier){//note trimestre en une matière 

  $name="@";
  $v="SELECT * FROM inscrit ORDER BY idas" ;
  $reponse = $bddt->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
  if($donnees['idetablier']==$idetablier){
        $name=$donnees['datedeb'];  
    $true=1;
      }
  } 
  $reponse->closeCursor(); 
  return $name;
  }


function Vinscrit($idetablier,$an){//note trimestre en une matière 

   
  $v="SELECT * FROM inscrit ORDER BY idas" ;
  $reponse = $bddt->query($v);
  $true=0;
  while ($donnees = $reponse->fetch() AND $true==0)
  {
  if($donnees['idetablier']==$idetablier AND $donnees['idas']==$an){
         $true=$donnees['idinscrit'];
      }
  } 
  $reponse->closeCursor(); 
  return $true;
  }





function namean($bddt,$idas){
 

     $v="SELECT *  FROM lesannees";
     $reponse = $bddt->query($v);
       $t=0;  $na=" ";
      while ($donnees = $reponse->fetch())
      {
        if($donnees['idas']==$idas AND  $t==0){ 
             $na=$donnees['nomas'];
             $t=1;
           }
       }
      $reponse->closeCursor();
      return $na;
    } 



  function nbBDdispo($bddt,$bddt,$type){
 

     $v="SELECT *  FROM lesbases";
     $reponse = $bddt->query($v);
       $t=0;  
      while ($donnees = $reponse->fetch())
      {
        if($donnees['dispo']==0 AND  $donnees['type']==$type){ 
             $t++;
           }
       }
      $reponse->closeCursor();
      return $t;
    } 

    function BDdispo($bddt,$type){
 

       $v="SELECT *  FROM lesbases";
       $reponse = $bddt->query($v);
         $t=0;  $nom="@";
        while ($donnees = $reponse->fetch() AND $t==0)
        {
          if($donnees['dispo']==0 AND $donnees['type']==$type){ 
                $nom=$donnees['idlesbases']."@".$donnees['nom']."@".$donnees['hostb']."@".$donnees['userb']."@".$donnees['dispo'];
               $t=1;
             }
         }
        $reponse->closeCursor();
        return $nom;
      } 



function lineBD($bddt,$nomdata){
 

       $v="SELECT *  FROM lesbases";
       $reponse = $bddt->query($v);
         $t=0;  $nom="@";
        while ($donnees = $reponse->fetch() AND $t==0)
        {
          if($donnees['nom']==$nomdata){ 
                $nom=$donnees['idlesbases']."@".$donnees['nom']."@".$donnees['hostb']."@".$donnees['userb']."@".$donnees['dispo']."@".$donnees['mpb'];
               $t=1;
             }
         }
        $reponse->closeCursor();
        return $nom;
      } 



      function BDdispopw($bddt){
 

         $v="SELECT *  FROM lesbases";
         $reponse = $bddt->query($v);
           $t=0;  $nom=" ";
          while ($donnees = $reponse->fetch() AND $t==0)
          {
            if($donnees['dispo']==0){ 
                  $nom=$donnees['mpb'] ;
                 $t=1;
               }
           }
          $reponse->closeCursor();
          return $nom;
        } 






function dbprimaire(){ 
  $sql="-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- G�n�r� le : Dim 03 Novembre 2024 � 18:18
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

--
-- Base de donn�es: `bdprimaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(20) NOT NULL,
  `matiere` varchar(15) NOT NULL,
  `anelev` varchar(12) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `duree` varchar(7) NOT NULL,
  `dateabs` varchar(20) NOT NULL,
  `datenreg` varchar(15) NOT NULL,
  `heurenreg` varchar(30) NOT NULL,
  `typeutil` int(11) NOT NULL,
  `idleiter` int(11) NOT NULL,
  `motensgt` varchar(30) NOT NULL,
  `nomenreg` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `absence`
--


-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `mtpasse` varchar(15) NOT NULL,
  `user` varchar(30) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `numtel` varchar(15) NOT NULL,
  `anens` varchar(15) NOT NULL,
  `verrou` int(11) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  `cni` varchar(40) NOT NULL,
  `intrus` int(11) NOT NULL,
  `migrer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `mtpasse`, `user`, `genre`, `numtel`, `anens`, `verrou`, `id_etab`, `sup`, `cni`, `intrus`, `migrer`) VALUES
(16, 'KAMMOGNE TAMDJO', '16S69', '16S69', 'M', '674494384', '2022/2023', 0, 0, 0, '108', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `admini`
--

CREATE TABLE IF NOT EXISTS `admini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mtpasse` varchar(15) CHARACTER SET utf8 NOT NULL,
  `user` varchar(30) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(10) CHARACTER SET utf8 NOT NULL,
  `numtel` varchar(15) CHARACTER SET utf8 NOT NULL,
  `anens` varchar(15) CHARACTER SET utf8 NOT NULL,
  `verrou` int(11) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  `salaire` int(11) NOT NULL,
  `cni` varchar(40) CHARACTER SET utf8 NOT NULL,
  `intrus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `admini`
--


-- --------------------------------------------------------

--
-- Structure de la table `admini_provisoire`
--

CREATE TABLE IF NOT EXISTS `admini_provisoire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mtpasse` varchar(15) CHARACTER SET utf8 NOT NULL,
  `user` varchar(30) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(10) CHARACTER SET utf8 NOT NULL,
  `numtel` varchar(15) CHARACTER SET utf8 NOT NULL,
  `anens` varchar(15) CHARACTER SET utf8 NOT NULL,
  `verrou` int(11) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  `salaire` int(11) NOT NULL,
  `cni` varchar(40) CHARACTER SET utf8 NOT NULL,
  `intrus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `admini_provisoire`
--

INSERT INTO `admini_provisoire` (`id`, `code`, `nom`, `mtpasse`, `user`, `genre`, `numtel`, `anens`, `verrou`, `id_etab`, `sup`, `salaire`, `cni`, `intrus`) VALUES
(1, 1, 'FONDATRICE', 'fon22', 'fon22', 'F', '', '2022/2023', 0, 0, 0, 0, '12345', 0),
(3, 2, 'Mbahmuntah', '61990goodness', 'Mbahmuntah', 'M', 'Prosper', '2022/2023', 0, 0, 0, 0, '677013493', 0),
(4, 4, 'AWA PRECIOUS EDEN', 'EDENLOVE2022', 'PRECIOUS', 'F', '652390874', '2022/2023', 0, 0, 0, 0, '652390874', 0),
(5, 7, 'AWA PRECIOUS EDEN', 'EDENLOVE2022', 'PRECIOUS', 'F', '652390874', '2022/2023', 0, 0, 0, 0, '652390874', 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin_poste`
--

CREATE TABLE IF NOT EXISTS `admin_poste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `idposte` int(11) NOT NULL,
  `anens` varchar(12) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `admin_poste`
--


-- --------------------------------------------------------

--
-- Structure de la table `admin_salaire`
--

CREATE TABLE IF NOT EXISTS `admin_salaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `salaire` decimal(10,2) NOT NULL,
  `anens` varchar(12) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `admin_salaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `autrefrais`
--

CREATE TABLE IF NOT EXISTS `autrefrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `autrefrais`
--


-- --------------------------------------------------------

--
-- Structure de la table `autrepayefrais`
--

CREATE TABLE IF NOT EXISTS `autrepayefrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(15) NOT NULL,
  `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `frais` varchar(20) CHARACTER SET utf8 NOT NULL,
  `mois` varchar(2) CHARACTER SET utf8 NOT NULL,
  `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
  `idempl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `autrepayefrais`
--


-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE IF NOT EXISTS `batiment` (
  `idb` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `an` varchar(10) NOT NULL,
  PRIMARY KEY (`idb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Contenu de la table `batiment`
--


-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
  `typeEns` int(11) NOT NULL,
  `cycle` int(11) NOT NULL,
  `etab0` int(11) NOT NULL,
  `anc` int(11) NOT NULL,
  `anens` varchar(10) CHARACTER SET utf8 NOT NULL,
  `categ` varchar(5) CHARACTER SET utf8 NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id`, `code`, `niveau`, `typeEns`, `cycle`, `etab0`, `anc`, `anens`, `categ`, `sup`) VALUES
(51, 'CRECHE JOURNALIERE', ' ', 1, 1, 65, 1, '2024/2025', 'MA', 0),
(52, 'PS', ' ', 1, 1, 65, 1, '2024/2025', 'MA', 0),
(53, 'PRE-NUSERY', ' ', 2, 1, 65, 1, '2024/2025', 'MA', 0),
(54, 'MS', ' ', 1, 1, 65, 1, '2024/2025', 'MA', 0),
(55, 'NUSERY-I', ' ', 2, 1, 65, 1, '2024/2025', 'MA', 0),
(56, 'GS', ' ', 1, 1, 65, 1, '2024/2025', 'MA', 0),
(57, 'NUSERY-II', ' ', 2, 1, 65, 1, '2024/2025', 'MA', 0),
(58, 'SIL-A', ' ', 1, 2, 65, 1, '2024/2025', 'I', 0),
(59, 'SIL-B', ' ', 1, 2, 65, 1, '2024/2025', 'I', 0),
(60, 'CLASS-I', ' ', 2, 2, 65, 1, '2024/2025', 'I', 0),
(61, 'CP-A', ' ', 1, 2, 65, 1, '2024/2025', 'II', 0),
(62, 'CP-B', ' ', 1, 2, 65, 1, '2024/2025', 'II', 0),
(63, 'CLASS-II', ' ', 2, 2, 65, 1, '2024/2025', 'II', 0),
(64, 'CE1-A', ' ', 1, 2, 65, 1, '2024/2025', 'III', 0),
(65, 'CE1-B', ' ', 1, 2, 65, 1, '2024/2025', 'III', 0),
(66, 'CLASS-III', ' ', 2, 2, 65, 1, '2024/2025', 'III', 0),
(67, 'CE2-A', ' ', 1, 2, 65, 1, '2024/2025', 'IV', 0),
(68, 'CE2-B', ' ', 1, 2, 65, 1, '2024/2025', 'IV', 0),
(69, 'CLASS-IV', ' ', 2, 2, 65, 1, '2024/2025', 'IV', 0),
(70, 'CM1-A', ' ', 1, 2, 65, 1, '2024/2025', 'V', 0),
(71, 'CM1-B', ' ', 1, 2, 65, 1, '2024/2025', 'V', 0),
(72, 'CLASS-V', ' ', 2, 2, 65, 1, '2024/2025', 'V', 0),
(73, 'CM2-A', ' ', 1, 2, 65, 1, '2024/2025', 'VI', 0),
(74, 'CM2-B', ' ', 1, 2, 65, 1, '2024/2025', 'VI', 0),
(75, 'CLASS-VI', ' ', 2, 2, 65, 1, '2024/2025', 'VI', 0),
(76, 'PS-BILINGUE', ' ', 3, 1, 65, 1, '2024/2025', 'MA', 0),
(77, 'MS-BILINGUE', ' ', 3, 1, 65, 1, '2024/2025', 'MA', 0),
(78, 'GS-BILINGUE', ' ', 3, 1, 65, 1, '2024/2025', 'MA', 0),
(79, 'CRECHE MENSUELLE', ' ', 4, 1, 50, 1, '2024/2025', 'MA', 0),
(80, 'SIL-BILINGUE', ' ', 3, 2, 50, 1, '2024/2025', 'I', 0),
(81, 'CP-BILINGUE', ' ', 3, 2, 50, 1, '2024/2025', 'II', 0),
(82, 'CE1-BILINGUE', ' ', 3, 2, 50, 1, '2024/2025', 'III', 0),
(83, 'CE2-BILINGUE', ' ', 3, 2, 50, 1, '2024/2025', 'IV', 0);

-- --------------------------------------------------------

--
-- Structure de la table `classe1`
--

CREATE TABLE IF NOT EXISTS `classe1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
  `typeEns` int(11) NOT NULL,
  `cycle` int(11) NOT NULL,
  `etab0` int(11) NOT NULL,
  `anc` int(11) NOT NULL,
  `anens` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=175 ;

--
-- Contenu de la table `classe1`
--

INSERT INTO `classe1` (`id`, `code`, `niveau`, `typeEns`, `cycle`, `etab0`, `anc`, `anens`) VALUES
(1, '6EME-1', '1', 1, 1, 15, 1, '2022/2023'),
(2, '6EME-2', '1', 1, 1, 15, 1, '2022/2023'),
(3, '6EME-3', '1', 1, 1, 50, 1, '2022/2023'),
(4, '5EME-1', '1', 1, 1, 15, 1, '2022/2023'),
(5, '5EME-2', '1', 1, 1, 0, 1, '2022/2023'),
(6, '5EME-3', '1', 1, 1, 0, 1, '2022/2023'),
(7, '4ALL-1', '2', 1, 1, 15, 1, '2022/2023'),
(8, '4ESP-1', '3', 1, 1, 0, 1, '2022/2023'),
(9, '4ESP-2', '3', 1, 1, 0, 1, '2022/2023'),
(10, '4ESP-3', '3', 1, 1, 0, 1, '2022/2023'),
(11, '4MIXTE', '2a', 1, 1, 15, 1, '2022/2023'),
(12, '3ALL-1', '4', 1, 1, 15, 1, '2022/2023'),
(13, '3ESP-1', '5', 1, 1, 0, 1, '2022/2023'),
(14, '3ESP-2', '5', 1, 1, 0, 1, '2022/2023'),
(15, '3ESP-3', '5', 1, 1, 0, 1, '2022/2023'),
(16, '3MIXTE', '4a', 1, 1, 15, 1, '2022/2023'),
(17, '2NDE-A4-ALL', '6', 1, 2, 0, 1, '2022/2023'),
(18, '2NDE-A4-ESP', '7', 1, 2, 0, 1, '2022/2023'),
(19, '2NDE-A4-ALL-ESP', '6a', 1, 2, 15, 1, '2022/2023'),
(20, '2NDE-C1', '8', 1, 2, 0, 1, '2022/2023'),
(21, '2NDE-C2', '8', 1, 2, 0, 1, '2022/2023'),
(22, '2NDE-STT', '14', 2, 2, 50, 1, '2022/2023'),
(23, '2NDE-SES', '49', 2, 2, 50, 1, '2022/2023'),
(24, '2NDE-ESF', '50', 2, 2, 50, 1, '2022/2023'),
(25, '2NDE-F8', '48', 2, 2, 50, 1, '2022/2023'),
(26, '1ERE-A4-ALL', '10', 1, 2, 0, 1, '2022/2023'),
(27, '1ERE-A4-ESP', '11', 1, 2, 0, 1, '2022/2023'),
(28, '1ERE-A4-ALL-ESP', '10a', 1, 2, 0, 1, '2022/2023'),
(29, '1ERE-C', '8', 1, 2, 0, 1, '2022/2023'),
(30, '1ERE-D1', '8', 1, 2, 0, 1, '2022/2023'),
(31, '1ERE-D2', '8', 1, 2, 0, 1, '2022/2023'),
(32, '1ERE-D3', '8', 1, 2, 0, 1, '2022/2023'),
(33, '1ERE-C-D', '8', 1, 2, 0, 1, '2022/2023'),
(34, '1ERE-ACA', '17', 2, 2, 50, 1, '2022/2023'),
(35, '1ERE-ACC', '15', 2, 2, 0, 1, '2022/2023'),
(36, '1ERE-CG', '16', 2, 2, 50, 1, '2022/2023'),
(37, '1ERE-FIG', '54', 2, 2, 50, 1, '2022/2023'),
(38, '1ERE-F2', '19', 3, 2, 0, 1, '2022/2023'),
(39, '1ERE-F3', '19', 3, 2, 50, 1, '2022/2023'),
(40, '1ERE-F4', '29', 3, 2, 50, 1, '2022/2023'),
(41, '1ERE-F5', '30', 3, 2, 50, 1, '2022/2023'),
(42, '1ERE-F8', '31', 2, 2, 50, 1, '2022/2023'),
(43, '1ERE-E', '32', 3, 2, 50, 1, '2022/2023'),
(44, '1ERE-IH', '33', 3, 2, 50, 1, '2022/2023'),
(45, '1ERE-IS-RH', '55', 3, 2, 50, 1, '2022/2023'),
(46, '1ERE-ESF', '34', 2, 2, 50, 1, '2022/2023'),
(47, '1ERE-GT-TO', '38', 3, 2, 50, 1, '2022/2023'),
(48, '1ERE-MEB', '51', 3, 2, 50, 1, '2022/2023'),
(49, '1ERE-CMA-MVT', '35', 3, 2, 50, 1, '2022/2023'),
(50, '1ERE-MEM', '36', 3, 2, 50, 1, '2022/2023'),
(51, '1ERE-MEH', '37', 3, 2, 50, 1, '2022/2023'),
(52, '1ERE-MA', '39', 3, 2, 50, 1, '2022/2023'),
(53, '1ERE-MISE', '53', 3, 2, 50, 1, '2022/2023'),
(54, '1ERE-SES', '40', 2, 2, 50, 1, '2022/2023'),
(55, '1ERE-TI', '52', 3, 2, 50, 1, '2022/2023'),
(57, 'TLE-A4-ALL', '12', 1, 2, 0, 1, '2022/2023'),
(58, 'TLE-A4-ESP', '13', 1, 2, 0, 1, '2022/2023'),
(59, 'TLE-A4-ALL-ESP', '12a', 1, 2, 10, 1, '2022/2023'),
(60, 'TLE-C', '9', 1, 2, 50, 1, '2022/2023'),
(61, 'TLE-D1', '9', 1, 2, 0, 1, '2022/2023'),
(62, 'TLE-D2', '9', 1, 2, 0, 1, '2022/2023'),
(63, 'TLE-C-D', '9', 1, 2, 0, 1, '2022/2023'),
(64, 'TLE-ACA', '18', 2, 2, 50, 1, '2022/2023'),
(65, 'TLE-ACC', '19', 2, 2, 0, 1, '2022/2023'),
(66, 'TLE-CG', '20', 2, 2, 0, 1, '2022/2023'),
(67, 'TLE-FIG', '59', 2, 2, 50, 1, '2022/2023'),
(68, 'TLE-F1', '47', 3, 2, 0, 1, '2022/2023'),
(69, 'TLE-F2', '21', 3, 2, 0, 1, '2022/2023'),
(70, 'TLE-F3', '22', 3, 2, 50, 1, '2022/2023'),
(71, 'TLE-F4', '41', 3, 2, 50, 1, '2022/2023'),
(72, 'TLE-F5', '42', 3, 2, 50, 1, '2022/2023'),
(73, 'TLE-F8', '23', 2, 2, 50, 1, '2022/2023'),
(74, 'TLE-E', '24', 3, 2, 50, 1, '2022/2023'),
(75, 'TLE-IH', '25', 3, 2, 50, 1, '2022/2023'),
(76, 'TLE-ESF', '26', 2, 2, 50, 1, '2022/2023'),
(77, 'TLE-CMA-MVT', '27', 3, 2, 50, 1, '2022/2023'),
(78, 'TLE-MEM', '28', 3, 2, 50, 1, '2022/2023'),
(79, 'TLE-MEH', '43', 3, 2, 50, 1, '2022/2023'),
(80, 'TLE-GT-TO', '44', 3, 2, 50, 1, '2022/2023'),
(81, 'TLE-MA', '45', 3, 2, 50, 1, '2022/2023'),
(82, 'TLE-SES', '46', 2, 2, 50, 1, '2022/2023'),
(83, 'TLE-MISE', '56', 3, 2, 50, 1, '2022/2023'),
(84, 'TLE-MEB', '57', 3, 2, 50, 1, '2022/2023'),
(85, 'TLE-TI', '60', 3, 2, 50, 1, '2022/2023'),
(86, 'TLE-IS-RH', '58', 3, 2, 50, 1, '2022/2023'),
(111, '6EME-1', '1', 1, 1, 50, 0, '2021/2022'),
(112, '6EME-1', '1', 1, 1, 50, 0, '2020/2021'),
(113, '6EME-2', '1', 1, 1, 50, 0, '2021/2022'),
(114, '6EME-2', '1', 1, 1, 50, 0, '2020/2021'),
(115, '6EME-3', '1', 1, 1, 50, 0, '2021/2022'),
(116, '6EME-3', '1', 1, 1, 50, 0, '2020/2021'),
(117, '5EME-1', '1', 1, 1, 50, 0, '2021/2022'),
(118, '5EME-1', '1', 1, 1, 50, 0, '2020/2021'),
(119, '5EME-2', '1', 1, 1, 50, 0, '2021/2022'),
(120, '5EME-2', '1', 1, 1, 50, 0, '2020/2021'),
(121, '5EME-3', '1', 1, 1, 50, 0, '2021/2022'),
(122, '5EME-3', '1', 1, 1, 50, 0, '2020/2021'),
(123, '4ALL-1', '2', 1, 1, 50, 0, '2021/2022'),
(124, '4ALL-1', '2', 1, 1, 50, 0, '2020/2021'),
(125, '4ESP-1', '3', 1, 1, 50, 0, '2021/2022'),
(126, '4ESP-1', '3', 1, 1, 50, 0, '2020/2021'),
(127, '4ESP-2', '3', 1, 1, 50, 0, '2021/2022'),
(128, '4ESP-2', '3', 1, 1, 50, 0, '2020/2021'),
(129, '4ESP-3', '3', 1, 1, 50, 0, '2021/2022'),
(130, '4ESP-3', '3', 1, 1, 50, 0, '2020/2021'),
(131, '3ALL-1', '4', 1, 1, 50, 0, '2021/2022'),
(132, '3ALL-1', '4', 1, 1, 50, 0, '2020/2021'),
(133, '3ESP-1', '5', 1, 1, 50, 0, '2021/2022'),
(134, '3ESP-1', '5', 1, 1, 50, 0, '2020/2021'),
(135, '3ESP-2', '5', 1, 1, 50, 0, '2021/2022'),
(136, '3ESP-2', '5', 1, 1, 50, 0, '2020/2021'),
(137, '3ESP-3', '5', 1, 1, 50, 0, '2021/2022'),
(138, '3ESP-3', '5', 1, 1, 50, 0, '2020/2021'),
(139, '2NDE-A4-ALL', '6', 1, 2, 50, 0, '2021/2022'),
(140, '2NDE-A4-ALL', '6', 1, 2, 50, 0, '2020/2021'),
(141, '2NDE-A4-ESP', '7', 1, 2, 50, 0, '2021/2022'),
(142, '2NDE-A4-ESP', '7', 1, 2, 50, 0, '2020/2021'),
(147, '2NDE-C1', '8', 1, 2, 50, 0, '2021/2022'),
(148, '2NDE-C1', '8', 1, 2, 50, 0, '2020/2021'),
(149, '2NDE-C2', '8', 1, 2, 50, 0, '2021/2022'),
(150, '2NDE-C2', '8', 1, 2, 50, 0, '2020/2021'),
(151, '1ERE-A4-ALL', '10', 1, 2, 50, 0, '2021/2022'),
(152, '1ERE-A4-ALL', '10', 1, 2, 50, 0, '2020/2021'),
(153, '1ERE-A4-ESP', '11', 1, 2, 50, 0, '2021/2022'),
(154, '1ERE-A4-ESP', '11', 1, 2, 50, 0, '2020/2021'),
(155, '1ERE-C', '8', 1, 2, 50, 0, '2021/2022'),
(156, '1ERE-C', '8', 1, 2, 50, 0, '2020/2021'),
(157, '1ERE-D1', '8', 1, 2, 50, 0, '2021/2022'),
(158, '1ERE-D1', '8', 1, 2, 50, 0, '2020/2021'),
(159, '1ERE-D2', '8', 1, 2, 50, 0, '2021/2022'),
(160, '1ERE-D2', '8', 1, 2, 50, 0, '2020/2021'),
(161, '1ERE-D3', '8', 1, 2, 50, 0, '2021/2022'),
(162, '1ERE-D3', '8', 1, 2, 50, 0, '2020/2021'),
(165, 'TLE-A4-ALL', '12', 1, 2, 50, 0, '2021/2022'),
(166, 'TLE-A4-ALL', '12', 1, 2, 50, 0, '2020/2021'),
(167, 'TLE-A4-ESP', '13', 1, 2, 50, 0, '2021/2022'),
(168, 'TLE-A4-ESP', '13', 1, 2, 50, 0, '2020/2021'),
(169, 'TLE-C', '9', 1, 2, 50, 0, '2021/2022'),
(170, 'TLE-C', '9', 1, 2, 50, 0, '2020/2021'),
(171, 'TLE-D1', '9', 1, 2, 50, 0, '2021/2022'),
(172, 'TLE-D1', '9', 1, 2, 50, 0, '2020/2021'),
(173, 'TLE-D2', '9', 1, 2, 50, 0, '2021/2022'),
(174, 'TLE-D2', '9', 1, 2, 50, 0, '2020/2021');

-- --------------------------------------------------------

--
-- Structure de la table `cordon`
--

CREATE TABLE IF NOT EXISTS `cordon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `stat` varchar(3) NOT NULL,
  `anens` varchar(11) NOT NULL,
  `idcl` int(11) NOT NULL,
  `tant` int(10) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `cordon`
--


-- --------------------------------------------------------

--
-- Structure de la table `delai`
--

CREATE TABLE IF NOT EXISTS `delai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etab` int(11) NOT NULL,
  `an` varchar(15) NOT NULL,
  `eval` varchar(15) NOT NULL,
  `verrou` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `delai`
--


-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(15) NOT NULL,
  `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
  `frais` varchar(20) CHARACTER SET utf8 NOT NULL,
  `remise` varchar(5) CHARACTER SET utf8 NOT NULL,
  `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
  `idempl` int(11) NOT NULL,
  `typerem` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `detail`
--


-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE IF NOT EXISTS `devise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) NOT NULL,
  `prio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `devise`
--

INSERT INTO `devise` (`id`, `nom`, `prio`) VALUES
(1, 'FCFA', 1);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
  `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(5) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
  `intext` int(11) NOT NULL,
  `telev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cout` varchar(30) CHARACTER SET utf8 NOT NULL,
  `total` varchar(30) CHARACTER SET utf8 NOT NULL,
  `reste` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abs1` int(11) NOT NULL,
  `date1` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abs2` int(11) NOT NULL,
  `date2` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abs3` int(11) NOT NULL,
  `date3` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `eleve`
--


-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE IF NOT EXISTS `emploi` (
  `ide` int(11) NOT NULL AUTO_INCREMENT,
  `idh` int(11) NOT NULL,
  `matier` varchar(30) CHARACTER SET utf8 NOT NULL,
  `class` varchar(30) CHARACTER SET utf8 NOT NULL,
  `an` varchar(15) CHARACTER SET utf8 NOT NULL,
  `idjour` int(11) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `cni` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ide`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `emploi`
--


-- --------------------------------------------------------

--
-- Structure de la table `enseigmatclasse`
--

CREATE TABLE IF NOT EXISTS `enseigmatclasse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idmat` int(11) NOT NULL,
  `idcl` int(11) NOT NULL,
  `idens` int(11) NOT NULL,
  `anens` varchar(11) NOT NULL,
  `titulaire` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `enseigmatclasse`
--

INSERT INTO `enseigmatclasse` (`id`, `idmat`, `idcl`, `idens`, `anens`, `titulaire`, `sup`) VALUES
(1, 37, 58, 1, '2024/2025', 1, 0),
(2, 37, 64, 2, '2024/2025', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `prenomens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `telens` varchar(15) CHARACTER SET utf8 NOT NULL,
  `mtpasse` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
  `anens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cni` varchar(50) NOT NULL,
  `temps` int(20) NOT NULL,
  `supp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `enseignant`
--


-- --------------------------------------------------------

--
-- Structure de la table `enseignant3`
--

CREATE TABLE IF NOT EXISTS `enseignant3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `prenomens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `telens` varchar(15) CHARACTER SET utf8 NOT NULL,
  `discipline` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mtpasse` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nivens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
  `anens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cni` varchar(50) NOT NULL,
  `temps` int(20) NOT NULL,
  `titulaire` int(11) NOT NULL,
  `salaire` int(11) NOT NULL,
  `taux` int(11) NOT NULL,
  `supp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `enseignant3`
--


-- --------------------------------------------------------

--
-- Structure de la table `enseignantanc`
--

CREATE TABLE IF NOT EXISTS `enseignantanc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `prenomens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `telens` varchar(15) CHARACTER SET utf8 NOT NULL,
  `discipline` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mtpasse` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nivens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
  `anens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datens` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cni` varchar(50) NOT NULL,
  `temps` int(20) NOT NULL,
  `titulaire` int(11) NOT NULL,
  `salaire` int(11) NOT NULL,
  `taux` int(11) NOT NULL,
  `supp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `enseignantanc`
--


-- --------------------------------------------------------

--
-- Structure de la table `enseignantsuppl`
--

CREATE TABLE IF NOT EXISTS `enseignantsuppl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idens` int(11) NOT NULL,
  `annedeb` varchar(8) NOT NULL,
  `formation` int(11) NOT NULL,
  `diplome` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL,
  `nbenfant` int(11) NOT NULL,
  `activite` varchar(80) NOT NULL,
  `impot` int(11) NOT NULL,
  `cotisation` int(11) NOT NULL,
  `prime` int(11) NOT NULL,
  `reduction` decimal(10,2) NOT NULL,
  `avtgtel` int(11) NOT NULL,
  `logement` int(11) NOT NULL,
  `repas` int(11) NOT NULL,
  `anens` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `enseignantsuppl`
--


-- --------------------------------------------------------

--
-- Structure de la table `enseigsalaire`
--

CREATE TABLE IF NOT EXISTS `enseigsalaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idens` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `idmonnaie` int(11) NOT NULL,
  `anens` varchar(11) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `enseigsalaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `evaltrim`
--

CREATE TABLE IF NOT EXISTS `evaltrim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcl` int(11) NOT NULL,
  `codetrim` int(11) NOT NULL,
  `nbre` int(11) NOT NULL,
  `anens` varchar(10) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `evaltrim`
--


-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`id`, `code`, `nom`, `sup`) VALUES
(1, 1, 'EVAL 1', 0),
(2, 2, 'EVAL 2', 0),
(3, 3, 'EVAL 3', 0),
(4, 4, 'EVAL 4', 0),
(5, 5, 'EVAL 5', 0),
(6, 6, 'EVAL 6', 0),
(7, 7, 'EVAL 7', 0),
(8, 8, 'EVAL 8', 0),
(9, 9, 'EVAL 9', 0);

-- --------------------------------------------------------

--
-- Structure de la table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` int(11) NOT NULL,
  `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(5) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `telev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
  `idempl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `exam`
--


-- --------------------------------------------------------

--
-- Structure de la table `fact`
--

CREATE TABLE IF NOT EXISTS `fact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `an` varchar(10) NOT NULL,
  `id_etab` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `fact`
--


-- --------------------------------------------------------

--
-- Structure de la table `groupetype`
--

CREATE TABLE IF NOT EXISTS `groupetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `nom` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `groupetype`
--

INSERT INTO `groupetype` (`id`, `code`, `nom`) VALUES
(1, '1', 'Francophone'),
(2, '2', 'Anglophone'),
(3, '3', 'Bilingue'),
(5, '12', 'Francophone+Anglophone'),
(6, '13', 'Francophone+Bilingue'),
(8, '23', 'Anglophone+Bilingue'),
(11, '123', 'Francophone+Anglophone+Bilingue');

-- --------------------------------------------------------

--
-- Structure de la table `groupmatensg`
--

CREATE TABLE IF NOT EXISTS `groupmatensg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `groupmatensg`
--

INSERT INTO `groupmatensg` (`id`, `nom`) VALUES
(1, 'FRANCAIS'),
(2, 'ENGLISH LANGUAGE'),
(3, 'MATHEMATIQUES'),
(4, 'SCIENCES ET TECHNOLOGIES'),
(5, 'TIC'),
(6, 'SCIENCES HUMAINES ET SOCIALES'),
(7, 'LANGUES ET CULTURES NATIONALES'),
(8, 'EDUCATION ARTISTIQUE'),
(9, 'EDUCATION PHYSIQUE, SPORTIVE ET A LA SANTE'),
(10, 'DEVELOPPEMENT PERSONNEL'),
(12, 'MATHEMATICS'),
(13, 'ENGLISH LANGUAGE'),
(14, 'SOCIAL STUDIES'),
(15, 'FRENCH LANGUAGE'),
(16, 'SCIENCES'),
(17, 'TECHNOLOGY'),
(18, 'NATIONAL CULTURE AND LANGUAGE'),
(19, 'ICT'),
(20, 'ARTISTIC EDUCATION'),
(21, 'VOCATION EDUCATION'),
(22, 'PHYSICAL EDUCATION AND SPORT'),
(23, 'LANGUE ET COMMUNICATION'),
(24, 'EVEIL SCIENTIFIQUE ET TECHNOLOGIQUE'),
(25, 'VIE COURANTE'),
(26, 'MOTRICITE'),
(27, 'CREATION ARTISTIQUE ET ACTIVITE MANUELLE'),
(28, 'ALL');

-- --------------------------------------------------------

--
-- Structure de la table `groupmatensg1`
--

CREATE TABLE IF NOT EXISTS `groupmatensg1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `typeEns` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `groupmatensg1`
--

INSERT INTO `groupmatensg1` (`id`, `code`, `typeEns`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(11, 10, 1),
(13, 12, 2),
(14, 13, 2),
(15, 14, 2),
(16, 15, 2),
(17, 16, 2),
(18, 17, 2),
(19, 18, 2),
(20, 19, 2),
(21, 20, 2),
(22, 21, 2),
(23, 22, 2),
(24, 23, 1),
(25, 24, 1),
(26, 25, 1),
(27, 26, 1),
(28, 27, 1),
(29, 28, 2);

-- --------------------------------------------------------

--
-- Structure de la table `honneur`
--

CREATE TABLE IF NOT EXISTS `honneur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etab` int(11) NOT NULL,
  `record` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `honneur`
--

INSERT INTO `honneur` (`id`, `id_etab`, `record`) VALUES
(1, 0, 'shadaye');

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE IF NOT EXISTS `jour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `jour`
--

INSERT INTO `jour` (`id`, `nom`) VALUES
(1, 'LUNDI'),
(2, 'MARDI'),
(3, 'MERCREDI'),
(4, 'JEUDI'),
(5, 'VENDREDI'),
(6, 'SAMEDI');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE IF NOT EXISTS `lien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(100) NOT NULL,
  `serveur` varchar(30) NOT NULL,
  `basedonnees` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `mtp` varchar(50) NOT NULL,
  `ici` int(11) NOT NULL,
  `actif` int(11) NOT NULL,
  `initial` varchar(20) NOT NULL,
  `idetabl` int(11) NOT NULL,
  `idetablier` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`id`, `lien`, `serveur`, `basedonnees`, `user`, `mtp`, `ici`, `actif`, `initial`, `idetabl`, `idetablier`) VALUES
(1, 'http://localhost/adnew2new', 'localhost', 'bdshadaye', 'root', '', 0, 0, 'LOG', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `liensms`
--

CREATE TABLE IF NOT EXISTS `liensms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `mtp` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `actif` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `liensms`
--

INSERT INTO `liensms` (`id`, `user`, `mtp`, `url`, `actif`) VALUES
(1, 'hermannfotso0@gmail.com', 'nexah2022', 'https://smsvas.com/bulk/public/index.php/api/v1/sendsms                                             ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `matclasse`
--

CREATE TABLE IF NOT EXISTS `matclasse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idmat` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `idgp` int(11) NOT NULL,
  `anens` varchar(10) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `matclasse`
--


-- --------------------------------------------------------

--
-- Structure de la table `matgroup`
--

CREATE TABLE IF NOT EXISTS `matgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idmat` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `anens` varchar(11) NOT NULL,
  `typeEns` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `matgroup`
--


-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codemat` varchar(75) CHARACTER SET utf8 NOT NULL,
  `code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `typeEns` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  `anc` int(11) NOT NULL,
  `anens` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id`, `codemat`, `code`, `typeEns`, `sup`, `anc`, `anens`) VALUES
(1, '--', '', 123, 0, 0, '2022/2023'),
(2, 'Lecture', ' ', 1, 0, 0, '2022/2023'),
(3, 'Expression orale', ' ', 1, 0, 0, '2022/2023'),
(4, 'Production écrite', ' ', 1, 0, 0, '2022/2023'),
(5, 'Grammmaire', ' ', 12, 0, 0, '2022/2023'),
(6, 'Vocabulaire', ' ', 1, 0, 0, '2022/2023'),
(7, 'Orthographe', ' ', 1, 0, 0, '2022/2023'),
(8, 'Conjugaison', ' ', 1, 0, 0, '2022/2023'),
(9, 'Littérature', ' ', 1, 0, 0, '2022/2023'),
(10, 'Reading', ' ', 2, 0, 0, '2022/2023'),
(11, 'Handwriting', ' ', 2, 0, 0, '2022/2023'),
(12, 'Speaking-listening', ' ', 1, 0, 0, '2022/2023'),
(13, 'Calcul rapide', ' ', 1, 0, 0, '2022/2023'),
(14, 'Problèmes', ' ', 1, 0, 0, '2022/2023'),
(15, 'Exercices de mathématiques', ' ', 1, 0, 0, '2022/2023'),
(17, 'Sciences de la vie', ' ', 1, 1, 0, '2022/2023'),
(18, 'Sciences physiques et chimiques', ' ', 1, 1, 0, '2022/2023'),
(20, 'Sciences et technologie', ' ', 1, 0, 0, '2022/2023'),
(22, 'Sciences de la terre', ' ', 1, 0, 0, '2022/2023'),
(23, 'TIC', ' ', 1, 0, 0, '2022/2023'),
(24, 'Histoire,geographie,civisme et morale ', ' ', 1, 0, 0, '2022/2023'),
(27, 'Langues nationales', ' ', 1, 0, 0, '2022/2023'),
(28, 'Cultures nationales', ' ', 1, 0, 0, '2022/2023'),
(29, 'Arts visuels', ' ', 1, 0, 0, '2022/2023'),
(30, 'Musique', ' ', 1, 0, 0, '2022/2023'),
(31, 'Arts dramatiques', ' ', 1, 0, 0, '2022/2023'),
(32, 'Danse', ' ', 1, 0, 0, '2022/2023'),
(33, 'Education physique et sportive', ' ', 1, 0, 0, '2022/2023'),
(34, 'Education à la santé', ' ', 1, 0, 0, '2022/2023'),
(36, 'Artisanat et constructions artistiques', ' ', 1, 0, 0, '2022/2023'),
(37, 'Activités agropastorales', ' ', 1, 0, 0, '2022/2023'),
(38, 'Activités domestiques et familiales', ' ', 1, 0, 0, '2022/2023'),
(39, 'Mathematics 1', ' ', 2, 0, 0, '2022/2023'),
(40, 'Mathematics 2', ' ', 2, 0, 0, '2022/2023'),
(41, 'English 1', ' ', 2, 0, 0, '2022/2023'),
(42, 'English 2', ' ', 2, 0, 0, '2022/2023'),
(43, 'Spelling-Dictation', ' ', 2, 0, 0, '2022/2023'),
(44, 'Orals', ' ', 2, 0, 0, '2022/2023'),
(45, 'History', ' ', 2, 0, 0, '2022/2023'),
(46, 'Geography', ' ', 2, 0, 0, '2022/2023'),
(47, 'Civics', ' ', 2, 0, 0, '2022/2023'),
(48, 'Human rights', ' ', 2, 0, 0, '2022/2023'),
(49, 'Moral education', ' ', 2, 0, 0, '2022/2023'),
(50, 'Lecture', ' ', 2, 0, 0, '2022/2023'),
(51, 'Dictée', ' ', 2, 0, 0, '2022/2023'),
(52, 'Comprehension de texte', ' ', 2, 0, 0, '2022/2023'),
(53, 'Health education', ' ', 2, 0, 0, '2022/2023'),
(54, 'Environnemental education', ' ', 2, 0, 0, '2022/2023'),
(55, 'Technology-Engeneering', ' ', 2, 0, 0, '2022/2023'),
(56, 'National culture', ' ', 2, 0, 0, '2022/2023'),
(57, 'National language', ' ', 2, 0, 0, '2022/2023'),
(58, 'ICT', ' ', 2, 0, 0, '2022/2023'),
(59, 'Visual arts', ' ', 2, 0, 0, '2022/2023'),
(60, 'Literary Arts', ' ', 2, 0, 0, '2022/2023'),
(61, 'Performing Arts', ' ', 2, 0, 0, '2022/2023'),
(62, 'Home economics', ' ', 2, 0, 0, '2022/2023'),
(63, 'Art and crafts', ' ', 2, 0, 0, '2022/2023'),
(64, 'Agropastoral activities', ' ', 2, 0, 0, '2022/2023'),
(65, 'Sport', ' ', 2, 0, 0, '2022/2023'),
(66, 'Grammar', ' ', 1, 0, 0, '2022/2023'),
(67, 'Vocabulary', ' ', 1, 0, 0, '2022/2023'),
(68, 'Dictation', ' ', 1, 0, 0, '2022/2023'),
(69, 'savoir-etre', ' ', 1, 1, 0, '2022/2023'),
(70, 'Physical education and sports', ' ', 2, 0, 0, '2022/2023'),
(71, 'French language', ' ', 2, 0, 0, '2022/2023'),
(72, 'Savoir-Etre ', ' ', 1, 1, 0, '2022/2023'),
(73, 'EXPRESSION ORALE', ' ', 1, 0, 0, '2022/2023'),
(74, 'EXPRESSION ECRITE', ' ', 1, 0, 0, '2022/2023'),
(75, 'EXPRESSION GESTUELLE', ' ', 1, 0, 0, '2022/2023'),
(76, 'GRAPHISME', ' ', 1, 0, 0, '2022/2023'),
(77, 'EDUCATION SENSORIELLE ET PERCEPTIVE', ' ', 1, 0, 0, '2022/2023'),
(78, 'INITIAITION AUX MATHEMATIQUES', ' ', 1, 0, 0, '2022/2023'),
(79, 'SCIENCES ET TECHNOLOGIES', ' ', 1, 0, 0, '2022/2023'),
(80, 'ACTIVITES AGROPASTORALES', ' ', 1, 0, 0, '2022/2023'),
(81, 'EDUCATION CIVIQUE ET MORALE', ' ', 1, 0, 0, '2022/2023'),
(82, 'EDUCATION A LA SECURITE', ' ', 1, 0, 0, '2022/2023'),
(83, 'EDUCATION A L''ENVIRONNEMENT', ' ', 1, 0, 0, '2022/2023'),
(84, 'EDUCATION A LA SANTE ET A LA NUTRITION', ' ', 1, 0, 0, '2022/2023'),
(85, 'JEUX COLLECTIFS', ' ', 1, 0, 0, '2022/2023'),
(86, 'CREATION ARTISTIQUE', ' ', 1, 0, 0, '2022/2023'),
(87, 'ACTIVITE MANUELLE', ' ', 1, 0, 0, '2022/2023'),
(88, 'PRE-LETTER FORMATION', ' ', 2, 0, 0, '2022/2023'),
(89, 'SOUND AND WORD BUILDING', ' ', 2, 0, 0, '2022/2023'),
(90, 'INITIATION TO MATHEMATICS', ' ', 2, 0, 0, '2022/2023'),
(91, 'COLOURING', ' ', 2, 0, 0, '2022/2023'),
(92, 'DRAWING', ' ', 2, 0, 0, '2022/2023'),
(93, 'PRACTICAL LIFE ACTIVITY', ' ', 2, 0, 0, '2022/2023'),
(94, 'MOTO ACTIVITIES', ' ', 2, 0, 0, '2022/2023'),
(95, 'I.C.T', ' ', 2, 0, 0, '2022/2023'),
(96, 'SPELLINGS', ' ', 2, 0, 0, '2022/2023'),
(97, 'READING', ' ', 2, 0, 0, '2022/2023'),
(98, 'SENSORY AND PERCEPTIVE EDUCATION', ' ', 2, 0, 0, '2022/2023'),
(99, 'RHYMES', ' ', 2, 0, 0, '2022/2023'),
(100, 'ORAL EXPRESSION', ' ', 2, 0, 0, '2022/2023'),
(101, 'EXPRESSION BY GESTURE', ' ', 2, 0, 0, '2022/2023'),
(102, 'PAINTING', ' ', 2, 0, 0, '2022/2023'),
(103, 'MUSIC AND STORY TRAINING', ' ', 2, 0, 0, '2022/2023'),
(104, 'ART AND CRAFT', ' ', 2, 0, 0, '2022/2023');

-- --------------------------------------------------------

--
-- Structure de la table `moyenne`
--

CREATE TABLE IF NOT EXISTS `moyenne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `anens` varchar(15) NOT NULL,
  `moytrim` decimal(10,2) NOT NULL,
  `rgtrim` varchar(4) NOT NULL,
  `codetrim` int(11) NOT NULL,
  `moyeval` decimal(10,2) NOT NULL,
  `rgeval` varchar(4) NOT NULL,
  `codeval` int(11) NOT NULL,
  `moyan` decimal(10,2) NOT NULL,
  `rgan` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `moyenne`
--


-- --------------------------------------------------------

--
-- Structure de la table `moyenneannuel`
--

CREATE TABLE IF NOT EXISTS `moyenneannuel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `anens` varchar(15) NOT NULL,
  `moyan` decimal(10,2) NOT NULL,
  `rgan` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `moyenneannuel`
--


-- --------------------------------------------------------

--
-- Structure de la table `moyennetrim`
--

CREATE TABLE IF NOT EXISTS `moyennetrim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `anens` varchar(15) NOT NULL,
  `moytrim` decimal(10,2) NOT NULL,
  `rgtrim` varchar(4) NOT NULL,
  `codetrim` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `moyennetrim`
--


-- --------------------------------------------------------

--
-- Structure de la table `moymatieretrim`
--

CREATE TABLE IF NOT EXISTS `moymatieretrim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcl` int(11) NOT NULL,
  `matiere` int(10) NOT NULL,
  `trimestre` int(10) NOT NULL,
  `compose` varchar(5) NOT NULL,
  `moy` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `moymatieretrim`
--


-- --------------------------------------------------------

--
-- Structure de la table `moymatiereval`
--

CREATE TABLE IF NOT EXISTS `moymatiereval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcl` int(11) NOT NULL,
  `matiere` int(10) NOT NULL,
  `eval` int(10) NOT NULL,
  `trimestre` int(10) NOT NULL,
  `compose` varchar(15) NOT NULL,
  `moy` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `moymatiereval`
--


-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `note` decimal(10,2) NOT NULL,
  `matiere` int(11) NOT NULL,
  `coef` int(11) NOT NULL,
  `nc` decimal(10,2) NOT NULL,
  `typeval` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `rgeval` varchar(4) NOT NULL,
  `anens` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `note`
--


-- --------------------------------------------------------

--
-- Structure de la table `notegroupeval`
--

CREATE TABLE IF NOT EXISTS `notegroupeval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `anens` varchar(15) NOT NULL,
  `notegroup` decimal(10,2) NOT NULL,
  `coef` varchar(4) NOT NULL,
  `nc` decimal(10,2) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `eval` int(11) NOT NULL,
  `rg` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `notegroupeval`
--


-- --------------------------------------------------------

--
-- Structure de la table `notegrouptrim`
--

CREATE TABLE IF NOT EXISTS `notegrouptrim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `anens` varchar(15) NOT NULL,
  `notegroup` decimal(10,2) NOT NULL,
  `coef` varchar(4) NOT NULL,
  `nc` decimal(10,2) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `rg` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `notegrouptrim`
--


-- --------------------------------------------------------

--
-- Structure de la table `notetrimestre`
--

CREATE TABLE IF NOT EXISTS `notetrimestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(30) NOT NULL,
  `idcl` int(11) NOT NULL,
  `note` decimal(10,2) NOT NULL,
  `matiere` int(11) NOT NULL,
  `coef` int(11) NOT NULL,
  `nc` decimal(10,2) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `rgtrim` varchar(4) NOT NULL,
  `anens` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `notetrimestre`
--


-- --------------------------------------------------------

--
-- Structure de la table `pamedical`
--

CREATE TABLE IF NOT EXISTS `pamedical` (
  `idmed` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(20) NOT NULL,
  `datevac` varchar(15) NOT NULL,
  `allergie` varchar(80) NOT NULL,
  `autre` varchar(80) NOT NULL,
  `numass` varchar(50) NOT NULL,
  `anelev` varchar(15) NOT NULL,
  PRIMARY KEY (`idmed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `pamedical`
--


-- --------------------------------------------------------

--
-- Structure de la table `paperiscol`
--

CREATE TABLE IF NOT EXISTS `paperiscol` (
  `idperiscol` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(30) NOT NULL,
  `activite` int(11) NOT NULL,
  `heurar` varchar(15) NOT NULL,
  `heuredep` varchar(15) NOT NULL,
  `badge` int(11) NOT NULL,
  `autori` int(11) NOT NULL,
  `sinon` int(11) NOT NULL,
  `heuresort` varchar(15) NOT NULL,
  `anelev` varchar(15) NOT NULL,
  PRIMARY KEY (`idperiscol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `paperiscol`
--


-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `idparent` int(11) NOT NULL AUTO_INCREMENT,
  `nomparent` varchar(80) NOT NULL,
  `cniparent` varchar(50) NOT NULL,
  `lienparent` int(11) NOT NULL,
  `numeroparent` varchar(30) NOT NULL,
  `professionparent` varchar(80) NOT NULL,
  `mailparent` varchar(80) NOT NULL,
  `ordreparent` int(11) NOT NULL,
  PRIMARY KEY (`idparent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `parent`
--


-- --------------------------------------------------------

--
-- Structure de la table `parenteleve`
--

CREATE TABLE IF NOT EXISTS `parenteleve` (
  `idpaele` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(20) CHARACTER SET utf8 NOT NULL,
  `idparent` int(11) NOT NULL,
  `anelev` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idpaele`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `parenteleve`
--


-- --------------------------------------------------------

--
-- Structure de la table `paurgence`
--

CREATE TABLE IF NOT EXISTS `paurgence` (
  `idurg` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(20) NOT NULL,
  `ordseparent` int(11) NOT NULL,
  `nomurg` varchar(80) NOT NULL,
  `telurg` varchar(30) NOT NULL,
  `cniurg` varchar(50) NOT NULL,
  `lienurg` varchar(30) NOT NULL,
  `anelev` varchar(15) NOT NULL,
  PRIMARY KEY (`idurg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `paurgence`
--


-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE IF NOT EXISTS `periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `duree` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `periode`
--

INSERT INTO `periode` (`id`, `nom`, `duree`) VALUES
(1, '7H30-8H25', '1'),
(2, '8H25-9H20', '1'),
(3, '9H20-10H15', '1'),
(4, '10H15-10H30', '0.25'),
(5, '10H30-11H25', '1'),
(6, '11H25-12H20', '1'),
(7, '12H20-13H15', '1'),
(8, '13H15-13H45', '0.5'),
(9, '13H45-14H40', '1'),
(10, '14H40-15H35', '1'),
(11, '15H35-16H30', '1'),
(12, '16H30-17H25', '1'),
(13, '6H45-7H30', '0.75'),
(14, '8H00-9H00', '1'),
(15, '9H00-10H00', '1'),
(16, '10H30-11H30', '1'),
(17, '11H30-12H30', '1');

-- --------------------------------------------------------

--
-- Structure de la table `periodesal`
--

CREATE TABLE IF NOT EXISTS `periodesal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `periodesal`
--

INSERT INTO `periodesal` (`id`, `nom`) VALUES
(1, '01 Septembre au 05 Octobre'),
(2, '06 Octobre au 05 Novembre'),
(3, '06 Novembre au 05 D�cembre'),
(4, '06 D�cembre au 05 Janvier'),
(5, '06 Janvier au 05 F�vrier'),
(6, '06 F�vrier au 05 Mars'),
(7, '06 Mars au 05 Avril'),
(8, '06 Avril au 05 Mai'),
(9, '06 Mai au 05 Juin'),
(10, '06 Juin au 05 Juillet');

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE IF NOT EXISTS `pointage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idens` int(11) NOT NULL,
  `idpe` int(5) NOT NULL,
  `heurp` int(10) NOT NULL,
  `datep` varchar(15) NOT NULL,
  `heurenreg` varchar(12) NOT NULL,
  `idempl` int(11) NOT NULL,
  `idemplmodif` int(11) NOT NULL,
  `datemodif` varchar(15) NOT NULL,
  `an` varchar(15) NOT NULL,
  `taux` int(11) NOT NULL,
  `fixe` int(11) NOT NULL,
  `nomens` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `pointage`
--


-- --------------------------------------------------------

--
-- Structure de la table `pourcentagematieretrim`
--

CREATE TABLE IF NOT EXISTS `pourcentagematieretrim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcl` int(11) NOT NULL,
  `matiere` int(10) NOT NULL,
  `trimestre` int(10) NOT NULL,
  `compose` varchar(5) NOT NULL,
  `pct` decimal(10,2) NOT NULL,
  `anens` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `pourcentagematieretrim`
--


-- --------------------------------------------------------

--
-- Structure de la table `pourcentagematiereval`
--

CREATE TABLE IF NOT EXISTS `pourcentagematiereval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcl` int(11) NOT NULL,
  `matiere` int(10) NOT NULL,
  `eval` int(10) NOT NULL,
  `trimestre` int(10) NOT NULL,
  `compose` varchar(15) NOT NULL,
  `pct` decimal(10,2) NOT NULL,
  `anens` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `pourcentagematiereval`
--


-- --------------------------------------------------------

--
-- Structure de la table `proof`
--

CREATE TABLE IF NOT EXISTS `proof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(50) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(15) CHARACTER SET utf8 NOT NULL,
  `ancien` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nouveau` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `proof`
--


-- --------------------------------------------------------

--
-- Structure de la table `proofdetail`
--

CREATE TABLE IF NOT EXISTS `proofdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpaiem` int(255) NOT NULL,
  `matelev` varchar(50) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(15) CHARACTER SET utf8 NOT NULL,
  `ancien` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nouveau` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `proofdetail`
--


-- --------------------------------------------------------

--
-- Structure de la table `proofmodifdetail`
--

CREATE TABLE IF NOT EXISTS `proofmodifdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpaiem` int(255) NOT NULL,
  `matelev` varchar(50) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(15) CHARACTER SET utf8 NOT NULL,
  `ancien` varchar(500) CHARACTER SET utf8 NOT NULL,
  `nouveau` varchar(500) CHARACTER SET utf8 NOT NULL,
  `date` varchar(15) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(15) CHARACTER SET utf8 NOT NULL,
  `idresp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `proofmodifdetail`
--


-- --------------------------------------------------------

--
-- Structure de la table `prorogation`
--

CREATE TABLE IF NOT EXISTS `prorogation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `prorogation`
--
 
-- --------------------------------------------------------

--
-- Structure de la table `remise`
--

CREATE TABLE IF NOT EXISTS `remise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `remise`
--


-- --------------------------------------------------------

--
-- Structure de la table `repetitionadmini`
--

CREATE TABLE IF NOT EXISTS `repetitionadmini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
  `mtpasse` varchar(15) CHARACTER SET utf8 NOT NULL,
  `user` varchar(30) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(10) CHARACTER SET utf8 NOT NULL,
  `numtel` varchar(15) CHARACTER SET utf8 NOT NULL,
  `anens` varchar(15) CHARACTER SET utf8 NOT NULL,
  `verrou` int(11) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  `salaire` int(11) NOT NULL,
  `cni` varchar(40) CHARACTER SET utf8 NOT NULL,
  `intrus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `repetitionadmini`
--

INSERT INTO `repetitionadmini` (`id`, `code`, `nom`, `mtpasse`, `user`, `genre`, `numtel`, `anens`, `verrou`, `id_etab`, `sup`, `salaire`, `cni`, `intrus`) VALUES
(26, 4, 'KAMDEM', 'kam', 'kam', 'M', '', '2022/2023', 0, 0, 0, 0, ' HJHJK', 0),
(27, 2, 'KAMMOGNE TAMDJO ALEXIS BOREL', 'als', 'als', 'M', '655824423', '2022/2023', 0, 0, 0, 120000, '1234', 0);

-- --------------------------------------------------------

--
-- Structure de la table `repetitionclasse`
--

CREATE TABLE IF NOT EXISTS `repetitionclasse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `repetitionclasse`
--

INSERT INTO `repetitionclasse` (`id`, `libelle`, `sup`) VALUES
(1, '6EME', 0),
(2, '5EME', 0),
(3, '4EME', 0),
(4, '3EME', 0),
(5, '2NDE', 0),
(6, '1ERE', 0),
(7, 'TLE', 0);

-- --------------------------------------------------------

--
-- Structure de la table `repetitionmsg`
--

CREATE TABLE IF NOT EXISTS `repetitionmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclas` int(11) NOT NULL,
  `tel` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ville` int(11) NOT NULL,
  `quartier` varchar(40) CHARACTER SET utf8 NOT NULL,
  `lieu` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` varchar(12) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(12) CHARACTER SET utf8 NOT NULL,
  `marque` varchar(40) CHARACTER SET utf8 NOT NULL,
  `localisation` varchar(40) CHARACTER SET utf8 NOT NULL,
  `vue` int(11) NOT NULL,
  `contacter` int(11) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `repetitionmsg`
--

INSERT INTO `repetitionmsg` (`id`, `idclas`, `tel`, `ville`, `quartier`, `lieu`, `date`, `heure`, `marque`, `localisation`, `vue`, `contacter`, `sup`) VALUES
(1, 4, '655824423', 1, 'VILLAGE 1ERE ENTREE BORNE 10 ', 'FOYER BAMEKA', '2022-09-06', '18:34', ' ', ' ', 0, 0, 0),
(2, 4, '655824423', 1, 'VILLAGE 1ERE ENTREE BORNE 10 ', 'FOYER BAMEKA', '2022-09-06', '19:10', ' ', ' ', 0, 0, 0),
(3, 4, '655824423', 1, 'VILLAGE 1ERE ENTREE BORNE 10 ', 'FOYER BAMEKA', '2022-09-06', '19:11', ' ', ' ', 0, 0, 0),
(4, 4, '655824423', 1, 'VILLAGE 1ERE ENTREE BORNE 10 ', 'FOYER BAMEKA', '2022-09-06', '19:11', ' ', ' ', 0, 0, 0),
(5, 6, '654407772', 1, 'boko village', '1ere entrée borne 10 foyer bameka', '2022-09-08', '19:34', ' ', ' ', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `repetitionville`
--

CREATE TABLE IF NOT EXISTS `repetitionville` (
  `idville` int(11) NOT NULL AUTO_INCREMENT,
  `nomville` varchar(30) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`idville`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `repetitionville`
--

INSERT INTO `repetitionville` (`idville`, `nomville`, `sup`) VALUES
(1, 'DOUALA', 0);

-- --------------------------------------------------------

--
-- Structure de la table `retard`
--

CREATE TABLE IF NOT EXISTS `retard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(20) NOT NULL,
  `matiere` varchar(15) NOT NULL,
  `anelev` varchar(12) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `duree` varchar(7) NOT NULL,
  `dateabs` varchar(20) NOT NULL,
  `datenreg` varchar(15) NOT NULL,
  `heurenreg` varchar(30) NOT NULL,
  `typeutil` int(11) NOT NULL,
  `idleiter` int(11) NOT NULL,
  `motensgt` varchar(30) NOT NULL,
  `nomenreg` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `retard`
--


-- --------------------------------------------------------

--
-- Structure de la table `salaire`
--

CREATE TABLE IF NOT EXISTS `salaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idens` int(11) NOT NULL,
  `idpe` int(5) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `datep` varchar(15) NOT NULL,
  `heurenreg` varchar(12) NOT NULL,
  `idempl` int(11) NOT NULL,
  `idemplmodif` int(11) NOT NULL,
  `datemodif` varchar(15) NOT NULL,
  `an` varchar(15) NOT NULL,
  `taux` int(11) NOT NULL,
  `nomens` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `salaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `salaireadmin`
--

CREATE TABLE IF NOT EXISTS `salaireadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `idpe` int(5) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `salaire` decimal(10,2) NOT NULL,
  `datep` varchar(15) NOT NULL,
  `heurenreg` varchar(12) NOT NULL,
  `idempl` int(11) NOT NULL,
  `idemplmodif` int(11) NOT NULL,
  `datemodif` varchar(15) NOT NULL,
  `an` varchar(15) NOT NULL,
  `taux` int(11) NOT NULL,
  `nomens` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `salaireadmin`
--


-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `idsal` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) CHARACTER SET utf8 NOT NULL,
  `idb` int(11) NOT NULL,
  `nbanc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `nbanconfor` varchar(10) CHARACTER SET utf8 NOT NULL,
  `carrelage` varchar(50) CHARACTER SET utf8 NOT NULL,
  `plafond` varchar(50) CHARACTER SET utf8 NOT NULL,
  `baievitre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `peinture` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chaleur` varchar(50) CHARACTER SET utf8 NOT NULL,
  `eclairage` varchar(50) CHARACTER SET utf8 NOT NULL,
  `noteconf` varchar(11) CHARACTER SET utf8 NOT NULL,
  `notestruct` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idsal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Contenu de la table `salle`
--


-- --------------------------------------------------------

--
-- Structure de la table `schuler`
--

CREATE TABLE IF NOT EXISTS `schuler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(5) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
  `telev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cout` varchar(30) CHARACTER SET utf8 NOT NULL,
  `total` varchar(30) CHARACTER SET utf8 NOT NULL,
  `reste` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abs1` int(11) DEFAULT NULL,
  `date1` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abs2` int(11) DEFAULT NULL,
  `date2` varchar(30) CHARACTER SET utf8 NOT NULL,
  `abs3` int(11) DEFAULT NULL,
  `date3` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `schuler`
--


-- --------------------------------------------------------

--
-- Structure de la table `schulerdetail`
--

CREATE TABLE IF NOT EXISTS `schulerdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matelev` int(11) NOT NULL,
  `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
  `frais` varchar(20) CHARACTER SET utf8 NOT NULL,
  `remise` varchar(5) CHARACTER SET utf8 NOT NULL,
  `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) CHARACTER SET utf8 NOT NULL,
  `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
  `idempl` int(11) NOT NULL,
  `typerem` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `schulerdetail`
--


-- --------------------------------------------------------

--
-- Structure de la table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `ids` int(11) NOT NULL AUTO_INCREMENT,
  `idb` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `id_etab` int(11) NOT NULL,
  `an` varchar(10) NOT NULL,
  `idsurv` int(11) NOT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sector`
--


-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE IF NOT EXISTS `sortie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(50) NOT NULL,
  `qte` varchar(10) NOT NULL,
  `total` varchar(15) NOT NULL,
  `id_etab` int(11) NOT NULL,
  `an` varchar(10) NOT NULL,
  `idempl` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `desti` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sortie`
--


-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE IF NOT EXISTS `sujet` (
  `idsuj` int(11) NOT NULL AUTO_INCREMENT,
  `idmat` int(11) NOT NULL,
  `idcl` int(11) NOT NULL,
  `idtrim` int(11) NOT NULL,
  `ideva` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `anens` varchar(10) NOT NULL,
  `typeresp` int(11) NOT NULL,
  `idresp` int(11) NOT NULL,
  `datesuj` varchar(10) NOT NULL,
  `heuresuj` varchar(10) NOT NULL,
  `sup` int(11) NOT NULL,
  PRIMARY KEY (`idsuj`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sujet`
--


-- --------------------------------------------------------

--
-- Structure de la table `trimestre`
--

CREATE TABLE IF NOT EXISTS `trimestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `trimestre`
--

INSERT INTO `trimestre` (`id`, `code`, `nom`) VALUES
(1, 1, 'TRIMESTRE 1'),
(2, 2, 'TRIMESTRE 2'),
(3, 3, 'TRIMESTRE 3');
  ";
return $sql;
}






































function dbcollege(){
  $sql="-- phpMyAdmin SQL Dump
  -- version 3.2.0.1
  -- http://www.phpmyadmin.net
  --
  -- Serveur: localhost
  -- Généré le : Dim 03 Novembre 2024 à 17:27
  -- Version du serveur: 5.1.36
  -- Version de PHP: 5.3.0
  
  SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
  
  --
  -- Base de données: `college1test`
  --
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `1ere_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `1ere_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `1ere_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `2eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `2eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `2eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `3eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `3eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `3eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `4eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `4eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `4eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `5eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `5eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `5eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `6eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `6eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `6eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `7eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `7eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `7eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `8eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `8eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `8eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `9eme_sequence`
  --
  
  CREATE TABLE IF NOT EXISTS `9eme_sequence` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(5) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `9eme_sequence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `absence`
  --
  
  CREATE TABLE IF NOT EXISTS `absence` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(20) NOT NULL,
    `matiere` varchar(15) NOT NULL,
    `anelev` varchar(12) NOT NULL,
    `id_etab` int(11) NOT NULL,
    `trimestre` int(11) NOT NULL,
    `duree` varchar(7) NOT NULL,
    `dateabs` varchar(20) NOT NULL,
    `datenreg` varchar(15) NOT NULL,
    `heurenreg` varchar(30) NOT NULL,
    `typeutil` int(11) NOT NULL,
    `idleiter` int(11) NOT NULL,
    `motensgt` varchar(30) NOT NULL,
    `nomenreg` varchar(40) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `absence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `admin`
  --
  
  CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(30) NOT NULL,
    `mtpasse` varchar(15) NOT NULL,
    `user` varchar(30) NOT NULL,
    `genre` varchar(10) NOT NULL,
    `numtel` varchar(15) NOT NULL,
    `anens` varchar(15) NOT NULL,
    `verrou` int(11) NOT NULL,
    `id_etab` int(11) NOT NULL,
    `sup` int(11) NOT NULL,
    `cni` varchar(40) NOT NULL,
    `intrus` int(11) NOT NULL,
    `migrer` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;
  
  --
  -- Contenu de la table `admin`
  --
  
  INSERT INTO `admin` (`id`, `nom`, `mtpasse`, `user`, `genre`, `numtel`, `anens`, `verrou`, `id_etab`, `sup`, `cni`, `intrus`, `migrer`) VALUES
  (16, 'KAMMOGNE TAMDJO', '16S69', '16S69', 'M', '674494384', '2022/2023', 0, 0, 0, '108', 1, 1);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `admini`
  --
  
  CREATE TABLE IF NOT EXISTS `admini` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `code` int(11) NOT NULL,
    `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
    `mtpasse` varchar(15) CHARACTER SET utf8 NOT NULL,
    `user` varchar(15) CHARACTER SET utf8 NOT NULL,
    `genre` varchar(10) CHARACTER SET utf8 NOT NULL,
    `numtel` varchar(15) CHARACTER SET utf8 NOT NULL,
    `anens` varchar(15) CHARACTER SET utf8 NOT NULL,
    `verrou` int(11) NOT NULL,
    `id_etab` int(11) NOT NULL,
    `sup` int(11) NOT NULL,
    `salaire` int(11) NOT NULL,
    `cni` varchar(40) NOT NULL,
    `intrus` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `admini`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `admin_poste`
  --
  
  CREATE TABLE IF NOT EXISTS `admin_poste` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idadmin` int(11) NOT NULL,
    `idposte` int(11) NOT NULL,
    `anens` varchar(12) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `admin_poste`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `admin_salaire`
  --
  
  CREATE TABLE IF NOT EXISTS `admin_salaire` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idadmin` int(11) NOT NULL,
    `salaire` decimal(10,2) NOT NULL,
    `anens` varchar(12) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `admin_salaire`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `autrefrais`
  --
  
  CREATE TABLE IF NOT EXISTS `autrefrais` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(45) NOT NULL,
    `prix` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;
  
  --
  -- Contenu de la table `autrefrais`
  --
  
  INSERT INTO `autrefrais` (`id`, `nom`, `prix`) VALUES
  (1, 'Uniforme de classe / Regular wear', 0),
  (2, 'Uniforme de sport / Sport attirefor Fridays', 3500),
  (3, 'Ecussons', 500),
  (4, 'Tenue de mercredi', 3000),
  (5, 'FRAIS DE TD', 10000),
  (6, 'Fete de fin d''ann', 5000),
  (7, 'Entretien des toges Cleaning of Robes', 500),
  (8, 'Photo de souvenir / Graduation pictures', 3000),
  (9, 'Transport / Transport', 10000),
  (10, 'Excursion trimestre 1 / Fields Trips 1st Term', 3000),
  (11, 'Excursion trimestre 2 / Fields Trips 2nd Term', 3000),
  (12, 'Excursion trimestre 3 / Fields Trips 3rd Term', 3000);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `autrepayefrais`
  --
  
  CREATE TABLE IF NOT EXISTS `autrepayefrais` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `frais` varchar(20) CHARACTER SET utf8 NOT NULL,
    `mois` varchar(2) CHARACTER SET utf8 NOT NULL,
    `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
    `date` varchar(30) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
    `idempl` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `autrepayefrais`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `batiment`
  --
  
  CREATE TABLE IF NOT EXISTS `batiment` (
    `idb` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `an` varchar(10) NOT NULL,
    PRIMARY KEY (`idb`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `batiment`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `classe`
  --
  
  CREATE TABLE IF NOT EXISTS `classe` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `code` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `typeEns` int(11) NOT NULL,
    `cycle` int(11) NOT NULL,
    `etab0` int(11) NOT NULL,
    `anc` int(11) NOT NULL,
    `anens` varchar(10) CHARACTER SET utf8 NOT NULL,
    `categ` varchar(5) CHARACTER SET utf8 NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;
  
  --
  -- Contenu de la table `classe`
  --
  
  INSERT INTO `classe` (`id`, `code`, `niveau`, `typeEns`, `cycle`, `etab0`, `anc`, `anens`, `categ`, `sup`) VALUES
  (1, '6EME-1', '1', 1, 1, 100, 1, '2022/2023', 'A', 0),
  (2, '6EME-2', '1', 1, 1, 100, 1, '2022/2023', 'A', 0),
  (3, '6EME-3', '1', 1, 1, 100, 1, '2022/2023', 'A', 0),
  (4, '5EME-1', '1', 1, 1, 100, 1, '2022/2023', 'B', 0),
  (5, '5EME-2', '1', 1, 1, 100, 1, '2022/2023', 'B', 0),
  (6, '5EME-3', '1', 1, 1, 100, 1, '2022/2023', 'B', 0),
  (7, '4ALL-1', '2', 1, 1, 100, 1, '2022/2023', 'C', 0),
  (8, '4ESP-1', '3', 1, 1, 100, 1, '2022/2023', 'C', 0),
  (9, '4ESP-2', '3', 1, 1, 100, 1, '2022/2023', 'C', 0),
  (10, '4ESP-3', '3', 1, 1, 100, 1, '2022/2023', 'C', 0),
  (11, '4ALL+ESP', '2a', 1, 1, 100, 1, '2022/2023', 'C', 0),
  (12, '3ALL-1', '4', 1, 1, 100, 1, '2022/2023', 'D', 0),
  (13, '3ESP-1', '5', 1, 1, 100, 1, '2022/2023', 'D', 0),
  (14, '3ESP-2', '5', 1, 1, 100, 1, '2022/2023', 'D', 0),
  (15, '3ESP-3', '5', 1, 1, 100, 1, '2022/2023', 'D', 0),
  (16, '3ALL+ESP', '4a', 1, 1, 100, 1, '2022/2023', 'D', 0),
  (17, '2NDE-A4-ALL', '6', 1, 2, 100, 1, '2022/2023', 'E', 0),
  (18, '2NDE-A4-ESP', '7', 1, 2, 100, 1, '2022/2023', 'E', 0),
  (19, '2NDE-A4-ALL+ESP', '6a', 1, 2, 100, 1, '2022/2023', 'E', 0),
  (20, '2NDE-C1', '8', 1, 2, 100, 1, '2022/2023', 'E', 0),
  (21, '2NDE-C2', '8', 1, 2, 100, 1, '2022/2023', 'E', 0),
  (22, '2NDE-STT', '14', 2, 2, 100, 1, '2022/2023', 'E', 0),
  (23, '2NDE-SES', '49', 2, 2, 100, 1, '2022/2023', 'E', 0),
  (24, '2NDE-ESF', '50', 2, 2, 100, 1, '2022/2023', 'E', 0),
  (25, '2NDE-F8', '48', 2, 2, 100, 1, '2022/2023', 'E', 0),
  (26, '1ERE-A4-ALL', '10', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (27, '1ERE-A4-ESP', '11', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (28, '1ERE-A4-ALL+ESP', '10a', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (29, '1ERE-C', '8', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (30, '1ERE-D1', '8', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (31, '1ERE-D2', '8', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (32, '1ERE-D3', '8', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (33, '1ERE-C-D', '8', 1, 2, 100, 1, '2022/2023', 'F', 0),
  (34, '1ERE-ACA', '17', 2, 2, 100, 1, '2022/2023', 'F', 0),
  (35, '1ERE-ACC', '15', 2, 2, 100, 1, '2022/2023', 'F', 0),
  (36, '1ERE-CG', '16', 2, 2, 100, 1, '2022/2023', 'F', 0),
  (37, '1ERE-FIG', '54', 2, 2, 100, 1, '2022/2023', 'F', 0),
  (38, '1ERE-F2', '19', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (39, '1ERE-F3', '19', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (40, '1ERE-F4', '29', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (41, '1ERE-F5', '30', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (42, '1ERE-F8', '31', 2, 2, 100, 1, '2022/2023', 'F', 0),
  (43, '1ERE-E', '32', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (44, '1ERE-IH', '33', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (45, '1ERE-IS-RH', '55', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (46, '1ERE-ESF', '34', 2, 2, 100, 1, '2022/2023', 'F', 0),
  (47, '1ERE-GT-TO', '38', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (48, '1ERE-MEB', '51', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (49, '1ERE-CMA-MVT', '35', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (50, '1ERE-MEM', '36', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (51, '1ERE-MEH', '37', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (52, '1ERE-MA', '39', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (53, '1ERE-MISE', '53', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (54, '1ERE-SES', '40', 2, 2, 100, 1, '2022/2023', 'F', 0),
  (55, '1ERE-TI', '52', 3, 2, 100, 1, '2022/2023', 'F', 0),
  (57, 'TLE-A4-ALL', '12', 1, 2, 100, 1, '2022/2023', 'G', 0),
  (58, 'TLE-A4-ESP', '13', 1, 2, 100, 1, '2022/2023', 'G', 0),
  (59, 'TLE-A4-ALL+ESP', '12a', 1, 2, 100, 1, '2022/2023', 'G', 0),
  (60, 'TLE-C', '9', 1, 2, 100, 1, '2022/2023', 'G', 0),
  (61, 'TLE-D1', '9', 1, 2, 100, 1, '2022/2023', 'G', 0),
  (62, 'TLE-D2', '9', 1, 2, 100, 1, '2022/2023', 'G', 0),
  (63, 'TLE-C-D', '9', 1, 2, 100, 1, '2022/2023', 'G', 0),
  (64, 'TLE-ACA', '18', 2, 2, 100, 1, '2022/2023', 'G', 0),
  (65, 'TLE-ACC', '19', 2, 2, 100, 1, '2022/2023', 'G', 0),
  (66, 'TLE-CG', '20', 2, 2, 100, 1, '2022/2023', 'G', 0),
  (67, 'TLE-FIG', '59', 2, 2, 100, 1, '2022/2023', 'G', 0),
  (68, 'TLE-F1', '47', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (69, 'TLE-F2', '21', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (70, 'TLE-F3', '22', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (71, 'TLE-F4', '41', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (72, 'TLE-F5', '42', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (73, 'TLE-F8', '23', 2, 2, 100, 1, '2022/2023', 'G', 0),
  (74, 'TLE-E', '24', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (75, 'TLE-IH', '25', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (76, 'TLE-ESF', '26', 2, 2, 100, 1, '2022/2023', 'G', 0),
  (77, 'TLE-CMA-MVT', '27', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (78, 'TLE-MEM', '28', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (79, 'TLE-MEH', '43', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (80, 'TLE-GT-TO', '44', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (81, 'TLE-MA', '45', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (82, 'TLE-SES', '46', 2, 2, 100, 1, '2022/2023', 'G', 0),
  (83, 'TLE-MISE', '56', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (84, 'TLE-MEB', '57', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (85, 'TLE-TI', '60', 3, 2, 100, 1, '2022/2023', 'G', 0),
  (86, 'TLE-IS-RH', '58', 3, 2, 100, 1, '2022/2023', 'G', 0);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `classe1`
  --
  
  CREATE TABLE IF NOT EXISTS `classe1` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `code` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `typeEns` int(11) NOT NULL,
    `cycle` int(11) NOT NULL,
    `etab0` int(11) NOT NULL,
    `anc` int(11) NOT NULL,
    `anens` varchar(10) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;
  
  --
  -- Contenu de la table `classe1`
  --
  
  INSERT INTO `classe1` (`id`, `code`, `niveau`, `typeEns`, `cycle`, `etab0`, `anc`, `anens`) VALUES
  (1, '6EME-1', '1', 1, 1, 15, 1, '2022/2023'),
  (2, '6EME-2', '1', 1, 1, 15, 1, '2022/2023'),
  (3, '6EME-3', '1', 1, 1, 50, 1, '2022/2023'),
  (4, '5EME-1', '1', 1, 1, 15, 1, '2022/2023'),
  (5, '5EME-2', '1', 1, 1, 0, 1, '2022/2023'),
  (6, '5EME-3', '1', 1, 1, 0, 1, '2022/2023'),
  (7, '4ALL-1', '2', 1, 1, 15, 1, '2022/2023'),
  (8, '4ESP-1', '3', 1, 1, 0, 1, '2022/2023'),
  (9, '4ESP-2', '3', 1, 1, 0, 1, '2022/2023'),
  (10, '4ESP-3', '3', 1, 1, 0, 1, '2022/2023'),
  (11, '4MIXTE', '2a', 1, 1, 15, 1, '2022/2023'),
  (12, '3ALL-1', '4', 1, 1, 15, 1, '2022/2023'),
  (13, '3ESP-1', '5', 1, 1, 0, 1, '2022/2023'),
  (14, '3ESP-2', '5', 1, 1, 0, 1, '2022/2023'),
  (15, '3ESP-3', '5', 1, 1, 0, 1, '2022/2023'),
  (16, '3MIXTE', '4a', 1, 1, 15, 1, '2022/2023'),
  (17, '2NDE-A4-ALL', '6', 1, 2, 0, 1, '2022/2023'),
  (18, '2NDE-A4-ESP', '7', 1, 2, 0, 1, '2022/2023'),
  (19, '2NDE-A4-ALL-ESP', '6a', 1, 2, 15, 1, '2022/2023'),
  (20, '2NDE-C1', '8', 1, 2, 0, 1, '2022/2023'),
  (21, '2NDE-C2', '8', 1, 2, 0, 1, '2022/2023'),
  (22, '2NDE-STT', '14', 2, 2, 50, 1, '2022/2023'),
  (23, '2NDE-SES', '49', 2, 2, 50, 1, '2022/2023'),
  (24, '2NDE-ESF', '50', 2, 2, 50, 1, '2022/2023'),
  (25, '2NDE-F8', '48', 2, 2, 50, 1, '2022/2023'),
  (26, '1ERE-A4-ALL', '10', 1, 2, 0, 1, '2022/2023'),
  (27, '1ERE-A4-ESP', '11', 1, 2, 0, 1, '2022/2023'),
  (28, '1ERE-A4-ALL-ESP', '10a', 1, 2, 0, 1, '2022/2023'),
  (29, '1ERE-C', '8', 1, 2, 0, 1, '2022/2023'),
  (30, '1ERE-D1', '8', 1, 2, 0, 1, '2022/2023'),
  (31, '1ERE-D2', '8', 1, 2, 0, 1, '2022/2023'),
  (32, '1ERE-D3', '8', 1, 2, 0, 1, '2022/2023'),
  (33, '1ERE-C-D', '8', 1, 2, 0, 1, '2022/2023'),
  (34, '1ERE-ACA', '17', 2, 2, 50, 1, '2022/2023'),
  (35, '1ERE-ACC', '15', 2, 2, 0, 1, '2022/2023'),
  (36, '1ERE-CG', '16', 2, 2, 50, 1, '2022/2023'),
  (37, '1ERE-FIG', '54', 2, 2, 50, 1, '2022/2023'),
  (38, '1ERE-F2', '19', 3, 2, 0, 1, '2022/2023'),
  (39, '1ERE-F3', '19', 3, 2, 50, 1, '2022/2023'),
  (40, '1ERE-F4', '29', 3, 2, 50, 1, '2022/2023'),
  (41, '1ERE-F5', '30', 3, 2, 50, 1, '2022/2023'),
  (42, '1ERE-F8', '31', 2, 2, 50, 1, '2022/2023'),
  (43, '1ERE-E', '32', 3, 2, 50, 1, '2022/2023'),
  (44, '1ERE-IH', '33', 3, 2, 50, 1, '2022/2023'),
  (45, '1ERE-IS-RH', '55', 3, 2, 50, 1, '2022/2023'),
  (46, '1ERE-ESF', '34', 2, 2, 50, 1, '2022/2023'),
  (47, '1ERE-GT-TO', '38', 3, 2, 50, 1, '2022/2023'),
  (48, '1ERE-MEB', '51', 3, 2, 50, 1, '2022/2023'),
  (49, '1ERE-CMA-MVT', '35', 3, 2, 50, 1, '2022/2023'),
  (50, '1ERE-MEM', '36', 3, 2, 50, 1, '2022/2023'),
  (51, '1ERE-MEH', '37', 3, 2, 50, 1, '2022/2023'),
  (52, '1ERE-MA', '39', 3, 2, 50, 1, '2022/2023'),
  (53, '1ERE-MISE', '53', 3, 2, 50, 1, '2022/2023'),
  (54, '1ERE-SES', '40', 2, 2, 50, 1, '2022/2023'),
  (55, '1ERE-TI', '52', 3, 2, 50, 1, '2022/2023'),
  (57, 'TLE-A4-ALL', '12', 1, 2, 0, 1, '2022/2023'),
  (58, 'TLE-A4-ESP', '13', 1, 2, 0, 1, '2022/2023'),
  (59, 'TLE-A4-ALL-ESP', '12a', 1, 2, 10, 1, '2022/2023'),
  (60, 'TLE-C', '9', 1, 2, 50, 1, '2022/2023'),
  (61, 'TLE-D1', '9', 1, 2, 0, 1, '2022/2023'),
  (62, 'TLE-D2', '9', 1, 2, 0, 1, '2022/2023'),
  (63, 'TLE-C-D', '9', 1, 2, 0, 1, '2022/2023'),
  (64, 'TLE-ACA', '18', 2, 2, 50, 1, '2022/2023'),
  (65, 'TLE-ACC', '19', 2, 2, 0, 1, '2022/2023'),
  (66, 'TLE-CG', '20', 2, 2, 0, 1, '2022/2023'),
  (67, 'TLE-FIG', '59', 2, 2, 50, 1, '2022/2023'),
  (68, 'TLE-F1', '47', 3, 2, 0, 1, '2022/2023'),
  (69, 'TLE-F2', '21', 3, 2, 0, 1, '2022/2023'),
  (70, 'TLE-F3', '22', 3, 2, 50, 1, '2022/2023'),
  (71, 'TLE-F4', '41', 3, 2, 50, 1, '2022/2023'),
  (72, 'TLE-F5', '42', 3, 2, 50, 1, '2022/2023'),
  (73, 'TLE-F8', '23', 2, 2, 50, 1, '2022/2023'),
  (74, 'TLE-E', '24', 3, 2, 50, 1, '2022/2023'),
  (75, 'TLE-IH', '25', 3, 2, 50, 1, '2022/2023'),
  (76, 'TLE-ESF', '26', 2, 2, 50, 1, '2022/2023'),
  (77, 'TLE-CMA-MVT', '27', 3, 2, 50, 1, '2022/2023'),
  (78, 'TLE-MEM', '28', 3, 2, 50, 1, '2022/2023'),
  (79, 'TLE-MEH', '43', 3, 2, 50, 1, '2022/2023'),
  (80, 'TLE-GT-TO', '44', 3, 2, 50, 1, '2022/2023'),
  (81, 'TLE-MA', '45', 3, 2, 50, 1, '2022/2023'),
  (82, 'TLE-SES', '46', 2, 2, 50, 1, '2022/2023'),
  (83, 'TLE-MISE', '56', 3, 2, 50, 1, '2022/2023'),
  (84, 'TLE-MEB', '57', 3, 2, 50, 1, '2022/2023'),
  (85, 'TLE-TI', '60', 3, 2, 50, 1, '2022/2023'),
  (86, 'TLE-IS-RH', '58', 3, 2, 50, 1, '2022/2023'),
  (111, '6EME-1', '1', 1, 1, 50, 0, '2021/2022'),
  (112, '6EME-1', '1', 1, 1, 50, 0, '2020/2021'),
  (113, '6EME-2', '1', 1, 1, 50, 0, '2021/2022'),
  (114, '6EME-2', '1', 1, 1, 50, 0, '2020/2021'),
  (115, '6EME-3', '1', 1, 1, 50, 0, '2021/2022'),
  (116, '6EME-3', '1', 1, 1, 50, 0, '2020/2021'),
  (117, '5EME-1', '1', 1, 1, 50, 0, '2021/2022'),
  (118, '5EME-1', '1', 1, 1, 50, 0, '2020/2021'),
  (119, '5EME-2', '1', 1, 1, 50, 0, '2021/2022'),
  (120, '5EME-2', '1', 1, 1, 50, 0, '2020/2021'),
  (121, '5EME-3', '1', 1, 1, 50, 0, '2021/2022'),
  (122, '5EME-3', '1', 1, 1, 50, 0, '2020/2021'),
  (123, '4ALL-1', '2', 1, 1, 50, 0, '2021/2022'),
  (124, '4ALL-1', '2', 1, 1, 50, 0, '2020/2021'),
  (125, '4ESP-1', '3', 1, 1, 50, 0, '2021/2022'),
  (126, '4ESP-1', '3', 1, 1, 50, 0, '2020/2021'),
  (127, '4ESP-2', '3', 1, 1, 50, 0, '2021/2022'),
  (128, '4ESP-2', '3', 1, 1, 50, 0, '2020/2021'),
  (129, '4ESP-3', '3', 1, 1, 50, 0, '2021/2022'),
  (130, '4ESP-3', '3', 1, 1, 50, 0, '2020/2021'),
  (131, '3ALL-1', '4', 1, 1, 50, 0, '2021/2022'),
  (132, '3ALL-1', '4', 1, 1, 50, 0, '2020/2021'),
  (133, '3ESP-1', '5', 1, 1, 50, 0, '2021/2022'),
  (134, '3ESP-1', '5', 1, 1, 50, 0, '2020/2021'),
  (135, '3ESP-2', '5', 1, 1, 50, 0, '2021/2022'),
  (136, '3ESP-2', '5', 1, 1, 50, 0, '2020/2021'),
  (137, '3ESP-3', '5', 1, 1, 50, 0, '2021/2022'),
  (138, '3ESP-3', '5', 1, 1, 50, 0, '2020/2021'),
  (139, '2NDE-A4-ALL', '6', 1, 2, 50, 0, '2021/2022'),
  (140, '2NDE-A4-ALL', '6', 1, 2, 50, 0, '2020/2021'),
  (141, '2NDE-A4-ESP', '7', 1, 2, 50, 0, '2021/2022'),
  (142, '2NDE-A4-ESP', '7', 1, 2, 50, 0, '2020/2021'),
  (147, '2NDE-C1', '8', 1, 2, 50, 0, '2021/2022'),
  (148, '2NDE-C1', '8', 1, 2, 50, 0, '2020/2021'),
  (149, '2NDE-C2', '8', 1, 2, 50, 0, '2021/2022'),
  (150, '2NDE-C2', '8', 1, 2, 50, 0, '2020/2021'),
  (151, '1ERE-A4-ALL', '10', 1, 2, 50, 0, '2021/2022'),
  (152, '1ERE-A4-ALL', '10', 1, 2, 50, 0, '2020/2021'),
  (153, '1ERE-A4-ESP', '11', 1, 2, 50, 0, '2021/2022'),
  (154, '1ERE-A4-ESP', '11', 1, 2, 50, 0, '2020/2021'),
  (155, '1ERE-C', '8', 1, 2, 50, 0, '2021/2022'),
  (156, '1ERE-C', '8', 1, 2, 50, 0, '2020/2021'),
  (157, '1ERE-D1', '8', 1, 2, 50, 0, '2021/2022'),
  (158, '1ERE-D1', '8', 1, 2, 50, 0, '2020/2021'),
  (159, '1ERE-D2', '8', 1, 2, 50, 0, '2021/2022'),
  (160, '1ERE-D2', '8', 1, 2, 50, 0, '2020/2021'),
  (161, '1ERE-D3', '8', 1, 2, 50, 0, '2021/2022'),
  (162, '1ERE-D3', '8', 1, 2, 50, 0, '2020/2021'),
  (165, 'TLE-A4-ALL', '12', 1, 2, 50, 0, '2021/2022'),
  (166, 'TLE-A4-ALL', '12', 1, 2, 50, 0, '2020/2021'),
  (167, 'TLE-A4-ESP', '13', 1, 2, 50, 0, '2021/2022'),
  (168, 'TLE-A4-ESP', '13', 1, 2, 50, 0, '2020/2021'),
  (169, 'TLE-C', '9', 1, 2, 50, 0, '2021/2022'),
  (170, 'TLE-C', '9', 1, 2, 50, 0, '2020/2021'),
  (171, 'TLE-D1', '9', 1, 2, 50, 0, '2021/2022'),
  (172, 'TLE-D1', '9', 1, 2, 50, 0, '2020/2021'),
  (173, 'TLE-D2', '9', 1, 2, 50, 0, '2021/2022'),
  (174, 'TLE-D2', '9', 1, 2, 50, 0, '2020/2021'),
  (175, '6EME-1', '1', 0, 0, 0, 0, ''),
  (176, '6EME-2', '1', 0, 0, 0, 0, ''),
  (177, '6EME-3', '1', 0, 0, 0, 0, ''),
  (178, '5EME-1', '1', 0, 0, 0, 0, ''),
  (179, '5EME-2', '1', 0, 0, 0, 0, ''),
  (180, '5EME-3', '1', 0, 0, 0, 0, ''),
  (181, '4ALL-1', '2', 0, 0, 0, 0, ''),
  (182, '4ESP-1', '3', 0, 0, 0, 0, ''),
  (183, '4ESP-2', '3', 0, 0, 0, 0, ''),
  (184, '4ESP-3', '3', 0, 0, 0, 0, ''),
  (185, '3ALL-1', '4', 0, 0, 0, 0, ''),
  (186, '3ESP-1', '5', 0, 0, 0, 0, ''),
  (187, '3ESP-2', '5', 0, 0, 0, 0, ''),
  (188, '3ESP-3', '5', 0, 0, 0, 0, ''),
  (189, '2NDE-A4-ALL', '6', 0, 0, 0, 0, ''),
  (190, '2NDE-A4-ESP', '7', 0, 0, 0, 0, ''),
  (191, '2NDE-C1', '8', 0, 0, 0, 0, ''),
  (192, '2NDE-STT', '14', 0, 0, 0, 0, ''),
  (193, '2NDE-C2', '8', 0, 0, 0, 0, ''),
  (194, '1ERE-C', '8', 0, 0, 0, 0, ''),
  (195, '1ERE-D1', '8', 0, 0, 0, 0, ''),
  (196, '1ERE-D2', '8', 0, 0, 0, 0, ''),
  (197, '1ERE-D3', '8', 0, 0, 0, 0, ''),
  (198, '1ERE-A4-ALL', '10', 0, 0, 0, 0, ''),
  (199, '1ERE-A4-ESP', '11', 0, 0, 0, 0, ''),
  (200, '1ERE-ACC', '15', 0, 0, 0, 0, ''),
  (201, '1ERE-CG', '16', 0, 0, 0, 0, ''),
  (202, 'TLE-C', '9', 0, 0, 0, 0, ''),
  (203, 'TLE-D1', '9', 0, 0, 0, 0, ''),
  (204, 'TLE-D2', '9', 0, 0, 0, 0, ''),
  (205, 'TLE-A4-ALL', '12', 0, 0, 0, 0, ''),
  (206, 'TLE-A4-ESP', '13', 0, 0, 0, 0, ''),
  (207, 'TLE-ACC', '17', 0, 0, 0, 0, ''),
  (208, 'TLE-CG', '18', 0, 0, 0, 0, '');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `competence`
  --
  
  CREATE TABLE IF NOT EXISTS `competence` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `intitule` varchar(500) NOT NULL,
    `idmat` int(11) NOT NULL,
    `niveauclas` varchar(11) NOT NULL,
    `trimestre` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `competence`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `competenceclas`
  --
  
  CREATE TABLE IF NOT EXISTS `competenceclas` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idcomp` int(11) NOT NULL,
    `idclas` int(11) NOT NULL,
    `anens` varchar(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `competenceclas`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `cordon`
  --
  
  CREATE TABLE IF NOT EXISTS `cordon` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `type` int(11) NOT NULL,
    `stat` varchar(3) NOT NULL,
    `anens` varchar(11) NOT NULL,
    `idcl` int(11) NOT NULL,
    `tant` int(10) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `cordon`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `delai`
  --
  
  CREATE TABLE IF NOT EXISTS `delai` (
    `id_etab` int(11) NOT NULL,
    `an` varchar(15) NOT NULL,
    `eval` varchar(15) NOT NULL,
    `verrou` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
  --
  -- Contenu de la table `delai`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `detail`
  --
  
  CREATE TABLE IF NOT EXISTS `detail` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
    `frais` varchar(20) CHARACTER SET utf8 NOT NULL,
    `remise` varchar(5) CHARACTER SET utf8 NOT NULL,
    `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
    `date` varchar(30) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
    `idempl` int(11) NOT NULL,
    `typerem` varchar(30) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `detail`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `devise`
  --
  
  CREATE TABLE IF NOT EXISTS `devise` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(10) NOT NULL,
    `prio` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
  
  --
  -- Contenu de la table `devise`
  --
  
  INSERT INTO `devise` (`id`, `nom`, `prio`) VALUES
  (1, 'FCFA', 1);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `eleve`
  --
  
  CREATE TABLE IF NOT EXISTS `eleve` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(5) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
    `telev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `cout` varchar(30) CHARACTER SET utf8 NOT NULL,
    `total` varchar(30) CHARACTER SET utf8 NOT NULL,
    `reste` varchar(30) CHARACTER SET utf8 NOT NULL,
    `date` varchar(30) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs1` int(11) NOT NULL,
    `date1` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs2` int(11) NOT NULL,
    `date2` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs3` int(11) NOT NULL,
    `date3` varchar(30) CHARACTER SET utf8 NOT NULL,
    `idnational` varchar(50) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `eleve`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `eleve1`
  --
  
  CREATE TABLE IF NOT EXISTS `eleve1` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(5) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
    `telev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `cout` varchar(30) CHARACTER SET utf8 NOT NULL,
    `total` varchar(30) CHARACTER SET utf8 NOT NULL,
    `reste` varchar(30) CHARACTER SET utf8 NOT NULL,
    `date` varchar(30) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs1` int(11) DEFAULT NULL,
    `date1` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs2` int(11) DEFAULT NULL,
    `date2` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs3` int(11) DEFAULT NULL,
    `date3` varchar(30) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `eleve1`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `emploi`
  --
  
  CREATE TABLE IF NOT EXISTS `emploi` (
    `ide` int(11) NOT NULL AUTO_INCREMENT,
    `idh` int(11) NOT NULL,
    `matier` varchar(30) CHARACTER SET utf8 NOT NULL,
    `class` varchar(30) CHARACTER SET utf8 NOT NULL,
    `an` varchar(15) CHARACTER SET utf8 NOT NULL,
    `idjour` int(11) NOT NULL,
    `id_etab` int(11) NOT NULL,
    `cni` varchar(30) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`ide`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `emploi`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `enseigmatclasse`
  --
  
  CREATE TABLE IF NOT EXISTS `enseigmatclasse` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idmat` int(11) NOT NULL,
    `idcl` int(11) NOT NULL,
    `idens` int(11) NOT NULL,
    `anens` varchar(11) NOT NULL,
    `titulaire` int(11) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `enseigmatclasse`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `enseignant`
  --
  
  CREATE TABLE IF NOT EXISTS `enseignant` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nomens` varchar(30) NOT NULL,
    `prenomens` varchar(30) NOT NULL,
    `telens` varchar(30) NOT NULL,
    `mtpasse` varchar(30) NOT NULL,
    `anens` varchar(30) NOT NULL,
    `genre` varchar(30) NOT NULL,
    `datens` varchar(30) NOT NULL,
    `cni` varchar(50) CHARACTER SET latin1 NOT NULL,
    `temps` int(20) NOT NULL,
    `supp` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `enseignant`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `enseignantanc`
  --
  
  CREATE TABLE IF NOT EXISTS `enseignantanc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nomens` varchar(30) NOT NULL,
    `prenomens` varchar(30) NOT NULL,
    `telens` varchar(30) NOT NULL,
    `mtpasse` varchar(30) NOT NULL,
    `anens` varchar(30) NOT NULL,
    `genre` varchar(30) NOT NULL,
    `datens` varchar(30) NOT NULL,
    `cni` varchar(50) CHARACTER SET latin1 NOT NULL,
    `temps` int(20) NOT NULL,
    `supp` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `enseignantanc`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `enseigsalaire`
  --
  
  CREATE TABLE IF NOT EXISTS `enseigsalaire` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idens` int(11) NOT NULL,
    `type` int(11) NOT NULL,
    `valeur` int(11) NOT NULL,
    `idmonnaie` int(11) NOT NULL,
    `anens` varchar(11) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `enseigsalaire`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `evaltrim`
  --
  
  CREATE TABLE IF NOT EXISTS `evaltrim` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idcl` int(11) NOT NULL,
    `codetrim` int(11) NOT NULL,
    `nbre` int(11) NOT NULL,
    `anens` varchar(10) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `evaltrim`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `evaluation`
  --
  
  CREATE TABLE IF NOT EXISTS `evaluation` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `code` int(11) NOT NULL,
    `nom` varchar(15) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;
  
  --
  -- Contenu de la table `evaluation`
  --
  
  INSERT INTO `evaluation` (`id`, `code`, `nom`, `sup`) VALUES
  (1, 1, 'EVAL 1', 0),
  (2, 2, 'EVAL 2', 0),
  (3, 3, 'EVAL 3', 0),
  (4, 4, 'EVAL 4', 0),
  (5, 5, 'EVAL 5', 0),
  (6, 6, 'EVAL 6', 0),
  (7, 7, 'EVAL 7', 0),
  (8, 8, 'EVAL 8', 0),
  (9, 9, 'EVAL 9', 0);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `exam`
  --
  
  CREATE TABLE IF NOT EXISTS `exam` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(5) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `telev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
    `date` varchar(30) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
    `idempl` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `exam`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `fact`
  --
  
  CREATE TABLE IF NOT EXISTS `fact` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `an` varchar(10) NOT NULL,
    `id_etab` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `fact`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `groupetype`
  --
  
  CREATE TABLE IF NOT EXISTS `groupetype` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `code` varchar(10) NOT NULL,
    `nom` varchar(150) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;
  
  --
  -- Contenu de la table `groupetype`
  --
  
  INSERT INTO `groupetype` (`id`, `code`, `nom`) VALUES
  (1, '1', 'General fran'),
  (2, '2', 'Commercial fran'),
  (3, '3', 'Industriel fran'),
  (4, '4', 'Anglophone'),
  (5, '12', 'General fran+Commercial fran'),
  (6, '13', 'General fran+Industriel fran'),
  (7, '14', 'General fran+Anglophone'),
  (8, '23', 'Commercial fran+industriel fran'),
  (9, '24', 'Commercial fran+Anglophone'),
  (10, '34', 'Industriel fran+Anglophone'),
  (11, '123', 'General fran+Commercial fran+Industriel fran'),
  (12, '124', 'General fran+Commercial fran+anglophone'),
  (13, '134', 'General fran+Industriel fran+Anglophone'),
  (14, '234', 'Commercial fran+Industriel fran+Anglophone');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `groupmatensg`
  --
  
  CREATE TABLE IF NOT EXISTS `groupmatensg` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(20) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
  
  --
  -- Contenu de la table `groupmatensg`
  --
  
  INSERT INTO `groupmatensg` (`id`, `nom`) VALUES
  (1, 'Litteraire'),
  (2, 'Scientifique'),
  (3, 'Complementaire'),
  (4, 'Generale'),
  (5, 'Professionnelle'),
  (6, 'general'),
  (7, 'professional'),
  (8, 'complementary');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `groupmatensg1`
  --
  
  CREATE TABLE IF NOT EXISTS `groupmatensg1` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `code` int(11) NOT NULL,
    `typeEns` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;
  
  --
  -- Contenu de la table `groupmatensg1`
  --
  
  INSERT INTO `groupmatensg1` (`id`, `code`, `typeEns`) VALUES
  (1, 1, 1),
  (2, 2, 1),
  (3, 3, 1),
  (4, 5, 2),
  (5, 5, 3),
  (6, 4, 2),
  (7, 4, 3),
  (8, 3, 2),
  (9, 3, 3),
  (11, 6, 4),
  (12, 7, 4),
  (13, 8, 4);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `honneur`
  --
  
  CREATE TABLE IF NOT EXISTS `honneur` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_etab` int(11) NOT NULL,
    `record` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
  
  --
  -- Contenu de la table `honneur`
  --
  
  INSERT INTO `honneur` (`id`, `id_etab`, `record`) VALUES
  (1, 0, 'alexis');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `jour`
  --
  
  CREATE TABLE IF NOT EXISTS `jour` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;
  
  --
  -- Contenu de la table `jour`
  --
  
  INSERT INTO `jour` (`id`, `nom`) VALUES
  (1, 'LUNDI'),
  (2, 'MARDI'),
  (3, 'MERCREDI'),
  (4, 'JEUDI'),
  (5, 'VENDREDI'),
  (6, 'SAMEDI');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `lien`
  --
  
  CREATE TABLE IF NOT EXISTS `lien` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `lien` varchar(100) NOT NULL,
    `serveur` varchar(30) NOT NULL,
    `basedonnees` varchar(100) NOT NULL,
    `user` varchar(50) NOT NULL,
    `mtp` varchar(50) NOT NULL,
    `ici` int(11) NOT NULL,
    `actif` int(11) NOT NULL,
    `initial` varchar(20) NOT NULL,
    `idetabl` int(255) NOT NULL,
    `idetablier` int(255) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
  
  --
  -- Contenu de la table `lien`
  --
  
  INSERT INTO `lien` (`id`, `lien`, `serveur`, `basedonnees`, `user`, `mtp`, `ici`, `actif`, `initial`, `idetabl`, `idetablier`) VALUES
  (1, 'http://localhost/adnew', 'localhost', 'savoirnew', 'root', '', 0, 0, 'COPBISF', 1, 0);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `liensms`
  --
  
  CREATE TABLE IF NOT EXISTS `liensms` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user` varchar(50) NOT NULL,
    `mtp` varchar(50) NOT NULL,
    `url` varchar(100) NOT NULL,
    `actif` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
  
  --
  -- Contenu de la table `liensms`
  --
  
  INSERT INTO `liensms` (`id`, `user`, `mtp`, `url`, `actif`) VALUES
  (1, 'hermannfotso0@gmail.com', 'nexah2022', 'https://smsvas.com/bulk/public/index.php/api/v1/sendsms                                             ', 0);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `matclasse`
  --
  
  CREATE TABLE IF NOT EXISTS `matclasse` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idmat` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `idgp` int(11) NOT NULL,
    `anens` varchar(10) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `matclasse`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `matgroup`
  --
  
  CREATE TABLE IF NOT EXISTS `matgroup` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idmat` int(11) NOT NULL,
    `idgroup` int(11) NOT NULL,
    `anens` varchar(11) NOT NULL,
    `typeEns` int(11) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `matgroup`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `matiere`
  --
  
  CREATE TABLE IF NOT EXISTS `matiere` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `codemat` varchar(100) CHARACTER SET utf8 NOT NULL,
    `code` varchar(30) CHARACTER SET utf8 NOT NULL,
    `typeEns` int(11) NOT NULL,
    `sup` int(11) NOT NULL,
    `anc` int(11) NOT NULL,
    `anens` varchar(10) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=238 ;
  
  --
  -- Contenu de la table `matiere`
  --
  
  INSERT INTO `matiere` (`id`, `codemat`, `code`, `typeEns`, `sup`, `anc`, `anens`) VALUES
  (2, 'ORTHOGRAPHE', 'd1', 123, 0, 0, '2022/2023'),
  (3, 'Expresion Ã©crite', 'd2', 123, 0, 0, '2022/2023'),
  (4, 'ETUDE DE TEXTE', 'd3', 123, 0, 0, '2022/2023'),
  (5, 'HISTOIRE', 'd4', 123, 0, 0, '2022/2023'),
  (6, 'GEOGRAPHIE', 'd22', 123, 0, 0, '2022/2023'),
  (7, 'ECM', 'd6', 123, 0, 0, '2022/2023'),
  (8, 'ANGLAIS', 'd7', 123, 0, 0, '2022/2023'),
  (9, 'ALLEMAND', 'd8', 1, 0, 0, '2022/2023'),
  (10, 'ESPAGNOL', 'd9', 1, 0, 0, '2022/2023'),
  (11, 'MATHEMATIQUES', 'd10', 123, 0, 0, '2022/2023'),
  (12, 'PHYSIQUE', 'd11', 1, 0, 0, '2022/2023'),
  (13, 'CHIMIE', 'd12', 1, 0, 0, '2022/2023'),
  (14, 'PCT', 'd20', 1, 0, 0, '2022/2023'),
  (15, 'INFORMATIQUE', 'd13', 123, 0, 0, '2022/2023'),
  (16, 'SVTEEHB', 'd14', 1, 0, 0, '2022/2023'),
  (17, 'PHILOSOPHIE', 'd15', 123, 0, 0, '2022/2023'),
  (18, 'LANGUE', 'd16', 123, 0, 0, '2022/2023'),
  (19, 'LITTERATURE', 'd17', 123, 0, 0, '2022/2023'),
  (20, 'TRAVAIL MANUEL', 'd18', 123, 0, 0, '2022/2023'),
  (21, 'ESF', 'd87', 1, 0, 0, '2022/2023'),
  (22, 'EXPRESSION ORALE', 'd88', 123, 0, 0, '2022/2023'),
  (23, 'ART', 'd19', 123, 0, 0, '2022/2023'),
  (24, 'EPS', 'd21', 123, 0, 0, '2022/2023'),
  (25, 'LCN', 'd23', 123, 0, 0, '2022/2023'),
  (26, 'Economie generale', 'd24', 2, 0, 0, '2022/2023'),
  (27, 'Economie d''entreprise', 'd25', 23, 0, 0, '2022/2023'),
  (28, 'Droit', 'd26', 2, 0, 0, '2022/2023'),
  (29, 'Mathematiques Appliquees', 'd27', 2, 0, 0, '2022/2023'),
  (30, 'Technique comptable', 'd28', 2, 0, 0, '2022/2023'),
  (31, 'Pratique professionnelle', 'd29', 2, 0, 0, '2022/2023'),
  (32, 'Courrier', 'd30', 2, 0, 0, '2022/2023'),
  (33, 'Technique Com. Et Comptab.', 'd31', 2, 0, 0, '2022/2023'),
  (34, 'Comptabilite et Gest. assistee par Ord.', 'd32', 2, 0, 0, '2022/2023'),
  (35, 'Comptabilite de management', 'd33', 2, 0, 0, '2022/2023'),
  (36, 'Finances d''entreprise', 'd34', 2, 0, 0, '2022/2023'),
  (37, 'Sciences Eco. Et Juridiq.', 'd35', 2, 0, 0, '2022/2023'),
  (38, 'Technique Commerciale', 'd36', 2, 0, 0, '2022/2023'),
  (39, 'Comptabilite', 'd37', 2, 0, 0, '2022/2023'),
  (40, 'Gestion Com. assistee par Ordi.', 'd38', 2, 0, 0, '2022/2023'),
  (41, 'Organisation du travail administratif', 'd39', 2, 0, 0, '2022/2023'),
  (42, 'Outils et techniq. de communication', 'd40', 2, 0, 0, '2022/2023'),
  (43, 'Travaux d''application et synthese', 'd41', 2, 0, 0, '2022/2023'),
  (44, 'Redaction professionnelle', 'd42', 2, 0, 0, '2022/2023'),
  (45, 'Application des logiciels', 'd43', 2, 0, 0, '2022/2023'),
  (46, 'Recherche documentaire ou telephonie', 'd44', 2, 0, 0, '2022/2023'),
  (47, 'Sciences eco. et sociales', 'd45', 2, 0, 0, '2022/2023'),
  (48, 'Information appliquee A l''economie', 'd46', 2, 0, 0, '2022/2023'),
  (49, 'Fiscalite', 'd93', 2, 0, 0, '2022/2023'),
  (50, 'Systeme d''information', 'd94', 2, 0, 0, '2022/2023'),
  (51, 'SCIENCES PHYSIQUES', 'd47', 3, 0, 0, '2022/2023'),
  (52, 'EXPLOITATION ', 'd48', 3, 0, 0, '2022/2023'),
  (53, 'MECANIQUE APPLIQUEE', 'd49', 3, 0, 0, '2022/2023'),
  (54, 'PROCEDES DE CONSTRUCTION', 'd50', 3, 0, 0, '2022/2023'),
  (55, 'METRE', 'd51', 3, 0, 0, '2022/2023'),
  (56, 'ESSAIS EN LABORATOIRE', 'd52', 3, 0, 0, '2022/2023'),
  (57, 'EXECUTION D''UN OUVRAGE', 'd53', 3, 0, 0, '2022/2023'),
  (58, 'DESSIN', 'd54', 3, 0, 0, '2022/2023'),
  (59, 'REGLEMENTATION ', 'd55', 3, 0, 0, '2022/2023'),
  (60, 'TP DE TOPOGRAPHIE', 'd56', 3, 0, 0, '2022/2023'),
  (61, 'ETUDE DE PROJET', 'd57', 3, 0, 0, '2022/2023'),
  (62, 'CONFECTION D''UNE MAQUETTE', 'd58', 3, 0, 0, '2022/2023'),
  (63, 'REALISATION D''UN OUVRAGE', 'd59', 3, 0, 0, '2022/2023'),
  (64, 'INSTALLATION ELECTRIQUE', 'd60', 3, 0, 0, '2022/2023'),
  (65, 'TECHNOLOGIE DE COMMANDES DE MACHINES ELEC.', 'd61', 3, 0, 0, '2022/2023'),
  (66, 'ELECTRONIQUE DE PUISSANCE', 'd62', 3, 0, 0, '2022/2023'),
  (67, 'MECANIQUE', 'd63', 3, 0, 0, '2022/2023'),
  (68, 'REALISATION DE PROJET', 'd64', 3, 0, 0, '2022/2023'),
  (69, 'ESSAIS ET MESURES', 'd65', 3, 0, 0, '2022/2023'),
  (70, 'ELECTRONIQUE', 'd66', 3, 0, 0, '2022/2023'),
  (71, 'SCHEMA ET TECHNOLOGIE', 'd67', 3, 0, 0, '2022/2023'),
  (72, 'TECHNOLOGIE DES MICROPROCESSEURS ET ORDI.', 'd68', 3, 0, 0, '2022/2023'),
  (73, 'PRATIQUE DES MICROPROCESSEURS ET ORDI.', 'd69', 3, 0, 0, '2022/2023'),
  (74, 'CONSTRUCTION MECANIQUE', 'd70', 3, 0, 0, '2022/2023'),
  (75, 'COMMANDE NUMERIQUE', 'd71', 3, 0, 0, '2022/2023'),
  (76, 'ANALYSE DE FABRICATION', 'd72', 3, 0, 0, '2022/2023'),
  (77, 'AUTOMATISME', 'd73', 3, 0, 0, '2022/2023'),
  (78, 'ETUDE D''OUTILLAGE OU PLANNING', 'd74', 3, 0, 0, '2022/2023'),
  (79, 'SYSTEME D''INSTALLATION HYDRAULIQUE', 'd96', 3, 0, 0, '2022/2023'),
  (80, 'SYSTEMES AUDIOVISUELS', 'd113', 3, 0, 0, '2022/2023'),
  (81, 'SYSTEMES D''ALARMES', 'd106', 3, 0, 0, '2022/2023'),
  (82, 'SYSTEMES RESEAUX ET TELECOMMUNICATION', 'd108', 3, 0, 0, '2022/2023'),
  (83, 'MAINTENANCE ET INSTALLATION DES SYSTEMES AUDIOVISUELS', 'd109', 3, 0, 0, '2022/2023'),
  (84, 'MAINTENANCE ET INSTALLATION DES SYSTEMES D''ALARMES', 'd110', 3, 0, 0, '2022/2023'),
  (85, 'MAINTENANCE ET INSTALLATION DES SYSTEMES RESEAUX ET TELECOMM', 'd111', 3, 0, 0, '2022/2023'),
  (86, 'MECANIQUE DES FLUIDES', 'd97', 3, 0, 0, '2022/2023'),
  (87, 'TRAVAUX PRATIQUES', 'd75', 3, 0, 0, '2022/2023'),
  (88, 'TRAVAUX PRATIQUES D''ASSAINISSEMENT', 'd98', 3, 0, 0, '2022/2023'),
  (89, 'ETUDE DE CAS', 'd99', 3, 0, 0, '2022/2023'),
  (90, 'CLIMATISATION_VENTILATION', 'd76', 3, 0, 0, '2022/2023'),
  (91, 'TECHNOLOGIE', 'd77', 3, 0, 0, '2022/2023'),
  (92, 'TECHNOLOGIE DES MATERIAUX', 'd95', 3, 0, 0, '2022/2023'),
  (93, 'SCHEMA', 'd78', 3, 0, 0, '2022/2023'),
  (94, 'TRANSFERT TECHNIQUE', 'd79', 3, 0, 0, '2022/2023'),
  (95, 'REFRIGERATION', 'd80', 3, 0, 0, '2022/2023'),
  (96, 'PROCEDES DE FABRICATION', 'd105', 3, 0, 0, '2022/2023'),
  (97, 'MONTAGE ELECTRIQUE ET ELECTRONIQUE', 'd81', 3, 0, 0, '2022/2023'),
  (98, 'TECHNOLOGIE MECANIQUE ET PNEUMATIQUE', 'd104', 3, 0, 0, '2022/2023'),
  (99, 'CIRCUITS ELECTRIQUES-ELECTRONIQUE.', 'd107', 3, 0, 0, '2022/2023'),
  (100, 'CIRCUITS ELECTRIQUES-ELECTRO-FRIGO.', 'd101', 3, 0, 0, '2022/2023'),
  (101, 'MAINTENANCE DES EQUIPEMENTS INDUSTRIELS', 'd102', 3, 0, 0, '2022/2023'),
  (102, 'FABRICATION DES ELEMENTS MECANIQUES', 'd103', 3, 0, 0, '2022/2023'),
  (103, 'MAINTENANCE DES SYSTEMES ELECTIQUES ET PNEUMAIQUES', 'd100', 3, 0, 0, '2022/2023'),
  (104, 'MAINTENANCE DES SYSTEMES ELECTIQUES-ELECTRO-FRIGO.', 'd112', 3, 0, 0, '2022/2023'),
  (105, 'BIOLOGIE ET PHYSIOPATHOLOGIE HUMAINE', 'd82', 2, 0, 0, '2022/2023'),
  (106, 'SANTE PUBLIQUE ET ORGANISATION SANITAIRE', 'd83', 2, 0, 0, '2022/2023'),
  (107, 'GESTION DE LA SECURITE SOCIALE', 'd84', 2, 0, 0, '2022/2023'),
  (108, 'ACTION SOCIALE', 'd85', 2, 0, 0, '2022/2023'),
  (109, 'GESTION DES RES. ET HUM. ET COMMUNICATION', 'd86', 2, 0, 0, '2022/2023'),
  (110, 'LABORATOIRE', 'd89', 2, 0, 0, '2022/2023'),
  (111, 'PSYCHOLOGIE', 'd90', 2, 0, 0, '2022/2023'),
  (112, 'TECHNIQUE DE COMMUNICATION', 'd91', 2, 0, 0, '2022/2023'),
  (113, 'ECONOMIE', 'd92', 2, 0, 0, '2022/2023'),
  (114, 'TRAVAUX PRATIQUES D''ASSAINISSEMENT', 'd114', 3, 0, 0, '2022/2023'),
  (115, 'EXECUTION OUVRAGE', 'd115', 3, 0, 0, '2022/2023'),
  (116, 'PATRONNAGE-GRADATION', 'd116', 3, 0, 0, '2022/2023'),
  (117, 'ANALYSE ET FABRICATION', 'd117', 3, 0, 0, '2022/2023'),
  (118, 'ORGANISATION DU TRAVAIL', 'd118', 3, 0, 0, '2022/2023'),
  (119, 'DESSIN TRACE', 'd119', 3, 0, 0, '2022/2023'),
  (120, 'DESSIN DE MODE', 'd120', 3, 0, 0, '2022/2023'),
  (121, 'DIAGNOSTIC ET REPARATION DES MOTEURS A COMBUSTION INTERNE', 'd121', 3, 0, 0, '2022/2023'),
  (122, 'DIAGNOSTIC ET REPARATION DES SYSTEMES ELECTRIQUES ET ELECTRO', 'd122', 3, 0, 0, '2022/2023'),
  (123, 'DIAGNOSTIC ET REPARATION DES LIAISONS MECANIQUES ET HYDRAULI', 'd123', 3, 0, 0, '2022/2023'),
  (124, 'SUIVI DE LA MAINTENANCE', 'd124', 3, 0, 0, '2022/2023'),
  (125, 'CONSTRUCTION MECANIQUE', 'd125', 3, 0, 0, '2022/2023'),
  (126, 'ORGANISATION ET GESTION DE LA MAINTENANCE', 'd126', 3, 0, 0, '2022/2023'),
  (127, 'TECHNOLOGIE ELECTRIQUE ET ELECTRONIQUE', 'd127', 3, 0, 0, '2022/2023'),
  (128, 'TECHNOLOGIE MECANIQUE', 'd128', 3, 0, 0, '2022/2023'),
  (129, 'CIRCUITS ELECTRIQUES INDUSTRIELS NUMERIQUES', 'd129', 3, 0, 0, '2022/2023'),
  (130, 'MACHINES ELECTRIQUES', 'd130', 3, 0, 0, '2022/2023'),
  (131, 'DESSIN ET TECHNOLOGIE', 'd131', 3, 0, 0, '2022/2023'),
  (132, 'MONTAGE DE CIRCUITS', 'd132', 3, 0, 0, '2022/2023'),
  (133, 'AUTOMATISME ET INFORMATIQUE INDUSTRIELLE', 'd133', 3, 0, 0, '2022/2023'),
  (134, 'TECHNOLOGIE MECANIQUE', 'd134', 3, 0, 0, '2022/2023'),
  (233, 'ALLEMAND+ESPAGNOL', ' ', 1, 0, 0, '2022/2023'),
  (234, 'Mathematiques', ' ', 1, 0, 0, '2022/2023'),
  (235, 'SVTEEH PRATIQUE', ' ', 1, 0, 0, '2023/2024'),
  (236, 'CHIMIE PRATIQUE', ' ', 1, 0, 0, '2023/2024'),
  (237, 'SVTEEHB PRATIQUE', ' ', 1, 0, 0, '2023/2024');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `matiere1`
  --
  
  CREATE TABLE IF NOT EXISTS `matiere1` (
    `codemat` varchar(30) CHARACTER SET utf8 NOT NULL,
    `code` varchar(30) CHARACTER SET utf8 NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `matiere1`
  --
  
  INSERT INTO `matiere1` (`codemat`, `code`) VALUES
  ('', ''),
  ('ORTHOGRAPHE', 'd1'),
  ('REDACTION', 'd2'),
  ('ETUDE_DE_TEXTE', 'd3'),
  ('HISTOIRE', 'd4'),
  ('ECM', 'd6'),
  ('ANGLAIS', 'd7'),
  ('ALLEMAND', 'd8'),
  ('ESPAGNOL', 'd9'),
  ('MATHEMATIQUES', 'd10'),
  ('PHYSIQUE', 'd11'),
  ('CHIMIE', 'd12'),
  ('INFORMATIQUE', 'd13'),
  ('SVTEEHB', 'd14'),
  ('PHILOSOPHIE', 'd15'),
  ('LANGUE', 'd16'),
  ('LITTERATURE', 'd17'),
  ('TRAVAIL_MANUEL', 'd18'),
  ('EX', 'd19'),
  ('PCT', 'd20'),
  ('EPS', 'd21'),
  ('GEOGRAPHIE', 'd22'),
  ('ESF', 'd23');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `moyenne`
  --
  
  CREATE TABLE IF NOT EXISTS `moyenne` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `anens` varchar(15) NOT NULL,
    `moytrim` decimal(10,2) NOT NULL,
    `rgtrim` varchar(4) NOT NULL,
    `codetrim` int(11) NOT NULL,
    `moyeval` decimal(10,2) NOT NULL,
    `rgeval` varchar(4) NOT NULL,
    `codeval` int(11) NOT NULL,
    `moyan` decimal(10,2) NOT NULL,
    `rgan` varchar(4) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `moyenne`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `moyenneannuel`
  --
  
  CREATE TABLE IF NOT EXISTS `moyenneannuel` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `anens` varchar(15) NOT NULL,
    `moyan` decimal(10,2) NOT NULL,
    `rgan` varchar(4) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `moyenneannuel`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `moyennetrim`
  --
  
  CREATE TABLE IF NOT EXISTS `moyennetrim` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `anens` varchar(15) NOT NULL,
    `moytrim` decimal(10,2) NOT NULL,
    `rgtrim` varchar(4) NOT NULL,
    `codetrim` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `moyennetrim`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `moymatieretrim`
  --
  
  CREATE TABLE IF NOT EXISTS `moymatieretrim` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idcl` int(11) NOT NULL,
    `matiere` int(10) NOT NULL,
    `trimestre` int(10) NOT NULL,
    `compose` varchar(5) NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `anens` varchar(12) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `moymatieretrim`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `moymatiereval`
  --
  
  CREATE TABLE IF NOT EXISTS `moymatiereval` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idcl` int(11) NOT NULL,
    `matiere` int(10) NOT NULL,
    `eval` int(10) NOT NULL,
    `trimestre` int(10) NOT NULL,
    `compose` varchar(15) NOT NULL,
    `moy` decimal(10,2) NOT NULL,
    `anens` varchar(12) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `moymatiereval`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `note`
  --
  
  CREATE TABLE IF NOT EXISTS `note` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `note` decimal(10,2) NOT NULL,
    `matiere` int(11) NOT NULL,
    `coef` int(11) NOT NULL,
    `nc` decimal(10,2) NOT NULL,
    `typeval` int(11) NOT NULL,
    `trimestre` int(11) NOT NULL,
    `rgeval` varchar(4) NOT NULL,
    `anens` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `note`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `notegroupeval`
  --
  
  CREATE TABLE IF NOT EXISTS `notegroupeval` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `anens` varchar(15) NOT NULL,
    `notegroup` decimal(10,2) NOT NULL,
    `coef` varchar(4) NOT NULL,
    `nc` decimal(10,2) NOT NULL,
    `idgroup` int(11) NOT NULL,
    `eval` int(11) NOT NULL,
    `rg` varchar(4) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `notegroupeval`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `notegrouptrim`
  --
  
  CREATE TABLE IF NOT EXISTS `notegrouptrim` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `anens` varchar(15) NOT NULL,
    `notegroup` decimal(10,2) NOT NULL,
    `coef` varchar(4) NOT NULL,
    `nc` decimal(10,2) NOT NULL,
    `idgroup` int(11) NOT NULL,
    `trimestre` int(11) NOT NULL,
    `rg` varchar(4) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `notegrouptrim`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `notenew`
  --
  
  CREATE TABLE IF NOT EXISTS `notenew` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `note` decimal(10,2) NOT NULL,
    `matiere` int(11) NOT NULL,
    `idcomp` int(11) NOT NULL,
    `numero` int(10) NOT NULL,
    `typeval` varchar(11) NOT NULL,
    `trimestre` int(11) NOT NULL,
    `rgeval` varchar(4) NOT NULL,
    `anens` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `notenew`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `notetrimestre`
  --
  
  CREATE TABLE IF NOT EXISTS `notetrimestre` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matricule` varchar(30) NOT NULL,
    `idcl` int(11) NOT NULL,
    `note` decimal(10,2) NOT NULL,
    `matiere` int(11) NOT NULL,
    `coef` int(11) NOT NULL,
    `nc` decimal(10,2) NOT NULL,
    `trimestre` int(11) NOT NULL,
    `rgtrim` varchar(4) NOT NULL,
    `anens` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `notetrimestre`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `periode`
  --
  
  CREATE TABLE IF NOT EXISTS `periode` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(20) NOT NULL,
    `duree` varchar(4) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;
  
  --
  -- Contenu de la table `periode`
  --
  
  INSERT INTO `periode` (`id`, `nom`, `duree`) VALUES
  (1, '7H30-8H25', '1'),
  (2, '8H25-9H20', '1'),
  (3, '9H20-10H15', '1'),
  (4, '10H15-10H30', '0.25'),
  (5, '10H30-11H25', '1'),
  (6, '11H25-12H20', '1'),
  (7, '12H20-13H15', '1'),
  (8, '13H15-13H45', '0.5'),
  (9, '13H45-14H40', '1'),
  (10, '14H40-15H35', '1'),
  (11, '15H35-16H30', '1'),
  (12, '16H30-17H25', '1'),
  (13, '6H45-7H30', '0.75'),
  (14, '8H00-9H00', '1'),
  (15, '9H00-10H00', '1'),
  (16, '10H30-11H30', '1'),
  (17, '11H30-12H30', '1');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `periodesal`
  --
  
  CREATE TABLE IF NOT EXISTS `periodesal` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(40) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;
  
  --
  -- Contenu de la table `periodesal`
  --
  
  INSERT INTO `periodesal` (`id`, `nom`) VALUES
  (1, '01 Septembre au 05 Octobre'),
  (2, '06 Octobre au 05 Novembre'),
  (3, '06 Novembre au 05 DÃ¨cembre'),
  (4, '06 DÃ¨cembre au 05 Janvier'),
  (5, '06 Janvier au 05 FÃ©vrier'),
  (6, '06 FÃ©vrier au 05 Mars'),
  (7, '06 Mars au 05 Avril'),
  (8, '06 Avril au 05 Mai'),
  (9, '06 Mai au 05 Juin'),
  (10, '06 Juin au 05 Juillet');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `pointage`
  --
  
  CREATE TABLE IF NOT EXISTS `pointage` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idens` int(11) NOT NULL,
    `idpe` int(5) NOT NULL,
    `heurp` int(10) NOT NULL,
    `datep` varchar(15) NOT NULL,
    `heurenreg` varchar(12) NOT NULL,
    `idempl` int(11) NOT NULL,
    `idemplmodif` int(11) NOT NULL,
    `datemodif` varchar(15) NOT NULL,
    `an` varchar(15) NOT NULL,
    `taux` int(11) NOT NULL,
    `fixe` int(11) NOT NULL,
    `nomens` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
  
  --
  -- Contenu de la table `pointage`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `pourcentagematieretrim`
  --
  
  CREATE TABLE IF NOT EXISTS `pourcentagematieretrim` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idcl` int(11) NOT NULL,
    `matiere` int(10) NOT NULL,
    `trimestre` int(10) NOT NULL,
    `compose` varchar(5) NOT NULL,
    `pct` decimal(10,2) NOT NULL,
    `anens` varchar(12) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `pourcentagematieretrim`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `pourcentagematiereval`
  --
  
  CREATE TABLE IF NOT EXISTS `pourcentagematiereval` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idcl` int(11) NOT NULL,
    `matiere` int(10) NOT NULL,
    `eval` int(10) NOT NULL,
    `trimestre` int(10) NOT NULL,
    `compose` varchar(15) NOT NULL,
    `pct` decimal(10,2) NOT NULL,
    `anens` varchar(12) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `pourcentagematiereval`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `proof`
  --
  
  CREATE TABLE IF NOT EXISTS `proof` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(50) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `ancien` varchar(255) CHARACTER SET utf8 NOT NULL,
    `nouveau` varchar(255) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `proof`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `proofdetail`
  --
  
  CREATE TABLE IF NOT EXISTS `proofdetail` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idpaiem` int(255) NOT NULL,
    `matelev` varchar(50) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `ancien` varchar(255) CHARACTER SET utf8 NOT NULL,
    `nouveau` varchar(255) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `proofdetail`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `proofmodifdetail`
  --
  
  CREATE TABLE IF NOT EXISTS `proofmodifdetail` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idpaiem` int(255) NOT NULL,
    `matelev` varchar(50) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `ancien` varchar(500) CHARACTER SET utf8 NOT NULL,
    `nouveau` varchar(500) CHARACTER SET utf8 NOT NULL,
    `date` varchar(15) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(15) CHARACTER SET utf8 NOT NULL,
    `idresp` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `proofmodifdetail`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `prorogation`
  --
  
  CREATE TABLE IF NOT EXISTS `prorogation` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `date` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `prorogation`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `remise`
  --
  
  CREATE TABLE IF NOT EXISTS `remise` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nom` varchar(20) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;
  
  --
  -- Contenu de la table `remise`
  --
  
  INSERT INTO `remise` (`id`, `nom`) VALUES
  (2, 'PI'),
  (3, 'PP'),
  (5, 'PS'),
  (7, 'BS');
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `retard`
  --
  
  CREATE TABLE IF NOT EXISTS `retard` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(20) NOT NULL,
    `matiere` varchar(15) NOT NULL,
    `anelev` varchar(12) NOT NULL,
    `id_etab` int(11) NOT NULL,
    `trimestre` int(11) NOT NULL,
    `duree` varchar(7) NOT NULL,
    `dateabs` varchar(20) NOT NULL,
    `datenreg` varchar(15) NOT NULL,
    `heurenreg` varchar(30) NOT NULL,
    `typeutil` int(11) NOT NULL,
    `idleiter` int(11) NOT NULL,
    `motensgt` varchar(30) NOT NULL,
    `nomenreg` varchar(40) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `retard`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `salaire`
  --
  
  CREATE TABLE IF NOT EXISTS `salaire` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idens` int(11) NOT NULL,
    `idpe` int(5) NOT NULL,
    `montant` decimal(10,2) NOT NULL,
    `datep` varchar(15) NOT NULL,
    `heurenreg` varchar(12) NOT NULL,
    `idempl` int(11) NOT NULL,
    `idemplmodif` int(11) NOT NULL,
    `datemodif` varchar(15) NOT NULL,
    `an` varchar(15) NOT NULL,
    `taux` int(11) NOT NULL,
    `nomens` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
  
  --
  -- Contenu de la table `salaire`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `salaireadmin`
  --
  
  CREATE TABLE IF NOT EXISTS `salaireadmin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idadmin` int(11) NOT NULL,
    `idpe` int(5) NOT NULL,
    `montant` decimal(10,2) NOT NULL,
    `salaire` decimal(10,2) NOT NULL,
    `datep` varchar(15) NOT NULL,
    `heurenreg` varchar(12) NOT NULL,
    `idempl` int(11) NOT NULL,
    `idemplmodif` int(11) NOT NULL,
    `datemodif` varchar(15) NOT NULL,
    `an` varchar(15) NOT NULL,
    `taux` int(11) NOT NULL,
    `nomens` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `salaireadmin`
  --
  
  
   --
  -- Structure de la table `salle`
  --
  CREATE TABLE IF NOT EXISTS `salle` (
  `idsal` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) CHARACTER SET utf8 NOT NULL,
  `idb` int(11) NOT NULL,
  `nbanc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `nbanconfor` varchar(10) CHARACTER SET utf8 NOT NULL,
  `carrelage` varchar(50) CHARACTER SET utf8 NOT NULL,
  `plafond` varchar(50) CHARACTER SET utf8 NOT NULL,
  `baievitre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `peinture` varchar(50) CHARACTER SET utf8 NOT NULL,
  `chaleur` varchar(50) CHARACTER SET utf8 NOT NULL,
  `eclairage` varchar(50) CHARACTER SET utf8 NOT NULL,
  `noteconf` varchar(11) CHARACTER SET utf8 NOT NULL,
  `notestruct` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idsal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ; 
 --
  -- Contenu de la table `salle`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `schuler`
  --
  
  CREATE TABLE IF NOT EXISTS `schuler` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` varchar(20) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(5) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
    `telev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `cout` varchar(30) CHARACTER SET utf8 NOT NULL,
    `total` varchar(30) CHARACTER SET utf8 NOT NULL,
    `reste` varchar(30) CHARACTER SET utf8 NOT NULL,
    `date` varchar(30) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs1` int(11) DEFAULT NULL,
    `date1` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs2` int(11) DEFAULT NULL,
    `date2` varchar(30) CHARACTER SET utf8 NOT NULL,
    `abs3` int(11) DEFAULT NULL,
    `date3` varchar(30) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `schuler`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `schulerdetail`
  --
  
  CREATE TABLE IF NOT EXISTS `schulerdetail` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `matelev` int(11) NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `statut` varchar(5) CHARACTER SET utf8 NOT NULL,
    `frais` varchar(20) CHARACTER SET utf8 NOT NULL,
    `remise` varchar(5) CHARACTER SET utf8 NOT NULL,
    `montant` varchar(30) CHARACTER SET utf8 NOT NULL,
    `date` varchar(30) CHARACTER SET utf8 NOT NULL,
    `heure` varchar(30) CHARACTER SET utf8 NOT NULL,
    `idempl` int(11) NOT NULL,
    `typerem` varchar(30) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `schulerdetail`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `sector`
  --
  
  CREATE TABLE IF NOT EXISTS `sector` (
    `ids` int(11) NOT NULL AUTO_INCREMENT,
    `idb` int(11) NOT NULL,
    `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `an` varchar(10) NOT NULL,
    `idsurv` int(11) NOT NULL,
    PRIMARY KEY (`ids`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `sector`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `sortie`
  --
  
  CREATE TABLE IF NOT EXISTS `sortie` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `descr` varchar(50) NOT NULL,
    `qte` varchar(10) NOT NULL,
    `total` varchar(15) NOT NULL,
    `id_etab` int(11) NOT NULL,
    `an` varchar(10) NOT NULL,
    `idempl` int(11) NOT NULL,
    `date` varchar(15) NOT NULL,
    `desti` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  --
  -- Contenu de la table `sortie`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `sujet`
  --
  
  CREATE TABLE IF NOT EXISTS `sujet` (
    `idsuj` int(11) NOT NULL AUTO_INCREMENT,
    `idmat` int(11) NOT NULL,
    `idcl` int(11) NOT NULL,
    `idtrim` int(11) NOT NULL,
    `ideva` int(11) NOT NULL,
    `nom` varchar(60) NOT NULL,
    `extension` varchar(10) NOT NULL,
    `anens` varchar(10) NOT NULL,
    `typeresp` int(11) NOT NULL,
    `idresp` int(11) NOT NULL,
    `datesuj` varchar(10) NOT NULL,
    `heuresuj` varchar(10) NOT NULL,
    `sup` int(11) NOT NULL,
    PRIMARY KEY (`idsuj`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
  
  --
  -- Contenu de la table `sujet`
  --
  
  INSERT INTO `sujet` (`idsuj`, `idmat`, `idcl`, `idtrim`, `ideva`, `nom`, `extension`, `anens`, `typeresp`, `idresp`, `datesuj`, `heuresuj`, `sup`) VALUES
  (1, 233, 16, 1, 1, 'ALL__3ALL+ESP_Eval1.docx', '.docx', '2023/2024', 2, 1, '2023-09-09', '19:59', 1);
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `trim1`
  --
  
  CREATE TABLE IF NOT EXISTS `trim1` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(30) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(30) CHARACTER SET utf8 NOT NULL,
    `mtrim` decimal(10,2) NOT NULL,
    `rgtrim` varchar(10) CHARACTER SET utf8 NOT NULL,
    `rpm1` decimal(10,2) NOT NULL,
    `rpm2` decimal(10,2) NOT NULL,
    `rpm3` decimal(10,2) NOT NULL,
    `rg1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `rg2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `myen` decimal(10,2) NOT NULL,
    `tlitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `colitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `mlitt` decimal(10,2) NOT NULL,
    `rglitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `tsc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `cosc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `msc` decimal(10,2) NOT NULL,
    `rgsc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `tcul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `cocul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `mcul` decimal(10,2) NOT NULL,
    `rgcul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` decimal(10,2) NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` decimal(10,2) NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` decimal(10,2) NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` decimal(10,2) NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` decimal(10,2) NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` decimal(10,2) NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` decimal(10,2) NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` decimal(10,2) NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` decimal(10,2) NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` decimal(10,2) NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` decimal(10,2) NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` decimal(10,2) NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` decimal(10,2) NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` decimal(10,2) NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` decimal(10,2) NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` decimal(10,2) NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` decimal(10,2) NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` decimal(10,2) NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` decimal(10,2) NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` decimal(10,2) NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` decimal(10,2) NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` decimal(10,2) NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` decimal(10,2) NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `trim1`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `trim2`
  --
  
  CREATE TABLE IF NOT EXISTS `trim2` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(30) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(30) CHARACTER SET utf8 NOT NULL,
    `mtrim` decimal(10,2) NOT NULL,
    `rgtrim` varchar(10) CHARACTER SET utf8 NOT NULL,
    `rpm1` decimal(10,2) NOT NULL,
    `rpm2` decimal(10,2) NOT NULL,
    `rpm3` decimal(10,2) NOT NULL,
    `rg1` varchar(5) CHARACTER SET utf8 NOT NULL,
    `rg2` varchar(5) CHARACTER SET utf8 NOT NULL,
    `myen` decimal(10,2) NOT NULL,
    `tlitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `colitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `mlitt` decimal(10,2) NOT NULL,
    `rglitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `tsc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `cosc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `msc` decimal(10,2) NOT NULL,
    `rgsc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `tcul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `cocul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `mcul` decimal(10,2) NOT NULL,
    `rgcul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` decimal(10,2) NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2` decimal(10,2) NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3` decimal(10,2) NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4` decimal(10,2) NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5` decimal(10,2) NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6` decimal(10,2) NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7` decimal(10,2) NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8` decimal(10,2) NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9` decimal(10,2) NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10` decimal(10,2) NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11` decimal(10,2) NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12` decimal(10,2) NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13` decimal(10,2) NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14` decimal(10,2) NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15` decimal(10,2) NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16` decimal(10,2) NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17` decimal(10,2) NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18` decimal(10,2) NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19` decimal(10,2) NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20` decimal(10,2) NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21` decimal(10,2) NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22` decimal(10,2) NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` decimal(10,2) NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `trim2`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `trim3`
  --
  
  CREATE TABLE IF NOT EXISTS `trim3` (
    `matelev` varchar(15) CHARACTER SET utf8 NOT NULL,
    `nomelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `preelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `datelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveauelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `niveau` varchar(30) CHARACTER SET utf8 NOT NULL,
    `anelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `sexelev` varchar(30) CHARACTER SET utf8 NOT NULL,
    `id_etab` int(11) NOT NULL,
    `total` varchar(30) CHARACTER SET utf8 NOT NULL,
    `coef` varchar(30) CHARACTER SET utf8 NOT NULL,
    `mtrim` decimal(10,2) NOT NULL,
    `rgtrim` varchar(10) CHARACTER SET utf8 NOT NULL,
    `rpm5` decimal(10,2) NOT NULL,
    `rg5` varchar(5) CHARACTER SET utf8 NOT NULL,
    `rptrim1` decimal(10,2) NOT NULL,
    `rptrim2` decimal(10,2) NOT NULL,
    `manuel` decimal(10,2) NOT NULL,
    `rgan` varchar(5) CHARACTER SET utf8 NOT NULL,
    `myen` varchar(5) CHARACTER SET utf8 NOT NULL,
    `tlitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `colitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `mlitt` decimal(10,2) NOT NULL,
    `rglitt` varchar(5) CHARACTER SET utf8 NOT NULL,
    `tsc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `cosc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `msc` decimal(10,2) NOT NULL,
    `rgsc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `tcul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `cocul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `mcul` decimal(10,2) NOT NULL,
    `rgcul` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1` decimal(10,2) NOT NULL,
    `d1coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d1pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d2` decimal(10,2) NOT NULL,
    `d2coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d2pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d3` decimal(10,2) NOT NULL,
    `d3coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d3pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d4` decimal(10,2) NOT NULL,
    `d4coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d4pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d5` decimal(10,2) NOT NULL,
    `d5coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d5pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d6` decimal(10,2) NOT NULL,
    `d6coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d6pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d7` decimal(10,2) NOT NULL,
    `d7coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d7pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d8` decimal(10,2) NOT NULL,
    `d8coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d8pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d9` decimal(10,2) NOT NULL,
    `d9coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d9pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d10` decimal(10,2) NOT NULL,
    `d10coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d10pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d11` decimal(10,2) NOT NULL,
    `d11coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d11pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d12` decimal(10,2) NOT NULL,
    `d12coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d12pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d13` decimal(10,2) NOT NULL,
    `d13coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d13pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d14` decimal(10,2) NOT NULL,
    `d14coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d14pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d15` decimal(10,2) NOT NULL,
    `d15coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d15pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d16` decimal(10,2) NOT NULL,
    `d16coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d16pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d17` decimal(10,2) NOT NULL,
    `d17coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d17pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d18` decimal(10,2) NOT NULL,
    `d18coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d18pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d19` decimal(10,2) NOT NULL,
    `d19coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d19pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d20` decimal(10,2) NOT NULL,
    `d20coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d20pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d21` decimal(10,2) NOT NULL,
    `d21coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d21pct` varchar(6) CHARACTER SET utf8 NOT NULL,
    `d22` decimal(10,2) NOT NULL,
    `d22coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d22pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23` decimal(10,2) NOT NULL,
    `d23coef` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23dec` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23nc` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23rg` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23moycl` varchar(5) CHARACTER SET utf8 NOT NULL,
    `d23pct` varchar(5) CHARACTER SET utf8 NOT NULL,
    `nbrmat` varchar(2) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`matelev`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  --
  -- Contenu de la table `trim3`
  --
  
  
  -- --------------------------------------------------------
  
  --
  -- Structure de la table `trimestre`
  --
  
  CREATE TABLE IF NOT EXISTS `trimestre` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `code` int(11) NOT NULL,
    `nom` varchar(15) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
  
  --
  -- Contenu de la table `trimestre`
  --
  
  INSERT INTO `trimestre` (`id`, `code`, `nom`) VALUES
  (1, 1, 'TRIMESTRE 1'),
  (2, 2, 'TRIMESTRE 2'),
  (3, 3, 'TRIMESTRE 3');
  ";

  return $sql;
}
?>