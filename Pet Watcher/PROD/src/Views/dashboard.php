<?php

include_once __DIR__ . '/includes/header.php';

use src\Models\Database;
use src\Repositories\ReservationRepository;
use src\Repositories\UserRepository;

if(!isset($_SESSION['user'])) { ?>
    <h1>You should be connect to be here</h1>
    <button onclick="location.href='<?= HOME_URL ?>login'">To login</button>
    <?php
}
$user = unserialize($_SESSION['user']);

$role = (int)$user->getIdRole();

$database = new Database();
$ReservationRepository = ReservationRepository::getInstance($database);
$UserRepository = UserRepository::getInstance($database);

$allReservation = $ReservationRepository->getAllReservation();
$allReservationOffUser = $ReservationRepository->getAllDetailReservationByIdUser($user->getIdUser());
$allUser = $UserRepository->getAllUser();



if($role == 1) { ?>
    <div class="bg-gray-100 font-sans flex h-screen items-center justify-center" style="background: #edf2f7;">
        <div x-data="{ openTab: 1 }" class="w-full h-full mt-12">
            <div class="w-full h-full">
                <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                    <button x-on:click="openTab = 1" :class="{ 'bg-white': openTab === 1 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Reservations</button>
                    <button x-on:click="openTab = 2" :class="{ 'bg-white': openTab === 2 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Pending reservations</button>
                </div>
                <div x-show="openTab === 1" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4">
                    <div class="flex min-h-screen ">
                        <div class="w-full h-full">
                            <table class="min-w-full bg-white shadow-md rounded-xl">
                                <thead>
                                    <tr class="bg-blue-gray-100 text-gray-700">
                                        <th class="py-3 px-4 text-left">Name</th>
                                        <th class="py-3 px-4 text-left">Pick up</th>
                                        <th class="py-3 px-4 text-left">Drop off</th>
                                        <th class="py-3 px-4 text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-blue-gray-900">
                                    <?php
                                foreach($allReservationOffUser as $reservation) {
                                    if($reservation['validated'] == 1) {?>
                                    <tr class="border-b border-blue-gray-200">
                                        <td class="py-3 px-4"><?= htmlspecialchars($reservation['lastname'])?> <?= htmlspecialchars($reservation['firstname'])?></td>
                                        <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_start'])?></td>
                                        <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_end'])?></td>
                                        <td class="py-3 px-4">
                                            <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <div x-show="openTab === 2" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 ">
            <div class="flex min-h-screen ">
                <div class="w-full h-full">
                <table class="min-w-full bg-white shadow-md rounded-xl">
                    <thead>
                    <tr class="bg-blue-gray-100 text-gray-700">
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Pick up</th>
                        <th class="py-3 px-4 text-left">Drop off</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-blue-gray-900">
                    <?php
                foreach($allReservationOffUser as $reservation) {
                    if($reservation['validated'] == 0) {?>
                    <tr class="border-b border-blue-gray-200">
                        <td class="py-3 px-4"><?= htmlspecialchars($reservation['lastname'])?> <?= htmlspecialchars($reservation['firstname'])?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_start'])?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_end'])?></td>
                        <td class="py-3 px-4">
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Validate</a>
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                } ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>

        </div>
        </div>
    </div>
<?php
}
elseif($role == 2) { ?>

<div class="bg-gray-100 font-sans flex h-screen items-center justify-center" style="background: #edf2f7;">
    <div x-data="{ openTab: 1 }" class="w-full h-full mt-12">
      <div class="w-full h-full">
        <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
          <button x-on:click="openTab = 1" :class="{ 'bg-white': openTab === 1 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Reservations</button>
          <button x-on:click="openTab = 2" :class="{ 'bg-white': openTab === 2 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Pending reservations</button>
          <button x-on:click="openTab = 3" :class="{ 'bg-white': openTab === 3 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Users</button>
        </div>

        <div x-show="openTab === 1" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4">
          <div class="flex min-h-screen ">
            <div class="w-full h-full">
              <table class="min-w-full bg-white shadow-md rounded-xl">
                <thead>
                  <tr class="bg-blue-gray-100 text-gray-700">
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Pick up</th>
                    <th class="py-3 px-4 text-left">Drop off</th>
                    <th class="py-3 px-4 text-left">Action</th>
                  </tr>
                </thead>
                <tbody class="text-blue-gray-900">
                <?php
            foreach($allReservation as $reservation) {
                if($reservation['validated'] == 1) {?>
                  <tr class="border-b border-blue-gray-200">
                    <td class="py-3 px-4"><?= htmlspecialchars($reservation['lastname'])?> <?= htmlspecialchars($reservation['firstname'])?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_start'])?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_end'])?></td>
                    <td class="py-3 px-4">
                      <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Delete</a>
                    </td>
                  </tr>
                  <?php
                }
            } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div x-show="openTab === 2" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 ">
          <div class="flex min-h-screen ">
            <div class="w-full h-full">
              <table class="min-w-full bg-white shadow-md rounded-xl">
                <thead>
                  <tr class="bg-blue-gray-100 text-gray-700">
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Pick up</th>
                    <th class="py-3 px-4 text-left">Drop off</th>
                    <th class="py-3 px-4 text-left">Action</th>
                  </tr>
                </thead>
                <tbody class="text-blue-gray-900">
                <?php
            foreach($allReservation as $reservation) {
                if($reservation['validated'] == 0) {?>
                  <tr class="border-b border-blue-gray-200">
                    <td class="py-3 px-4"><?= htmlspecialchars($reservation['lastname'])?> <?= htmlspecialchars($reservation['firstname'])?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_start'])?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($reservation['dtm_end'])?></td>
                    <td class="py-3 px-4">
                      <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Validate</a>
                      <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Delete</a>
                    </td>
                  </tr>
                  <?php
                }
            } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div x-show="openTab === 3" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4">
          <div class="flex min-h-screen ">
            <div class="w-full h-full">
              <table class="min-w-full bg-white shadow-md rounded-xl">
                <thead>
                  <tr class="bg-blue-gray-100 text-gray-700">
                    <th class="py-3 px-4 text-left">First name</th>
                    <th class="py-3 px-4 text-left">Last name</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                  </tr>
                </thead>
                <tbody class="text-blue-gray-900">
                    <?php
                    foreach($allUser as $value) { ?>
                        <tr class="border-b border-blue-gray-200">
                          <td class="py-3 px-4"><?= htmlspecialchars($reservation['firstname'])?></td>
                          <td class="py-3 px-4"><?= htmlspecialchars($reservation['lastname'])?></td>
                          <td class="py-3 px-4"><?= htmlspecialchars($reservation['mail'])?></td>
                          <td class="py-3 px-4">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Set Admin</a>
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-800 ml-6">Delete</a>
                          </td>
                        </tr>
                   <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
} ?>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<?php
include_once __DIR__ . '/Includes/footer.php';

?>