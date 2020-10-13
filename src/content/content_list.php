<?php

$result = DB::fetch("select Email, writer.Title, content.Title, Text, Upd_date from writer inner join content on Writer=Email and writer.Title=content.Title", []);

print_r(json_encode($result))

?>