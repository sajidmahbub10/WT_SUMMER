
<?php
session_start();
  $hasError=0;
  $nameErr = "";
  $name2Err = "";
  $AgeErr = "";
  $passErr = "";
  $emailErr = "";
  $fileErr = "";
  $desigErr ="";
  $LanErr ="";
  $Designation="";
  $Language="";
  $fromdata ="";
  $filepath ="";
if(isset($_POST["Submit"]))
{
  
$name = $_POST["fname"];
$name2 = $_POST["lname"];
$Age = $_POST["age"];

$pass = $_POST["pass"];
$email = $_POST["email"];
if(isset($Language))
{
    $LanErr = 'You Havent Selected a checkbox';
}
else{$Language = $_POST["PreferredLanguage"] ;}
if(isset($Designation))
{
    $desigErr = 'You have not selected any Designation';
}
else{$Designation = $_POST["designation"];}


    

        if (empty($name))
    {
        $nameErr ='Please Enter First Name';
        $hasError =1;
    }
      else if(is_numeric($name))
      {
        $nameErr ='First Name can not be numeric';
        $hasError =1;
      }
         else
    {
        echo 'Your First Name is ' . $name;
        $_SESSION["name"]= $name;
    }
    echo '<br>';

    
        if (empty ($name2))
    {
        $name2Err = 'Please Enter Last Name';
    } 
    else if(is_numeric($name2))
    {
      $name2Err ='Last Name can not be numeric';
    }
       else
    {
        echo 'Your Last Name is ' . $name2;
    }

    echo '<br>';

    

        if (empty ($Age))
    {
        $AgeErr= 'Please Enter your Age ';
    } else
    {
        echo 'Your Age is ' . $Age;
    }

    echo '<br>';
   
    if (
        isset($Designation) )
        {
        if ("juniorprogrammer"==$Designation) {
            $desigErr = 'You selected Junior Programmer ';
         
        }
        if ($Designation=='seniorprogrammer') {
            $desigErr = 'You selected Senior Programmer';
         
        }
        if ($Designation=='projectlead') {
            $desigErr ='You selected Project Lead';
          
        }
    } else {
        $desigErr = 'You have not selected any Designation';
    }

    echo '<br>';
if($hasError==0)
{
    header("Location: ../view/page2.php");
}
   
    if (
        isset($_POST['PreferredLanguage1']) ||
        isset($_POST['PreferredLanguage2']) ||
        isset($_POST['PreferredLanguage3'])) {
        if (isset($_POST['PreferredLanguage1'])) {
            $LanErr = 'Your Have Selected JAVA ';
            $Language = $Language. $_POST['PreferredLanguage1'];
            echo '<br>';
        }
    
        if (isset($_POST['PreferredLanguage2'])) {
            $LanErr = 'Your Have Selected PHP';
            $Language =  $Language.''.$_POST['PreferredLanguage2'];
            echo '<br>';
        }
        if (isset($_POST['PreferredLanguage3'])) {
            $LanErr = 'Your Have Selected C++';
            $Language = $Language.''. $_POST['PreferredLanguage2'];
            echo '<br>';
        }
    }
    
      else {
        $LanErr = 'You Have not Selected a checkbox';
        echo '<br>';
    }


  

    if(empty($email)  )
    {
        $emailErr = "You must enter email";
    } 
    else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
    { $emailErr = "Wrong Pattern Email";} 
    else{
      echo "Your email is ".$email;
      echo '<br>';
    }

    
    if (strlen($pass) < 5) {
        $passErr =  'Enter a valid password';
    } else
     {
        echo 'password is valid';
    }

echo $_FILES["myfile"]["name"];
/*
if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"../uploads/myfile.pdf"))
{
    echo "File Uploaded";
}
*/

if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"../uploads/".$_FILES["myfile"]["name"]))
{ $filepath = "../uploads/".$_FILES["myfile"]["name"];
    $fileErr = "File Uploaded";
}

else
$fileErr = 'Upload Error';
//file type diye validation je kon type file upload kortese
$formdata = array(
    'firstname'=>$_POST["fname"],
    'lastname'=>$_POST["lname"],
    'age'=>$_POST["age"],
    'pass'=>$_POST["pass"],
    'email'=>$_POST["email"],
    'language'=>$Language,
    'designation'=>$_POST["designation"],
    'filepath'=>$filepath

    

);
$existingdata = file_get_contents('../data/data.json');
$tempJSONdata = json_decode($existingdata);
$tempJSONdata[] =$formdata;


$jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
if(file_put_contents("../data/data.json",$jsondata))
{
    echo 'Data Successfully Saved';
}
else
echo 'No Data Saved';

$data = file_get_contents("../data/data.json");
$mydata = json_decode($data);
foreach($mydata as $myobject)
     {
     foreach($myobject as $key=>$value)
    {
        echo $key." => ".$value."<br>";
    } 
    }
}


?>




