<?php

include_once '../vendor/autoload.php';

use ZipArchiver\Archiver;

// Setup working directory.
$archiveTitle   = 'archive';
$tmpWorkingDir  = md5(uniqid() . $_SERVER['REQUEST_TIME_FLOAT']);
$tmpWorkingPath = sprintf('%s/%s/%s', sys_get_temp_dir(), $tmpWorkingDir, $archiveTitle);

// Make working directory.
@mkdir($tmpWorkingPath, 0777, true);

// Move the files you want to archive to a working directory.
rename('/path/to/file1.ext', sprintf('%s/%s', $tmpWorkingPath, 'file1.ext'));
rename('/path/to/file2.ext', sprintf('%s/%s', $tmpWorkingPath, 'file1.ext'));
rename('/path/to/file3.ext', sprintf('%s/%s', $tmpWorkingPath, 'file1.ext'));

// Sets the output path of the zip archive.
$zipPath = sprintf('%s/%s.zip', $tmpWorkingPath, $archiveTitle);

// Make zip archive.
Archiver::zipDir($tmpWorkingPath, $zipPath);
