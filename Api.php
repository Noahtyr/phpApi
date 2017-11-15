<?php
/**
 * Created by PhpStorm.
 * User: Noah Juaquin Davidian
 * Date: 15-11-2017
 * Time: 10:04
 */

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$array = [];
parse_str ($_SERVER['QUERY_STRING'], $array);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'world');
mysqli_set_charset($link,'utf8');


}

// create SQL based on HTTP method
switch ($method) {
    case 'GET':
        $sql = "select * from country WHERE Name =$key"; break;

}

// excecute SQL statement
$result = mysqli_query($link,$sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die(mysqli_error());
}

// print results, insert id or affected row count
if ($method == 'GET') {
    if (!$key) echo '[';
    for ($i=0;$i<mysqli_num_rows($result);$i++) {
        echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$key) echo ']';
} elseif ($method == 'POST') {
    echo mysqli_insert_id($link);
} else {
    echo mysqli_affected_rows($link);
}

// close mysql connection
mysqli_close($link);

