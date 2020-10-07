<?php

function alert($msg)
{
    echo "<script>alert('{$msg}');</script>";
}

function move($url = false)
{
    echo "<script>";
    echo $url ? "location.replace('{$url}');" : "history.back()";
    echo "</script>";
    exit;
}

function access($bool, $msg, $url = false)
{
    if (!$bool) {
        alert($msg);
        move($url);
    }
}

function execute($sql, $data = [])
{
    $db = new PDO("mysql:host=localhost; dbname=member; charset=utf8mb4;", "root", "");
    $result = $db->prepare($sql);
    $result->execute($data);
    $db = null;
    return $result;
}

function fetch($sql, $data = [])
{
    return execute($sql, $data)->fetch(PDO::FETCH_OBJ);
}

function fetchAll($sql, $data = [])
{
    return execute($sql, $data)->fetchAll(PDO::FETCH_OBJ);
}