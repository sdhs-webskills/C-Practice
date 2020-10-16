<?php

echo $_POST["search"];

switch($_POST['search']){
    case "search":
        [
            'searchbox' => $searchbox,
            'searchbtn' => $searchbtn,
        ] = $_POST;

        $user = fetchAll("INSERT INTO users(`id`, `name`) VALUES(?,?)",  [$searchbox]);
        
}