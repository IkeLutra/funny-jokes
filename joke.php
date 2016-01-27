<?php

require 'vendor/autoload.php';

use Joker\MakeAJoke;
$joker = new MakeAJoke();
echo $joker->tellMeARandomJoke(false, "Vajeen", "Day") . "\n";
