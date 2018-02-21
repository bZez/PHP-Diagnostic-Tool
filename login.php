<?php
require('config.php');
session_start();

if (isset($_POST['submit'])) {
    if ((isset($_POST['email']) && $_POST['email'] != '') && (isset($_POST['password']) && $_POST['password'] != '')) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $sqlEmail = "select * from users where email = '" . $email . "'";
        $rs = mysqli_query($sql_connect, $sqlEmail);
        $numRows = mysqli_num_rows($rs);

        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($rs);

            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                if ($row['admin'] !== '0') {
                    $_SESSION['role'] = 'admin';
                } else if ($row['superadmin'] !== '0') {
                    $_SESSION['role'] = 'superadmin';
                } else {
                    $_SESSION['role'] = 'user';
                }

                header('location:dashboard/');
                exit;

            } else {
                echo '<script>javascript:alert("Wrong Email Or Password")</script>';
            }
        } else {
            echo '<script>javascript:alert("Wrong Email Or Password")</script>';
        }
    }
}
?>