<?PHP
$mysqli = new mysqli("127.0.0.1", "root", "Joan42", "Rush00", 3306);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// echo "Connection to $mysqli->host_info\n";
?>
