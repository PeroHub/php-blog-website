<?php 


include(ROOT_PATH . "/app/helpers/validate.php");

$username = '';
$email = '';
$password = '';
$passwordConf = '';
$error = [];


if (isset($_POST['register-btn'])){

    $error = validate($_POST);
    

    if(count($error) === 0){
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['admin'] = 0;
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user_id = create('users', $_POST);
        $user = selectOne('users', ['id' => $user_id]);

        //Log our user inn
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['messgae'] = "You are now logged in";
        $_SESSION['type'] = "success";

        if($_SESSION['admin']){
            header('location: ' . BASE_URL . '/admin/dashboard.php');
        } else {
            header('location: ' . BASE_URL . '/index.php');

        }
        
        exit();

        
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }

    
}

if(isset($_POST['login-btn'])) {
    $error = validateLogin($user);

    if(count($error === 0)){
        $user = selectOne('users', ['username' => $_POST['username']]);

        if($user && password_verify($_POST['password'], $user['password']));
    } else {
        array_push($error, 'Wrong credentials');
    }
}




?>