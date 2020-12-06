<?php
//create_cat.php
include 'connect.php';
include 'header.php';

if (isset($_SESSION['signed_in']) == true) {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {

        //the form hasn't been posted yet, display it
        echo '<h2>CREATE A NEW CATEGORY</h2>';
        echo "<form method='post' action=''>
    Category name: <input type='text' name='cat_name' required/>
    <br><hr>Category description: <input name='cat_description' required/></input>
    <br><hr><input class='myButton' type='submit' value='Add category' />
     </form>";
    } else {
        //the form has been posted, so save it
        $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('" . mysqli_real_escape_string($conn, $_POST['cat_name']) . "',
             '" . mysqli_real_escape_string($conn, $_POST['cat_description']) . "');";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            //something went wrong, display the error
            echo 'Error';
        } else {
            echo 'New category successfully added.';
        }
    }
} else {
    include 'signedin.php';
}

include 'footer.php';
