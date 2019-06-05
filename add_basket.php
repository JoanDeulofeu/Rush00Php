<?PHP
include("connect.php");

$path = "./basket";
$file = $path . "/basket_cookie.txt";
$dejavu = 0;
$where = 0;

// header('Location: test.php');
$idpro = $_POST['id_prod'];
$price = mysqli_fetch_row($mysqli->query("SELECT price FROM `produit` WHERE id = $idpro"));
if (file_exists($path) === FALSE) //si dossier existe pas
	mkdir($path, 0777, true);
if (file_exists($file) === FALSE) //si fichier existe pas
{
	$tab = array('id_prod'=>$_POST['id_prod'], 'nb'=>'1', 'price'=>$price[0]);
	// print_r($tab);
	$secur = serialize(array($tab));
	file_put_contents($file, $secur);
}
else
{
	$tab = file_get_contents($file);
	$unsecur = unserialize($tab);
	foreach ($unsecur as $value)
	{
		if ($value["id_prod"] == $_POST['id_prod'])
		{
			$dejavu = 1;
			$i = $value["nb"];
			$e = intval($i) + 1;
			$value["nb"] = $e;
			$i = $value["nb"];
			$e = $where;
		}
		$where++;
	}
	if ($dejavu == 1)
		$unsecur[$e]["nb"] = $i;
	if ($dejavu == 0)
	{
		$newtab = array('id_prod'=>$_POST['id_prod'], 'nb'=>'1', 'price'=>$price[0]);
		$unsecur[] = $newtab;
		$secur = serialize($unsecur);
		file_put_contents($file, $secur);
	}
	else
	{
		$secur = serialize($unsecur);
		file_put_contents($file, $secur);
	}
}
?>

<HTML>
	<HEAD>
		<script>history.back();</script>
	</HEAD>
	<BODY></BODY>
</HTML>
