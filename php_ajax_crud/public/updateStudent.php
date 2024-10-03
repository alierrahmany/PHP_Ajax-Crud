<?php
require_once '../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $student_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = :student_id");
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();

    // set the resulting array to associative
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        $res = [
            'status' => 200,
            'data' => $student
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Student Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $regist_number = $_POST['regist_number'];
    $avg = $_POST['avg'];
    $move_next = $_POST['move_next'];

    $sql = 'UPDATE students SET name=:name,regist_number=:regist_number,avg=:avg,move_next=:move_next
            WHERE id=:student_id';

    // prepare statement
    $statement = $conn->prepare($sql);

    // bind params
    $statement->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':regist_number', $regist_number);
    $statement->bindParam(':avg', $avg);
    $statement->bindParam(':move_next', $move_next);
    if ($statement->execute()) {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
