<?php

class ErrorHandler{
    public static function showError($error){
        exit("<span class='errorBanner'>$error</span>");
    }
}