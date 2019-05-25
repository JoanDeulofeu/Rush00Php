<?PHP
function auth($login, $passwd)
{
	$path = "../private";
	$pathpass = $path . "/passwd";
	$error = "ERROR\n";
	$ok = "OK\n";
	$password = hash('whirlpool', $passwd);
	if ($login !== NULL && $passwd !== NULL && file_exists($pathpass))
	{
		$str = file_get_contents($pathpass);
		$tab = unserialize($str);
		foreach ($tab as $value)
		{
			if ($value["login"] === $login && $value["passwd"] === $password)
				return (TRUE);
		}
		return (FALSE);
	}
}
?>
