<?php require_once 'config.php'; 
$action = $_POST['action'] ?? null;
$conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if( ! $conn ){
    echo 'error';
} else{
    
    if( 'register' == $action):
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_pass = password_hash($_POST['user_pass'], PASSWORD_BCRYPT);

        if( $user_name&&$user_email&&$user_pass ){
            $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('{$user_name}', '{$user_email}', '{$user_pass}')";
           mysqli_query($conn, $query);
           if(mysqli_error( $conn )){
            echo mysqli_error($conn);
           }
        }
    endif;
    
}