<?php

namespace Brunodebarros\Helpers;

/**
 * Helper functions for dealing with files and folders.
 *
 * @package Brunodebarros\Helpers
 * @author  Bruno De Barros <bruno@terraduo.com>
 * @internal
 */
class Filesystem {

    /**
     * Remove a directory even if it's not empty.
     *
     * @param string $dir
     */
    public static function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . DIRECTORY_SEPARATOR . $object) == "dir") {
                        self::rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                    } else {
                        chmod($dir . DIRECTORY_SEPARATOR . $object, 0777);
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

}