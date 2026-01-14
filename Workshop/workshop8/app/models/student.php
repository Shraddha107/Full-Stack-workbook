<?php
class Student {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function all() {
        $result = $this->conn->query("SELECT * FROM students");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create(string $name, string $email, string $course) {
        $stmt = $this->conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $course);
        return $stmt->execute();
    }

    public function update(int $id, string $name, string $email, string $course) {
        $stmt = $this->conn->prepare("UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $course, $id);
        return $stmt->execute();
    }

    public function delete(int $id) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>