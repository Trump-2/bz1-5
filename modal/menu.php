<h3 class="cent">新增主選單</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>主選單名稱:</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td>選單連結網址:</td>
            <td><input type="text" name="href" id=""></td>
        </tr>
        <input type="hidden" name="table" value="<?= $_GET['table'] ?>">
    </table>
</form>