<?php

require '..\vendor\autoload.php';

use App\Employer;

$employer = new Employer;
$employer->saveCandidateInfo();
