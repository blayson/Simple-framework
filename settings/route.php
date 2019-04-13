<?php

use Controllers\MainController;
use Controllers\PersonController;

$jedi->register('GET' ,'Main', MainController::class);
$jedi->register('GET' ,'ggg', PersonController::class);
$jedi->register('GET', 'Person', PersonController::class);