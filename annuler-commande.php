<?php

    include("config/db.php");

    $refCommande = $_GET['refCommande'];

    $query = "delete from commande where refCommande = '$refCommande'";

    if (mysqli_query($conn, $query)) {
        mysqli_close($conn);
        header("Location: panier.php");
    } else {
        echo "Erreur de suppression au niveau du base de données";
    }

?>