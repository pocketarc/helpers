<?php

namespace Brunodebarros\Helpers;

/**
 * Helper functions for formatting data for display.
 *
 * @package Brunodebarros\Helpers
 * @author  Bruno De Barros <bruno@terraduo.com>
 */
class Formatting {

    /**
     * Displays bytes in a human-friendly format (e.g. 512 MB, 1 GB).
     *
     * @param int $bytes
     * @param int $precision
     *
     * @return string
     */
    public static function bytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes = $bytes / pow(1024, $pow);

        return round($bytes, $precision) . ' ' . ($units[$pow]);
    }

}