<?php

class FormValidator
{
    public static function sanitizeString(string $input): string
    {
        $sanitzedInput = strip_tags($input);
        $sanitzedInput = str_replace(" ", "", $sanitzedInput);
        $sanitzedInput = ucfirst($sanitzedInput);

        return $sanitzedInput;

    }
    public static function validatePassword(string $pass1, string $pass2)
    {
        if ($pass1 !== $pass2){
            return "<span class='err-msg'>passwords do not match</span>";
        }
            

        if(strlen($pass1)< 8 || strlen($pass2)<8){
            return "<span class='err-msg'>password must be atleast 8 characters long</span>";
        }
       
        return false;
    }
}