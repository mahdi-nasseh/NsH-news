<?php
include "../init.php";

use Illuminate\Support\Facades\Hash;
use Nshnews\Model\User;

//Singin System
if (isset($_POST['signin'])):
    $email = verifyParam($_POST['email']);
    $password = verifyParam($_POST['password']);

    $user = User::where('email', '=', $email)->first();
    if ($user && password_verify($password, $user->password)) {
        $_SESSION['user_id'] = $user->ID;
        header('Location: ../View/dashboard.php');
    } else {
        header('Location: ../View/signin.php?error');
    }
endif;

function verifyParam($param)
{
    return htmlspecialchars(trim($param));
}

//Signup System
if (isset($_POST['signup'])) {
    $isValid = true;
    unset($_SESSION['error']);

    //check email =>
    $name = verifyParam($_POST['name']);
    $family = verifyParam($_POST['family']);
    $email = verifyParam($_POST['email']);
    $username = verifyParam($_POST['username']);
    $password = verifyParam($_POST['password']);
    $password_check = verifyParam($_POST["password_check"]);

//   check nullable
    if (empty($email) || empty($username) || empty($password) || empty($password_check)) {
        $isValid = false;
        header('Location: ../View/signup.php?error');
    } else {
//        email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error']['email'] = "لطفا ایمیل را به درستی وارد کنید";
            $isValid = false;
        }

//        check email exist
        $user = User::where('email', '=', $_POST['email'])->first();
        if ($user) {
            $_SESSION['error']['email'] = 'این ایمیل از قبل وجو دارد';
            $isValid = false;
        }

//        username validation
        if (!preg_match('/^[a-zA-Z0-9_]{5,30}$/', $username)) {
            $_SESSION['error']['username'] = 'نام کاربری باید بین 5 تا 30 حرف باشد و از کاراکترهای خاص استفاده نشده باشد';
            $isValid = false;
        }

//        check username exist
        $user = User::where('username', '=', $_POST['username'])->first();
        if ($user) {
            $_SESSION['error']['username'] = 'این نام کاربری از قبل وجود دارد';
            $isValid = false;
        }

//        check password correct
        if ($password_check != $password) {
            $_SESSION['error']['password'] = 'رمز عبور اشتباه وارد شده';
            $isValid = false;
        }

        if (!$isValid) {
            header('Location: ../View/signup.php');
        } else {
            $user = new User();
            $user->name = $name;
            $user->family = $family;
            $user->username = $username;
            $user->email = $email;
            $user->setPassword($password);
            $user->save();
            $user = User::where('email', '=', $email)->first();
            $_SESSION['user_id'] = $user->ID;
            header('Location: ../View/dashboard.php');
        }
    }
}


//Logout System
if (isset($_REQUEST['logout'])) {
    session_unset();
    header('location: ../View/index.php');
}