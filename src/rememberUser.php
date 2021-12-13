<?php
if (isset($_COOKIE["auth"])) {
    $remember_me = htmlspecialchars($_COOKIE["auth"]);
    $DATABASE = require("database.php");
    $query = $DATABASE->prepare("SELECT count(*) as numberAccount FROM user WHERE remember_me = ?");
    $query->execute(array($remember_me));

    while ($user = $query->fetch()) {
        if ($user["numberAccount"] == 1) {
            $queryUser = $DATABASE->prepare("SELECT * FROM user WHERE remember_me = ?");
            $queryUser->execute(array($remember_me));

            while ($userAccount = $queryUser->fetch()) {
                $_SESSION["connect"] = true;
                $_SESSION["email"] = $userAccount["email"];
            }
        }
    }
}