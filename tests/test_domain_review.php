<?php
declare(strict_types=1);
require __DIR__ . "/../src/DomainReview.php";

use Portfolio\DomainReview;
use Portfolio\DomainReviewLens;

$item = new DomainReview(47, 41, 8, 67);
assert(DomainReviewLens::score($item) === 178);
assert(DomainReviewLens::lane($item) === "ship");
