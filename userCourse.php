<?php
include("config.php");
session_start();
if (isset($_SESSION['id'])) {
    $courseID = isset($_GET['course_id']) ? $_GET['course_id'] : '';
    $userID = $_SESSION['id'];

    if (!empty($courseID)) {
        $sql = "INSERT INTO student_courses (student_id, course_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $userID, $courseID);
        if ($stmt->execute()) {
            echo "Data inserted successfully. You clicked on course with ID: " . $courseID . "<br>And his id is :" . $userID;


            $sql = "SELECT courseInfo.* FROM courseInfo
            JOIN student_courses ON courseInfo.id = student_courses.course_id
            WHERE student_courses.student_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $result = $stmt->get_result();
            $course_name = array();
            $teacher_name = array();
            $num_of_course_hour = array();
            $f = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $row['courseName'] . ": " . $row['teacherName'] . "<br>";
                    $course_name[$f]=$row['courseName'];
                    $teacher_name[$f]= $row['teacherName'];
                    $num_of_course_hour[$f]=$row['numOfCourseHours'];
                    $f++;
                }

            } else {
                echo "No courses found for the student.";
            }
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php                 for($l=0 ; $l<$f ; $l++){?>
                    <div class="card secondPageCards shadow-lg" style="width: 18rem;">
                    <img src="public/images/js-img.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $course_name[$l]; ?></h5>
                        <p class="card-text"><?php echo "D : ". $teacher_name[$l]?></p>
                            <p class="card-text"><?php echo "Num of hours : ". $num_of_course_hour[$l] ?></p>
                    </div>
<?php }  ?> 
</body>
</html>