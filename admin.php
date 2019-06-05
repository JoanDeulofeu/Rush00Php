<?PHP
session_start();

if ($_SESSION[loggued_on_user] == "root")
{
?>
<HTML>
	<HEAD>
		<TITLE>Basket</TITLE>
		<link rel="stylesheet" HREF="index.css"/>
	</HEAD>

	<BODY style="background-color:#fafafa;">
		<DIV style="width:30%;height:90%;position:fixed;left:1%;top:3%;background-color:#d6d6d6;box-shadow: 4px 4px 6px #a6a1a1;border-width:2px;border-color:black">
			<H1 align="center">PRODUIT</H1>
			<BR />
			<H5 align="center">Ajouter un produit</H5>
			<FORM action="add_prod.php" method="post"> <!-- add produit -->
				Id de la categorie du produit: <input type="text" name="id_cat" value=""/>
				<BR />
				Id de la saison du produit(optionnel): <input type="text" name="id_season" value=""/>
				<BR />
				Nom du produit: <input type="text" name="name" value=""/>
				<BR />
				Prix du produit: <input type="text" name="price" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />

			<H5 align="center">Modifier un produit</H5>
			<FORM action="modif_prod.php" method="post"> <!-- modif produit -->
				Id du produit: <input type="text" name="id" value=""/>
				<BR />
				Nouveau prix du produit: <input type="text" name="price" value=""/>
				<BR />
				Nouveau nom du produit: <input type="text" name="name" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />

			<H5 align="center">Supprimer un produit</H5>
			<FORM action="del_prod.php" method="post"> <!-- suppr produit -->
				Id du produit: <input type="text" name="id" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />
			<a href="http://localhost:8100/basketarchive.php"><H5 align="center">Voir les commandes validées</H5></a>
		<DIV/>

		<DIV style="width:30%;height:90%;position:fixed;left:35%;top:3%;background-color:#d6d6d6;box-shadow: 4px 4px 6px #a6a1a1;border-width:2px;border-color:black;">
			<H1 align="center">UTILISATEUR</H1>
			<BR />
			<H5 align="center">Ajouter un utilisateur</H5>
			<FORM action="create.php" method="post"> <!-- add produit -->
				Nom de l'utilisateur: <input type="text" name="login" value=""/>
				<BR />
				Mot de passe: <input type="text" name="passwd" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />

			<H5 align="center">Modifier un utilisateur</H5>
			<FORM action="modifadmin.php" method="post"> <!-- modif produit -->
				Login de l'utilisateur: <input type="text" name="login" value=""/>
				<BR />
				Changer le login: <input type="text" name="newlogin" value=""/>
				<BR />
				Changer le mot de passe: <input type="text" name="newpasswd" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />

			<H5 align="center">Supprimer un utilisateur</H5>
			<FORM action="deluser.php" method="post"> <!-- suppr produit -->
				Login de l'utilisateur: <input type="text" name="id" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />
		<DIV/>

		<DIV style="width:30%;height:90%;position:fixed;left:69%;top:3%;background-color:#d6d6d6;box-shadow: 4px 4px 6px #a6a1a1;border-width:2px;border-color:black">
			<H1 align="center">CATEGORIE</H1>
			<BR />
			<H5 align="center">Ajouter une categorie</H5>
			<FORM action="add_cat.php" method="post"> <!-- add produit -->
				Nom de la categorie: <input type="text" name="name" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />

			<H5 align="center">Supprimer une categorie</H5>
			<H5 align="center">(Warning: Cela peut entrainer la suppresion de produit)</H5>
			<BR />
			<FORM action="del_cat.php" method="post"> <!-- suppr produit -->
				Nom de la categorie: <input type="text" name="name" value=""/>
				<BR />
				<input type="submit" name="submit" value="OK"/>
			</FORM>
			<BR />
		<DIV/>

		<BR />
		<BR />
		<DIV style="width:50%;height:3%;position:fixed;left:25%;top:95%;background-color:#b9b3b3;border-width:2px;border-color:black">
			<A style="position:fixed;left:44%;top:93.8%;" HREF="index.php"><H5 align="center">Retour a la page d'accueil</H5></A>
		<DIV/>
	</BODY>
</HTML>
<?PHP
}
else
 	echo "Vous n'etes pas admin.";
?>
