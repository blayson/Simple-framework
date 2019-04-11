<?php


require_once '../Jedi/App.php';
require_once '../Jedi/DIContainer.php';

$container = new Jedi\DIContainer();
$jedi = new Jedi\App($container);

require_once '../settings/dependency.php';

$jedi->container();