<?php

session_start();

$_SESSION["email"] = null;

session_write_close();

header("Location: /webskills/");