<?php

$name = $_POST["fname"];
$name2 = $_POST["lname"];
$Age = $_POST["age"];

$pass = $_POST["pass"];
$email = $_POST["email"];


    if (empty ($Age)){
        echo "First Name is Empty <br>";}
        if (empty ($pass)){
            echo "Pass is Empty <br>";}

 




        if (empty ($name))
 
    {
        echo 'Please Enter First Name';
    }
         else
    {
        echo 'Your First Name is ' . $name;
    }
    echo '<br>';

    
        if (empty ($name2))
    {
        echo 'Please Enter Last Name';
    } else
    {
        echo 'Your Last Name is ' . $name2;
    }

    echo '<br>';

    

        if (empty ($Age))
    {
        echo 'Please Enter your Age ';
    } else
    {
        echo 'Your Age is ' . $Age;
    }

    echo '<br>';
   
    if (
        isset($_POST["designation1"]) || 
        isset($_POST["designation2"]) ||
        isset($_POST["designation3"]))
        {
        if (isset($_POST['designation1'])) {
            echo 'You selected Junior Programmer ';
            echo '<br>';
        }
        if (isset($_POST['designation2'])) {
            echo 'You selected Senior Programmer';
            echo '<br>';
        }
        if (isset($_POST['designation3'])) {
            echo 'You selected Project Lead';
            echo '<br>';
        }
    } else {
        echo 'You have not selected anything';
    }

    echo '<br>';

   
    if (
        isset($_POST['PreferredLanguage1') ||
        isset($_POST['PreferredLanguage2') ||
        isset($_POST['PreferredLanguage3')) {
        if (isset($_POST['PreferredLanguage1')) {
            echo 'You  Select JAVA ';
            echo '<br>';
        }

        if (isset($_POST['PreferredLanguage2'])) {
            echo 'You  Select PHP';
            echo '<br>';
        }
        if (isset($_POST['PreferredLanguage3'])) {
            echo 'You  Select C++';
            echo '<br>';
        }
    }
    else {
        echo 'You Havent Select a checkbox';
        echo '<br>';
    }

    if(empty($email)  )
    {
        echo "You must enter email";
    } 
    else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
    {echo "Wrong Pattern Email";} 
    else{
      echo "Your email is ".$email;
      echo '<br>';
    }

    
    if (strlen($pass) < 5) {
        echo 'Enter a valid password';
    } else
     {
        echo 'password is valid';
    }





?>