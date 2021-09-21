Easy to make zip archive in PHP.
=============================

[![Build Status](https://travis-ci.org/1105-6601/zip-archiver.png?branch=master)](https://travis-ci.org/1105-6601/zip-archiver)
[![GitHub tag](https://img.shields.io/github/tag/1105-6601/zip-archiver.svg?label=latest)](https://packagist.org/packages/tkzo/zip-archiver) 
[![Packagist](https://img.shields.io/packagist/dt/1105-6601/zip-archiver.svg)](https://packagist.org/packages/tkzo/zip-archiver)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/1105-6601/zip-archiver.svg)](https://packagist.org/packages/tkzo/zip-archiver)

This package is intended for easy creation of ZIP archives.

This package is compliant with [PSR-4](http://www.php-fig.org/psr/4/), [PSR-1](http://www.php-fig.org/psr/1/), and
[PSR-2](http://www.php-fig.org/psr/2/).
If you notice compliance oversights, please send a patch via pull request.


Installation
-----

To install `ZipArchiver` you can either clone this repository or you can use composer.

```
composer require tkzo/zip-archiver
```


Usage
-----

e.g.)

```php
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
```

There is a complete example of this in `example/example.php`.

License
-------

[MIT License](http://mit-license.org/)
