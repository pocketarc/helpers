<?php

/**
 * Does the same as reset(), without the "Only variables should be passed by reference" error.
 *
 * @param array $arr
 *
 * @return mixed
 */
function array_reset($arr) {
    return reset($arr);
}

/**
 * Does the same as end(), without the "Only variables should be passed by reference" error.
 *
 * @param array $arr
 *
 * @return mixed
 */
function array_end($arr) {
    return end($arr);
}

/**
 * Remove a directory even if it's not empty.
 *
 * @param string $dir
 */
function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}