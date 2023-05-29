<?php 
require_once 'inc/db.php'; 


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
        'inserterror' => 'Insert Error to database!',
        'insertsucc' => 'New Word added'
    ];
    return $response[$code];
}

function getWordList( $user_id, $searchString = null){
    global $conn;
    // result
    if( $searchString != null ){
        $select_word_query = "SELECT * FROM words WHERE user_id = $user_id AND word LIKE '{$searchString}%'";
    }else{
        $select_word_query = "SELECT * FROM words WHERE user_id = $user_id";
    }
    $res = mysqli_query($conn, $select_word_query);
    $data = [];
    
    if( mysqli_num_rows($res)){
        while ( $_res = mysqli_fetch_assoc($res) ){
            array_push($data, $_res);
        }
        return $data;
    }
}

?>