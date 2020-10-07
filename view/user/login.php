<div class="container">
    <h1>로그인</h1>
    <div class="container">
        <form method="post" action="">
            <fieldset>
                <legend>로그인 폼 작성</legend>
                <input type="hidden" name="action" value="login">
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="form-group">
                            <label for="userid">Email</label>
                            <input type="email" class="form-control" id="userid" name="userid">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">로그인</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>