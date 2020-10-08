</head>
<body>
<form class="searchBox" action="" method="GET">
  <input type="text" name="search" id="search" placeholder="이름 또는 이메일">
  <input type="submit" value="검색">
</form>
<div class="searchList">
<?php
print_r($_GET["search"]);
?>
  <div class="list">
    <img src="./public/images/user_profile/(profile)" alt="(name)">
    <p>(name)</p>
    <p>(birth)</p>
    <form action="POST">
      <input type="text" name="key" id="key" class="none" value="(idx)">
      <input type="submit" value="친구(요청|끊기)">
    </form>
  </div>
</div>


