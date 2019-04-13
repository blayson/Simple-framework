<?php
define('MODELS', str_replace('public/index.php', 'src/Models', $_SERVER['SCRIPT_FILENAME']));

require_once '../vendor/autoload.php';

$container = new Jedi\DIContainer;
$jedi      = new Jedi\App($container);

require_once '../settings/dependency.php';

require_once '../settings/route.php';

//$jedi->container();
$jedi->run();
