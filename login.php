<?PHP
include ('auth.php');

$path = "./private";
$passwd = $path . "/passwd";
$error = "ERROR\n";
$ok = "OK\n";

session_start();

if (isset($_POST["passwd"]) && isset($_POST["login"]))
{
	if (auth($_POST["login"], $_POST["passwd"]) === TRUE)
	{
		$_SESSION[loggued_on_user] = $_POST["login"];
		echo '	<HTML>
					<BODY>
						<iframe name="chat" src="chat.php" height="550" width="100%"></iframe>
						<iframe name="speak" src="speak.php" height="50" width="100%"></iframe>
					</BODY>
				</HTML>';
	}
	else
	{
		echo $error . ": Identifiant ou Mot de passe incorrect.";
		echo '	<HTML>
					<BODY>
						<BR />
						<A HREF="login.html">Retour</A>
					</BODY>
				</HTML>';
		$_SESSION[loggued_on_user] = "";
	}
}

?>
