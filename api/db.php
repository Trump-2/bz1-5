<?php

session_start();
date_default_timezone_set("Asia/Taipei");

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db04_1-5";
    protected $table;
    protected $pdo;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, "root", "");
    }

    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col, $where = '', $other = '')
    {
        return $this->math('sum', $col, $where, $other);
    }

    function avg($col, $where = '', $other = '')
    {
        return $this->math('avg', $col, $where, $other);
    }

    function max($col, $where = '', $other = '')
    {
        return $this->math('max', $col, $where, $other);
    }

    function min($col, $where = '', $other = '')
    {
        return $this->math('min', $col, $where, $other);
    }

    private function math($math, $col, $where = '', $other = '')
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }


    function find($id)
    {
        $sql = "select * from `$this->table` where ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= "`id` = '$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id)
    {
        $sql = "delete  from `$this->table` where ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= "`id` = '$id'";
        }

        return $this->pdo->exec($sql);
    }

    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set ";
            if (!empty($array)) {
                $tmp = $this->a2s($array);
                $sql .= join(" , ", $tmp) . " where `id` = '{$array['id']}'";
            }
        } else {
            $sql = "insert into `$this->table` ";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";
            $sql .= $cols . " values " . $vals;
        }

        return $this->pdo->exec($sql);
    }

    private function a2s($array)
    {
        foreach ($array as $col => $val) {
            $tmp[] = "`$col` = '$val'";
        }

        return $tmp;
    }

    private function sql_all($sql, $where, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($where) && !empty($where)) {
                $tmp = $this->a2s($where);
                $sql .= " where " . join("&&", $tmp);
            } else {
                $sql .= " $where";
            }
            $sql .= " $other";
            return $sql;
        }
    }
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location: $url");
}


$Title = new DB('title');
$Ad = new DB('ad');
$Mvim = new DB('mvim');
$Image = new DB('image');
$News = new DB('news');
$Menu = new DB('menu');
$Bottom = new DB('bottom');
$Total = new DB('total');
$Admin  = new DB('admin');


if (!isset($_SESSION['login'])) {
    $Total->q("update `total` set `total` = `total` + 1 where `id` = 1");
    $_SESSION['login'] = 50;
}


if (isset($_GET['do'])) {
    if (isset(${ucfirst($_GET['do'])})) {
        $DB = ${ucfirst($_GET['do'])};
    }
} else {
    $DB = $Title;
}
