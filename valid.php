<?PHP
$error = "Veuillez vous connectez pour valider votre panier\n";
$ok = "OK\n";
$dejavu = 0;
$path = "./basket";
$file = $path . "/basket_cookie.txt";

session_start();
include("connect.php");
// header('Location: index.php');

if ($_SESSION[loggued_on_user] != "" && file_exists($file) === TRUE)
{
	$time = time();
	$table1 = $time . "_" . $_SESSION[loggued_on_user];
	// echo "    table = " . $table1;
	if (!$mysqli->query("DROP TABLE IF EXISTS $table1") ||
	    !$mysqli->query("CREATE TABLE $table1 (id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, id_prod INT NOT NULL, quantity INT NOT NULL, price_unity INT NOT NULL, price_total INT NOT NULL)"))
	    echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;


	$tab = file_get_contents($file);
	$unsecur = unserialize($tab);
	foreach ($unsecur as $value)
	{
		$id_prod = $value["id_prod"];
		$nb = $value["nb"];
		$price = $value['price'];
		$total = $price * $nb;

		$v_products = "(" . $id_prod . ", " . $nb . ", " . $price . ", " . $total . ")";
		// echo $v_products;
		if (!$mysqli->query("INSERT INTO $table1 (id_prod, quantity, price_unity, price_total) VALUES $v_products"))
			echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;

	}
	echo "Commande validée !";
	unlink($file);
}
else {
	echo $error;
}
echo "<A HREF='index.php'>Retour</A>";
?>
