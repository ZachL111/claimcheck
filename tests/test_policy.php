<?php
declare(strict_types=1);
require __DIR__ . "/../src/Policy.php";

use Portfolio\Policy;
use Portfolio\Signal;

$signal_case_1 = new Signal(52, 98, 20, 15, 10);
assert(Policy::score($signal_case_1) === 97);
assert(Policy::classify($signal_case_1) === "review");
$signal_case_2 = new Signal(66, 106, 19, 13, 11);
assert(Policy::score($signal_case_2) === 152);
assert(Policy::classify($signal_case_2) === "accept");
$signal_case_3 = new Signal(67, 96, 17, 12, 10);
assert(Policy::score($signal_case_3) === 152);
assert(Policy::classify($signal_case_3) === "accept");
