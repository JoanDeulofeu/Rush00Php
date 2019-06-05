<?PHP
include("connect.php");

if (isset($_POST["submit"]) && isset($_POST["name"]) && $_POST["submit"] == "OK")
{
	header('Location: admin.php');
	if ($_POST["submit"] != NULL && $_POST["name"] != NULL)
	{
		$new_cat = $_POST["name"];
		if (!$mysqli->query("INSERT INTO categorie (name) VALUES ('$new_cat')"))
			echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
		else
			echo "OK";
	}
}
?>
