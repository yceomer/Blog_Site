<?php


function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Başlık Gerekli');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Body is required');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Lütfen Bir Konu Seç.');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Bu Başlığa Sahip Gönderi Zaten Var');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Bu Başlığa Sahip Gönderi Zaten Var');
        }
    }

    return $errors;
}