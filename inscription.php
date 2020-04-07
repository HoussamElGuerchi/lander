<?php include("config/db.php") ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Lander</a>
    </nav>

    <div class="container p-5 shadow" style="width: 50%; margin: auto; margin-top: 7%;">
        <h1 class="mb-4">Inscription</h1>
        <form action="inscription.php" method="POST">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="login" required>
            </div>

            <div class="form-group">
                <label for="">Mot De Passe</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" required>
            </div>

            <div class="form-group">
                <label for="">Prénom</label>
                <input type="text" class="form-control" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="">Numero de Telephone</label>
                <input type="tel" class="form-control" name="numtel" required>
            </div>

            <div class="form-group" style="text-align: center;">
                <button class="btn btn-primary" type="submit">S'inscrire</button>
            </div>
        </form>
        <?php
            session_start();

            if( isset($_POST['login']) && isset($_POST["password"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["numtel"])) {

                $login = $_POST['login'];
                //verifier si un autre client existe avec le meme login
                $query = "select * from client where login='$login'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) == 0) {
                    //s'il n'existe pas
                    $password = md5($_POST["password"]);
                    $nom = $_POST["nom"];
                    $prenom = $_POST["prenom"];
                    $numtel = $_POST["numtel"];

                    $insert = "insert into client(login,password,nom,prenom,num_tel) values('$login','$password','$nom','$prenom','$numtel')";

                    if (mysqli_query($conn, $insert)) {
                        $clientInsere = mysqli_fetch_assoc(mysqli_query($conn, "select idClient from client where login='$login'"));
                        $nvId = $clientInsere['idClient'];
                        $ajouterPanier = "insert into panier(idClient) values('$nvId')";

                        if(mysqli_query($conn, $ajouterPanier)) {
                            header("Location: index.php");
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                Erreur d'ajout: ".mysqli_error($conn)."
                            </div>";
                        }

                        
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>
                            Erreur d'ajout: ".mysqli_error($conn)."
                        </div>";
                    }

                } else {
                    //s'il existe
                    echo "<div class='alert alert-danger' role='alert'>
                        Un autre utilisateur existe avec le même email!
                    </div>";
                }

            }

            mysqli_close($conn);
        ?>
    </div>

    <section id="footer" style="padding: 7% 15%; text-align: center;">
        <div class="container center">
            <p>&copy; Réalisé par EL GUERCHI Houssam - FS Agadir - LPII - 2020</p>
        </div>
    </section>
</body>
</html>