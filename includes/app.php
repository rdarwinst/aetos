<?php

use App\ActiveRecord;

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$db = conectarDB();

ActiveRecord::setDB($db);
