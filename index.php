<?php
header('Content-Type: text/html; charset=UTF-8');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!empty($_GET['save'])) {
    echo "<script> alert('Спасибо, результаты сохранены.');</script>";
  }
  include('form.php');
  exit();
}

$errors = FALSE;
if (empty($_POST['name'])) {
  echo "<script> alert('Заполните имя.');</script>";
  $errors = TRUE;
}

if (!preg_match("/^[a-zа-яё]+$/i", $_POST['name'])){
	echo "<script> alert('Вводите только буквы в поле Имя.');</script>";
$errors = TRUE;
}


if (empty($_POST['email'])) {
  print('Заполните email.<br/>');
  $errors = TRUE;
}

if (!preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $_POST['email'])){
  echo "<script> alert('Невозможный email.');</script>";
  $errors = TRUE;
}

if (empty($_POST['super'])) {
  print('Выберете суперспособности.<br/>');
  $errors = TRUE;
}

if (empty($_POST['bio'])) {
  print('Заполните биографию.<br/>');
  $errors = TRUE;
}


if ($errors) {
  exit();
}


$user = 'u41181';
$pass = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
  $stmt = $db->prepare("INSERT INTO form (name, email, year, sex, number_of_limbs, superpowers, biography, checkbox) 
  VALUES (:name, :email, :year, :sex, :number_of_limbs, :superpowers, :biography, :checkbox)");
  
  $stmt -> bindParam(':name', $name);
  $stmt -> bindParam(':email', $email);
  $stmt -> bindParam(':year', $year);
  $stmt -> bindParam(':sex', $sex);
  $stmt -> bindParam(':number_of_limbs', $number_of_limbs);
  $stmt -> bindParam(':superpowers', $superpowers);
  $stmt -> bindParam(':biography', $biography);
  $stmt -> bindParam(':checkbox', $checkbox);
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $year = $_POST['year'];
  $sex = $_POST['radio-group-1'];
  $number_of_limbs = $_POST['radio-group-2'];
  $superpowers = $_POST['super'];
  $biography = $_POST['bio'];
  if (empty($_POST['check']))
    $checkbox = "No";
  else
    $checkbox = $_POST['check'];
  
  $stmt->execute();
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}
header('Location: ?save=1');
