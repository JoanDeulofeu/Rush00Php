<?PHP
include("connect.php");

$path = "./basket";
$file = $path . "/basket_cookie.txt";
$dejavu = 0;
$where = 0;

// header('Location: test.php');
$idpro = $_POST['id_prod'];
$price = mysqli_fetch_row($mysqli->query("SELECT price FROM `produit` WHERE id = $idpro"));

if (file_exists($path) === TRUE && file_exists($file) === TRUE) //si fichier existe pas
{
	$tab = file_get_contents($file);
	$unsecur = unserialize($tab);
	print_r($unsecur);
	echo '<HTML>
	<BODY>
	<BR />
	</BODY>
	</HTML>';
	foreach ($unsecur as $value)
	{
		if ($value["id_prod"] == $_POST['id_prod'])
		{
			$dejavu = 1;
			$i = $value["nb"];
			$e = intval($i) - 1;
			echo $i;
			echo $e;
			$value["nb"] = $e;
			$i = $value["nb"];
			$e = $where;
		}
		$where++;
	}
	if ($dejavu == 1 && $i == 0) //si quantite == 0, suppr article
		unset($unsecur[$e]);
	if ($dejavu == 1 && $i != 0)
		$unsecur[$e]["nb"] = $i;
	print_r($unsecur);
	$secur = serialize($unsecur);
	file_put_contents($file, $secur);
}
?>

<HTML>
	<HEAD>
		<script>history.back();</script>
	</HEAD>
	<BODY></BODY>
</HTML>
