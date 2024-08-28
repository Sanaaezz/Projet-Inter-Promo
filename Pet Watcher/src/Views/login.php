<?php

include __DIR__.'/includes/header.php';
?>

<div class="">
  <h1 class="max-w-sm mx-auto text-center text-7xl text-[#B87410] p-6">Login</h1>
    <form action="<?=HOME_URL?>login" method="POST" class="space-y-4 md:space-y-6">
      <main class="bg-cover bg-no-repeat bg-center" style="background-image: url(../Assets/Images/mel-elias-hhegBj6iJ5E-unsplash.jpg)" id="bgImgRegister">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="p-4">
            <input type="email" name="str_email" id="str_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Email" required="">
            </div>
            <div class="p-2">
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
          </div>
          <button type="submit" class=" bg-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
        </div>
      </main>
  </form>
</div>



<?php

include __DIR__.'/includes/footer.php';
