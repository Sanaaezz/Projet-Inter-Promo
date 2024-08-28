<?php

include __DIR__.'/includes/header.php';

$erreur = isset($_SESSION['erreur']) ? $_SESSION['erreur'] : '';
$_SESSION['erreur'] = '';
$succes = isset($_SESSION['succes']) ? $_SESSION['succes'] : '';
$_SESSION['succes'] = '';

$user = unserialize($_SESSION['user']);

?>

<h1>Vous etes sur la page reservation</h1>

<form class="space-y-6" action="<?=HOME_URL?>reservation" method="POST">
    <input type="hidden" name="id_user" value="<?= $user->getIdUser()?>">

    <div>
        <label for="dtm_start" class="block text-sm font-medium leading-6 text-gray-900">FROM :</label>
        <div class="mt-2">
            <input id="dtm_start" name="dtm_start" type="date" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>
    <div>
        <label for="dtm_end" class="block text-sm font-medium leading-6 text-gray-900">TO :</label>
        <div class="mt-2">
            <input id="dtm_end" name="dtm_end" type="date" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div>
        <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Comment :</label>
        <div class="mt-2">
            <input id="comment" name="comment" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">S'enregistrer</button>
    </div>
</form>


<?php
include __DIR__.'/includes/footer.php';