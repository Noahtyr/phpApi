<?php
/**
 * Created by PhpStorm.
 * User: Noah Juaquin Davidian
 * Date: 15-11-2017
 * Time: 10:04
 */

//This is our instance Variable
$method = $_SERVER['REQUEST_METHOD'];
$array = [];
parse_str ($_SERVER['QUERY_STRING'], $array);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'world');
mysqli_set_charset($link,'utf8');


}

// create SQL based on HTTP method
if ($method == 'GET' && array_key_exists('name',$array)) {
    $sql = "Select * FROM country WHERE Name =".$array['name'];
    $result = mysqli_query($link,$sql);
    if ($result){

    }
}




// close mysql connection
mysqli_close($link);

