<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application AAEV
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoAaev qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoAaev
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=aaev2';   		
      	private static $user='root' ;    		
      	private static $mdp='root' ;	
		private static $monPdo;
		private static $monPdoAaev = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoAaev::$monPdo = new PDO(PdoAaev::$serveur.';'.PdoAaev::$bdd, PdoAaev::$user, PdoAaev::$mdp); 
			PdoAaev::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoAaev::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoAaev = PdoAaev::getPdoAaev();
 * @return l'unique objet de la classe PdoAaev
 */
	public  static function getPdoAaev()
	{
		if(PdoAaev::$monPdoAaev == null)
		{
			PdoAaev::$monPdoAaev= new PdoAaev();
		}
		return PdoAaev::$monPdoAaev;  
	}

/**
 * Retourne sous forme d'un tableau associatif toutes les offres
 * 
 * @return un tableau associatif  
*/	
	public function getLesOffres()
	{
	    $req="select * from proposition";
		$res = PdoAaev::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
/**
* Retourne le nombre de lignes ayant le couple pseudo+mdp
* @param pseudo
* @param mot de passe
* @return un nombre 0 ou 1
*/
	public function connexion($pseudo,$mdp)
	{
	    $req="select count(*)as nombre from ancien where pseudo='$pseudo' and motDePasse='$mdp'";
		var_dump($req);
		$res = PdoAaev::$monPdo->query($req);
		$ligne = $res->fetch();
		return $ligne['nombre']; 
	}
}

?>