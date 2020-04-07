<?php
    session_start();
?>
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
        <h1 class="mb-4">Authentification</h1>
        <form action="authent.php" method="POST">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="">Mot De Passe</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group" style="text-align: center;">
                <button class="btn btn-primary" type="submit">Connecter</button>
            </div>

            <a href="inscription.php">Vous n'êtes pas un membre? Vueillez s'inscrire ici.</a>
        </form>

        <?php
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = md5($_POST['password']);

                $query = "select * from client where login='$email'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) == 0) {
                    echo "<div class='alert alert-danger' role='alert'>
                      Aucun utilisateur existe avec cet email
                    </div>";
                } else {
                    $client = mysqli_fetch_assoc($result);
                    mysqli_close($conn);
                    
                    if ($client['password'] != $password) {
                        echo "<div class='alert alert-danger' role='alert'>
                            Mot de passe incorrecte!
                        </div>";
                    } else {
                        $_SESSION['idClient'] = $client['idClient'];
                        header("Location: index.php");
                    }
                }

            }
        ?>
    </div>
</body>
</html>