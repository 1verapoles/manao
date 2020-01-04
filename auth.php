<?php
session_start();
if (!empty($_SESSION['name'])) {
header('Location: /already_reg.php');
exit();
}
$data['result'] = 'success';
$data['login'] = "";
$data['password'] = "";
$data['name_auth'] = "";
 $parent = new DomDocument('1.0', 'UTF-8');
 $parent->load("db.xml");
 $xpath = new DOMXpath($parent);


// проверка поля password
if (isset($_POST['password'])) {
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING); // защита от XSS
  } else {
  $data['password'] .= 'Заполните это поле.';
  $data['result'] = 'error';
}

// проверка поля login
if (isset($_POST['login'])) {
  $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING); // защита от XSS
  } else {
  $data['login'] .= 'Заполните это поле.';
  $data['result'] = 'error';
}

 $fet_log = $xpath->query("//user[login ='{$login}']");
 

  if (count($fet_log) > 0) {
    foreach ($fet_log->item(0)->childNodes as $re) {
    if ($re->nodeName == 'password')
    {$pass_xml = $re->nodeValue;}
  if ($re->nodeName == 'name')
    {$name = $re->nodeValue;}
   if ($re->nodeName == 'cook')
    {$re->nodeValue = $_COOKIE['PHPSESSID'];}
  }
  } else {
     $data['login'] .= 'Вы неверно ввели логин или указанный логин не существует';
   $data['result'] = 'error';
  }

  if (!password_verify($password, $pass_xml)) {
    $data['password'] .= 'Введенный пароль не соответствует заданному логину';
   $data['result'] = 'error';
  } 



if ($data['result'] == 'success') {
$_SESSION['auth'] = true;
$_SESSION['name'] = $name;
$data['name_auth'] = $name;
}


echo json_encode($data);

?>