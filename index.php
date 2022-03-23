<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    echo "<script> alert('Спасибо, результаты сохранены.');</script>";
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['name'])) {
  echo "<script> alert('Заполните имя.');</script>";
  $errors = TRUE;
}

if (empty($_POST['email'])) {
  print('Заполните email.<br/>');
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

// *************
// Тут необходимо проверить правильность заполнения всех остальных полей.
// *************

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

// Сохранение в базу данных.

$user = 'u41181';
$pass = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

// Подготовленный запрос. Не именованные метки.
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

//  stmt - это "дескриптор состояния".
 

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1');
