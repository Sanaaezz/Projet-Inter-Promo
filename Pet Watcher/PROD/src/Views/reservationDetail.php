<?php

$reservation = unserialize($_SESSION['reservation']);
$freeSpace = unserialize($_SESSION['freeSpace']);

?>

<div class="w-full h-full">
    <table class="min-w-full bg-white shadow-md rounded-xl">
        <thead>
            <tr class="bg-blue-gray-100 text-gray-700">
                <th class="py-3 px-4 text-left">Date</th>
                <th class="py-3 px-4 text-left">Pet</th>
                <th class="py-3 px-4 text-left">Remaining slot</th>
            </tr>
        </thead>
        <tbody class="text-blue-gray-900">
            <?php
        foreach($freeSpace as $index => $array) {
            foreach($array as $key => $value) {?>
            <tr class="border-b border-blue-gray-200">
                <td class="py-3 px-4"><?= htmlspecialchars($reservation['date'])?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($reservation['type'])?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($reservation['remaining'])?></td>
            <?php
            }
        } ?>
        </tbody>
    </table>
</div>

