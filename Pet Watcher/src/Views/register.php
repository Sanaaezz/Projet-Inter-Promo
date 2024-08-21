<?php

include __DIR__ . '/Includes/header.php';

?>

<H1>REGISTER</H1>



<form class="max-w-sm mx-auto">
  <div>
    <label for="LastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
    <input type="text" id="LastName" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div>
    <label for="FirstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
    <input type="text" id="FirstName" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div>
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="email" id="email" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div>
    <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
    <input type="password" id="Password" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div>
    <label for="PasswordConf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
    <input type="password" id="PasswordConf" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
</form>

<?php

include __DIR__ . '/Includes/footer.php';

?>