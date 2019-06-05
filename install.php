<?php
include("connect.php");

$table1 = "produit";
if (!$mysqli->query("DROP TABLE IF EXISTS $table1") ||
    !$mysqli->query("CREATE TABLE $table1 (id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT 'product_name' NOT NULL, price INT NOT NULL, id_cat INT NOT NULL, id_season INT)"))
    echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
else
	echo $table1 . " ok \n";

	$v_products = "('T-shirt noir', 799, 1, 5), ('T-shirt blanc', 25, 1, NULL), ('T-shirt bleu', 57, 1, 7)";
	if (!$mysqli->query("INSERT INTO $table1 (name, price, id_cat, id_season) VALUES $v_products"))
	echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;

	$v_products = "('Pull noir', 450, 2, 5), ('Pull blanc', 20, 2, 6), ('Pull rose', 45, 2, 6)";
	if (!$mysqli->query("INSERT INTO $table1 (name, price, id_cat, id_season) VALUES $v_products"))
	echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;

	$v_products = "('Pantalon noir', 365, 3, 5), ('Pantalon blanc', 85, 3, 6), ('pantalon bleu', 75, 3, NULL)";
	if (!$mysqli->query("INSERT INTO $table1 (name, price, id_cat, id_season) VALUES $v_products"))
	echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;

	$v_products = "('Short noir', 35, 4, 7), ('Short blanc', 91, 4, NULL), ('Short rose', 26, 4, 7)";
    if (!$mysqli->query("INSERT INTO $table1 (name, price, id_cat, id_season) VALUES $v_products"))
	echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;



	$table2 = "categorie";
	if (!$mysqli->query("DROP TABLE IF EXISTS $table2") ||
	    !$mysqli->query("CREATE TABLE $table2 (id_cat INT PRIMARY KEY AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT 'cat_name' NOT NULL)"))
	    echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
	else
		echo $table2 . " ok \n";

		$v_products = "('tshirts'), ('pulls'), ('pantalons'), ('shorts'), ('bestsellers'), ('winter'), ('summer')";
		$mysqli->query("INSERT INTO $table2 (name) VALUES $v_products");

?>
