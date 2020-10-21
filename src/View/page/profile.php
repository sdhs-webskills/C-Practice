  <link rel="stylesheet" href="./public/css/profile.css">
  <script src="./public/js/profile.js"></script>
</head>
<body>
  <div class="header">
    <ul>
      <li><a href="/logout">로그아웃</a></li>
      <li><a href="/">홈</a></li>
      <li><a href="/userSearch">유저 검색</a></li>
      <li><a href="/friendRequest">친구 요청</a></li>
      <li><a href="/profile?email=<?=$_SESSION["user"]->email?>">프로필</a></li>
    </ul>
  </div>
  <div class="profile">
    <?php
      $idx = $user->idx;
      $email = $user->email;
      $name = $user->name;
      $image = $user->image;
      $birth = $user->birth;
    ?>
    <img src="./public/images/user_profile/<?=$image?>" alt="<?=$name?>">
    <p><?=$name?></p>
    <p><?=$email?></p>
    <p><?=$birth?></p>
    <?php if(!isset($friends)) {
      ?>
    <form action="/requestFriend" method="POST">
      <input type="text" name="key" id="key" class="none" value="<?=$idx?>" readonly>
      <?php if(empty($friendWhether)) { ?>
      <input type="text" name="whether" class="none whether" value="0" readonly>
      <input type="submit" value="친구요청" class="friend__button" readonly>
      <?php } else { ?>
      <input type="text" name="whether" class="none whether" value="1" readonly>
      <input type="submit" value="친구끊기" class="friend__button" readonly>
      <?php } ?>
    </form>
    <?php } ?>
  </div>
  <?php 
  if(isset($friends)) { 
  ?>
  <div class="friend">
    <h2>친구 리스트</h2>
    <input type="checkbox" name="friendHide" id="friendHide">
    <?php
    $int = 0;
    foreach($friends as $friend) { 
      $Fidx = $friend->idx;
      $Femail = $friend->email;
      $Fname = $friend->name;
      $Fimage = $friend->image;

      if($int == 6) {
    ?>
    <label for="friendHide" class="hideLabbel">더보기</label>
    <?php
      }

      if($int >= 6) {
    ?>
    <div class="list hide">
    <?php
      }else {
    ?>
    <div class="list">
    <?php } ?>
        <a href="/profile?email=<?=$Femail?>"><img src="./public/images/user_profile/<?=$Fimage?>" alt="<?=$Fname?>"></a>
        <div class="data">
        <a href="/profile?email=<?=$Femail?>"><p><?=$Fname?></p></a>
        <a href="/profile?email=<?=$Femail?>"><p><?=$Femail?></p></a>
        </div>
        <form action="/requestFriend" method="POST">
          <input type="text" name="key" id="key" class="none" value="<?=$Fidx?>" readonly>
          <input type="text" name="whether" class="none whether" value="1" readonly>
          <input type="submit" value="친구끊기" class="friend__button" readonly>
        </form>
      </div>
    <?php 
      $int++;
    }
    ?>
  </div>
  <?php } ?>
  <div class="bulletin">
    <h2>게시글</h2>
    <?php if(isset($friends)) { ?>
      <a href="/addBulletin button">게시글 등록</a>
    <?php } ?>
    <?php
    foreach($bulletin as $item) {
      $Bidx = $item->idx;
      $Buser = $item->user;
      $Btitle = $item->title;
      $Bnotice = $item->notice;
      $Bimages = $item->images;
      $Bimages = explode("@//", $Bimages);
      // print_r($Bimages);
    ?>
    <div class="Blist">
      <h3 class="title"><?= $Btitle ?></h3>
      <p class="notice"><?= $Bnotice ?></p>
      <div class="images" data-idx="0" data-max="<?= count($Bimages) ?>">
        <?php if(isset($Bimages[1])){ ?>
          <div class="left button">&lsaquo;</div>
          <div class="right button">&rsaquo;</div>
        <?php 
          }
          foreach($Bimages as $image) { 
        ?>
        <img src="./public/images/bulletin/<?= $image ?>" alt="<?= $Btitle ?>">
        <?php } ?>
      </div>
    </div>
    <?php } ?>
  </div>