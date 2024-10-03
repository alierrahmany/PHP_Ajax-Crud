<?php
    require_once '../database/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $regist_number = $_POST['regist_number'];
        $avg = $_POST['avg'];
        $move_next = $_POST['move_next'];

        $sql = 'INSERT INTO students(name, regist_number, avg, move_next) 
            VALUES(:name, :regist_number, :avg, :move_next)';
        
        $stmt = $conn->prepare($sql);

        $added = $stmt->execute([
            ':name' => $name,
            ':regist_number' => $regist_number,
            ':avg' => $avg,
            ':move_next' => $move_next
        ]);
        
        if($added) {

            $response = [
                'status' => 200,
                'message' => 'Student Created'
            ];
    
            echo json_encode($response);
    
            return;
        }else {
            $response = [
                'status' => 500,
                'message' => 'Student Not Created'
            ];
    
            echo json_encode($response);
        }

    }
?>