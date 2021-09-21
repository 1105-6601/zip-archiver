<?php

declare(strict_types=1);

namespace ZipArchiver\Test;

use PHPUnit\Framework\TestCase;
use ZipArchiver\Archiver;

class ArchiverTest extends TestCase
{
    /**
     * @test
     * @testdox Test to making zip archive.
     */
    public function makeZipArchive()
    {
        $archiveTitle   = '___archive';
        $tmpWorkingPath = sprintf('/tmp/%s', $archiveTitle);

        @mkdir($tmpWorkingPath, 0777, true);

        touch(sprintf('%s/file1.txt', $tmpWorkingPath));
        touch(sprintf('%s/file2.txt', $tmpWorkingPath));
        touch(sprintf('%s/file3.txt', $tmpWorkingPath));

        $zipPath = sprintf('/tmp/%s.zip', $archiveTitle);

        Archiver::zipDir($tmpWorkingPath, $zipPath);

        $this->assertFileExists($zipPath);
        $this->assertTrue($this->fileIsZipArchive($zipPath));

        // Cleanup
        unlink($zipPath);
        exec(sprintf('rm -rf %s', $tmpWorkingPath));
    }

    /**
     * @param string $filePath
     * @return bool
     */
    private function fileIsZipArchive(string $filePath): bool
    {
        $fh = @fopen($filePath, "r");
        if (!$fh) {
            $this->fail('Could not open file');
        }

        $blob = fgets($fh, 5);

        fclose($fh);

        return strpos($blob, 'PK') !== false;
    }
}
