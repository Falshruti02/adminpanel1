<?php 
session_start();
?>

<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php

    $result = $long = $res = $part = $longu = "";

    $_SESSION['name']=$_POST['name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['phno']=$_POST['phno'];
    $_SESSION['amount']=99.00;
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $amount= 99.00;


  if (empty($_POST["name"])) {
     ?>
     <script>
     alert("Please enter a name");
     window.location="index.php";
     </script>
     <?php
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     ?>
     <script>
     alert("Only letters and white space allowed");
     window.location="index.php";
     </script>
     <?php
    }
  }
  
  if (empty($_POST["email"])) {
     ?>
     <script>
     alert("Email is required");
     window.location="index.php";
     </script>
     <?php
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     ?>
     <script>
     alert("Invalid email format");
     window.location="index.php";
     </script>
     <?php 
    }
  }
    
 
  if (empty($_POST["phno"])) {
     ?>
     <script>
     alert("Please enter a phone number");
     window.location="index.php";
     </script>
     <?php 
  } else if(!is_numeric($_POST["phno"])) {
     ?>
     <script>
     alert("Please enter a valid phone number");
     window.location="index.php";
     </script>
    <?php 
  } else if(strlen($_POST["phno"]) != 10) {
     ?>
     <script>
     alert("Please enter a valid phone number");
     window.location="index.php";
     </script>
          <?php 
  } else {
}

  if (empty($_POST["amount"])) {
     ?>
     <script>
     alert("Please enter a valid amount");
     window.location="index.php";
     </script>
    <?php 
  } else {
    $amount = test_input($_POST["amount"]);
    if (($_POST["phno"]) < 0) {
     ?>
     <script>
     alert("Please enter a valid amount");
     window.location="index.php";
     </script>
    <?php 
    }
  }




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


   //echo $name;
   // echo $email;
   // echo $phno;
   // echo $amount;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');  // (THIS IS TEST ACCOUNT. SO PLEASE GIVE KEYS THAT YOU OBTAINED FROM YOUR ACCOUNT ON TEST.INSTAMOJO.COM)
curl_setopt($ch, CURLOPT_HEADER, FALSE);               
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_3efa998cb5da114f6476c23b780","X-Auth-Token:test_fa737e8c361d0e70ec60e925cc5"));

$payload = Array(
    'purpose' => 'Course Registration',
    'amount' => $amount,
    'phone' => $phno,
    'buyer_name' => $name,
    'redirect_url' => 'http://localhost/cii4/display.php', 
    'webhook' => '', 
    'send_email' => false,
    'send_sms' => false,
    'email' => $email,
    'allow_repeated_payments' => false
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
print $response;
echo '<br>';
$decodedText = html_entity_decode($response);
$myArray = array(json_decode($response, true));
echo '<br>';
print_r($myArray);
echo '<br>';
$longu = $myArray[0]["payment_request"]["longurl"];
echo $longu;
header('Location:' .$longu);  
?>

</body>
</html>