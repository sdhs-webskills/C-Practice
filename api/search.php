<?php
    $result = fetchAll("SELECT `id`, `name` FROM users WHERE id LIKE ?", ["%{$_GET['q']}%"]);
    echo json_encode($result);