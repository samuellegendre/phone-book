<?php session_start(); ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>

        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <!-- Bootstrap CSS & icons -->
        <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
              integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@400;500;700&display=swap"
              rel="stylesheet">
        <!-- CSS -->
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>

        <script defer src="../js/main.js"></script>

<?php require("src/rememberUser.php");