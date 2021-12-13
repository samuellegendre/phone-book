<?php
require("src/head.php");

if (!isset($_SESSION["connect"])) {
    header("location:login.php");
}

$title = "Mon répertoire";
$DATABASE = require("src/database.php");
$query = $DATABASE->prepare("SELECT contact.id, contact.first_name, contact.last_name, contact.email, phone, cellphone, address FROM contact INNER JOIN user on contact.user_id = user.id WHERE user.email = ?");
$query->execute(array(htmlspecialchars($_SESSION["email"])));
?>

<title><?php echo $title; ?></title>
</head>
<body>
<?php require("src/header.php"); ?>


<!-- Body -->
<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center pb-5">
        <div class="col-8">
            <div class="text-center"><i id="iconWelcomeMessage"></i> <span
                        id="spanWelcomeMessage"></span></div>
            <h1 class="text-center mb-5"><?php echo $title; ?></h1>
            <form method="get" action="directory.php">
                <div class="row justify-content-center mb-3">
                    <div class="col">
                        <input class="form-control" id="search" name="search" placeholder="Recherche" type="text"
                               required <?php if (isset($_GET["search"])) {
                            echo "value=" . $_GET["search"];
                        } ?>>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="filterBy" required>
                            <option value="name">Par nom</option>
                            <option <?php if (isset($_GET["filterBy"]) && $_GET["filterBy"] === "city") {
                                echo "selected";
                            } ?> value="city">Par adresse
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <button class="btn btn-outline-dark col-auto col-3 me-3" type="reset">Réinitialiser la recherche
                    </button>
                    <button class="btn btn-dark col-auto col-3" type="submit">Rechercher</button>
                </div>
            </form>
            <?php
            require("src/alert.php");

            if (!empty($_GET["search"])) {
                $search = "";
                switch ($_GET["filterBy"]) {
                    case "name":
                        $search = "AND (contact.first_name LIKE ? OR contact.last_name LIKE ?)";
                        $query = $DATABASE->prepare("SELECT contact.id, contact.first_name, contact.last_name, contact.email, phone, cellphone, address FROM contact INNER JOIN user on contact.user_id = user.id WHERE user.email = ? " . $search);
                        $query->execute(array(htmlspecialchars($_SESSION["email"]), "%" .
                            htmlspecialchars($_GET['search']) . "%", "%" . htmlspecialchars($_GET['search']) . "%"));
                        break;
                    case "city":
                        $search = "AND contact.address LIKE ?";
                        $query = $DATABASE->prepare("SELECT contact.id, contact.first_name, contact.last_name, contact.email, phone, cellphone, address FROM contact INNER JOIN user on contact.user_id = user.id WHERE user.email = ? " . $search);
                        $query->execute(array(htmlspecialchars($_SESSION["email"]), "%" .
                            htmlspecialchars($_GET['search']) . "%"));
                        break;
                    default:
                        break;
                }
            }
            ?>
            <div class="row justify-content-between pt-5 mb-3">
                <p class="col-auto"><?php $rowCount = $query->rowCount();
                    echo $rowCount . " " . ($rowCount > 1 ? "résultats" : "résultat"); ?></p>
                <a class="btn btn-outline-dark col-auto" href="contactForm.php">Ajouter un contact</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Courriel</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Cellulaire</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($data = $query->fetch()) {
                        echo "<tr><td>" . $data["first_name"] . " " . $data["last_name"] . "</td><td>" . $data["email"]
                            . "</td><td>" . $data["phone"] . "</td><td>" . $data["cellphone"] . "</td><td>" .
                            $data["address"] . "</td><td><div class='hstack gap-3'><a role='button' 
                            class='btn btn-outline-dark' href='contactForm.php?id=" . $data["id"] . "'>Modifier</a><a 
                            role='button' class='btn btn-outline-danger' href='src/deleteContact.php?id=" . $data["id"]
                            . "'> Supprimer</a></div></td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
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