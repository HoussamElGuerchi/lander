<?php
    session_start();
    $_SESSION['auth'] = true;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lander</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@700&display=swap" rel="stylesheet">
    <style>
        #footer {
            padding: 7% 15%;
        }

        .logo {
            font-family: 'Playfair Display SC', serif;
        }

        .white {
            color: #ffffff;
        }

        .center {
            text-align: center;
            margin: auto;
        }

        .landing{
            background-image: url("images/landing-bg.jpg");
            background-size: cover;
            background-position: top;
            padding: 10% 15%;
        }

        .features{
            height: 50%;
        }

        .features-col {
            height: 100%;
            width: 50%;
        }

        .maker {
            background-image: url("images/watch-maker.png");
            background-size: cover;
            background-position: center;
        }

        .fixer {
            background-image: url("images/watch-fixer.png");
            background-size: cover;
            background-position: center;
        }
    </style>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/56420e11fd.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand logo" href="#">Lander</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mr-4">
                <li class="nav-item mr-3 ml-3">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Acceuil</a>
                </li>
                <li class="nav-item mr-3 ml-3">
                    <a class="nav-link" href="boutique.php"><i class="fas fa-store-alt"></i> Boutique</a>
                </li>
                <li class="nav-item mr-3 ml-3">
                    <a class="nav-link" href="panier.php"><i class="fas fa-shopping-cart"></i> Panier</a>
                </li>
                <li class="nav-item mr-3 ml-3">
                    <a class="nav-link" href="contact.php"><i class="far fa-envelope"></i> Contact</a>
                </li>
                <li class="nav-item mr-3 ml-3">
                    <?php
                        if ( isset($_SESSION['idClient']) ) {
                            echo "<a class='nav-link' href='deconnex.php'><i class='fas fa-door-open'></i> Deconnexion</a>";
                        }
                        else {
                            echo "<a class='nav-link' href='authent.php'><i class='fas fa-sign-in-alt'></i> Connecter</a>";
                        }
                    ?>
                </li>
            </ul>
        </div>
    </nav>