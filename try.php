<!-- <!-- <!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<?php
/*
    @include 'config.php';

    if (isset($_POST['submit']))
    {
        $filename = $_FILES['p_image']['name'];
        $tempname = $_FILES['p_image']['tmp_name'];  
        $folder = "uploaded_img/".$filename;   
  
        echo "$_FILES[p_image][name]";

        // $sql = "INSERT INTO images(EventImage) VALUES ('$filename')";
        
        // if ($conn->query($sql) === TRUE)
        // {
        //     move_uploaded_file($tempname,$folder);    
        //     echo "Image uploaded successfully.";
        // } 
        // else
        // {
        //     echo "Error uploading image: " . $conn->error;
        // }
    }*/
?>

<!-- <body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="p_image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    
    <div>
        <h2>Uploaded Image</h2>
        <?php
         /*
         $select_products = mysqli_query($conn, "SELECT EventImage FROM images");
         if(mysqli_num_rows($select_products) > 0)
         {
            while($row = mysqli_fetch_assoc($select_products)) 
            {*/
          ?>

      <tr>
         <td><img src="uploaded_img/<?php //echo $row['EventImage']; ?>" height="100" alt=""></td>
         <br><br>
         <?php
            //}
            //}
         ?>
    </div> 
</body>
</html>

<?php
/*
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

        $filename = $_FILES['eventposter']['name'];
        $tempname = $_FILES['eventposter']['tmp_name'];  
        $folder = "uploaded_img/".$filename;   

        $update_query = mysqli_query($conn, "UPDATE `events` SET EventName='$eventName', EventDept='$eventDepartment', EventIncharge='$eventIncharge', EventMail='$eventMail', EventDate='$eventDate', EventMobile='$eventMobile', EventType='$eventType', EventSize='$eventSize', EventDetails='$eventDetails', EventPlace='$eventLocation',EventImage='$filename' WHERE EventId='$eventId';");
     
        if($update_query)
        {
           move_uploaded_file($tempname,$folder);
           echo '<script>alert("event updated succesfully")</script>';
           header("Location: Event_view.php");
        }
        else
        {
            echo '<script>alert("event updated failed")</script>';
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

    <label for="file">Event Poster:</label>
    <input type="file" name="eventposter" style="border: #f0f0f5 solid; border-radius: 5px; padding: 7px;"><?php echo $fetch_edit['EventImage']; ?>

    <br><br>

    <input type="submit" value="update the product" name="update_event" class="btn">
    <input type="reset" value="cancel" id="close-edit" class="option-btn" onclick="resetform()">
  </form>
  <?php
            };
        };
    };*/
  ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @mixin aspect-ratio($width, $height) {
  position: relative;
    
  &:before {
    display: block;
    content: "";
    width: 100%;
    padding-top: ($height / $width) * 100%;
  }
    
  > img {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
  }
}

// Styling

section {
    background: #F4F4F4;
    padding: 50px 0;
}

.container {
    max-width: 1044px;
    margin: 0 auto;
    padding: 0 20px;
}

.carousel {
    display: block;
    text-align: left;
    position: relative;
    margin-bottom: 22px;
    
    > input {
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        width: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        
        &:nth-of-type(6):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -500%; }
        &:nth-of-type(5):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -400%; }
        &:nth-of-type(4):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -300%; }
        &:nth-of-type(3):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -200%; }
        &:nth-of-type(2):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: -100%; }
        &:nth-of-type(1):checked ~ .carousel__slides .carousel__slide:first-of-type { margin-left: 0%; }
        
        &:nth-of-type(1):checked ~ .carousel__thumbnails li:nth-of-type(1) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
        &:nth-of-type(2):checked ~ .carousel__thumbnails li:nth-of-type(2) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
        &:nth-of-type(3):checked ~ .carousel__thumbnails li:nth-of-type(3) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
        &:nth-of-type(4):checked ~ .carousel__thumbnails li:nth-of-type(4) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
        &:nth-of-type(5):checked ~ .carousel__thumbnails li:nth-of-type(5) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
        &:nth-of-type(6):checked ~ .carousel__thumbnails li:nth-of-type(6) { box-shadow: 0px 0px 0px 5px rgba(0,0,255,0.5); }
    }
}

.carousel__slides {
    position: relative;
    z-index: 1;
    padding: 0;
    margin: 0;
    overflow: hidden;
    white-space: nowrap;
    box-sizing: border-box;
    display: flex;
}

.carousel__slide {
    position: relative;
    display: block;
    flex: 1 0 100%;
    width: 100%;
    height: 100%;
    overflow: hidden;
    transition: all 300ms ease-out;
    vertical-align: top;
    box-sizing: border-box;
    white-space: normal;
    
    figure {
        display: flex;
        margin: 0;
    }
    
    div {
        @include aspect-ratio(3, 2);
        width: 100%;
    }
    
    img {
        display: block;
        flex: 1 1 auto;
        object-fit: cover;
    }
    
    figcaption {
        align-self: flex-end;
        padding: 20px 20px 0 20px;
        flex: 0 0 auto;
        width: 25%;
        min-width: 150px;
    }
    
    .credit {
        margin-top: 1rem;
        color: rgba(0, 0, 0, 0.5);
        display: block;        
    }
    
    &.scrollable {
        overflow-y: scroll;
    }
}

