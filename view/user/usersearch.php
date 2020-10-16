<form method="post" action="../../actions/userSearch.php">
    <label for="search"></label>
    <label for="plusfr"></label>
    <div class="usersearch">
        <input type="hidden" name="action" value="search">
        <input type="text" name="search" class="form-control" id="searchbox" placeholder="사용자 검색...">
    </div>
    <button type="submit" class="searchbtn">검색</button>
</form>
    <div class="result"></div>
<script src="/js/profile.js"></script>
<script src="/js/usersearch.js"></script>