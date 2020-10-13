<?php

include "../core/Board.php";

use src\core\Board;

session_start();
$email = $_SESSION["email"];

$result = Board::fetchAll("select writer.Writer, writer.Title, content.Writer, content.Title, Text, Upd_date from writer inner join content on writer.Writer='$email' and writer.Title=content.Title;", []);

if($result) print_r(json_encode($result));
else print_r(json_encode(array(
	"message" => "no posted write"
)));

?>