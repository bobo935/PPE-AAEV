<?php
if(!isset($_REQUEST['action']))
    $action = 'connexion';
 else
	$action = $_REQUEST['action'];

switch($action)
{
	case 'connexion':
	{
		include("vues/v_connexion.php");
	}
	break;
	case 'traitement':
	{
		$pseudo=$_POST['pseudo'];
		$mdp=$_POST['passe'];
  		$laConnexion = $pdo->connexion($pseudo,$mdp);
		
		if($laConnexion==1)
		{
			header("Location:index.php?uc=accueil");
			$_SESSION['util']='ok';
			//$_REQUEST['action']='accueil';
		}
		else
		{
			include("vues/v_404.php");
		}

  		break;
	}
        case 'deconnexion':
	{
            session_unset();
            // Détruit toutes les variables de session
            $_SESSION = array();
            
            
            // Si vous voulez détruire complètement la session, effacez également
            // le cookie de session.
            // Note : cela détruira la session et pas seulement les données de session !
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finalement, on détruit la session.
            session_destroy();
            header("Location:index.php");
	}
	break;
	
	
}
?>