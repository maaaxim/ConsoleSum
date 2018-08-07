<?php

use Symfony\Component\Console\Application;
use Maaaxim\SumCommand;

require("../vendor/autoload.php");

$app = new Application('Welcome', "v1.0.0");
$app->add(new SumCommand());
$app->run();