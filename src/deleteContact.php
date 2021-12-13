<?php
session_start();

if (!isset($_SESSION["email"]) || !isset($_GET["id"])) {
    header("location:../directory.php?error=true&message=Le contact n'a pas été supprimé.");
} else {
    $id = htmlspecialchars($_GET["id"]);
    $email = htmlspecialchars($_SESSION["email"]);
    $DATABASE = require("database.php");

    try {
        $query = $DATABASE->prepare("SELECT u.email FROM contact INNER  JOIN user u on contact.user_id = u.id WHERE contact.id = ?");
        $query->execute(array($id));
    } catch (exception $e) {
        header("location:../contactForm.php?error=true&message=" . $e->getMessage());
        exit();
    }

    while ($data = $query->fetch()) {
        if ($data["email"] !== $email) {
            header("location:../directory.php?error=true&message=Le contact n'a pas été supprimé.");
            exit();
        }
    }

    try {
        $query = $DATABASE->prepare("DELETE c FROM contact c INNER JOIN user on c.user_id = user.id WHERE c.id = ? AND user.email = ?");
        $query->execute(array($id, $email));
    } catch (exception $e) {
        header("location:../contactForm.php?error=true&message=" . $e->getMessage());
        exit();
    }
}

header("location:../directory.php?success=true&message=Le contact a été supprimé avec succès.");
