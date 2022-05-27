<?php

    include_once 'backend/config/Database.php';
    include_once 'backend/models/Course.php';
    // Instantiate Database
    $database = new Database();
    $db = $database->connect();

        $course = new Course($db);

        $result = $course -> read();
        $num = $result->rowCount();
        // check for cookie
        if(isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
        }else {
            $user = 'Guest';
        }

        //hash username and password
        $user = hash('sha256', $user);

        if($num > 0) {
            // Post array
            $courses_arr = array();
            $courses_arr['allcourses'] = array();
            $courses_arr['coursesenrolled'] = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $course_item = array(
                    'Id' => $ID,
                    'Name' => $Name,
                    'Instructor' => $Instructor,
                    'Institute' => $Institute,
                    'Description' => $Description,
                    'Image' => $Image,
                    'Preview_video_link' => $Preview_video_link,
                );

                //Push to "data"
                array_push($courses_arr['allcourses'], $course_item);
            }
        // echo json_encode($courses_arr);
        }
        else {
            echo json_encode(array('message' => 'No courses found'));
        }




    function renderVid($courseId, $name, $instructor, $Preview_video_link) {
        echo '<div class="vid">
            <div class="videocontaint">
            <iframe width="400" height="200" src='.$Preview_video_link.' title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <p>'.$name.'</p>
            <p>Instructor: '.$instructor.'</p>
            <p><a href="backend/api/course/course.php?id='.$courseId.'">Go to course</a></p>
        </div>';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Temari-Dojo</title>
</head>
<body>
    <nav class="nav">
        <ul class="left">
            <li><img src="./assets/image/chevron_up_29px.png" alt=""><a class='udemy' href="#">Temari Dojo</a></li>
            <li><img src="./assets/image/search_24px.png" alt=""><input type="search" name="search" id="" class="same" placeholder='Search for anything'></li>
        </ul>
        <ul class="right">
            <div class="dropdown">


            <button onclick="myFunction()" class="dropbtn"  id="username">Username<i class="fa-solid fa-user usericon"></i> </button>
            <div id="myDropdown" class="dropdown-content">
              <a class="myDropdown-a1" href="setting.php"><i class="fa-solid fa-user-pen usericon2"></i>Edit Profile</a>
              <a class="myDropdown-a1" href="Login.php"><i class="fa-solid fa-arrow-right-from-bracket usericon2"></i>Logout</a>
              
            </div>
            </div>          
        </ul>
    </nav>
    <div class="firstpage">
        <div class="text">
            <h1>Access anytime anywhere</h1>
            <p>Join our small monthly subscription plan for an unlimited access on any device.</p>
        </div>
    </div>
    <div class="sectionvideo">
            <h1>A broad selection of courses</h1>
            <p>Choose from 185,000 online video courses with new additions published every month</p>
            <div class="buttons">
                <li onclick="fun1(this)"><span class='span1'></span><a href="#">Python</a></li>
                <li onclick="fun2(this)"><span class='span2'></span><a href="#">Excel</a></li>
                <li onclick="fun3(this)"><span class='span3'></span><a href="#">Web Development</a></li>
                <li onclick="fun4(this)"><span class='span4'></span><a href="#">Javascript</a></li>
                <li onclick="fun5(this)"><span class='span5'></span><a href="#">DataScience</a></li>
                <li onclick="fun6(this)"><span class='span6'></span><a href="#">AWS Certificate</a></li>
                <li onclick="fun7(this)"><span class='span7'></span><a href="#">Drawing</a></li>
            </div>
        </div>
        <div class="videos">
            <h1>Why Temari Dojo?</h1>
            <p>Our online learning platform is filled with thousands of creative courses and classes taught by experts to help you learn new skills.</p>
            <button class='btn'>Become a member</button>
            <div class="vid-box">
                <!-- <div class="vid">
                    <div class="videocontaint">
                    <iframe width="400" height="200" src="https://www.youtube.com/embed/RsPWEmfOQdU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <p>Instructor: </p>
                    <p><a href="">Go to course</a></p>
                </div> -->
                <?php
                    // iterate through the array of courses
                    foreach($courses_arr['allcourses'] as $course) {
                        renderVid($course['Id'],$course['Name'], $course['Instructor'], $course['Preview_video_link']);
                    }
                    // renderVid('Introduction to golang', 'Fireship', 'https://www.youtube.com/embed/446E-r0rXHI');
                ?>
                <div class="vid">
                    <div class="videocontaint">
                        
                    </div>
                </div>
                <div class="vid">
                <div class="videocontaint">
                        
                </div>
                </div>
                <div class="vid">
                <div class="videocontaint">
                        
                        </div>
                </div>
            </div>
        </div>
                    <!-- Footer Section For the the last page -->
            <footer class="fotter">
                <div class="leftfooter">
                    <ul class="left-left-footer">
                        <li><a href="#">Ethiopia</a></li>
                        <li><a href="#">Contact-Us</a></li>
                        <li><a href="#">About-Us</a></li>
                    </ul>
                    <ul class="middle-footer">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help and Support</a></li>
                    </ul>
                    <ul class="right-footer">
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy Policies</a></li>
                        <li><a href="#">Cookie Setting</a></li>
                    </ul>
                </div>
                <div class="rightfooter">
                    <button class="btnfooter"><img src=".//assets/image/globe_29px.png" alt="">English</button>
                    <p>&copy;2022 Temari Dojo, Inc.</p>
                </div>
            </footer>


            <script>
    //     let username = document.querySelector('#username');
    //    username.innerHTML = "Beteab";
              fetch username 
              window.onload = function() {
       fetch('http://localhost/Temari-dojo/backend/api/SIgnIn-SignUp/signIn.php') 
      .then(response => response.json())
      .then(data => {
        // let username = document.querySelector('.dropbtn');
        // username.innerHTML = 'Beteab';
        // console.log(data);
    console.log(data.username);
        
      })
      .catch(error => console.error(error));

//   }
    </script>
        <script src="js/Homepage.js"></script>
            
      
</body>
</html>