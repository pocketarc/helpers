<?php

namespace Brunodebarros\Helpers;

/**
 * Helper functions for running and processing system commands.
 *
 * @package Brunodebarros\Helpers
 * @author  Bruno De Barros <bruno@terraduo.com>
 * @internal
 */
class System {

    /**
     * Runs a command and handles its output in real-time, line-by-line.
     * $callback is called for each line of output.
     * If $cwd is not provided, will use the working dir of the current PHP process.
     *
     * @param string   $cmd
     * @param callable $callback
     * @param string   $cwd
     *
     * @return array with two keys: exit_code and output.
     */
    public static function run($cmd, $callback = null, $cwd = null) {
        $pipes = [];
        $output = "";
        $descriptor_spec = array(
            0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
            1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
        );
        $process = proc_open("$cmd 2>&1", $descriptor_spec, $pipes, $cwd);
        fclose($pipes[0]);
        stream_set_blocking($pipes[1], 0);

        while (true) {
            $status = proc_get_status($process);

            # Handle pipe output.
            $result = fgets($pipes[1]);
            while (!empty(trim($result))) {
                $output .= $result;
                if ($callback) {
                    call_user_func($callback, trim($result));
                }
                $result = fgets($pipes[1]);
            }

            if (!$status['running']) {
                # Exit the function.
                return [
                    "exit_code" => $status['exitcode'],
                    "output" => $output,
                ];
            }
        }
    }

}