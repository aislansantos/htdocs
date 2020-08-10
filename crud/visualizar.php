<?php
if (isset($_POST["user_id"])) {
    include_once "conn.php";
    $id = $_POST["user_id"];
    $sql = "SELECT * FROM usuario WHERE id = $id LIMIT 1";
    $stmt = $pdo->query($sql);
    $user   = $stmt->fetch(PDO::FETCH_ASSOC);
    $user['nome'];
}
