<?PHP
include("connect.php");

if (isset($_POST["submit"]) && isset($_POST["id"]) && $_POST["submit"] == "OK")
{
	header('Location: admin.php');
	$id = $_POST["id"];
	if ($_POST["submit"] != NULL && $_POST["name"] != NULL)
	{
		$name = $_POST["name"];
		if (!$mysqli->query("UPDATE produit SET name = '$name' WHERE id = $id"))
			echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
		else
			echo "name change OK<BR />";
	}

	if ($_POST["submit"] != NULL && $_POST["price"] != NULL)
	{
		$price = $_POST["price"];

		if (!$mysqli->query("UPDATE produit SET price = $price WHERE id = $id"))
			echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
		else
			echo "price change OK";
	}
}
?>
