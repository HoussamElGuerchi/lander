<?php include("header.php") ?>
<?php include("config/db.php") ?>
<?php

    $query = "select * from produit limit 6";
    $result = mysqli_query($conn, $query);
    
    $produits = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

    <section class="landing">
        <div class="container center">
            <h1 class="mb-4 white">Lander, le leader des montres de luxe</h1>
            <h5 class="mb-4 white">Visitez notre boutique pour découvrir notre collection</h5>
            <a href="boutique.php" class="btn btn-secondary">Boutique</a>
        </div>
    </section>
    
    <section>
        <div class="row features">
            <div class="col-md-6 maker center p-5 features-col">
                <h5 class="white p-5 mt-5">Fait main par une selection des expertises et des talents</h5>
            </div>
            <div class="col-md-6 fixer center p-5 features-col">
                <h5 class="white p-5 mt-5">Des techniciens de maintenance hautement qualifiés</h5>
            </div>
        </div>
    </section>

    <section id="tendances">
        <div class="container p-5 mt-5 mb-5">
            <h3>Nouveautés</h3>
            <hr>
            <div class="row">
                <div class="card-deck">
                    <?php foreach($produits as $produit): ?>
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card">
                            <img src="<?php echo $produit['image']; ?>" class="card-img-top p-2" style="height: 300px; width: 150px; margin: auto;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $produit['libele']; ?></h5>
                                <hr>
                                <h5 class="card-title"><?php echo $produit['prix']; ?> dhs</h5>
                                <hr>
                                <p class="card-text">Marque: <?php echo $produit['marque']; ?></p>
                                <a href="" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Ajouter au Panier</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    

<?php include("footer.php") ?>