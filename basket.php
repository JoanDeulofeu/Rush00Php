<?PHP
$path = "./basket";
$file = $path . "/basket_cookie.txt";
$total = 0;

session_start();

include("connect.php");
?>

<HTML>
	<HEAD>
		<TITLE>Basket</TITLE>
		<link rel="stylesheet" HREF="index.css"/>
	</HEAD>
	<BODY style="background-color:#fafafa;">
		<?PHP include ('menu.php'); ?>
		<DIV style="width: 50%;height:50%;position:fixed;left:25%;top:15%;background-color:#e3e3e3;box-shadow: 7px 7px 10px #8f8f8f;">
			<H1 align="center" >Votre panier</H1>
			<h2 align="center"><?PHP
				echo "<BR />";
				if (file_exists($file) === TRUE) //si fichier existe pas
				{
					$tab = file_get_contents($file);
					$unsecur = unserialize($tab);
					foreach ($unsecur as $key => $value)
					{
						// echo "contenu = ";
						// print_r($value);
						// echo "<BR />";
						$idpro = $value['id_prod'];
						$name = mysqli_fetch_row($mysqli->query("SELECT name FROM `produit` WHERE id = $idpro"));
						$price = $value['price'] * $value['nb'];
						$total += $price;
						$str = $name[0] . "(" . $value['price'] . "$)" . " * " . $value['nb'] . " = " . $price . "$";
						echo $str;
						echo "<BR />";
					}
					echo "<BR />";
					echo "Total =    " . $total . "$";
				}
			?></h2>
		</DIV>
		<BR />
		<A align="middle" HREF="valid.php">VALIDER LE PANIER !</A>
	</BODY>
</HTML>
