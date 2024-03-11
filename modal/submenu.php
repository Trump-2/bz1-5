<?php
include "../api/db.php";
?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table id="opt">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>

        <?php
        $subs = $Menu->all(['menu_id' => $_GET['id']]);
        foreach ($subs as $sub) {
        ?>
            <tr>
                <td><input type="text" name="text[]" value="<?= $sub['text'] ?>"></td>
                <td><input type="text" name="href[]" value="<?= $sub['href'] ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $sub['id'] ?>"></td>
                <input type="hidden" name="id[]" value="<?= $sub['id'] ?>">
            </tr>
        <?php
        }
        ?>

        <!-- 藏著主選單的 id，注意名稱不能只寫 id 會跟上面衝突到 -->
        <input type="hidden" name="menu_id" value="<?= $_GET['id'] ?>">
    </table>
    <div>
        <td>
            <input type="submit" value="修改確定">
            <input type="reset" value="重置">
            <input type="button" value="更多次選單" onclick="more()">
        </td>
    </div>
</form>

<script>
    function more() {
        const opt = `<tr>
                <td><input type="text" name="add_text[]"></td>
                <td><input type="text" name="add_href[]"></td>
            </tr>`

        $("#opt").append(opt)
    }
</script>