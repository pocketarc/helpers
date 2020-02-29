<?php

use PHPUnit\Framework\TestCase;
use Brunodebarros\Helpers\Filesystem;

/**
 * A PHPUnit test case for Filesystem.
 */
class FilesystemTest extends TestCase
{
    /**
     * @var string A sample folder.
     */
    public $folder;

    /**
     * @var string A sample file in the sample folder.
     */
    public $file;

    protected function setUp(): void
    {
        $this->folder = FCPATH.'filesystem_test';
        $this->file = $this->folder.DIRECTORY_SEPARATOR.'test.txt';
        mkdir($this->folder);
        touch($this->file);
    }

    protected function tearDown(): void
    {
        if (file_exists($this->file)) {
            unlink($this->file);
        }

        if (file_exists($this->folder)) {
            rmdir($this->folder);
        }
    }

    public function testRrmdir()
    {
        Filesystem::rrmdir($this->folder);
        self::assertFileNotExists($this->folder);
        self::assertFileNotExists($this->file);
    }
}
