<?php

@include 'config.php';

// Process form submission
if(isset($_POST['submit']))
{
    // Retrieve form data and sanitize
    $eventName = $_POST['eventName'];
    $eventDepartment = $_POST['eventDepartment'];
    $eventIncharge =$_POST['eventIncharge'];
    $eventMail = $_POST['eventMail'];
    $eventDate = $_POST['eventDate'];
    $eventMobile = $_POST['eventMobile'];
    $eventType = $_POST['eventType'];
    $eventSize = $_POST['eventSize'];
    $eventDetails = $_POST['eventDetails'];
    $eventPlace = $_POST['eventPlace'];

    $filename = $_FILES['eventposter']['name'];
    $tempname = $_FILES['eventposter']['tmp_name'];  
    $folder = "uploaded_img/".$filename;   

    $sql = "INSERT INTO events(EventName,EventDept,EventIncharge,EventMail,EventDate,EventMobile,EventType,EventSize,EventDetails,EventPlace,EventImage) VALUES ('$eventName','$eventDepartment','$eventIncharge','$eventMail','$eventDate','$eventMobile','$eventType','$eventSize','$eventDetails','$eventPlace','$filename')";
      
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
  <title>Event Form</title>
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
  <h2>Event Details</h2>
  <form action="" method="post" enctype="multipart/form-data">
    
    <label for="eventName">Event Name:</label><br>
    <input type="text" id="eventName" name="eventName"><br><br>

    <label for="eventDepartment">Event Department:</label><br>
    <input type="text" id="eventDepartment" name="eventDepartment"><br><br>

    <label for="eventIncharge">Event Incharge:</label><br>
    <input type="text" id="eventIncharge" name="eventIncharge"><br><br>

    <label for="eventMail">Event Mail ID:</label><br>
    <input type="text" id="eventMail" name="eventMail"><br><br>

    <label for="eventDate">Event Date:</label><br>
    <input type="date" id="eventDate" name="eventDate"><br><br>

    <label for="eventMobile">Event Mobile Number:</label><br>
    <input type="text" id="eventMobile" name="eventMobile"><br><br>

    <label for="eventType">Event Type:</label><br>
    <select id="eventType" name="eventType">
      <option value="">Select Event Type</option>
      <option value="Technical Event">Technical</option>
      <option value="Non-Technical Event">Non-Technical</option>
      <option value="Cultural Event">Cultural</option>
    </select><br><br>

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
    
    <label for="file">Event Poster:</label>
    <input type="file" name="eventposter" style="border: #f0f0f5 solid; border-radius: 5px; padding: 7px;">
        
    <input type="submit" value="Upload Image" name="submit">
  </form>
</center>
</body>
</html>