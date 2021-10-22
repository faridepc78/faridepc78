<?php

function newFeedback($title = 'موفقیت', $body = 'عملیات با موفقیت انجام شد', $type = 'success')
{
    $session = session()->has('feedbacks') ? session()->get('feedbacks') : [];
    $session[] = ['title' => $title, 'body' => $body, 'type' => $type];
    session()->flash('feedbacks', $session);
}

function make_token($count): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $count; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

function randomNumbers($count)
{
    $numbers = '0123456789';

    $randomNumbers = '';

    for ($i = 0; $i < $count; $i++) {
        $index = rand(0, strlen($numbers) - 1);
        $randomNumbers .= $numbers[$index];
    }

    return $randomNumbers;
}

?>
