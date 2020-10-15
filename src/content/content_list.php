<?php

include "../core/DB.php";

use src\core\DB;

session_start();
$email = $_SESSION["email"];

$result = DB::fetchAll("select content_writer.Writer, content_writer.Id, content.Title, content.Text, content.Upd_date from content_writer inner join content on content_writer.Writer='$email' and content_writer.Id=content.Id;", []);

if($result) {
	print_r(json_encode($result));

	return false;
}else print_r(json_encode(array(
	"message" => "no posted write"
)));

?>