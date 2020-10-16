  <link rel="stylesheet" href="./public/css/userSearch.css">
</head>
<body>
  <div class="header">
    <ul>
      <li><a href="/logout">로그아웃</a></li>
      <li><a href="/">홈</a></li>
      <li><a href="/friendRequest">친구 요청</a></li>
      <li><a href="/profile?email=<?=$_SESSION["user"]->email?>">프로필</a></li>
    </ul>
  </div>
  <form class="searchBox" action="" method="GET">
  <?php if(empty($_GET["search"])) {?>
    <input type="text" name="search" id="search" placeholder="이름 또는 이메일" autofocus>
  <?php }else { ?>
    <input type="text" name="search" id="search" placeholder="이름 또는 이메일" value="<?=$_GET["search"]?>" autofocus>
  <?php } ?>
    <input type="submit" value="검색">
  </form>
  <div class="searchList">
      <?php
      if(isset($searchedUser)) {
        foreach($searchedUser as $user) {
          $data = $user;
          $idx = $user->idx;
          $email = $user->email;
          $name = $user->name;
          $image = $user->image;
          $birth = $user->birth;
          $checked = false;
          foreach ($friends as $friend) {
            if ($friend->friend === $idx) {
              $checked = true;
              break;
            }
          }
          ?>
          <div class="list">
            <a href="/profile?email=<?=$email?>"><img src="./public/images/user_profile/<?=$image?>" alt="<?=$name?>"></a>
            <div class="data">
            <a href="/profile?email=<?=$email?>"><p><?=$name?></p></a>
              <p><?=$birth?></p>
            </div>
            <form action="/requestFriend" method="POST">
              <input type="text" name="key" id="key" class="none" value="<?=$idx?>" readonly>
              <?php if($checked) { ?>
              <input type="text" name="whether" class="none whether" value="1" readonly>
              <input type="submit" value="친구끊기" class="friend__button" readonly>
              <?php } else { ?>
              <input type="text" name="whether" class="none whether" value="0" readonly>
              <input type="submit" value="친구요청" class="friend__button" readonly>
              <?php } ?>
            </form>
          </div>
          <?php } ?>
          <?php if(count($searchedUser) === 0) { ?>
          <p>존재하지 않는 유저입니다.</p>
          <?php } ?>
        <?php } ?>
  </div>


