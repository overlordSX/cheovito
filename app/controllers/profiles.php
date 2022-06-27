<?php

include('app/database/db_func.php');

$errMsg = '';

if(isset($_POST['button_reg'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['second_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $duplicate_password = trim($_POST['duplicate_password']);
    $registration_date = date('Y-m-d');
    $activity_status = 1;


    if($first_name === ''
        || $last_name === ''
        || $phone === ''
        || $email === ''
        || $password === ''
        || $duplicate_password === '')     {
        $errMsg = "Не все поля заполнены!";
    }
    elseif ($password !== $duplicate_password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $errMsg = 'пароли не совпадают';
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $create_params = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone_number' => $phone,
        'email' => $email,
        'password' => $password,
        'registration_date' => $registration_date,
        'activity_status' => $activity_status
    ];

    $user_id = insert('profile', $create_params);
}
