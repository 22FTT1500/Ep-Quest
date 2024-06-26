<?php
session_start();

include 'db_conn.php';

if (isset($_POST['stuid']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $stuid = validate($_POST['stuid']);
    $password = validate($_POST['password']);

    if (empty($stuid)) {
        header('Location: index.php?error=Student ID is required');
        exit();
    } else if (empty($password)) {
        header('Location: index.php?error=Password is required');
        exit();
    } else {
        $sql = "SELECT * FROM student_details WHERE student_id='$stuid' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['is_admin'] == 1) { // Check if user is admin
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['grpcode'] = $row['grpcode'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['contactno'] = $row['contactno'];
                $_SESSION['course'] = $row['course'];
                $_SESSION['profileimg'] = $row['profileimg'];
                $_SESSION['point'] = $row['point'];
                $_SESSION['total_ep_points'] = $row['total_ep_points'];
                $_SESSION['is_admin'] = true; // Set admin session variable

                header('Location: adminpage.php');
                exit();
            } else if ($row['is_student'] == 1) { // Check if user is student
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['grpcode'] = $row['grpcode'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['contactno'] = $row['contactno'];
                $_SESSION['course'] = $row['course'];
                $_SESSION['profileimg'] = $row['profileimg'];
                $_SESSION['point'] = $row['point'];
                $_SESSION['total_ep_points'] = $row['total_ep_points'];
                $_SESSION['is_admin'] = false; // Set admin session variable to false for student

                header('Location: studentpage.php');
                exit();
            } else {
                header('Location: index.php?error=Account not authorized');
                exit();
            }
        } else {
            header('Location: index.php?error=Incorrect Student ID or Password');
            exit();
        }
    }
} else {
    header('Location: index.php');
    exit();
}
