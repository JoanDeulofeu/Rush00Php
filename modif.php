<?PHP
$path = "./private";
$passwd = $path . "/passwd";
$error = "ERROR\n";
$ok = "OK\n";
$change = FALSE;
$dejavu = FALSE;
$i = -1;

if (isset($_POST["oldpw"]) && isset($_POST["newpw"]) && isset($_POST["login"]) && isset($_POST["submit"]) && $_POST["submit"] == "OK")
{
	header('Location: login.html');
	$oldpw = hash('whirlpool', $_POST['oldpw']);
	$newpw = hash('whirlpool', $_POST['newpw']);
	if (file_exists($path) === FALSE || file_exists($passwd) === FALSE) //si fichier existe pas
		echo $error;
	else
	{
		$str = file_get_contents($passwd);
		$tab = unserialize($str);
		foreach ($tab as $value)
		{
			$i++;
			if ($value["login"] === $_POST["login"])
			{
				$dejavu = TRUE;
				if ($value["passwd"] === $oldpw)
				{
					$change = TRUE;
					$tab[$i]["passwd"] = $newpw;
				}
				else
					echo $error;
			}
		}
		if ($dejavu === FALSE)
			echo $error;
		if ($change === TRUE)
		{
			$secur = serialize($tab);
			file_put_contents($passwd, $secur);
			echo $ok;
		}
	}
}
else
	echo $error;


?>
