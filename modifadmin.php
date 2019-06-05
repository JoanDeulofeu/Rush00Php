<?PHP
$path = "./private";
$passwd = $path . "/passwd";
$error1 = "ERROR1\n";
$error2 = "ERROR2\n";
$error3 = "ERROR3\n";
$ok = "OK\n";
$change = FALSE;
$dejavu = FALSE;
$i = -1;

if (isset($_POST["login"]) && isset($_POST["submit"]) && $_POST["submit"] == "OK")
{
	header('Location: admin.php');
	if ($_POST["newlogin"] != NULL)
		$newlogin = $_POST["newlogin"];
	if ($_POST["newpasswd"] != NULL)
		$newpw = hash('whirlpool', $_POST["newpasswd"]);
	if (file_exists($path) === FALSE || file_exists($passwd) === FALSE) //si fichier existe pas
		echo $error1;
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
				if ($_POST["newlogin"] != NULL)
				{
					$change = TRUE;
					$tab[$i]["login"] = $newlogin;
				}
				if ($_POST["newpasswd"] != NULL)
				{
					$change = TRUE;
					$tab[$i]["passwd"] = $newpw;
				}

			}
		}
		if ($dejavu === FALSE)
			echo $error2;
		if ($change === TRUE)
		{
			$secur = serialize($tab);
			file_put_contents($passwd, $secur);
			echo $ok;
		}
	}
}
else
	echo $error3;


?>
