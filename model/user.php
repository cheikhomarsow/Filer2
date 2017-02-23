<?php

require_once('model/db.php');

function get_user_by_id($id)
{
    $id = (int)$id;
    $data = find_one("SELECT * FROM users WHERE id = ".$id);
    return $data;
}

function get_user_by_username($username)
{
    $data = find_one_secure("SELECT * FROM users WHERE username = :username",
                            ['username' => $username]);
    return $data;
}

function user_check_register($data)
{
    if (empty($data['username']) OR empty($data['password']) OR 
        empty($data['repeat_password']) OR empty($data['secret_ask'])){
            /*empty($data['secret_ask']) OR empty($data['secret_answer'])*/
        return false;
    }
        
    $data2 = get_user_by_username($data['username']);
    if ($data2 !== false){
        return false;
        
    }
    // TODO : Check valid username, password, secret ask
    if(strlen($data['username'])<6){
        return false;
    }
    $regexp = "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$";    
    /*if(!preg_match($regexp, $password))
        return false;
    */
    return true;
}

function user_hash($pass)
{
    $hash = password_hash($pass, PASSWORD_BCRYPT, ['salt' => 'saltysaltysaltysalty!!']);
    return $hash;
}

function user_register($data)
{
    $user['username'] = $data['username'];
    $user['password'] = user_hash($data['password']);
    $user['firstname'] = $data['firstname'];
    $user['lastname'] = $data['lastname'];
    $user['secret_ask'] = $data['secret_ask'];
    $user['secret_answer'] = $data['secret_answer'];
    db_insert('users', $user);
}

function user_check_login($data)
{
    if (empty($data['username']) OR empty($data['password']))
        return false;
    $user = get_user_by_username($data['username']);
    if ($user === false)
        return false;
    $hash = user_hash($data['password']);
    if ($hash !== $user['password'])
    {
        return false;
    }
    return true;
}

function user_login($username)
{
    $data = get_user_by_username($username);
    if ($data === false)
        return false;
    $_SESSION['user_id'] = $data['id'];
    return true;
}
?>