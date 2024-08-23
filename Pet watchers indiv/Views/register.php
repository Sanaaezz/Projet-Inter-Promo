<?php


include __DIR__ . '/Includes/header.php';

?>
<header class="">
  <h1 class="max-w-sm mx-auto anek-gujarati">REGISTER</h1>
</header>
<main class=" bg-center opacity-50 " style="background-image: url(../Assets/Images/kirk-photographer-dWDYKXgK1SI-unsplash.jpg)" id="bgImgRegister">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

    <div class="w-full rounded-lg md:mt-0 sm:max-w-md xl:p-0 ">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

        <form class="space-y-4 md:space-y-6" action="#">
          <div>
            <!-- <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 ">Your lastName</label> -->
            <input type="text" name="lastName" id="lastName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="lastName" required="">
          </div>
          <div>
            <!--<label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 ">Your firstName</label>-->
            <input type="text" name="firstName" id="firstName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="firstName" required="">
          </div>
          <div>
            <!-- <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>-->
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
          </div>
          <div>
            <!-- <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>-->
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
          </div>
          <div>
            <!-- <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm password</label>-->
            <input type="confirm-password" name="confirm-password" id="confirm-password" placeholder="Confirm password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
          </div>
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
            </div>
          </div>
          <button type="submit" class="w-full bg-white  bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>

        </form>
      </div>
    </div>
  </div>
  </section>

</main>


<?php

include __DIR__ . '/Includes/footer.php';

?>