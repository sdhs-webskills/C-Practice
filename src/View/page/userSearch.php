</head>
<body>
<form class="searchBox" action="" method="GET">
  <input type="text" name="search" id="search" placeholder="이름 또는 이메일">
  <input type="submit" value="검색">
</form>
<div class="searchList">
  <div class="list">
    <?php
    if(isset($_SESSION["searchUsers"])) {
      $users = $_SESSION["searchUsers"];
      // print_r($users);
      $count = count($users);
      // echo $count;
      // for($int = 0; $int < $count; $int++) {
      //   print_r($users[$int]);
        
      // // foreach($users as $user) {
      //   echo $int;
      // //   print_r($user);
      //   print_r($users[$int][4]);
      foreach($users as $user) {
        // print_r($user);
    
      echo '<img src="./public/images/user_profile/$user["image"]" alt="$user["name"]">';
      echo '<p>$user["name"]</p>';
      echo '<p>$user["birth"]</p>';
      echo '<form action="POST">';
      echo '<input type="text" name="key" id="key" class="none" value="$user["idx"]">';
      echo '<input type="submit" value="친구(요청|끊기)">';
      echo '</form>';
    
      }
    }
    ?>
  </div>
</div>