.carousel__thumbnails {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    
    margin: 0 -10px;
    
    .carousel__slides + & {
        margin-top: 20px;
    }
    
    li {        
        flex: 1 1 auto;
        max-width: calc((100% / 6) - 20px);  
        margin: 0 10px;
        transition: all 300ms ease-in-out;
    }
    
    label {
        display: block;
        @include aspect-ratio(1,1);
        
                  
        &:hover,
        &:focus {
            cursor: pointer;
            
            img {
                box-shadow: 0px 0px 0px 1px rgba(0,0,0,0.25);
                transition: all 300ms ease-in-out;
            }
        }
    }
    
    img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    @media screen and (max-width: 768px) {
    .container {
        padding: 0 10px; /* Adjust container padding for smaller screens */
    }
    
    .carousel__thumbnails li {
        margin: 0 5px; /* Adjust thumbnail margin for smaller screens */
    }
    
    .carousel__slide figcaption {
        width: 100%; /* Adjust figcaption width for smaller screens */
        min-width: auto;
    }
    
    /* You can add more specific styles for smaller screens here */
}

/* For larger screens */
@media screen and (min-width: 1200px) {
    .container {
        max-width: 1200px; /* Adjust max-width for larger screens */
    }
}
    </style>
</head>
<body>

    <section>
    <div class="container">
        <div class="carousel">
            <input type="radio" name="slides" checked="checked" id="slide-1">
            <input type="radio" name="slides" id="slide-2">
            <input type="radio" name="slides" id="slide-3">
            <input type="radio" name="slides" id="slide-4">
            <input type="radio" name="slides" id="slide-5">
            <input type="radio" name="slides" id="slide-6">
            <ul class="carousel__slides">
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="https://picsum.photos/id/1041/800/450" alt="">
                        </div>
                        <figcaption>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            <span class="credit">Photo: Tim Marshall</span>
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="https://picsum.photos/id/1043/800/450" alt="">
                        </div>
                        <figcaption>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            <span class="credit">Photo: Christian Joudrey</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="https://picsum.photos/id/1044/800/450" alt="">
                        </div>
                        <figcaption>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            <span class="credit">Photo: Steve Carter</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="https://picsum.photos/id/1045/800/450" alt="">
                        </div>
                        <figcaption>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            <span class="credit">Photo: Aleksandra Boguslawska</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="https://picsum.photos/id/1049/800/450" alt="">
                        </div>
                        <figcaption>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            <span class="credit">Photo: Rosan Harmens</span>                            
                        </figcaption>
                    </figure>
                </li>
                <li class="carousel__slide">
                    <figure>
                        <div>
                            <img src="https://picsum.photos/id/1052/800/450" alt="">
                        </div>
                        <figcaption>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            <span class="credit">Photo: Annie Spratt</span>                            
                        </figcaption>
                    </figure>
                </li>
            </ul>    
            <ul class="carousel__thumbnails">
                <li>
                    <label for="slide-1"><img src="https://picsum.photos/id/1041/150/150" alt=""></label>
                </li>
                <li>
                    <label for="slide-2"><img src="https://picsum.photos/id/1043/150/150" alt=""></label>
                </li>
                <li>
                    <label for="slide-3"><img src="https://picsum.photos/id/1044/150/150" alt=""></label>
                </li>
                <li>
                    <label for="slide-4"><img src="https://picsum.photos/id/1045/150/150" alt=""></label>
                </li>
                <li>
                    <label for="slide-5"><img src="https://picsum.photos/id/1049/150/150" alt=""></label>
                </li>
                <li>
                    <label for="slide-6"><img src="https://picsum.photos/id/1052/150/150" alt=""></label>
                </li>
            </ul>
        </div>
    </div>
</section>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @keyframes tonext {
  75% {
    left: 0;
  }
  95% {
    left: 100%;
  }
  98% {
    left: 100%;
  }
  99% {
    left: 0;
  }
}

@keyframes tostart {
  75% {
    left: 0;
  }
  95% {
    left: -300%;
  }
  98% {
    left: -300%;
  }
  99% {
    left: 0;
  }
}

@keyframes snap {
  96% {
    scroll-snap-align: center;
  }
  97% {
    scroll-snap-align: none;
  }
  99% {
    scroll-snap-align: none;
  }
  100% {
    scroll-snap-align: center;
  }
}

body {
  max-width: 37.5rem;
  margin: 0 auto;
  padding: 0 1.25rem;
  font-family: 'Lato', sans-serif;
}

* {
  box-sizing: border-box;
  scrollbar-color: transparent transparent; /* thumb and track color */
  scrollbar-width: 0px;
}

*::-webkit-scrollbar {
  width: 0;
}

*::-webkit-scrollbar-track {
  background: transparent;
}

*::-webkit-scrollbar-thumb {
  background: transparent;
  border: none;
}

* {
  -ms-overflow-style: none;
}

ol, li {
  list-style: none;
  margin: 0;
  padding: 0;
}

.carousel {
  position: relative;
  padding-top: 75%;
  filter: drop-shadow(0 0 10px #0003);
  perspective: 100px;
}

.carousel__viewport {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  overflow-x: scroll;
  counter-reset: item;
  scroll-behavior: smooth;
  scroll-snap-type: x mandatory;
}

.carousel__slide {
  position: relative;
  flex: 0 0 100%;
  width: 100%;
  background-color: #f99;
  counter-increment: item;
}

.carousel__slide:nth-child(even) {
  background-color: #99f;
}

.carousel__slide:before {
  content: counter(item);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate3d(-50%,-40%,70px);
  color: #fff;
  font-size: 2em;
}

.carousel__snapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  scroll-snap-align: center;
}

@media (hover: hover) {
  .carousel__snapper {
    animation-name: tonext, snap;
    animation-timing-function: ease;
    animation-duration: 4s;
    animation-iteration-count: infinite;
  }

  .carousel__slide:last-child .carousel__snapper {
    animation-name: tostart, snap;
  }
}

@media (prefers-reduced-motion: reduce) {
  .carousel__snapper {
    animation-name: none;
  }
}

.carousel:hover .carousel__snapper,
.carousel:focus-within .carousel__snapper {
  animation-name: none;
}

.carousel__navigation {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  text-align: center;
}

.carousel__navigation-list,
.carousel__navigation-item {
  display: inline-block;
}

.carousel__navigation-button {
  display: inline-block;
  width: 1.5rem;
  height: 1.5rem;
  background-color: #333;
  background-clip: content-box;
  border: 0.25rem solid transparent;
  border-radius: 50%;
  font-size: 0;
  transition: transform 0.1s;
}

.carousel::before,
.carousel::after,
.carousel__prev,
.carousel__next {
  position: absolute;
  top: 0;
  margin-top: 37.5%;
  width: 4rem;
  height: 4rem;
  transform: translateY(-50%);
  border-radius: 50%;
  font-size: 0;
  outline: 0;
}

.carousel::before,
.carousel__prev {
  left: -1rem;
}

.carousel::after,
.carousel__next {
  right: -1rem;
}

.carousel::before,
.carousel::after {
  content: '';
  z-index: 1;
  background-color: #333;
  background-size: 1.5rem 1.5rem;
  background-repeat: no-repeat;
  background-position: center center;
  color: #fff;
  font-size: 2.5rem;
  line-height: 4rem;
  text-align: center;
  pointer-events: none;
}

.carousel::before {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='0,50 80,100 80,0' fill='%23fff'/%3E%3C/svg%3E");
}

.carousel::after {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='100,50 20,100 20,0' fill='%23fff'/%3E%3C/svg%3E");
}

    </style>
</head>
<body>
<h1>CSS-only Carousel</h1>

<p>This carousel is created with HTML and CSS only.</p>

<section class="carousel" aria-label="Gallery">
  <ol class="carousel__viewport">
    <li id="carousel__slide1"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper">
        <a href="#carousel__slide4"
           class="carousel__prev">Go to last slide</a>
        <a href="#carousel__slide2"
           class="carousel__next">Go to next slide</a>
      </div>
    </li>
    <li id="carousel__slide2"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide1"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide3"
         class="carousel__next">Go to next slide</a>
    </li>
    <li id="carousel__slide3"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide2"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide4"
         class="carousel__next">Go to next slide</a>
    </li>
    <li id="carousel__slide4"
        tabindex="0"
        class="carousel__slide">
      <div class="carousel__snapper"></div>
      <a href="#carousel__slide3"
         class="carousel__prev">Go to previous slide</a>
      <a href="#carousel__slide1"
         class="carousel__next">Go to first slide</a>
    </li>
  </ol>
  <aside class="carousel__navigation">
    <ol class="carousel__navigation-list">
      <li class="carousel__navigation-item">
        <a href="#carousel__slide1"
           class="carousel__navigation-button">Go to slide 1</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide2"
           class="carousel__navigation-button">Go to slide 2</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide3"
           class="carousel__navigation-button">Go to slide 3</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide4"
           class="carousel__navigation-button">Go to slide 4</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide5"
           class="carousel__navigation-button">Go to slide 4</a>
      </li>
      <li class="carousel__navigation-item">
        <a href="#carousel__slide6"
           class="carousel__navigation-button">Go to slide 4</a>
      </li>
    </ol>
  </aside>
</section>
</body>
</html>