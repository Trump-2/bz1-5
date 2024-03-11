<?php
include "./db.php";

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Menu->del($id);
        } else {
            $sub = $Menu->find($id);
            $sub['text'] = $_POST['text'][$idx];
            $sub['href'] = $_POST['href'][$idx];
            $Menu->save($sub);
        }
    }
}


if (isset($_POST['add_text'])) {
    foreach ($_POST['add_text'] as $idx => $text) {
        if ($text != '') {

            $data = [];
            $data['text'] = $text;
            $data['href'] = $_POST['add_href'][$idx];
            $data['sh'] = 1;
            $data['menu_id'] = $_POST['menu_id'];
            $Menu->save($data);
        }
    }
}

to("../back.php?do=menu");
