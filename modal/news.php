<h3 class="cent">新增最新消息資料</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>最新消息資料:</td>
            <td><textarea name="text" id="" style="width:80%;height:150px"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
            <td></td>
        </tr>
        <input type="hidden" name="table" value="<?= $_GET['table'] ?>">
    </table>
</form>