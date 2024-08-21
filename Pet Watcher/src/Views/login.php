<?php

include __DIR__ . '/Includes/header.php';

?>
<style></style>
<div id="loginModal" class=" modal flex items-center  px-10 top-0 w-screen h-screen bg-gradient-to-b from-teal-400 from-5% via-red-400 via-35%  to-yellow-200 to-95% ">

  <div class="flex flex-col justify-center px-8 max-w-2xl mx-auto bg-white rounded-3xl">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
      <h2 class="mt-16 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 uppercase text-black text-s font-bold">Login</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

      <div class="space-y-6">

        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300  placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 emailInput">
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900 uppercase text-black text-s font-semibold">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full bg-orange-50 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-orange-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm sm:leading-6 indent-3 passwordInput mb-10">
          </div>
        </div>
        <div id="loginToast" class="hidden">
          <p id="loginToastText" class=" toast flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white uppercase text-s font-semibold opacity-80 ">
          </p>
        </div>
        <?php if ($erreur == "connexion") { ?>
          <div class="error">
            Erreur de connexion.
          </div>
        <?php } ?>

        <div class="flex justify-center">
          <button onclick="loginAccount()" class="flex w-ful justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 uppercase text-white text-s font-semibold">Login</button>
        </div>
        <div>
          <button onclick="location.href='<?= HOME_URL ?>register'" class=" mb-16 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 uppercase text-white text-s font-semibold">Pour créer un compte</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

include __DIR__ . '/Includes/footer.php';

?>