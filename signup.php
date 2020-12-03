<?php
//signup.php
include 'connect.php';
include 'header.php';

echo '<h3>SIGN UP</h3>';
echo '<br>';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
        Username: <input type="text" name="user_name" /><br>
        <br>
        Password: <input type="password" name="user_pass"><br>
        <br>
        Confirm Password: <input type="password" name="user_pass_check"><br>
        <br>
        E-mail: <input type="email" name="user_email"><br>
        <hr>
        <input class="myButton" type="submit" value="Sign Up" />
     </form>';
} else {

    $errors = array(); /* declare the array for later use */

    if (isset($_POST['user_name'])) {
        //the user name exists
        if (!ctype_alnum($_POST['user_name'])) {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if (strlen($_POST['user_name']) > 30) {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    } else {
        $errors[] = 'The username field must not be empty.';
    }


    if (isset($_POST['user_pass'])) {
        if ($_POST['user_pass'] != $_POST['user_pass_check']) {
            $errors[] = 'The two passwords did not match.';
        }
    } else {
        $errors[] = 'The password field cannot be empty.';
    }

    if (!empty($errors)) {
        echo 'Some fields are not filled correctly..';
        echo '<ul>';
        foreach ($errors as $key => $value) {
            echo '<li>' . $value . '</li>';
        }
        echo '</ul>';
    } else {
        $sql = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('" . mysqli_real_escape_string($conn, $_POST['user_name']) . "',
                       '" . sha1($_POST['user_pass']) . "',
                       '" . mysqli_real_escape_string($conn, $_POST['user_email']) . "',
                        NOW(),
                        0)";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo 'Something went wrong while registering. Please try again later.';
        } else {
            echo 'Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }
}

include 'footer.php';
