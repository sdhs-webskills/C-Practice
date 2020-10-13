  <link rel="stylesheet" href="./public/css/userSearch.css">
</head>
<body>
<a href="/">홈</a>
<form class="searchBox" action="" method="GET">
<?php if(empty($_GET["search"])) {?>
  <input type="text" name="search" id="search" placeholder="이름 또는 이메일">
<?php }else { ?>
  <input type="text" name="search" id="search" placeholder="이름 또는 이메일" value="<?=$_GET["search"]?>">
<?php } ?>
  <input type="submit" value="검색">
</form>
<div class="searchList">
    <?php
    if(isset($_SESSION["searchUsers"])) {
      $users = $_SESSION["searchUsers"];
      $count = count($users);
      foreach($users as $user) {
        $data = $user;
        $idx = $user->idx;
        $name = $user->name;
        $image = $user->image;
        $birth = $user->birth;
        $friend = $user->friend;
        print_r($friend);
        ?>
        <div class="list">
          <img src="./public/images/user_profile/<?=$image?>" alt="<?=$name?>">
          <div class="data">
            <p><?=$name?></p>
            <p><?=$birth?></p>
          </div>
          <form action='POST'>
            <input type='text' name='key' id='key' class='none' value='<?=$idx?>'>
            <?php if($friend[1] == 1) { ?>
            <input type='submit' value='친구 끊기' class="friend__button">
            <?php }else { ?>
            <input type='submit' value='친구 끊기' class="friend__button">
            <?php } ?>
          </form>
        </div>
        <?php
      }
    }
    ?>
</div>


