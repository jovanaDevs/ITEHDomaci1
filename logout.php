<?php
session_start();
session_destroy();
echo 'Izlogovali ste se! <a href="login.php">Prijavi se opet</a>';