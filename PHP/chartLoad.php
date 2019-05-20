<?php
include('connect.php');

    if((!isset($_POST['selectedMajor'])) || !isset($_POST['selectedClass'])) {
        echo("Please select both fields.");
        exit();
    }
    $major = $_POST['selectedMajor'];
    $class = $_POST['selectedClass'];
    
    $sql1 = 'SELECT name,email FROM tutors WHERE major=:major';
    $stmt = $conn->prepare($sql1);
    $stmt->bindValue(':major',$major,PDO::PARAM_STR);
    $stmt->execute();
    
    $majorData = $stmt->fetchAll();
    $majorJson = json_encode($majorData);
    
    $sql2 = 'SELECT tutors.name, tutors.email FROM tutors JOIN classes ON 
    tutors.name=classes.tutor WHERE classes.class=:class';
    $stmt = $conn->prepare($sql2);
    $stmt->bindValue(':class',$class,PDO::PARAM_STR);
    $stmt->execute();
    
    $classData = $stmt->fetchAll();
    $classJson = json_encode($classData);
    
    echo(json_encode(array("majors" => $majorData, "classes" => $classData)));
?>