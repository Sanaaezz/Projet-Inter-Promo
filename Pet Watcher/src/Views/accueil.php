<?php

include __DIR__.'/includes/header.php';

$erreur = isset($_SESSION['erreur']) ? $_SESSION['erreur'] : '';
$_SESSION['erreur'] = '';
$succes = isset($_SESSION['succes']) ? $_SESSION['succes'] : '';
$_SESSION['succes'] = '';


?>
    <section class="relative w-full h-screen ">
        <img src="assets/Images/antonio-scant-lN5OYxQN2KM-unsplash.jpg" alt="Hero Image" class="absolute inset-0 object-cover w-full h-full opacity-70">
        <div class="relative z-10 flex items-center justify-center h-full">
        </div>
        <div class="text-center p-6  ">
                <div>Welcome to Pet Watchers, the ultimate retreat for your cherished cats, dogs, and horses! At Pet Watchers, we provide top-notch care and endless fun for your four-legged family members. Our spacious kennels, cozy catteries, and luxurious horse stables ensure every pet feels pampered and at home. From romping in our secure play areas to enjoying one-on-one attention from our dedicated team, your pets will love their stay with us. Trust Pet Watchers for a tail-wagging, purr-inducing, hoof-tapping good time!</div>
            </div>
    </section>

<p> <?= $erreur ?> </p>
<p> <?= $succes ?> </p>



<?php
include __DIR__.'/includes/footer.php';