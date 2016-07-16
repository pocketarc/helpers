<?php

namespace Brunodebarros\Helpers;

/**
 * Helper functions for dealing with email.
 *
 * @author  Bruno De Barros <bruno@terraduo.com>
 */
class Email
{
    /**
     * Takes a comma-separated list of emails (or an array of email addresses)
     * and parses them all into a single array of validated emails.
     *
     * @param string|array $buffer
     *
     * @return array
     */
    public static function normalizeEmailAddresses($buffer)
    {
        if (!is_array($buffer)) {
            $buffer = explode(',', str_ireplace("\n", ',', $buffer));
        }

        $emails = [];

        foreach ($buffer as $key => $value) {
            $value = explode(',', str_ireplace("\n", ',', $value));

            foreach ($value as $possible_email) {
                $possible_email = trim($possible_email);

                if (empty($possible_email) || !filter_var($possible_email, FILTER_VALIDATE_EMAIL)) {
                    continue;
                }

                $emails[] = $possible_email;
            }
        }

        foreach ($emails as $key => $value) {
            if (!\Swift_Validate::email($value)) {
                unset($emails[$key]);
            }
        }

        return $emails;
    }
}
