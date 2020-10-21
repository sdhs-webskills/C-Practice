# 기능경기대회 PHP 과제 연습

C 모듈 연습을 위한 저장소입니다.

## 1. 🚀 Pull Request 올리는 방법 🚀 

### (1) 🤓 코드리뷰에 참여하기(GitHub에서 Pull request 보내기)

자신이 `Pull request` 를 올릴 branch 를 만듭니다.

```
git checkout -b junilhwang
```

만든 브랜치를 `push` 해서 올립니다.

```
git push origin junilhwang
```

이제 작업할 브랜치를 만듭니다.

```
git checkout -b junilhwang_working
```

만든 브랜치를 올립니다.

```
git push origin junilhwang_working 
```

작업을 한 후, `commit` 과 `push` 를 합니다.
```
git commit -a -m "~~~"
git push
```

push 까지 되었으면 

- [Pull requests](https://github.com/sdhs-webskills/C-Practice/pulls) 탭으로 가서,
  영롱하게 빛나는 녹색 버튼 [New pull request](https://github.com/sdhs-webskills/C-Practice/compare) 를 누릅니다.
- **여기서 중요한 것!** `junilhwang` ⇐ `junilhwang_working` 으로 설정하고 버튼을 눌러야 합니다.
  즉 왼쪽이 `Pull request` 대상이고, 오른쪽이 소스입니다.

***

- Git에 대한 내용은 [지옥에서 온 Git](https://opentutorials.org/course/2708)을 확인해보세요.
- GitHub 사용법 관련해서는 [이 문서](https://backlog.com/git-tutorial/kr/stepup/stepup3_3.html)를 읽어보세요.



## 2. 👨‍💻 Code Review 👩‍💻

아래 링크들에 있는 리뷰 가이드를 보고 서로에게 코드리뷰를 해주세요! 

- [코드리뷰 가이드1](https://edykim.com/ko/post/code-review-guide/)
- [코드리뷰 가이드2](https://wiki.lucashan.space/code-review/01.intro.html#_1-code%EB%A5%BC-%EB%A6%AC%EB%B7%B0%ED%95%98%EB%8A%94-%EC%82%AC%EB%9E%8C%EB%93%A4%EC%9D%80-%EC%96%B4%EB%96%A4%EA%B2%83%EC%9D%84-%EC%A4%91%EC%A0%90%EC%A0%81%EC%9C%BC%EB%A1%9C-%EC%82%B4%ED%8E%B4%EC%95%BC%ED%95%98%EB%8A%94%EA%B0%80)


## 3. 🏴 요구사항 🏴

### 🎯 (1) 로그인

- Form[ 아이디, 비밀번호 ]
- 아이디와 비밀번호가 서로 다를 때 “아이디 또는 비밀번호가 일치하지 않습니다.” 라고 경고창이 띄어진다.
- DB에 아이디와 비밀번호가 서로 일치하는 데이터가 있을 때 세션을 발급하고, 메인 페이지로 이동한다.
- 회원가입 페이지로 이동하는 버튼 또는 링크가 존재해야 한다.


### 🎯  (2) 회원가입

- Form[ 이메일, 비밀번호, 비밀번호체크, 이름, 생년월일, 프로필 이미지, 캡차 ]
- 이메일 형식 `영어 이메일만 가능`
  - test@naver.com
  - test@naver.co.kr
- 비밀번호 형식 `영어 대소문자, 숫자, 특수문자(0~9까지만 가능) 혼합`
- 이름 형식 `한국어, 영어, 숫자(숫자만 제외)` 2글자 ~ 10글자까지
- 생년월일 형식 `yyyy-mm-dd` 1920-01-01 ~ 현재 날짜
  - 1920-01-01전 이거나, 현재 날짜 이후 일 시 submit 안됨
- 프로필 이미지 형식 [ jpg, png, gif ] 이미지 파일만 가능
  - 이미지 확장명이 다를 시 `이미지 파일은 jpg, png, gif 파일만 업로드 가능합니다.` 라고 경고창이 띄워진다.
  - 이미지 파일이 아닐 시 `이미지 파일만 업로드 가능합니다.` 라고 경고창이 띄워진다.
- 캡차 형식 `영어 대문자, 숫자 혼합` 6글자
  - 캡차 입력 이 다를 시 `캡차 입력이 일치하지 않습니다.`라는 경고창이 띄워져야 한다.
  - 경고창이 띄워진 후 캡차가 변경되고, submit 되지 않아야 한다.
- 이메일이 중복일 시 이메일 Input 아래에 `중복된 이메일입니다.`라고 빨간 글씨로 나와야 한다.
- 회원가입 조건 완료 시 DB에 데이터가 저장되고, `회원가입이 완료되었습니다.`라는 알림창이 띄워지고 로그인 페이지로 이동한다.

### 🎯 (3) 유저 검색페이지

- 유저 프로필을 검색할 수 있는 검색 창과 `검색` 버튼이 존재한다.
- 유저 입력창에 이름 또는 이메일 입력 후 검색 버튼 클릭 시 검색 된다.
- 검색 결과가 없을 시 `존재하지 않는 유저입니다.` 라고 띄워져야 한다.
- 검색 리스트에는 유저 `프로필 이미지, 이름, 생년월일` 이 표시된다.
- 각 리스트에는 검색한 유저가 친구일 시 `친구끊기` 버튼, 친구가 아닐 시 `친구요청` 버튼이 존재한다. ( 버튼 클릭 시 그에 맞는 기능구현이 되어 있어야 한다. )
- `프로필 사진, 이름`을 클릭 시 유저의 프로필 페이지로 이동한다.

### 🎯 (4) 친구 요청 페이지

- 친구 요청한 유저의 `프로필 이미지, 이름`이 표시되고 `친구수락, 거절` 버튼이 존재한다.
- 요청한 유저의 `프로필 이미지, 이름` 클릭 시 유저의 프로필 페이지로 이동한다.
- 주의할 점 서로에게 친구요청을 보내고 둘 중 하나가 친구 수락할 시 나머지 요청은 사라져야 한다.

### 🎯 (5) 프로필 페이지

프로필 페이지의 영역은 `프로필, 친구 리스트, 게시글` 영역이 존재한다.

#### 1) 프로필영역

- 내용 `프로필 이미지, 이름, 이메일, 생년월일`
- 친구가 아닌 유저가 접근 시 `친구요청`버튼이 존재한다.
- 친구가 접근 시 `친구끊기`버튼이 존재한다.

#### 2) 친구 리스트 영역 `네비게이션` ( 프로필 주인만 보임 )

- 프로필 주인의 친구 리스트가 나열된다.
- 친구 리스트는 오래된 친구 순으로 정렬된다.
- 6명까지만 보이고 `더보기` 버튼을 클릭 시 모든 친구 리스트가 보여야한다.

#### 3) 게시글

- `게시글 등록 버튼`과 게시글이 있어야 한다.
- 게시글 등록 버튼 클릭 시 `게시글 등록 페이지`로 이동한다.

#### 4) 게시글 등록페이지 ( 프로필 주인만 보임 )

- Form `제목, 내용, 이미지` `등록하기 버튼`
- 제목 형식 `최소 2글자~30글자까지 `
- 내용 형식 `공백만 추가 불가능 하다.`. 공백만 입력 시 경고창을 띄우고 submit 되지 않는다.
- 이미지 형식 `다중 업로드`가 가능해야 한다. `jpg, png, gif` 파일만 업로드 가능
  - 이미지 확장명이 다를 시 `이미지 파일은 jpg, png, gif 파일만 업로드 가능합니다.`라고 경고창이 띄워진다.
  - 이미지 파일이 아닐 시 `이미지 파일만 업로드 가능합니다.`라고 경고창이 띄워진다.
- `등록하기 버튼` 클릭 시 조건에 맞을 경우 `게시글이 생성되었습니다.`라는 알림창이 띄워지고, 프로필 페이지로 이동한다.

#### 5) 게시글

- 프로필 주인이 올린 게시글이 보여진다.
- 내용 `제목, 내용, 이미지, 좋아요, 댓글 수`가 보여야 한다.
- 내용은 일정치가 넘으면 ... 으로 나타낸다.
- 이미지가 2개 이상 일 시 이미지가 좌우 슬라이드가 되어야 한다. ( Arrow 버튼 )
- 게시물 제목을 클릭 시 상세보기 페이지로 이동한다.
- `좋아요 버튼`을 누를 수 있는 빈 하트 버튼이 보여야 한다. ( 눌러져 있을 시 하트에 컬러를 준다. )



### 🎯 (6) 메인페이지

메인 페이지의 영역은 `검색, 게시글, 페이지네이션` 영역으로 나뉜다.

#### 1) 검색영역

- 다른 사람들이 올린 글을 검색할 수 있는 검색 창과 검색 버튼이 존재한다.
- 검색은 `제목, 작성자` 기준으로 검색이 되어야 한다.
- 검색 버튼 클릭 시 검색이 되어야 한다.

#### 2) 게시글 영역

- 내용 `제목, 내용, 이미지, 좋아요, 댓글 수` 가 보여야 한다. 내용은 일정치가 넘으면 `...` 으로 나타낸다.
- 다른 사람들이 최근에 등록한 게시물 순으로 보여야 한다.
- 이미지가 2개 이상 일 시 이미지가 좌우 슬라이드가 되어야 한다. ( Arrow 버튼 )
- 게시물 제목을 클릭 시 상세보기 페이지로 이동한다.
- 좋아요 버튼을 누를 수 있는 빈 하트 버튼이 보여야 한다. ( 눌러져 있을 시 하트에 컬러를 준다. )

#### 3) 페이지네이션 영역

- 게시물의 수가 10개 초과일 시 페이지네이션 처리를 해준다.
- 각 페이지 별로 이동할 수 있는 번호가 존재해야 한다.
- 이전 버튼과 다음 버튼이 존재해야 한다.


### 🎯 (7) 게시글 상세보기 페이지

#### 1) 게시글 영역

- 내용 `제목, 내용, 이미지, 좋아요, 댓글 수` 가 보여야 한다.
- 이미지가 2개 이상 일 시 이미지가 좌우 슬라이드가 되어야 한다. ( Arrow 버튼 )
- 게시물을 등록한 유저일 시 `수정, 삭제`하기 버튼이 보여야 한다.
- 좋아요 버튼을 누를 수 있는 빈 하트 버튼이 보여야 한다. ( 눌러져 있을 시 하트에 컬러를 준다. )
- `수정하기` 버튼을 클릭 시 모달 팝업으로 `이미지, 제목, 내용(전부)`를 수정할 수 있는 폼과 [수정 완료] 버튼이 존재한다.
- `수정완료` 버튼을 클릭 시 게시글이 수정된다. (이미지는 변경 안할 시 그대로 유지)
- `게시물삭제` 버튼을 클릭 시 “게시물을 삭제하시겠습니까?”라는 창을 띄우고 “확인” 버튼을 클릭 시 “게시글이 삭제되었습니다.”라는 알림창이 나타나고 정상적으로 삭제되어야 한다.

#### 2) 댓글 영역

- 게시글을 등록한 유저가 아닐 시 댓글을 등록할 수 있는 폼과, `댓글 달기` 버튼이 보인다.
- `댓글 달기` 버튼을 클릭 시 댓글이 달린다.
- 자신의 댓글은 수정과 삭제가 가능하다.
- 댓글을 더블 클릭시 textarea 태그로 변환 후 내용을 변경할 수 있어야 한다,
- 바뀐 상태에서 딴 곳을 클릭 시 댓글의 내용이 수정한 내용으로 수정되어야 한다.
- `삭제` 버튼 클릭 시 댓글이 삭제 되어야 한다.

