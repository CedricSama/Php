<?php
session_start();
session_destroy();
setcookie('passions', null, time() - 3600);
setcookie('etat_civil', null, time() - 3600);
header('Location: index.php?error=3');
