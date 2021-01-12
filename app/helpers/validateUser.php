<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Kullanıcı Adı Gerekli');
    }

    if (empty($user['email'])) {
        array_push($errors, 'E-mail Gerekli');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Şifre Gerekli');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Şifreleriniz Uyuşmuyor');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'E-mail Zaten Kullanılmış');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'E-mail Zaten Kullanılmış');
        }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Kullanıcı Adı Gerekli');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Şifre Gerekli');
    }

    return $errors;
}