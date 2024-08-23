<?php
include __DIR__ . '/Includes/header.php'
?>

<main class="bg-center opacity-50 bg-[url(../Assets/Images/kirk-photographer-dWDYKXgK1SI-unsplash.jpg)]">
  <div class="mx-auto flex flex-row p-24 ml-20">
    <div class="p-16 flex-col space-y-8">
      <div>
        <label for="number-input">Dog</label>
        <input type="number" min="0" max="10">
      </div>
      <div>
        <label for="number-input">Cat</label>
        <input type="number" min="0" max="10">
      </div>
      <div>
        <label for="number-input">Rabbit</label>
        <input type="number" min="0" max="10">
      </div>
    </div>


    <div class="">
      <div id="date-range-picker" date-rangepicker class="flex items-center">
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
            </svg>
          </div>
          <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date start">
        </div>
        <span class="mx-4 ">to</span>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
            </svg>
          </div>
          <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Select date end">
        </div>
      </div>
      <div class="pt-20">
        <label for="message" class="block mb-2 text-sm font-medium text-black "></label>
        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-black
        rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Comments"></textarea>
      </div>
    </div>
  </div>
</main>
<?php
include __DIR__ . '/Includes/footer.php'
?>