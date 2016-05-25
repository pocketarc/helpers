<?php

namespace Brunodebarros\Helpers;

/**
 * Helper functions for dealing with arrays.
 *
 * @package Brunodebarros\Helpers
 * @author  Bruno De Barros <bruno@terraduo.com>
 * @internal
 */
class Arrays {

    /**
     * Does the same as reset(), without the "Only variables should be passed by reference" error.
     *
     * @param array $arr
     *
     * @return mixed
     */
    public static function reset($arr) {
        return reset($arr);
    }

    /**
     * Does the same as end(), without the "Only variables should be passed by reference" error.
     *
     * @param array $arr
     *
     * @return mixed
     */
    public static function end($arr) {
        return end($arr);
    }

}