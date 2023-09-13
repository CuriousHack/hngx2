<?php

class Validator
{
    public static function string($entry)
    {
        if(preg_match("/^[a-zA-Z]*$/", $entry))
        {
            return trim($entry);
        }
    }

    public static function sanitize($entry)
    {
        return htmlspecialchars(strip_tags($entry));
    }

    public static function empty($value, $min = 1){
        $value = trim($value);

        return strlen($value) >= $min;
}
}