<div class="container">
    <h1>회원가입</h1>
    <form method="post" action="">
        <fieldset>
            <legend>회원가입 작성 폼</legend>
            <input type="hidden" name="action" value="join">
            <div class="row mt-5">
                <div class="col-10 offset-1">
                    <input type="hidden" name="action" value="join"/>
                    <div class="row">
                        <label for="userid" class="col-sm-2col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="userid" name="userid"
                                   placeholder="email을 입력하세요">
                        </div>
                    </div>
                    <div class="row">
                        <label for="password" class="col-sm-2col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="비밀번호를 입력하세요">
                        </div>
                    </div>
                    <div class="row">
                        <label for="password_chk" class="col-sm-2col-form-label">Password Check</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_chk" name="password_chk"
                                   placeholder="비밀번호를 확인해주세요">
                        </div>
                    </div>
                    <div class="row">
                        <label for="username" class="col-sm-2col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">회원가입</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">

                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>