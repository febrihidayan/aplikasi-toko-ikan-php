<?php

session_start();

session_destroy();

return header("Location:login.php");