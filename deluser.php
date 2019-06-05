<?PHP
$path = "./private";
$login = $path . "/passwd";
$i = 0;

header('Location: admin.php');

if ($_POST["id"] != NULL && $_POST["submit"] == "OK")
{
	$tab = file_get_contents($login);
	$unsecur = unserialize($tab);
	foreach ($unsecur as $value)
	{
		if ($value["login"] == $_POST["id"])
			$save = $i;
	$i++;
	}
	unset ($unsecur[$save]);
	$secur = serialize($unsecur);
	file_put_contents($login, $secur);
}
?>
