<?php

function newFeedback($title = 'موفقیت', $body = 'عملیات با موفقیت انجام شد', $type = 'success')
{
    $session = session()->has('feedbacks') ? session()->get('feedbacks') : [];
    $session[] = ['title' => $title, 'body' => $body, 'type' => $type];
    session()->flash('feedbacks', $session);
}

function client_ip()
{
    return $_SERVER['REMOTE_ADDR'] . '-' . md5($_SERVER['HTTP_USER_AGENT']);
}
