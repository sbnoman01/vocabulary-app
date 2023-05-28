<?php 

function getResponseMessage($code){
    $response = [
        '0' => '',
        '1' => 'Duplicate email address',
        '2' => 'username or password Empty',
        '3' => 'Register success!',
        '4' => 'Login success!',
        '5' => 'Password didn\'t match',
        '6' => 'Username didn\'t match',
        '7' => 'Please login First',
    ];
    return $response[$code];
}

?>