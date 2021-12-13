<?php
require("src/head.php");
$title = "Accueil - répertoire du personnel";
$DATABASE = require("src/database.php");
$query = $DATABASE->query("SELECT * FROM employee");
?>

<title><?php echo $title; ?></title>
</head>
<body>
<?php require("src/header.php"); ?>


<!-- Body -->
<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center pb-5">
        <div class="col-8">
            <h1 class="text-center mb-5"><?php echo $title; ?></h1>
            <form class="mb-5" method="get" action="index.php">
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
                            } ?> value="city">Par ville
                            </option>
                            <option <?php if (isset($_GET["filterBy"]) && $_GET["filterBy"] === "department") {
                                echo "selected";
                            } ?> value="department">Par département
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-outline-dark col-auto col-3 me-3" type="reset">Réinitialiser la recherche
                    </button>
                    <button class="btn btn-dark col-auto col-3" type="submit">Rechercher</button>
                </div>
            </form>
            <?php
            if (!empty($_GET["search"])) {
                $search = "";
                $q = "SELECT * FROM employee ";
                switch ($_GET["filterBy"]) {
                    case "name":
                        $search = "WHERE first_name LIKE ? OR last_name LIKE ?";
                        $query = $DATABASE->prepare($q . $search);
                        $query->execute(array("%" . htmlspecialchars($_GET['search']) . "%", "%" .
                            htmlspecialchars($_GET['search']) . "%"));
                        break;
                    case "department":
                        $search = "WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(city, ',OU=', 2), ',OU=', -1) LIKE ?";
                        $query = $DATABASE->prepare($q . $search);
                        $query->execute(array("%" . htmlspecialchars($_GET['search']) . "%"));
                        break;
                    case "city":
                        $search = "WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(city, ',OU=', 3), ',OU=', -1) LIKE ? OR SUBSTRING_INDEX(SUBSTRING_INDEX(city, ',OU=', -1), ',', 1) LIKE ?";
                        $query = $DATABASE->prepare($q . $search);
                        $query->execute(array("%" . htmlspecialchars($_GET['search']) . "%", "%" . htmlspecialchars($_GET['search']) . "%"));
                        break;
                    default:
                        break;
                }
            }
            ?>
            <p class="pt-5"><?php $rowCount = $query->rowCount();
                echo $rowCount . " " . ($rowCount > 1 ? "résultats" : "résultat"); ?></p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Bureau</th>
                        <th scope="col">Courriel</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Département</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($data = $query->fetch()) {
                        echo "<tr><td>" . $data["first_name"] . " " . $data["last_name"] . "</td><td>" . $data["title"]
                            . "</td><td>" . $data["office"] . "</td><td>" . $data["email"] . "</td><td>" .
                            $data["phone"] . "</td><td>" . substr(explode(",", $data["city"])[2], 3) .
                            ", " . substr(explode(",", $data["city"])[3], 3) . "</td><td>" .
                            substr(explode(",", $data["city"])[1], 3) . "</td></tr>";
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
                    <li aria-current="page" class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </nav>
        </div>
        <?php require("src/footer.php"); ?>
    </div>
</footer>
</body>
</html>