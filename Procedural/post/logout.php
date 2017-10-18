<?php
session_start();
session_destroy();
header('Location: post.php?error=4');
