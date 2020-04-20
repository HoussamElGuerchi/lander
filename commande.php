<?php
    session_start();
    include("config/db.php");

    if (isset($_GET['quantite']) && isset($_GET['idProduit']) ) {
        if (!isset($_SESSION['idClient'])) {
            header("Location: authent.php");
        } else {
            //Extraire le panier du client
            $idClientActive = $_SESSION['idClient'];
            $resultPanier = mysqli_query($conn, "select * from panier where idClient='$idClientActive'");
            $panier = mysqli_fetch_assoc($resultPanier);

            //Ajouter la commande à la base de donnees
            $refPanier = $panier['refPanier'];
            $idProduit = $_GET['idProduit'];
            $quantite = $_GET['quantite'];

            $cmdQuery = "insert into commande(refPanier,numProduit,quantite) values('$refPanier','$idProduit','$quantite')";
            if (mysqli_query($conn, $cmdQuery)) {
                header("Location: panier.php");
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                    Erreur d'insertion: ".mysqli_error($conn)."
                </div>";
            }
        }
    }
?>