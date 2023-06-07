<?php
session_start();
$host = 'localhost';
$dbname = 'sss1';
$user = 'forSss1Proj';
$password = 'sss1141312';
//data source name
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false
];
//pdo instance
$dbh = new PDO($dsn, $user, $password, $options);

//HELPERS
function loadTable($dbh, $table){
$sql = 'SELECT * FROM ' . $table;
$stmt = $dbh->query($sql);
return $stmt->fetchAll();
}
function contactRequest($dbh, $name, $email, $message){
    $sql = 'INSERT INTO contactus (name, email, message) VALUES (?, ?, ?)';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$name, $email, $message]);
}
function employeeChange($dbh, $firstname, $lastname, $position, $id){
    $sql = 'UPDATE employees SET first_name=?, last_name=?, position=? WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$firstname, $lastname, $position, $id]);
}
function hire($firstname, $lastname, $position, $id){
    $sql = 'INSERT INTO contactus (name, email, message) VALUES (?, ?, ?)';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$name, $email, $message]);
}
?>