<?php 

include(ROOT_PATH . '/app/database1/db.php');

function validate($users){
    $error = [];

    if(empty($users['username'])){
        array_push($error, "username is required");
    }
    

    if(empty($users['email'])){
        array_push($error, "email is required");
    }
    

    if(empty($users['password'])){
        array_push($error, "password is required");
    }
    

    if($users['passwordConf'] !== $users['password']){
        array_push($error, "password do not match");
    }

    $existingUser = selectOne('users', ['email' => $users['email']]);
    if(isset($existingUser)){
        array_push($error, "Email already exist");
    }

    $existingpass = selectOne('users', ['username' => $users['username']]);
    if(isset($existingpass)){
        array_push($error, "There is an existing user with this username");
    }

    return $error;
}


function validateLogin($users){
    $error = [];

    if(empty($users['username'])){
        array_push($error, "username is required");
    }
    
    

    if(empty($users['password'])){
        array_push($error, "password is required");
    }
    

    return $error;
}














?>