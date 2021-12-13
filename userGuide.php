<?php
require("src/head.php");
$title = "Guide d'utilisation";
$DATABASE = require("src/database.php");
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
            <div class="accordion" id="accordionUserGuide">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSignUp">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSignUp" aria-expanded="false" aria-controls="collapseSignUp">
                            Comment s'inscrire au bottin téléphonique personnel ?
                        </button>
                    </h2>
                    <div id="collapseSignUp" class="accordion-collapse collapse" aria-labelledby="headingSignUp"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Pour s'inscrire au bottin téléphonique personnel, dirigez-vous sur <a href="signup.php">la
                                page d'inscription</a> et remplissez les champs suivants : <span class="fst-italic">prénom</span>,
                            <span class="fst-italic">nom</span>, <span class="fst-italic">adresse courriel</span>
                            et <span class="fst-italic">mot de passe</span>. Lorsqu'ils sont remplis, cliquez sur le
                            bouton d'inscription pour compléter la création de votre compte. Si le compte a été créé
                            avec succès, vous allez être redirigé sur la page de connexion. Sinon, portez une attention
                            au message d'erreur.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingLogIn">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseLogIn" aria-expanded="false" aria-controls="collapseLogIn">
                            Comment se connecter à mon bottin téléphonique personnel ?
                        </button>
                    </h2>
                    <div id="collapseLogIn" class="accordion-collapse collapse" aria-labelledby="headingLogIn"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Pour se connecter au bottin téléphonique personnel, dirigez-vous sur <a href="login.php">la
                                page de connexion</a> et remplissez les champs suivants : <span class="fst-italic">adresse courriel</span>
                            et <span class="fst-italic">mot de passe</span>. Si vous souhaitez rester connecté, cochez
                            la case <span class="fst-italic">se souvenir de moi</span>. Lorsque tous les champs sont
                            remplis, cliquez sur le bouton de connexion pour vous connecter. Vous allez être redirigé
                            sur votre page de bottin téléphonique personnel. Dans le cas où vous n'arriveriez pas à vous
                            connecter, portez attention au message d'erreur.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingLogOut">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseLogOut" aria-expanded="false" aria-controls="collapseLogOut">
                            Comment se déconnecter de mon bottin téléphonique personnel ?
                        </button>
                    </h2>
                    <div id="collapseLogOut" class="accordion-collapse collapse" aria-labelledby="headingLogOut"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Il vous faut être connecté pour accéder à cette option.<br><br>
                            Pour se déconnecter du bottin téléphonique personnel, dans la barre de navigation, cliquez
                            sur <span class="fst-italic">mon compte > se déconnecter</span> ou sur le lien <a
                                    href="src/logoutUser.php">suivant</a>.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSearch">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSearch" aria-expanded="false"
                                aria-controls="collapseSearch">
                            Comment effectuer une recherche dans le bottin téléphonique ?
                        </button>
                    </h2>
                    <div id="collapseSearch" class="accordion-collapse collapse" aria-labelledby="headingSearch"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Pour effectuer une recherche, tapez dans la barre de recherche du bottin téléphonique les
                            mots-clés, choisissez la méthode de recherche (par nom, par ville, etc.) et cliquez sur le
                            bouton <span class="fst-italic">rechercher</span> pour lancer la recherche. S'il y a lieu,
                            les résultats apparaitront dans la table.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAdd">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseAdd" aria-expanded="false"
                                aria-controls="collapseAdd">
                            Comment ajouter un contact à mon bottin téléphonique personnel ?
                        </button>
                    </h2>
                    <div id="collapseAdd" class="accordion-collapse collapse" aria-labelledby="headingAdd"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Il vous faut être connecté pour effectuer cette action.<br><br>
                            Pour ajouter un contact, dirigez-vous sur <a href="directory.php">votre bottin personnel</a>
                            et cliquez sur le bouton <span class="fst-italic">ajouter un contact</span> ou dirigez-vous
                            sur la page <a href="contactForm.php">suivante</a>. Remplissez les champs suivants : <span
                                    class="fst-italic">prénom</span>, <span class="fst-italic">nom</span>, <span
                                    class="fst-italic">adresse courriel</span>, <span
                                    class="fst-italic">téléphone</span>, <span class="fst-italic">cellulaire</span> et
                            <span class="fst-italic">adresse civique</span>. Lorsque tous les champs sont remplis,
                            cliquez sur le bouton d'enregistrement. Si le contact a été ajouté avec succès, vous allez
                            être redirigé sur bottin personnel. Sinon, portez attention au message d'erreur.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingModify">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseModify" aria-expanded="false"
                                aria-controls="collapseModify">
                            Comment modifier les informations d'un contact de mon bottin téléphonique personnel ?
                        </button>
                    </h2>
                    <div id="collapseModify" class="accordion-collapse collapse" aria-labelledby="headingModify"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Il vous faut être connecté pour exécuter cette action.<br><br>
                            Pour modifier les informations d'un contact, dirigez-vous sur <a href="directory.php">votre
                                bottin personnel</a> et cliquez sur le bouton <span class="fst-italic">modifier</span>
                            correspondant au contact que vous souhaitez modifier. Modifiez les champs souhaités et,
                            lorsque vous êtes satisfait, cliquez sur le bouton d'enregistrement. Si les informations du
                            contact ont été modifiées avec succès, vous allez être redirigé sur votre bottin personnel.
                            Sinon, portez attention au message d'erreur.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingDelete">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseDelete" aria-expanded="false"
                                aria-controls="collapseDelete">
                            Comment supprimer un contact de mon bottin téléphonique personnel ?
                        </button>
                    </h2>
                    <div id="collapseDelete" class="accordion-collapse collapse" aria-labelledby="headingDelete"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Il vous faut être connecté pour effectuer cette action. Attention, cette action est
                            irréversible.<br><br>
                            Pour supprimer un contact, dirigez-vous sur <a href="directory.php">votre
                                bottin personnel</a> et cliquez sur le bouton <span class="fst-italic">supprimer</span>
                            correspondant au contact que vous souhaitez supprimer. S'il y a lieu, portez attention au
                            message d'erreur.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSendEmail">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSendEmail" aria-expanded="false"
                                aria-controls="collapseSendEmail">
                            Comment vous contacter ?
                        </button>
                    </h2>
                    <div id="collapseSendEmail" class="accordion-collapse collapse" aria-labelledby="headingSendEmail"
                         data-bs-parent="#accordionUserGuide">
                        <div class="accordion-body">
                            Pour nous contacter à propos d'une demande de modification, dirigez-vous sur le lien <a
                                    href="contactUs.php?email=request">suivant</a>. Pour nous contacter à propos d'une
                            demande générale, cliquez sur le lien <a href="contactUs.php">suivant</a>.
                        </div>
                    </div>
                </div>
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
                    <li class="breadcrumb-item"><a class="text-reset text-decoration-none" href="index.php">Accueil
                            - répertoire du personnel</a></li>
                    <li aria-current="page" class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </nav>
        </div>
        <?php require("src/footer.php"); ?>
    </div>
</footer>
</body>
</html>