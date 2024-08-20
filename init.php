<?php
session_start();

include_once 'Core/Config/database.php';
include_once 'vendor/autoload.php';

include 'Core/Config/config.php';
date_default_timezone_set(DEFAULT_TIME_ZONE);

include_once 'Core/Function/toJalali.php';