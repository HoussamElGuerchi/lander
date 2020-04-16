<?php include("header.php") ?>
<?php include("config/db.php") ?>
<?php
    if (isset($_SESSION['idClient'])) {
        $idClient = $_SESSION['idClient'];
        $query = "select * from client where idClient='$idClient'";
        $result = mysqli_query($conn, $query);

        $client = mysqli_fetch_assoc($result);

        $cmdQuery = "select commande.numProduit, refCommande ,libele, quantite, prix from produit join commande on produit.numProduit = commande.numProduit join panier on panier.refPanier = commande.refPanier where idClient='$idClient'";
        $cmdResult = mysqli_query($conn, $cmdQuery);
        $commandes = mysqli_fetch_all($cmdResult, MYSQLI_ASSOC);

        $total = 0;

    } else {
        // exit(header("Location: authent.php"));
        echo '<script language="javascript">window.location.href ="authent.php"</script>';
    }
?>

    <div class="container mt-5">
        <h1>Votre Coordonnées :</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h3 class="card-title"><?php echo $client['nom']." ".$client['prenom']; ?></h3>
                <p class="card-text"><?php echo $client['login']; ?></p>
                <p class="card-text"><?php echo "0".$client['num_tel']; ?></p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1>Commandes :</h1>
        <table class="table table-bordered table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Libellé</th>
                    <th>Quantité</th>
                    <th>Prix Commande</th>
                    <th>Action</th>
                </tr>
            </thead>
                <?php foreach($commandes as $commande): ?>

                <tr>
                    <td><a href="produit.php?id=<?php echo $commande['numProduit']; ?>"><?php echo $commande['libele']; ?></a></td>
                    <td><?php echo $commande['quantite']; ?></td>
                    <td>
                    <?php echo $commande['quantite']*$commande['prix']." DHS";
                        $total += $commande['quantite']*$commande['prix'];
                    ?>
                    </td>
                    <td><a href="annuler-commande.php?refCommande=<?php echo $commande['refCommande']; ?>" class="text-danger"><i class="far fa-trash-alt"></i> Annuler</a></td>
                </tr>

                <?php endforeach; ?>
                <tr>
                    <td colspan='2'>Total Panier :</td>
                    <td class="bg-success" style="color: #fff;" colspan='2'><?php echo $total; ?> DHS</td>
                </tr>
            <tbody>
            </tbody>
        </table>
    </div>

<?php include("footer.php") ?>