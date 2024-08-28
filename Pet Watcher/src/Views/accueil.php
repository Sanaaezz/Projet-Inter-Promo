<?php

include __DIR__.'/includes/header.php';

$erreur = isset($_SESSION['erreur']) ? $_SESSION['erreur'] : '';
$_SESSION['erreur'] = '';
$succes = isset($_SESSION['succes']) ? $_SESSION['succes'] : '';
$_SESSION['succes'] = '';


?>


<h1>Ici le code de la page d'accueil</h1>

<a href="<?= HOME_URL ?>login"">Login</a>
<a href="<?= HOME_URL ?>register"">Register</a>

<p> <?= $erreur ?> </p>
<p> <?= $succes ?> </p>



<?php
include __DIR__.'/includes/footer.php';