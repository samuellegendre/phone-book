<?php
require("src/head.php");
$title = "Nous joindre";
?>

<title><?php echo $title; ?></title>
</head>
<body>
<?php require("src/header.php"); ?>


<!-- Body -->
<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center">
        <div class="col-5">
            <h1 class="mb-5 text-center"><?php echo $title; ?></h1>
            <?php require("src/alert.php") ?>
            <form method="post"
                  action="src/sendEmail.php<?php echo isset($_GET["request"]) ? "?request=change" : "" ?>">
                <label class="form-label" for="inputName">Nom</label>
                <input class="form-control mb-3" id="inputName" name="inputName" required type="text">
                <label class="form-label" for="inputEmail">Adresse courriel</label>
                <input class="form-control mb-3" id="inputEmail" name="inputEmail" required type="email">
                <label class="form-label" for="inputMessage">Message</label>
                <textarea class="form-control mb-3" id="inputMessage" required name="inputMessage" rows="7"></textarea>
                <div class="row justify-content-center">
                    <button class="btn btn-dark col-3" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light footer">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="index.php">Accueil -
                            répertoire du personnel</a></li>
                    <li aria-current="page" class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </nav>
        </div>
        <?php require("src/footer.php"); ?>
    </div>
</footer>
</body>
</html>