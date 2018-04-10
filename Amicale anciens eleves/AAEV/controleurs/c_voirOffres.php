

<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirLesOffres':
	{
  		$lesOffres = $pdo->getLesOffres();
		include("vues/v_lesOffres.php");
  		break;
	}
	
	
}
?>

