<?php

    $conn = mysqli_connect("localhost", "lander", "fs@agadirlp2i", "ecommerce");

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>
            Erreur au base de données".mysqli_connect_errno."
        </div>";
    }

?>