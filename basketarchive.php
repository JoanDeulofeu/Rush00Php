<?PHP
include("connect.php");

$all = mysqli_fetch_all ($mysqli->query("SHOW TABLES FROM rush00 LIKE '1%'"));

$tab = array();
foreach ($all as $commande)
{
	$tab[] = $commande[0];
}
// print_r($tab);

foreach ($tab as $commande)
{
	$save = 0;
	$tmp = mysqli_fetch_all($mysqli->query("SELECT * FROM `$commande`"));
	// print_r($tmp);
	echo "<H1>Nom de la commande: ";
	echo $commande;
	echo "</H1>";
	foreach ($tmp as $value)
	{
		// print_r($value);

		echo "<BR />Id du produit: ";
		echo $value[1];
		echo "<BR />Quantite commandée: ";
		echo $value[2];
		echo "<BR />Prix total du produit: ";
		echo $value[4];
		$save += $value[4];
	}
	echo "<BR /><H4>Prix total de la commande: ";
	echo $save;
	echo "</H4><BR /><BR />";
}
	echo "<a HREF='admin.php'>Retour page admin</a>";
?>
