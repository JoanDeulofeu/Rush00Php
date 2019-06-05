<?PHP
include("connect.php");

if (isset($_POST["submit"]) && isset($_POST["name"]) && $_POST["submit"] == "OK")
{
	header('Location: admin.php');
	if ($_POST["submit"] != NULL && $_POST["name"] != NULL)
	{
		$del_cat = $_POST["name"];
		if (!$mysqli->query("DELETE FROM `categorie` WHERE name = '$del_cat'"))
			echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
		else
			echo "OK";
	}
}
?>
