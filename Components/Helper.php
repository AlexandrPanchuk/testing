<?php

namespace app\Components;

class Helper
{

    public static function isValidEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        list($user, $host) = explode("@", $email);
        if (!checkdnsrr($host, "MX") && !checkdnsrr($host, "A")) {
            return false;
        }
        return true;
    }


}