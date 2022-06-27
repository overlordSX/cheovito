<?php

session_start();
require 'connection.php';

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

// Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
//Выбор всех кортежей, опционально использование параметров(не один)
function selectAll($table, $params = []){
    global $connection;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            // echo $sql; die();
            if ($i === 0){
                $sql = $sql . " WHERE `$key` = '$value' ";
            }else{
                $sql = $sql . " AND `$key` = '$value' ";
            }
            $i++;
        }
    }


    $query = $connection->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//получить кортеж с заданными параметрами
function selectOne($table, $params = []){
    global $connection;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value ";
            }else{
                $sql = $sql . " AND $key = $value ";
            }
            $i++;
        }
    }

    $query = $connection->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

//вставка данных в таблицу
function insert($table, $params){
    global $connection;
    $i = 0;
    $coll = '';
    $mask = '';
    //в этом цикле будет генерироваться колонки и значения
    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" ."$value" . "'";
        }else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }

        $i++;

    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $connection->prepare($sql);
    //$query->debugDumpParams();

    $query->execute();
    dbCheckError($query);
    return $connection->lastInsertId();

}

// обновление данных в таблице
function update($table, $id, $params){
    global $connection;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else {
            $str = $str .", " . $key . " = '" . $value . "'";
        }

        $i++;

    }


    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $connection->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// функция делит
function delete($table, $id){
    global $connection;

    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $connection->prepare($sql);
    $query->execute();
    dbCheckError($query);

}


//TODO начиная отсюда можно делать свои запросы


//выборка записей (posts) с автором в админку
function selectAllFromPostsWithUsers($table1, $table2, $login){
    global $connection;
    $sql = "
        SELECT
        t1.id,
        t1.title,
        t1.img,
        t1.content,
        t1.status,
        t1.id_topic,
        t1.created_date,
        t2.username
        FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id WHERE t1.id_user = $login";

    $query = $connection->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

//выборка записей (posts) с автором на главную

function selectAllFromPostsWithUsersOnIndex($table1, $table2, $limit, $offset){
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 LIMIT $limit OFFSET $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}
//поиск по заголовкам и содержимому

function searchInTitleContent($text, $table1, $table2){
    $text = trim(strip_tags(stripslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1
    AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

//выборка записи с автором для single
function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id){
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();

}

//выборка записи с автором для single
function countRow($table){
    global $pdo;
    $sql = "SELECT  COUNT(*) FROM $table WHERE status = 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();

}