<?PHP
$path = "./private";
$passwd = $path . "/passwd";
$error = "ERROR\n";
$ok = "OK\n";
$dejavu = 0;

if (isset($_POST["submit"]) && isset($_POST["passwd"]) && isset($_POST["login"]) && $_POST["submit"] == "OK")
{
	header('Location: login.html');
	$psw = hash('whirlpool', $_POST["passwd"]);
	if (file_exists($path) === FALSE) //si dossier existe pas
		mkdir($path, 0777, true);
	if ($_POST["submit"] != NULL && $_POST["passwd"] != NULL && $_POST["login"] != NULL)
	{
		if (file_exists($passwd) === FALSE) //si fichier existe pas
		{
			$tab = array('login'=>$_POST['login'], 'passwd'=>$psw);
			$secur = serialize(array($tab));
			file_put_contents($passwd, $secur);
			echo $ok;
		}
		else
		{
			$tab = file_get_contents($passwd);
			$unsecur = unserialize($tab);
			foreach ($unsecur as $value)
			{
				if ($value["login"] == $_POST["login"])
					$dejavu = 1;
			}
			if ($dejavu == 1) // si le login existe deja
				echo $error;
			else
			{
				$tab = array('login'=>$_POST['login'], 'passwd'=>$psw);
				$unsecur[] = $tab;
				$secur = serialize($unsecur);
				file_put_contents($passwd, $secur);
				echo $ok;
			}
		}
	}
	else
		echo $error;
}
?>
