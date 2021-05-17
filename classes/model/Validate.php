<?php
namespace classes\model;

class Validate
{
    public static function validaTxt($value,int $char)
    {
if (isset($value) && !empty($value) && !is_null($value) && strlen($value) <= $char) {
            return true;
        }
        return false;
    }

    public static function validaEmail($value,int $char)
    {
        if (isset($value) && !empty($value) && !is_null($value) && strlen($value) <= $char) {
            $email = filter_var($value, FILTER_VALIDATE_EMAIL,FILTER_SANITIZE_EMAIL);
            if ($email) {
                return true;
            }
        }
        return false;
    }
    public static function validaInt($value)
    {
        if (isset($value) && !empty($value) && !is_null($value)) {
            return true;
        }
        return false;
    }
}
