<?php
session_start();
$data['result'] = 'success';
$data['name'] = "";
$data['login'] = "";
$data['email'] = "";
$data['password'] = "";
$data['confirm_password'] = "";
$sess = 'false';
$cook = $_COOKIE['PHPSESSID'];
 $parent = new DomDocument('1.0', 'UTF-8');
 $parent->load("db.xml");
 $xpath = new DOMXpath($parent);


// проверка поля login
if (isset($_POST['login'])) {
  $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING); // защита от XSS
  $fet_log = $xpath->query("//user[login ='{$login}']");
   //проверка на уникальность логина
  if ($login && count($fet_log)>0) {
  $data['login'] .= 'Указанный логин уже существует';
  $data['result'] = 'error';
}
  } else {
  $data['login'] .= 'Заполните это поле.';
  $data['result'] = 'error';
}

// проверка поля password
if (isset($_POST['password'])) {
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING); // защита от XSS
  } else {
  $data['password'] .= 'Заполните это поле.';
  $data['result'] = 'error';
}

// проверка поля confirm_password
if (isset($_POST['confirm_password'])) {
  $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING); // защита от XSS
  } else {
  $data['confirm_password'] .= 'Заполните это поле.';
  $data['result'] = 'error';
}



if ($password != $confirm_password) {
  $data['confirm_password'] .= 'Пароль введен второй раз неверно';
  $data['result'] = 'error';
} else {
  $password = password_hash($password, PASSWORD_DEFAULT);
}

// проверка поля email
if (isset($_POST['email'])) {
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // защита от XSS
    $data['email'] = 'Адрес электронной почты не корректный';
    $data['result'] = 'error';
  } else {
    $email = trim($_POST['email']);
   $fet = $xpath->query("//user[email='{$email}']"); //проверка на уникальность электронной почты
   if ($email && count($fet)>0) {
  $data['email'] .= 'Указанный email уже существует';
  $data['result'] = 'error';
}
  }
  } else {
  $data['email'] .= 'Заполните это поле.';
  $data['result'] = 'error';
}


// проверка поля name
if (isset($_POST['name'])) {
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING); // защита от XSS
  } else {
  $data['name'] .= 'Заполните это поле.';
  $data['result'] = 'error';
}

if ($data['result'] == 'success') {
$sess = 'true';  
$users = $parent-> getElementsByTagName("Users")->item(0);
$user = $parent->createElement('user');
$user->appendChild($parent->createElement("login", $login));
$user->appendChild($parent->createElement("password", $password));
$user->appendChild($parent->createElement("email", $email));
$user->appendChild($parent->createElement("name", $name));
$user->appendChild($parent->createElement("sess", $sess));
$user->appendChild($parent->createElement("cook", $cook));
$users->appendChild($user);
$parent->save("db.xml");
$_SESSION['auth'] = true;
$_SESSION['name'] = $name;
}


echo json_encode($data);

?>