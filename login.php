<?php
require("src/head.php");

if (isset($_SESSION["connect"])) {
    header("location:../directory.php");
}

$title = "Se connecter";
?>

<title><?php echo $title; ?></title>
</head>
<body>
<?php require("src/header.php"); ?>


<!-- Body -->
<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <h1 class="text-center mb-5"><?php echo $title; ?></h1>
            <?php require("src/alert.php") ?>
            <form method="post" action="src/loginUser.php">
                <label class="form-label" for="inputEmail">Adresse courriel</label>
                <input class="form-control mb-3" id="inputEmail" name="inputEmail" required type="email">
                <label class="form-label" for="inputPassword">Mot de passe</label>
                <input aria-describedby="passwordHelp" class="form-control mb-3" id="inputPassword" required
                       type="password" name="inputPassword">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="inputRememberMe" name="inputRememberMe">
                    <label class="form-check-label" for="inputRememberMe">Se souvenir de moi</label>
                </div>
                <div class="row justify-content-center mb-3">
                    <button class="btn btn-dark col-4" type="submit">Se connecter</button>
                </div>
                <div class="row justify-content-center">
                    <a class="col-auto text-reset text-decoration-none" href="signup.php" role="button">S'inscrire</a>
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