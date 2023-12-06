<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<section class="display-product-table">
   <table>
   
      <thead>
         <th>Event Image</th>
         <th>Event Name</th>
         <th>Event Dept</th>
         <th>Event Incharge</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            @include 'config.php';

            if(isset($_GET['delete'])){
               $delete_id = $_GET['delete'];
               $delete_query = mysqli_query($conn, "DELETE FROM `events` WHERE EventId = '$delete_id' ") or die('query failed');
               if($delete_query)
               {
                  echo '<script>alert("Event has been deleted")</script>';
               }
               else{
                  echo '<script>alert("Event could not be deleted")</script>';
               };
            };

            $select_products = mysqli_query($conn, "SELECT * FROM `events`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products))
               {
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['EventImage']; ?>" height="100" alt=""></td> 
            <td><?php echo $row['EventName']; ?></td>
            <td><?php echo $row['EventDept']; ?></td>
            <td><?php echo $row['EventIncharge']; ?></td>
            <td>
               <a href="Event_view.php?delete=<?php echo $row['EventId']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash" name="delete"></i> delete </a>
               <a href="Event_update.php?edit=<?php echo $row['EventId']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
               <a href="Event_details.php?edit=<?php echo $row['EventId']; ?>" class="option-btn" style="background-color:green;"> <i class="fas fa-edit"></i> Registrations </a>
            </td>
         </tr>

         <?php
            };    
            }
            else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>
</section>
</div>
   <center><a href="Add_Event.php" class="option-btn" style="width: 200px;"> <i class="fas fa-edit"></i> ADD EVENT </a></center>
</body>
</html>