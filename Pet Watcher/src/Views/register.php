<?php

include __DIR__.'/includes/header.php';
?>

<h1 class="anek-gujarati max-w-sm mx-auto text-center text-6xl text-[#B87410] p-6">REGISTER</h1>

<form action="<?=HOME_URL?>register" method="POST">
<main class=" bg-center opacity-50 " style="background-image: url(../Assets/Images/kirk-photographer-dWDYKXgK1SI-unsplash.jpg)" id="bgImgRegister">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

    <div class="w-full rounded-lg md:mt-0 sm:max-w-md xl:p-0 ">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

        <form class="space-y-4 md:space-y-6" action="#">
          <div>
            <input type="text" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="lastname" required="">
          </div>
          <div>
            <input type="text" name="firstname" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="firstname" required="">
          </div>
          <div>
            <input type="email" name="mail" id="mail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
          </div>
          <div>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
          </div>
          <div>
            <input type="password" name="password2" id="password2" placeholder="Confirm password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
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
</form>

<?php

include __DIR__.'/includes/footer.php';