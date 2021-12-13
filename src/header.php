<!-- Boostrap bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Header -->
<header>
    <nav class="navbar navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand brand-font" href="../index.php">LEGENDRE</a>
            <?php
            if (!isset($_SESSION["connect"])) {
                echo '<a class="btn btn-dark" href="../login.php" role="button">Se connecter</a>';
            } else {
                echo '<div class="dropdown">
                <a id="anchorDropdown" class="btn btn-dark dropdown-toggle" role="button">Mon compte</a>
                <ul id="listDropdownMenu" class="dropdown-menu">
                    <li><a class="dropdown-item" href="../directory.php">Mon répertoire</a></li>
                    <li><a class="dropdown-item" href="../src/logoutUser.php">Se déconnecter</a></li>
                </ul>
            </div>';
            }
            ?>
        </div>
    </nav>
</header>