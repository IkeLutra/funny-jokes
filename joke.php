<?php

require 'vendor/autoload.php';

use Joker\MakeAJoke;
$joker = new MakeAJoke();
echo $joker->tellMeAJoke(false) . "\n";
