<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';

//create

if (isset($_POST['add'])) {
    global $pdo;
    $sql = $pdo->prepare("INSERT INTO users_1 (name, email, flag) VALUES (?,?,?)");
    $sql->execute([$_POST["name"], $_POST["email"], 1]);
    if($sql) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

//read

$sql = $pdo->prepare("SELECT * FROM users_1 WHERE flag = 1");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//update

if (isset($_POST['edit'])) {
    $sql = $pdo->prepare("UPDATE users_1 SET name=?, email=? WHERE id=?");
    $sql->execute([$_POST["name"], $_POST["email"], $_GET["id"]]);
    if($sql) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

//delete

if (isset($_POST['delete'])) {
    $sql = "UPDATE users_1 SET flag = 0 WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$_GET["id"]]);
    if($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}