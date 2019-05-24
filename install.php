<?php
include("connect.php");

$table1 = "fruits";
if (!$mysqli->query("DROP TABLE IF EXISTS $table1") ||
    !$mysqli->query("CREATE TABLE $table1 (id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT 'product_name' NOT NULL, price INT NOT NULL)"))
    echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;

	$v_products = "('Pomme', 45), ('Fraise', 37), ('Cerise', 22), ('Orange', 60)";
	$mysqli->query("INSERT INTO $table1 (name, price) VALUES $v_products");

$table2 = "legumes";
if (!$mysqli->query("DROP TABLE IF EXISTS $table2") ||
    !$mysqli->query("CREATE TABLE $table2 (id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT 'product_name' NOT NULL, price INT NOT NULL)"))
    echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;

	$v_products = "('Carotte', 45), ('Courgette', 37), ('Patates', 22), ('Epinards', 60)";
	$mysqli->query("INSERT INTO $table2 (name, price) VALUES $v_products");
?>
