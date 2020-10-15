<?php

include "../core/DB.php";

use src\core\DB;

session_start();
$email = $_SESSION["email"];

$result = DB::fetchAll("select writer.Writer, writer.Title, content.Writer, content.Title, Text, Upd_date from writer inner join content on writer.Writer='$email' and writer.Title=content.Title and writer.Writer=content.Writer;", []);

print_r(json_encode("select writer.Writer, writer.Title, content.Writer, content.Title, Text, Upd_date from writer inner join content on writer.Writer='$email' and writer.Title=content.Title and writer.Writer=content.Writer;"));

// if($result) {
// 	print_r(json_encode($result));

// 	return false;
// }else print_r(json_encode(array(
// 	"message" => "no posted write"
// )));

?>