<?php
/**
 * 连接数据库
 * @return resource
 */
function connect()
{
    $host     = 'localhost';
    $username = 'www';
    $password = '123456';
    $dbname   = 'shop';
    $port     = '3305';
    global $link;
    $link     = mysqli_connect($host,$username,$password,$dbname,$port);   // 连接到数据库
    if ($link->connect_error) {
        die("连接失败: " . $link->connect_error);
    }
    return $link;
}

/**
 * 插入记录
 *
 * @param string $table            
 * @param array $array            
 * @return number
 */
function insert($table, $array)
{
    global $link;
    $keys = "".join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$vals})";
    $result=mysqli_query($link, $sql);
    if($result){
        return mysqli_insert_id($link);
    }else{
        return false;
    }
}

/**
 * 更新记录
 *
 * @param string $table            
 * @param array $array            
 * @param string $where            
 * @return number
 */
 //未解决更新
function update($table, $array, $where = null)
{
    global $link;
    //定义放在循环外面！！！！！！！
    $str = "";
    foreach ($array as $key => $val) {
        if ($str == null) {
            $sep = "";
        } else {
            $sep = ",";
        }
        $str .= $sep . $key . "='" . $val . "'";
    }
    $sql = "update {$table} set {$str} " . ($where == null ? null : " where " . $where);
    //echo $sql;exit;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    }else{
        return false;     
    }
}

/**
 * 删除记录
 *
 * @param string $table            
 * @param string $where            
 */
function delete($table, $where = null)
{
    global $link;
    $where = $where == null ? null : " where " . $where;
    $sql = "delete from {$table}{$where}";
    //$link = new mysqli("localhost", "root", "960223", "shop");
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    }else{
        return false;
    }
}

/**
 * 获取其中一条记录
 *
 * @param string $sql            
 * @param string $result_type            
 */
function fetchOne($sql)
{
    global $link;
    $result = mysqli_query($link,$sql);
    if($result){
        return mysqli_fetch_assoc($result);
    }
    else{
        return false;
    }
}

/**
 * 获取所有记录
 *
 * @param string $sql            
 * @param string $result_type            
 * @return multitype:
 */
function fetchAll($sql)
{
    global $link;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    $result = mysqli_query($link,$sql);
    while (@$row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/**
 * 获取记录条数
 *
 * @param string $sql            
 * @return number
 */
function getResultNum($sql)
{
    global $link;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    $result = mysqli_query($link,$sql);
    if($result){
        return mysqli_num_rows($result);
    }else{
        return false;
    }
}

/**
 * 获取插入记录的id
 * @return number
 */
function getInsertId(){
    global $link;
    //$link = new mysqli("localhost", "root", "960223", "shop");
    return mysqli_insert_id($link);
}
