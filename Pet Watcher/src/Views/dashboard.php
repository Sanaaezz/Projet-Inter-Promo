<?php

include_once __DIR__ . '/includes/header.php';

switch ((int)$user->getIdRole()) {
    case (int)1:
        include __DIR__.'/Includes/board/adminboard.php';
        break;
    case 2:
        include __DIR__.'/Includes/board/campusManager.php';
        break;
    case 3:
        include __DIR__.'/Includes/board/responsable.php';
        break;
    case 4:
        include __DIR__.'/Includes/board/formateur.php';
        break;
    case 5:
        include __DIR__.'/Includes/board/delegue.php';
        break;
    case 6:
        include __DIR__.'/Includes/board/apprenant.php';
        break;
}

include_once __DIR__ . '/Includes/footer.php';

?>