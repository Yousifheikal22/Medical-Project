<?php

function checkEmpty($value)
{
    if(empty($value))
    {
        return false;
    }
    return true;
}

function ValidateEmail($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    return true;
}

function checkLess($value, $min)
{
    if(trim(strlen($value)) > $min) {
        return true;
    }
    return false;
}