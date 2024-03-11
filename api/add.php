<?php
include "./db.php";

$table = $_POST['table'];
$DB = ${ucfirst($table)};


if ($table == 'admin') {
    unset($_POST['pw2']);
}

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/{$_FILES['img']['name']}");
    $_POST['img']  = $_FILES['img']['name'];
}

if ($table != 'admin') {
    $_POST['sh'] = ($table != 'title') ? 1 : 0;
}

unset($_POST['table']);

$DB->save($_POST);

to("../back.php?do=$table");
