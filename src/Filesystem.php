<?php

namespace Brunodebarros\Helpers;

use League\Flysystem\Adapter\Local;

/**
 * Helper functions for dealing with files and folders.
 *
 * @author  Bruno De Barros <bruno@terraduo.com>
 */
class Filesystem
{
    /**
     * Remove a directory even if it's not empty.
     *
     * @param string $dir
     */
    public static function rrmdir($dir)
    {
        $adapter = new Local(dirname($dir));
        $filesystem = new \League\Flysystem\Filesystem($adapter);
        $filesystem->deleteDir(basename($dir));
    }
}
