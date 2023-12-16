<?php

function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=duandemo2;charset=utf8";
    $username = 'root';
    $password = 'mysql';
    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function pdo_execute($sql, $params = array())
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Log lỗi
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_execute_return_lastInsertId($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_one($sql, $params = array())
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        
         // Gán giá trị cho các tham số
         foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_value($sql, $params = array())
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        
        // Bind tham số sử dụng prepared statements
        for ($i = 0; $i < count($params); $i++) {
            $stmt->bindParam($i + 1, $params[$i]);
        }

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            // Lấy giá trị của cột đầu tiên
            return reset($row);
        }

        return null;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
