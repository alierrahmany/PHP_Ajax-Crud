<?php
    require_once '../database/db.php';

    $student_id = $_GET['id'];

    // construct the delete statement
    $sql = 'DELETE FROM students WHERE id = :student_id';

    // prepare the statement for execution
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);

    // execute the statement
    if ($stmt->execute()) {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Deleted'
        ];
        echo json_encode($res);
        return;
    }

?>