<?php
    include("config/db.php");
    include("header.php");

    $numProduit = $_GET['id'];
    $_SESSION['numprod'] = $numProduit;

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

    <div class="container mt-5">
        <h3>Commentaires</h3>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']."?id=".$numProduit; ?>" method="GET">
            <div class="row">
                <div class="col">
                    <input type="text" name="id" value="<?php echo $numProduit ?>" class="form-control" style="display: none">
                    <input type="text" name="comment" class="form-control" placeholder="Ajouter un commentaire..." autocomplete="off" required>
                </div>
                <div class="col-lg-2">
                    <button type="submit" name="ajouter" value="true" class="btn btn-outline-primary btn-block">Ajouter</button>
                </div>
            </div>

            <?php
                if (isset($_GET['ajouter'])) {
                    if (!isset($_SESSION['idClient'])) {
                        echo '<meta http-equiv="refresh" content="0; URL=authent.php">';
                    } else {
                        $idClient = $_SESSION['idClient'];
                        $nvCommentaire = $_GET['comment'];
                        $numProduit = $_GET['id'];

                        $ajoutComment = "insert into commentaire(idClient,numProduit,commentaire) values('$idClient','$numProduit','$nvCommentaire')";

                        if (mysqli_query($conn, $ajoutComment)) {
                            //commentaire ajouté.
                        } else {
                            echo mysqli_error($conn);
                        }
                    }
                }
            ?>
        </form>
        <?php
            $commentQuery = "select client.nom, client.prenom, commentaire.commentaire, commentaire.date from commentaire
            join client on client.idClient = commentaire.idClient
            join produit on produit.numProduit = commentaire.numProduit
            where commentaire.numProduit = '$numProduit' order by commentaire.date desc";

            $commentResult = mysqli_query($conn, $commentQuery);
            $commentaires = mysqli_fetch_all($commentResult, MYSQLI_ASSOC);
            
            if($commentaires != null): ?>
            <?php foreach($commentaires as $comment): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="far fa-user"></i> <?php echo $comment['nom']." ".$comment['prenom']; ?></h5>
                        <p class="card-text"><small class="text-muted"><?php echo $comment['date']; ?></small></p>
                        <div class="p-3" style="background-color: #f7f7f9;">
                            <p class="card-text"><?php echo $comment['commentaire']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<?php include("footer.php") ?>