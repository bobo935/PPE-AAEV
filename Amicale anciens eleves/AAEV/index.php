<?php
session_start();
require_once("util/fonctions.inc.php");
require_once("util/class.pdoAaev.inc.php");
include("vues/v_entete.php") ;
if(isset($_SESSION['util']))
{
    echo $_SESSION['util'];
    include("vues/v_bandeau.php") ;
}

if(!isset($_REQUEST['uc']))
     $uc = 'administrer';
else
	$uc = $_REQUEST['uc'];

$pdo = PdoAaev::getPdoAaev();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'voirOffres' :
		{include("controleurs/c_voirOffres.php");break;}
	case 'administrer' :
	  { include("controleurs/c_gestionUtil.php");break;  }
}
include("vues/v_pied.php") ;
?>

