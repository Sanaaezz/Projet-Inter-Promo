<?php

include __DIR__ . '/Includes/header.php';

?>
<div class="">
  <h1 class="max-w-sm mx-auto ">Login</h1>
</div>
<main class="bg-cover" style="background-image: url(../Assets/Images/mel-elias-hhegBj6iJ5E-unsplash.jpg)" id="bgImgRegister">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <form class="space-y-4 md:space-y-6" action="#">
          <div>
            <!-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>-->
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Email" required="">
          </div>
          <div>
            <!-- <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>-->
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
          </div>

          <button type="submit" class=" bg-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>

        </form>
      
  </div>
 

</main>


<?php

include __DIR__ . '/Includes/footer.php';

?>