<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="25%">主選單名稱</td>
                    <td width="25%">選單連結網址</td>
                    <td width="15%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td width="15%"></td>
                </tr>

                <?php
                $rows = $DB->all(["menu_id" => 0]);
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><input type="text" name="text[]" value="<?= $row['text'] ?>"></td>
                        <td><input type="text" name="href[]" value="<?= $row['href'] ?>"></td>
                        <td><?= $DB->count(['menu_id' => $row['id']]) ?></td>
                        <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
                        </td>
                        <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                        <td>
                            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/submenu.php?table=<?= $do ?>&id=<?= $row['id'] ?>&#39;)" value="編輯次選單">

                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>



        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do ?>.php?table=<?= $do ?>&#39;)" value="新增主選單">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>

            <input type="hidden" name="table" value="<?= $do ?>">

        </table>
    </form>
</div>