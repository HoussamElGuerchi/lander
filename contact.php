<?php include("header.php") ?>
<?php include("config/db.php") ?>

    <section id="contact-form" class="mt-5 mb-5 p-4">
        <div class="container">
            <h1 class="mb-4">Contactez nous:</h1>
            <form action="contact.php" method="post">
                <div class="form-group">
                    <label for="">Nom et Prenom</label>
                    <input type="text" class="form-control input" name="emetteur" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="mail" class="form-control input" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Objet</label>
                    <input type="text" class="form-control input" name="objet" required>
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                    <textarea class="form-control input" name="message" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="center">
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </div>
            </form>
            <?php
                if (isset($_POST['emetteur']) && isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['message'])) {
                    $emetteur = $_POST['emetteur'];
                    $email = $_POST['email'];
                    $objet = $_POST['objet'];
                    $message = $_POST['message'];

                    mail("contact@lander.com", $objet, $message, "De: ".$emetteur." | Adresse: ".$email);
                }
            ?>
        </div>
    </section>

<?php include("footer.php") ?>