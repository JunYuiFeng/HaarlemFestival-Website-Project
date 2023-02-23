<?php

class Repository
{
    protected $connection;

    function __construct()
    {
        require __DIR__ . '/../config/dbconfig.php';

        try {
            $this->connection = new PDO("$type:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function Query($conn, $sql,  $datatype, ...$data)
    {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($datatype, ...$data);
        if ($stmt->execute()) {
            if (str_contains($sql, "SELECT") !== FALSE) {
                $result = $stmt->get_result();
                return $result->fetch_all(MYSQLI_ASSOC);
            } else
                return 1;
        } else
            return -1;
    }
}
