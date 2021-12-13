<?php
session_start();
require("rememberUser.php");

if (!isset($_POST["inputEmail"]) || !isset($_POST["inputPassword"])) {
    header("location:../login.php?error=true&message=Veuillez compléter tous les champs.");
    exit();
} else {
    $email = htmlspecialchars($_POST["inputEmail"]);
    $password = htmlspecialchars($_POST["inputPassword"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location:../login.php?error=true&message=L'adresse courriel est invalide.");
        exit();
    }

    $DATABASE = require("database.php");

    try {
        $query = $DATABASE->prepare("SELECT count(*) as numberEmail FROM user WHERE email =?");
        $query->execute(array($email));
    } catch (exception $e) {
        header("location:../login.php?error=true&message=" . $e->getMessage());
        exit();
    }

    while ($exists = $query->fetch()) {
        if ($exists["numberEmail"] == 0) {
            header("location:../login.php?error=true&message=Il n'existe aucun compte à cette adresse.");
            exit();
        }
    }

    require("encryptPassword.php");
    $password = encryptPassword($email, $password);

    try {
        $query = $DATABASE->prepare("SELECT * from user WHERE email =?");
        $query->execute(array($email));
    } catch (exception $e) {
        header("location:../login.php?error=true&message=" . $e->getMessage());
        exit();
    }

    while ($user = $query->fetch()) {
        if ($password !== $user["password"]) {
            header("location:../login.php?error=true&message=Le mot de passe est incorrect.");
            exit();
        }

        $_SESSION["connect"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $user["first_name"] . " " . $user["last_name"];

        if (isset($_POST["inputRememberMe"])) {
            setcookie("auth", $user["remember_me"], time() + 3600, "/", null, false, true);
        }

        header("location:../directory.php");
    }
}
