<?PHP
include("connect.php");

if (isset($_POST["submit"]) && isset($_POST["name"]) && $_POST["submit"] == "OK")
{
	header('Location: admin.php');
	if ($_POST["submit"] != NULL && $_POST["name"] != NULL)
	{
		$name = $_POST["name"];
		$price = $_POST["price"];
		$cat = $_POST["id_cat"];
		if ($_POST["id_season"] != NULL)
			$season = $_POST["id_season"];
		else
			$season = "NULL";

		$v_products = "('" . $name . "', " . $price . ", " . $cat . ", " . $season . ")";
		echo $v_products;
		if (!$mysqli->query("INSERT INTO produit (name, price, id_cat, id_season) VALUES $v_products"))
			echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
		else
			echo " OK";
	}
}
?>
