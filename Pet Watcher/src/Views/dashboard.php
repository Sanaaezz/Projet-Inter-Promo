<?php

include_once __DIR__ . '/includes/header.php';

use src\Models\Database;
use src\Repositories\ReservationRepository;



if(!isset($_SESSION['user'])) { ?>
    <h1>You should be connect to be here</h1>
    <button onclick="location.href='<?= HOME_URL ?>login'">To login</button>
    <?php
}
$user = unserialize($_SESSION['user']);

$role = (int)$user->getIdRole();

$database = new Database();
$ReservationRepository = ReservationRepository::getInstance($database);

$allReservation = $ReservationRepository->getAllReservation();
$allReservationOffUser = $ReservationRepository->getAllDetailReservationByIdUser($user->getIdUser());

if($role == 1) { ?>
    <div>
        <button onclick="location.href='<?= HOME_URL ?>reservation'">New reservation</button>
    </div>
    <div>
    <?php
            foreach($allReservationOffUser as $Reservation) { ?>
        <table>
            <tr>
                <th>Start</th>
                <th>End</th>
                <th>Validated</th>
                <th>Dog</th>
                <th>Cat</th>
                <th>Rabbit</th>
            </tr>
            <tr> 
                <td><?= htmlspecialchars($Reservation['dtm_start']) ?></td>
                <td><?= htmlspecialchars($Reservation['dtm_end']) ?></td>
                <td><?php 
                if(htmlspecialchars($Reservation['validated']) == 0){?>
                    Waiting
                <?php }else { ?>
                        Validated
                <?php
                } ?></td>
                <td><?= htmlspecialchars($Reservation['type']) ?></td>
                <td><?= htmlspecialchars($Reservation['type']) ?></td>
                <td><?= htmlspecialchars($Reservation['type']) ?></td>
            
            </tr>

        </table>
        <?php
        } ?>
    </div>
<?php
}
elseif($role == 2) { ?>
        <div>
        <button onclick="location.href='<?= HOME_URL ?>addResa'">New reservation</button>
    </div>
    <div>

        <table>
            <tr>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Email</th>
                <th>Start</th>
                <th>End</th>
                <th>Validated</th>
                <th>Detail</th>
            </tr>
            <?php
foreach($allReservation as $reservation) {
?>
<tr>
    <td><?= htmlspecialchars($reservation['lastname'])?></td>
    <td><?= htmlspecialchars($reservation['firstname'])?></td>
    <td><?= htmlspecialchars($reservation['mail'])?></td>
    <td><?= htmlspecialchars($reservation['dtm_start'])?></td>
    <td><?= htmlspecialchars($reservation['dtm_end'])?></td>
    <td><?php 
        if(htmlspecialchars($reservation['validated']) == 0){?>
            Waiting
        <?php }else {?>
            Validated
        <?php
        }?></td>
    <td>
        bouton details
    </td>
</tr>
<?php
}
?>

        </table>
    </div>

<?php
}

include_once __DIR__ . '/Includes/footer.php';

?>