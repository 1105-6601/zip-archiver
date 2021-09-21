<?php

include_once '../vendor/autoload.php';

use ZipArchiver\Archiver;

$here      = dirname(__FILE__);
$targetDir = $here . DIRECTORY_SEPARATOR . 'images';
$zipPath   = sprintf('%s/images.zip', $here);

Archiver::zipDir($targetDir, $zipPath);

var_dump($zipPath);
die();
