<?php

$user = DB::fetch("select name, birth from ", []);
$birth = DB::fetch("select name, birth from", []);
?>

<div class="user">
    <div class="info">
        <p class="name"><?= $user[0] ?></p>
        <p class="birth"><?=$birth[0] ?></p>
        <button class="request">친구요청</button>
    </div>
</div>