<?php include("header.php") ?>
<?php include("config/db.php") ?>
<?php

    $query = "select * from produit";
    $result = mysqli_query($conn, $query);
    
    $produits = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

    <div class="container mt-5">
        <h1>Collections:</h1>
        <hr>
        <div class="row">
            <div class="card-deck">
                <?php foreach($produits as $produit): ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card">
                        <img src="<?php echo $produit['image']; ?>" class="card-img-top p-2" style="height: 300px; width: 180px; margin: auto;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produit['libele']; ?></h5>
                            <hr>
                            <h5 class="card-title"><?php echo $produit['prix']; ?> dhs</h5>
                            <hr>
                            <p class="card-text">Marque: <?php echo $produit['marque']; ?></p>
                            <a href="produit.php?id=<?php echo $produit['numProduit']; ?>" class="btn btn-primary btn-block">Voir le produit</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php include("footer.php") ?>