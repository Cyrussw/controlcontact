<?php

class actions {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function query_number($number) {
        $sql = "SELECT * FROM numbers WHERE number = :number";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":number", $number);
        $stmt->execute();
        $number_details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($number_details) {
            return $number_details;
        } else {
            $status = "normal";
            $create_num_sql = "INSERT INTO numbers (number, status, search_time, created_time) VALUES (:number, :status, NOW(), NOW())";
            $create_num_stmt = $this->pdo->prepare($create_num_sql);
            $create_num_stmt->bindParam(":number", $number);
            $create_num_stmt->bindParam(":status", $status);
            $create_num_stmt->execute();
            return false;
        }
    }
}

?>