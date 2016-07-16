<?php

/**
 * A PHPUnit test case for Filesystem.
 */
class FilesystemTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var string A sample folder.
     */
    public $folder;

    /**
     * @var string A sample file in the sample folder.
     */
    public $file;

    public function setUp()
    {
        $this->folder = FCPATH.'filesystem_test';
        $this->file = $this->folder.DIRECTORY_SEPARATOR.'test.txt';
        mkdir($this->folder);
        touch($this->file);
    }

    public function tearDown()
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
        \Brunodebarros\Helpers\Filesystem::rrmdir($this->folder);
        self::assertFalse(file_exists($this->folder));
        self::assertFalse(file_exists($this->file));
    }
}
