<?php

    @include 'config.php';

    if(isset($_POST['update_event'])){
        $eventId = $_POST['upEventId'];
        $eventName = $_POST['UpeventName'];
        $eventDepartment = $_POST['UpeventDepartment'];
        $eventIncharge =$_POST['UpeventIncharge'];
        $eventMail = $_POST['UpeventMail'];
        $eventDate = $_POST['UpeventDate'];
        $eventMobile = $_POST['UpeventMobile'];
        $eventType = $_POST['UpeventType'];
        $eventSize = $_POST['UpeventSize'];
        $eventDetails = $_POST['UpeventDetails'];
        $eventLocation = $_POST['Upeventplace'];

        $update_query = mysqli_query($conn, "UPDATE `events` SET EventName='$eventName', EventDept='$eventDepartment', EventIncharge='$eventIncharge', EventMail='$eventMail', EventDate='$eventDate', EventMobile='$eventMobile', EventType='$eventType', EventSize='$eventSize', EventDetails='$eventDetails', EventPlace='$eventLocation' WHERE EventId='$eventId';");
     
        if($update_query){
           echo 'product updated succesfully';
           header("Location: Event_view.php");
        }
        else
        {
           echo  'product could not be updated';
        }
     
     }
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

    input[type="submit"],
    input[type="button"] {
      background-color: #4caf50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-right: 10px;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
      background-color: #45a049;
    }

    input[type="reset"] {
      background-color: #f44336;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="reset"]:hover {
      background-color: #d32f2f;
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
  <h2>EVENT DETAILS</h2>
  <form method="post" action="">
    <?php
       
        if(isset($_GET['edit']))
        {
           $edit_id = $_GET['edit'];
           $edit_query = mysqli_query($conn, "SELECT * FROM `events` WHERE EventId = '$edit_id'");
           if(mysqli_num_rows($edit_query) > 0)
           {
              while($fetch_edit = mysqli_fetch_assoc($edit_query)){
    ?>

    <img src="uploaded_img/<?php echo $fetch_edit['EventImage']; ?>" height="300" width="500" alt="">

    <br><br><br>
    <input type="hidden" name="upEventId" value="<?php echo $fetch_edit['EventId']; ?>">

    <label for="eventName">Event Name:</label><br>
    <input type="text" id="eventName" name="UpeventName" value="<?php echo $fetch_edit['EventName']; ?>"><br><br>

    <label for="eventDepartment">Event Department:</label><br>
    <input type="text" id="eventDepartment" name="UpeventDepartment" value="<?php echo $fetch_edit['EventDept']; ?>"><br><br>

    <label for="eventIncharge">Event Incharge:</label><br>
    <input type="text" id="eventIncharge" name="UpeventIncharge" value="<?php echo $fetch_edit['EventIncharge']; ?>"><br><br>

    <label for="eventMail">Event Mail ID:</label><br>
    <input type="text" id="eventMail" name="UpeventMail" value="<?php echo $fetch_edit['EventMail']; ?>"><br><br>

    <label for="eventDate">Event Date:</label><br>
    <input type="date" id="eventDate" name="UpeventDate" value="<?php echo $fetch_edit['EventDate']; ?>"><br><br>

    <label for="eventMobile">Event Mobile Number:</label><br>
    <input type="text" id="eventMobile" name="UpeventMobile" value="<?php echo $fetch_edit['EventMobile']; ?>"><br><br>

    <label for="eventType">Event Type:</label><br>
    <select id="eventType" name="UpeventType">
        <option value="">Select Event Type</option>
        <option value="Technical" <?php if ($fetch_edit['EventType'] == 'Technical') echo 'Technical'; ?>>Technical</option>
        <option value="Non-Technical" <?php if ($fetch_edit['EventType'] == 'Non-Technical') echo 'Non-Technical'; ?>>Non-Technical</option>
        <option value="Cultural" <?php if ($fetch_edit['EventType'] == 'Cultural') echo 'Cultural'; ?>>Cultural</option>
    </select><br><br>

    <label for="eventSize">Event Size:</label><br>
    <input type="text" id="eventSize" name="UpeventSize" value="<?php echo $fetch_edit['EventSize']; ?>"><br><br>

    <label for="eventDetails">Event Details:</label>
    <textarea id="eventDetails" name="UpeventDetails" rows="10" cols="100"><?php echo $fetch_edit['EventDetails']; ?></textarea><br><br> 

    <label for="eventplace">Event Place:</label>
    <select id="eventplace" name="Upeventplace">
        <option value=" <?php if ($fetch_edit['EventPlace'] == 'Community Hall') echo 'Community Hall'; ?>">Community Hall</option>
        <option value="Quandrangle" <?php if ($fetch_edit['EventPlace'] == 'Quandrangle') echo 'Quandrangle'; ?>>Quandrangle</option>
        <option value="Conference Hall" <?php if ($fetch_edit['EventPlace'] == 'Conference Hall') echo 'Conference Hall'; ?>>Conference Hall</option>
    </select><br><br>
    <br><br>

    <input type="submit" value="update the product" name="update_event" class="btn">
    <input type="reset" value="cancel" id="close-edit" class="option-btn" onclick="resetform()">
  </form>
  <?php
            };
        };
    };
  ?>
</body>
</html>