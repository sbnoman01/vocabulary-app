<?php 
session_start();
require_once 'db.php'; 
global $conn;

$action = $_POST['action'] ?? null;

if( ! $conn ){
    echo 'error';
} else{
    
    if( 'register' == $action ){
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_pass = password_hash($_POST['user_pass'], PASSWORD_BCRYPT);

        if( $user_name&&$user_email&&$user_pass ){
            $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('{$user_name}', '{$user_email}', '{$user_pass}')";
            $respCode = 0;
           mysqli_query($conn, $query);
           if(mysqli_error( $conn )){
                $respCode = 1;
           }else{
                $respCode = 3;
           }
           header("Location: ../register.php?rescode={$respCode}");
        }
    }elseif( 'login' == $action ){
        
        $login_email = $_POST['login_email'];
        $login_pass = $_POST['login_pass'];
        if( !empty($login_email) && !empty($login_pass) ){
            $login_query = "SELECT id, password FROM users WHERE email='{$login_email}'";
            $results = mysqli_query($conn, $login_query);
            if( mysqli_num_rows($results) > 0 ){
                $data = mysqli_fetch_assoc($results);
                $pass = $data['password'];
                $_id = $data['id'];
                if(password_verify($login_pass, $pass)){
                    $_SESSION['id'] = $_id;
                    header("Location: ../index.php");
                    die();
                }
                else{
                    $respCode = 5;
                }
                
            }else{
                $respCode = 6;
            }
            header("Location: ../login.php?rescode={$respCode}");
        }
    }elseif( 'addword' == $action ){
        $_word = $_POST['_word'];
        $_meaning = $_POST['_meaning'];
        $_user_ID = $_SESSION['id'] ?? 0;
        if( $_word && $_meaning && $_user_ID != 0 ){
            $insert_word = "INSERT INTO words(user_id, word, meaning) VALUES('{$_user_ID}', '{$_word}', '{$_meaning}')";

            $res = mysqli_query($conn, $insert_word);
            if( !$res ):
                header("Location: ../index.php?rescode=inserterror");
            else:
                header("Location: ../index.php?rescode=insertsucc");
            endif;
        }
    }
}
