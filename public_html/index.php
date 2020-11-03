<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use App\core\PageLoader;


(new PageLoader)->loadController();
