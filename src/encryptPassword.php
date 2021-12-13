<?php
function encryptPassword($email, $password)
{
    return sha1($email) . sha1($password . "!m?0M{70") . "mJ4uGOb5";
}