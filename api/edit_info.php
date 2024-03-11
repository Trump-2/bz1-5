<?php

include "./db.php";

$table = $_POST['table'];
$DB = ${ucfirst($table)};


$data = $DB->find(1);

// 這行容易寫錯，要注意 
$data[$table] = $_POST[$table];

$DB->save($data);

to("../back.php?do=$table");
