<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>얼굴책 가입</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <h2 class="my-3"></h2>
        <div class="col-10 offset-1">
            <form method="post">
                <div class="form-group row">
                    <label for="userid" class="col-sm-2col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="userid" placeholder="email을 입력하세요">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="비밀번호를 입력하세요">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_chk" class="col-sm-2col-form-label">Password Check</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_chk" name="password_chk" placeholder="비밀번호를 확인해주세요">
                    </div>
                </div>
                <div class="form-group row">
                <label for="username" class="col-sm-2col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">회원가입</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>