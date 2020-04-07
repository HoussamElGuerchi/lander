<?php
    include("config/db.php");
    include("header.php");

    $numProduit = $_GET['id'];

    $query = "select * from produit where numProduit='$numProduit'";
    $result = mysqli_query($conn, $query);
    $produit = mysqli_fetch_assoc($result);
?>

    <div class="container mt-5">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="<?php echo $produit['image']; ?>" style="height: 300px; width: 180px;" class="card-img mt-3 mb-3 ml-5">
                </div>
                <div class="col-md-8">
                    <div class="card-body mt-4">
                        <h3 class="card-title"><?php echo $produit['libele']; ?></h3>
                        <hr>
                        <p class="card-text">Marque: <?php echo $produit['marque']; ?></p>
                        <hr>
                        <p class="card-text"><?php echo $produit['prix']; ?> DHS</p>
                        <hr>
                        <form action="commande.php" method="get">
                            <input type="text" name="idProduit" value="<?php echo $numProduit; ?>" style="display: none;">
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="quantite" class="form-control" placeholder="Quantité..." value="1" required>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Ajouter au panier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("footer.php") ?>