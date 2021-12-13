<?php
require("src/head.php");
$title = "S'inscrire";
?>

<title><?php echo $title; ?></title>
</head>
<body>
<?php require("src/header.php"); ?>


<!-- Body -->
<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center">
        <div class="col-3">
            <h1 class="text-center mb-5"><?php echo $title; ?></h1>
            <?php require("src/alert.php") ?>
            <form method="post" action="src/addUser.php">
                <label class="form-label" for="inputFirstName">Prénom</label>
                <input class="form-control mb-3" id="inputFirstName" name="inputFirstName" required type="text">
                <label class="form-label" for="inputLastName">Nom</label>
                <input class="form-control mb-3" id="inputLastName" name="inputLastName" required type="text">
                <label class="form-label" for="inputEmail">Adresse courriel</label>
                <input class="form-control mb-3" id="inputEmail" name="inputEmail" required type="email">
                <label class="form-label" for="inputPassword">Mot de passe</label>
                <input class="form-control mb-3" id="inputPassword" name="inputPassword" required type="password">
                <label class="form-label" for="inputPasswordRetyped">Retapez votre mot de passe</label>
                <input class="form-control mb-3" id="inputPasswordRetyped" name="inputPasswordRetyped" required
                       type="password">
                <div class="row justify-content-center mb-3">
                    <button class="btn btn-dark col-4" type="submit">S'inscrire</button>
                </div>
                <div class="row justify-content-center">
                    <a class="col-auto text-reset text-decoration-none" href="login.php" role="button">Se connecter</a>
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