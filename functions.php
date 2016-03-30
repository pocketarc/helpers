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