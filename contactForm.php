<?php
require("src/head.php");

if (!isset($_SESSION["connect"])) {
    header("location:login.php");
}

$title = "Formulaire";
$data = null;
$id = null;
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
            <?php
            require("src/alert.php");

            if (isset($_GET["id"])) {
                $id = htmlspecialchars($_GET["id"]);
                $email = htmlspecialchars($_SESSION["email"]);
                $DATABASE = require("src/database.php");

                try {
                    $query = $DATABASE->prepare("SELECT u.email FROM contact INNER  JOIN user u on contact.user_id = u.id WHERE contact.id = ?");
                    $query->execute(array($id));
                } catch (exception $e) {
                    exit();
                }

                while ($fetchedData = $query->fetch()) {
                    if ($fetchedData["email"] === $email) {
                        try {
                            $query = $DATABASE->prepare("SELECT * FROM contact WHERE id = ?");
                            $query->execute(array($id));
                        } catch (exception $e) {
                            header("location:../contactForm.php?error=true&message=" . $e->getMessage());
                            exit();
                        }

                        while ($fetchedData = $query->fetch()) {
                            $data = $fetchedData;
                        }
                    }
                }
            }
            ?>

            <form method="post" action="<?php echo is_null($data) ? 'src/addContact.php' : 'src/modifyContact.php'; ?>">
                <?php
                if (!is_null($data)) {
                    echo '<input name="inputId" type="hidden" value="' . $id . '">';
                }
                ?>
                <label class="form-label" for="inputFirstName">Prénom</label>
                <input class="form-control mb-3" id="inputFirstName" name="inputFirstName" required
                       type="text" <?php if (!is_null($data)) {
                    echo "value='" . $data["first_name"] . "'";
                } ?>>
                <label class="form-label" for="inputLastName">Nom</label>
                <input class="form-control mb-3" id="inputLastName" name="inputLastName" required
                       type="text" <?php if (!is_null($data)) {
                    echo "value='" . $data["last_name"] . "'";
                } ?>>
                <label class="form-label" for="inputEmail">Adresse courriel</label>
                <input class="form-control mb-3" id="inputEmail" name="inputEmail" required
                       type="email" <?php if (!is_null($data)) {
                    echo "value='" . $data["email"] . "'";
                } ?>>
                <label class="form-label" for="inputPhone">Téléphone</label>
                <input class="form-control mb-3" id="inputPhone" name="inputPhone" required
                       type="tel" <?php if (!is_null($data)) {
                    echo "value='" . $data["phone"] . "'";
                } ?>>
                <label class="form-label" for="inputCellphone">Cellulaire</label>
                <input class="form-control mb-3" id="inputCellphone" name="inputCellphone" required
                       type="tel" <?php if (!is_null($data)) {
                    echo "value='" . $data["cellphone"] . "'";
                } ?>>
                <label class="form-label" for="inputAddress">Adresse civile</label>
                <input class="form-control mb-3" id="inputAddress" name="inputAddress" required
                       type="text" <?php if (!is_null($data)) {
                    echo "value='" . $data["address"] . "'";
                } ?>>
                <div class="row justify-content-evenly mb-3">
                    <a class="btn btn-outline-dark col-4" href="directory.php">Annuler</a>
                    <button class="btn btn-dark col-4" type="submit">Enregistrer</button>
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
                    <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="directory.php">Mon
                            répertoire</a></li>
                    <li aria-current="page" class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </nav>
        </div>
        <?php require("src/footer.php"); ?>
    </div>
</footer>
</body>
</html>