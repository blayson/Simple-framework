<?php

function getFilePath(String $class, String $folderName = 'Jedi')
{
    if ($folderName == 'Jedi') {
        $srcPath = __DIR__.DIRECTORY_SEPARATOR.$folderName;
    } else {
        $srcPath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.$folderName;
    }

    $replaceRootPath     = str_replace($folderName, $srcPath, $class);
    $replaceDirSeparator = str_replace('\\', DIRECTORY_SEPARATOR, $replaceRootPath);
    $filePath            = $replaceDirSeparator.'.php';

    return $filePath;
}

function autoloadJedi(String $class)
{
    $filePath = getFilePath($class);

    if (file_exists($filePath)) {
        require($filePath);
    }
}

function autoloadControllers(String $class)
{
    $filePath = getFilePath($class, 'Controllers');

    if (file_exists($filePath)) {
        require($filePath);
    }
}

function autoloadModels(String $class)
{
    $filePath = getFilePath($class, 'Models');

    if (file_exists($filePath)) {
        require($filePath);
    }
}

spl_autoload_register('autoloadJedi');
spl_autoload_register('autoloadControllers');
spl_autoload_register('autoloadModels');
