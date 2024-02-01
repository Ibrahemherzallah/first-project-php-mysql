<?php
include("config.php");

session_start();
if(isset($_SESSION['id'])){

$imgArr = array('public/images/coding.png',"public/images/travel-photographer.jpg", "public/images/js-img.webp" ,"public/images/design.jpg");
    $sql = "Select * from courseInfo";
    $rs = mysqli_query($conn,$sql);  
    if(mysqli_num_rows($rs)> 0)
    {
        $courseName = array();
        $teacherName = array();
        $numOfCourseHours = array();
        $courseID = array();
        $rowCount = mysqli_num_rows($rs);
        $userID = $_SESSION['id'];
        $i = 0;
        while($row = mysqli_fetch_assoc($rs))
        { 
            $courseName[$i] = $row["courseName"];
            $teacherName[$i] = $row["teacherName"];
            $numOfCourseHours[$i] = $row["numOfCourseHours"];
            $courseID[$i] = $row['id'];
            $i++;
        }
    }
    $sql = "SELECT firstName FROM usersInfo WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userName = $row['firstName'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mangcoding Store</title>
    <link rel="icon" href="public/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white navBar shadow-sm">
        <div class="container">
          <img class="logoImg" src="public/images/logo.png" alt="logoImg">
          <a class="navbar-brand" href="#"><b class="storeName">mangcoding Store</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse navBarContent" id="navbarSupportedContent">
            <div class="container c">
                <ul class="navbar-nav ulNav">
                <li class="nav-item navContent">
                    <a class="nav-link active" aria-current="page" href="#"><b>Home</b></a>
                </li>
                <li class="nav-item navContent">
                    <a class="nav-link active" aria-current="page" href="#">Course</a>
                </li>
                <li class="nav-item navContent aboutAsBut">
                    <a class="nav-link active" aria-current="page" href="#">About Us</a>
                </li>
                <li class="nav-item navContent">
                    <a class="nav-link active" aria-current="page" href="#">Article</a>
                </li>
                <li id="content" class="nav-item navContent">
                    <a class="nav-link active" aria-current="page" href="#">Content</a>
                </li>
                </ul>
                <div class="navIconAndNameDiv">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                    <button id="registerCoursesBut" class="navBut registerBut" type="submit">Register Courses Now !!!!</button>
                   <a class="logOut" href="logOut.php">Log Out</a>
            </div>
          </div>
        </div>
    </nav>
    
    <div class="container-fluid secondDiv">
        <div class="container d-flex">
            <div class="leftText">
                <p class="letsWordParagraph">Lets <span class="beginsWordSpan">Begins</span></p>
                <h1 class="mainText"><b>HELLO <span class="courseWordSpan"><?php echo $userName." ";?></span>Lets Find The <br> Right Course For <br> you</b></h1>
                <br>
                <p class="loremText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Etiam <br> dignissim, sem non convallis molestie</p>
                <br>
                <button class="playVideoBut"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                  </svg><span class="playVideoSpan">Play Video</span></button>
               
            </div>
            <div class="rightImg">
                <img src="public/images/girlImg.png" alt="">
            </div>
        </div>
    </div>
    <div class="container thirdDiv d-flex">
        <div class="thirdPartLeftText">

            <p class="whatText">THE COURSES YOU REGISTERED</p>
            <h2 class="mainTextThirdDiv">
                <?php if($flag = 1)echo "OK ". $userName ."  You <br> Can Show Your Courses<br> Right Now";
                else echo "Sorry ". $userName ." you Not registered any course yet";
                ?>
            </h2>
            <p class="loremText">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Etiam dignissim, sem non <br> convallis molestie</p>
        </div>

        <div class="card firstPageCards" style="width: 18rem;">
            <div class="card-body">
               <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle firstPageIcons" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
              <div class="cardsText">    
                <h6 class="card-subtitle mb-2 text-body-secondary cardSubtitle text-white" style="color: white !important;">Professional Teacher</h6>
                <p class="card-text iconsLorem">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Etiam dignissim, sem non <br> convallis molestie</p>
              </div>
            </div>
          </div>
          <div class="card firstPageCards" style="width: 18rem;">
            <div class="card-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-mortarboard-fill firstPageIcons" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                </svg>
                <div class="cardsText">    
                    <h6 class="card-subtitle mb-2 text-body-secondary cardSubtitle text-white" style="color: white !important;">Course Certificate</h6>
                    <p class="card-text iconsLorem">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Etiam dignissim, sem non <br> convallis molestie</p>
                </div>
            </div>
          </div>
          <div class="card firstPageCards" style="width: 18rem;">
            <div class="card-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-award firstPageIcons" viewBox="0 0 16 16">
                    <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702z"/>
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1z"/>
                </svg>      
                <div class="cardsText">    
                    <h6 class="card-subtitle mb-2 text-body-secondary cardSubtitle text-white" style="color: white !important;">interesting learning</h6>
                    <p class="card-text iconsLorem">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Etiam dignissim, sem non <br> convallis molestie</p>
                </div>
            </div>
          </div>
    </div>

    <div class="container-fluid frirsPartSecondPage">
        <div class="container d-flex">
            <div class="firstPartLeftImg">
               <img class="familyImg" src="public/images/familyImg.png" alt="">
            </div>
            <div class="firstPartRightText">
               <p class="selectedCourseText">SELECTED COURSE</p>
               <h1 class="peopleTakingCoursesText">People Taking <br> Courses</h1>
               <br>
               <p class="secondPageLorem">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Etiam dignissim, sem non convallis <br> molestie</p>
               <div class="container d-flex">
                    <p class="peopleNumP"><span class="peopleNumSpan NumSpans">6,000</span><br> People Views</p>
                    <p class="userNumP NumP"><span class="userNumSpan NumSpans">4,000</span><br> User</p>
                    <p class="courseNumP NumP"><span class="courseNumSpan NumSpans">100</span><br> Course</p>
               </div>
            </div>
        </div>
    </div>

    <div class="container d-flex secondPartSecondPage">
        <div class="container liftCardsSecondPage">
            <?php for( $i=0 ; $i<$rowCount; $i++){
                if($i %2== 0){  ?>
            <div class="d-flex">
                <?php for($j=0 ; $j<2 ; $j++){ ?>
                    <div class="card secondPageCards shadow-lg" style="width: 18rem;">
                        <img src="<?php echo $imgArr[$i+$j]?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $courseName[$i+$j]?></h5>
                            <p class="card-text"><?php echo "D : ". $teacherName[$i+$j]?></p>
                            <p class="card-text"><?php echo "Num of hours : ". $numOfCourseHours[$i+$j] ?></p>
                            <a href="userCourse.php?course_id=<?php echo $courseID[$i + $j]; ?>">Register Now</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php }}?>
        </div>
         <div class="container rightTextSecondPage">
            <p class="sP">AVAILABLE FOR YOU</p>
            <h1 class="sH1">Available <br> Courses</h1>
            <br>
            <p class="sSP">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit. Etiam dignissim, sem non convallis <br> molestie</p>
            <button class="navBut registerBut" type="submit">see all</button>
        </div>
    </div>
    <br><br><br>
    <h1 class="testWord">Testmonials</h1>
    <br>
    <div class="lastCards">
        <div class="card mb-3 testCards d-flex shadow-lg">
            <img class="leftWomen" src="public/images/leftWomen.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Friskidia</h5>
              <p class="clientParaghraph">Client</p>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing <br> elit. Etiam dignissim, sem non convallis molestie</p>
            </div>
          </div>
          <div class="card mb-3 testCards d-flex shadow-lg">
            <img class="rightWomen" src="public/images/rightWomen.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Finkidia</h5>
              <p class="clientParaghraph">Client</p>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing <br> elit. Etiam dignissim, sem non convallis molestie</p>
            </div>
          </div>
          
    </div>

    <div class="container-fluid lastElement">
        <div class="container lastElementContent d-flex">
            <div class="container leftLast col-5">
                <div class="logoImgDiv">
                    <img class="lastLogoImg" src="public/images/logo.png" alt="logoImg">
                    <a class="navbar-brand" href="#"><b class="lastStoreName">mangcoding Store</b></a>
                </div>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing <br> elit. Etiam dignissim, sem non convallis molestie</p>
                <br>
                <div class="socialCommunication">
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-facebook socialCommunicationLogos" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter socialCommunicationLogos" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-linkedin socialCommunicationLogos" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-instagram socialCommunicationLogos" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>
                </div>
            </div>
            <div class="container rightLast d-flex">
                <div class="lastElementHome lastElementContents">
                    <h2>Home</h2><br>
                    <a class="lastElementContentsLinks" href="">Product</a>
                    <br>
                    <a class="lastElementContentsLinks" href="">Course</a>
                    <br>
                    <a class="lastElementContentsLinks" href="">About Us</a>  
                    <br>
                    <a class="lastElementContentsLinks" href="">Log in</a>     
                    <br>
                </div>
                <div class="lastElementCourse lastElementContents">
                    <h2>Course</h2><br>
                    <a class="lastElementContentsLinks" href="">HTML & CSS</a>
                    <br>
                    <a class="lastElementContentsLinks" href="">Javascript</a>
                    <br>
                    <a class="lastElementContentsLinks" href="">Fotographer</a>  
                    <br>
                    <a class="lastElementContentsLinks" href="">Grafis Design</a>     
                    <br>
                </div>
                <div class="lastElementAtricle lastElementContents">
                    <h2>Article</h2><br>
                    <a class="lastElementContentsLinks" href="">New</a>
                    <br>
                    <a class="lastElementContentsLinks" href="">Old</a>
                    <br>
                    <a class="lastElementContentsLinks" href="">Trend</a>  
                    <br>
                    <a class="lastElementContentsLinks" href="">Popular</a>     
                    <br>
                </div>
                <div class="lastElementContactUs lastElementContents">
                    <h2>Contact Us</h2><br>
                    <p class="lastElementEmail" href="">CCdoc123@gmail.com</p>     
                </div>
            </div>

        </div>
    </div>



<?php }
else{
    header("location: logIn.html?Log in first");
} ?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    const scrollToBottomButton = document.getElementById('registerCoursesBut');

    scrollToBottomButton.addEventListener('click', () => {
      const scrollDistance = 1500;
      window.scrollTo({
        top: scrollDistance,
        behavior: 'smooth'
      });
    });
  </script>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>