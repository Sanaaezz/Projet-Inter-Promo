<?php
include __DIR__ . '/Includes/header.php';
?>
<header class="max-w-sm mx-auto">
  <h1 class="anek-gujarati text-6xl">Reservation</h1>
</header>

<main>
  <div>
    <!--Tabs navigation-->
    <ul
      class="mb-5 flex list-none flex-row flex-wrap border-b-0 ps-0"
      role="tablist"
      data-twe-nav-ref>
      <li role="presentation" class="flex-grow basis-0 text-center">
        <a
          href="#tabs-home02"
          class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary "
          data-twe-toggle="pill"
          data-twe-target="#tabs-home02"
          data-twe-nav-active
          role="tab"
          aria-controls="tabs-home02"
          aria-selected="true">New reversation</a>
      </li>
      <li role="presentation" class="flex-grow basis-0 text-center">
        <a
          href="#tabs-profile02"
          class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary "
          data-twe-toggle="pill"
          data-twe-target="#tabs-profile02"
          role="tab"
          aria-controls="tabs-profile02"
          aria-selected="false">My reservation</a>
      </li>


    </ul>

    <!--Tabs content-->
    <div class="mb-6 ">
      <div
        class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
        id="tabs-home02"
        role="tabpanel"
        aria-labelledby="tabs-home-tab02"
        data-twe-tab-active>

        <div class="bg-center opacity-50 bg-[url(../Assets/Images/kirk-photographer-dWDYKXgK1SI-unsplash.jpg)]">
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
        </div>
      </div>


      
      


    </div>
  </div>
</main>
<?php
include __DIR__ . '/Includes/footer.php';
?>