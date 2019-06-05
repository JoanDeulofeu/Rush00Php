<?PHP
include("connect.php");

if (isset($_POST["submit"]) && isset($_POST["id"]) && $_POST["submit"] == "OK")
{
	header('Location: admin.php');
	if ($_POST["submit"] != NULL && $_POST["id"] != NULL)
	{
		$id = $_POST["id"];
		if (!$mysqli->query("DELETE FROM produit WHERE id = '$id'"))
			echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
		else
			echo "delete id" . $id . " OK<BR />";
	}
}
?>
