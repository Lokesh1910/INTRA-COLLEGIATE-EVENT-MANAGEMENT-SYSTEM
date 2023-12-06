<?php

@include 'config.php';

// Process form submission
if(isset($_POST['submit']))
{
    // Retrieve form data and sanitize
    $partname = $_POST['partname'];
    $partdeptno = $_POST['partdeptno'];
    $partdept =$_POST['partdept'];
    $partmail = $_POST['partmail'];
    $partmobile = $_POST['partmobile'];
    $partpassword = $_POST['partpassword'];
    $cpartpassword = $_POST['partpassword'];

    $filename = $_FILES['partIDcard']['name'];
    $tempname = $_FILES['partIDcard']['tmp_name'];  
    $folder = "Idcard/".$filename;   

    $sql = "INSERT INTO participants(partname,partdeptno,partdept,partmailid,partmobileno,partpassword,partcpassword,IDimage) VALUES ('$partname','$partdeptno','$partdept','$partmail','$partmobile','$partpassword','$cpartpassword','$filename')";
      
    // $filename = $_FILES['eventposter']['name'];
    // $tempname = $_FILES['eventposter']['tmp_name'];  
    // $folder = "uploaded_img/".$filename;   
  
    //$sql = "INSERT INTO images(EventImage) VALUES ('$filename')";
        
    if (mysqli_query($conn,$sql))
    {
      move_uploaded_file($tempname,$folder); 
      header("Location: Event_view.php");   
      echo '<script>alert("Event added successfully")</script>';
    } 
    else
    {
      echo '<script>alert("Error while adding Event")</script>';
    }
}



// check if the user has clicked the button "UPLOAD" 

// if (isset($_POST['submit'])) 
// {
//   $filename = $_FILES['p_image']['name'];
//   $tempname = $_FILES['p_image']['tmp_name'];  
//   $folder = "uploaded_img/".$filename;   
  
//     $sql = "INSERT INTO events(EventImage) VALUES ('$filename')";

//         // function to execute above query

//         if ($conn->query($sql) === TRUE) 
//         {
//             move_uploaded_file($tempname,$folder);    
//             echo "Image uploaded successfully.";
//         } 
//         else
//         {
//             echo "Error uploading image: " . $conn->error;
//         }

// }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Participant Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label,
    input,
    textarea,
    select {
      display: block;
      margin-bottom: 10px;
      width: 100%;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    input[type="text"],
    input[type="password"],
    input[type="number"],
    textarea,
    select {
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="text"]:hover,
    textarea:hover,
    select:hover {
      border-color: #999;
    }

    @media (max-width: 600px) {
      form {
        padding: 10px;
      }
    }
  </style>
  <script>
    function validateForm() {
      // Fetching input values
      var eventName = document.getElementById('eventName').value;
      var eventDepartment = document.getElementById('eventDepartment').value;
      var eventIncharge = document.getElementById('eventIncharge').value;
      var eventMail = document.getElementById('eventMail').value;
      var eventMobile = document.getElementById('eventMobile').value;
      var eventType = document.getElementById('eventType').value;
      var eventSize = document.getElementById('eventSize').value;
      var eventDetails = document.getElementById('eventDetails').value;

      // Validation logic (simple validation for demonstration purposes)
      if (eventName === '' || eventDepartment === '' || eventIncharge === '' || eventMail === '' || eventMobile === '' || eventType === '' || eventSize === '' || eventDetails === '') {
        alert('Please fill in all fields');
        return false;
      }

      // Validate email format
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(eventMail)) {
        alert('Please enter a valid email address');
        return false;
      }

      // Validate mobile number format (digits only)
      var mobileRegex = /^\d{10}$/;
      if (!mobileRegex.test(eventMobile)) {
        alert('Please enter a valid 10-digit mobile number');
        return false;
      }

      // Validation passed
      return true;
    }
  </script>
</head>
<body>
<center>
  <h2>PARTICIPANT REGISTRATION FORM</h2>
  <form action="" method="post" enctype="multipart/form-data">
    
    <label for="partname">Participant Name:</label><br>
    <input type="text" id="partname" name="partname"><br><br>

    <label for="partdeptno">Participant Roll No:</label><br>
    <input type="text" id="partdeptno" name="partdeptno"><br><br>

    <label for="partdept">Participant Department:</label><br>
    <select id="partdept" name="partdept">
      <option value="">Select Department</option>
      <option value="MCA">MCA</option>
      <option value="MECH">MECH</option>
      <option value="AMCS">AMCS</option>
    </select><br><br>

    <label for="partmail">Participant Mail ID (offi):</label><br>
    <input type="mail" id="partmail" name="partmail"><br><br>

    <label for="partmobile">Participant Mobile Number:</label><br>
    <input type="number" id="partmobile" name="partmobile"><br><br>

    <label for="partpassword">Enter login password:</label><br>
    <input type="password" id="partpassword" name="partpassword"><br><br>

    <label for="Cpartpassword">Confirm your password:</label><br>
    <input type="password" id="cpartpassword" name="cpartpassword"><br><br>



<!-- 
    <label for="eventDate">Event Date:</label><br>
    <input type="date" id="eventDate" name="eventDate"><br><br>

    <label for="eventSize">Event Size:</label><br>
    <input type="text" id="eventSize" name="eventSize"><br><br>

    <label for="eventDetails">Event Details:</label><br>
    <textarea id="eventDetails" name="eventDetails"></textarea><br><br>

    <label for="eventPlace">Event Place:</label><br>
    <select id="eventPlace" name="eventPlace">
      <option value="Quadrangle">Quadrangle</option>
      <option value="Conference Hall">Conference Hall</option>
      <option value="Auditorium">Auditorium</option>
    </select><br><br>
     -->
    <label for="partIDcard">Participant ID card:</label>
    <input type="file" name="partIDcard" style="border: #f0f0f5 solid; border-radius: 5px; padding: 7px;"><br><br>
        
    <input type="submit" value="Register" name="submit">
  </form>
</center>
</body>
</html>