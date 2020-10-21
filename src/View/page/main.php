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