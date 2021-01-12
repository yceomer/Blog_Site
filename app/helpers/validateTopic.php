<?php

function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'İsim Gerekli');
    }

    $existingTopic = selectOne('topics', ['name' => $post['name']]);
    if ($existingTopic) {
        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
            array_push($errors, 'Bu İsim Zaten Kullanılmış');
        }

        if (isset($post['add-topic'])) {
            array_push($errors, 'Bu İsim Zaten Kullanılmış');
        }
    }

    return $errors;
}
