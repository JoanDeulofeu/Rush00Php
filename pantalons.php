<?PHP
include("connect.php");

$path = "./basket";
$file = $path . "/basket_cookie.txt";
$dejavu = 0;

$all = mysqli_fetch_all ($mysqli->query("SELECT * FROM `produit` WHERE id_cat = 3"));
?>
<HTML>
	<HEAD>
		<TITLE>Rush00</TITLE>
		<link rel="stylesheet" HREF="index.css"/>
	</HEAD>
	<BODY style="background-color:#fafafa;">
	<?PHP include ('menu.php'); ?>
	<?PHP
		foreach ($all as $value) {
			echo '<BR /><DIV style="background-color:#f4f1f5;"><p>';
			echo $value[1];
			echo "<BR />Prix = ";
			echo $value[2];
			echo '$</p>
				<img style="width:100px;height:100px;" src="img/'; echo "$value[1]"; echo '.jpg">
				<FORM action="add_basket.php" method="post">
					Ajouter: <input type="submit" name="id_prod" value="'; echo $value[0];
					echo '"/>
				</FORM>
				<FORM action="sub_basket.php" method="post">
					Retirer: <input type="submit" name="id_prod" value="'; echo $value[0];
					echo '"/>
				</FORM>
			<DIV/><BR />';
		}
		?>
	</BODY>
</HTML>
