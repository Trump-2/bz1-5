<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="./api/edit_info.php">
        <table width="50%" style="margin:auto">
            <tbody>
                <tr>
                    <td style="background:orange">進站總人數:</td>
                    <td><input type="text" name="total" value="<?= $DB->find(1)['total'] ?>"></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px;width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
            <!-- 加上這行，edit_info.php 這隻 api 的邏輯撰寫會比較簡單 -->
            <!-- <input type="hidden" name="id" value="<?= $DB->find(1)['id'] ?>"> -->
            <input type="hidden" name="table" value="<?= $do ?>">

        </table>
    </form>
</div>