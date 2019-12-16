<?php
require_once 'connection.php';

if(isset($_POST['submit']))
{
    $name = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $phonenumber = mysqli_escape_string($conn, $_POST['phonenumber']);
    $gender = mysqli_escape_string($conn, $_POST['gender']);
    $dob = mysqli_escape_string($conn, $_POST['dob']);
    $weight = mysqli_escape_string($conn, $_POST['weight']);
    $married = mysqli_escape_string($conn, $_POST['married']);
    $working = mysqli_escape_string($conn, $_POST['working']);

    $sql = "INSERT INTO person(name, email, phonenumber, gender, dob, weight, married, workingin)
           VALUES('$name','$email','$phonenumber','$gender','$dob','$weight','$married','$working');";
    if(mysqli_query($conn, $sql))
    {
        echo "<script type='text/javascript'>alert('person added successfully.');</script>";
         header ("Location:index.php");
         exit();

    } else
    {
        echo "ERROR: not able to execute $sql. " . mysqli_error($conn);
    }
}