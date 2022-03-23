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
    print('Спасибо, результаты сохранены.');
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
  print('Заполните имя.<br/>');
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
  $stmt = $db->prepare("INSERT INTO form (name) VALUES (:name)");
  $stmt -> bindParam(':name', $name);
  $name = $_POST['fio'];
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO form (email) VALUES (:email)");
  $stmt -> bindParam(':email', $email);
  $name = $_POST['email'];
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO form (year) VALUES (:year)");
  $stmt -> bindParam(':year', $year);
  $name = $_POST['year'];
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO form (sex) VALUES (:sex)");
  $stmt -> bindParam(':sex', $sex);
  $name = $_POST['radio-group-1'];
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO form (number_of_limbs) VALUES (:number_of_limbs)");
  $stmt -> bindParam(':number_of_limbs', $number_of_limbs);
  $name = $_POST['radio-group-2'];
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO form (superpowers) VALUES (:superpowers)");
  $stmt -> bindParam(':superpowers', $superpowers);
  $name = $_POST['super'];
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO form (biography) VALUES (:biography)");
  $stmt -> bindParam(':biography', $biography);
  $name = $_POST['bio'];
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO form (checkbox) VALUES (:checkbox)");
  $stmt -> bindParam(':checkbox', $checkbox);
  $name = $_POST['check'];
  $stmt->execute();
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

//  stmt - это "дескриптор состояния".
 
//  Именованные метки.
//$stmt = $db->prepare("INSERT INTO test (label,color) VALUES (:label,:color)");
//$stmt -> execute(array('label'=>'perfect', 'color'=>'green'));
 
//Еще вариант
/*$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
*/

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1');
