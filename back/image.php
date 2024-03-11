<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $total = $DB->count();
                $div = 3;
                $pages = ceil($total / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;

                $rows = $DB->all(" limit $start,$div");
                foreach ($rows as $row) {
                ?>
                <tr style="text-align: center;">
                    <td><img src="./img/<?= $row['img'] ?>" style="width:100px;height:68px"></td>
                    <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>"
                            <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
                    </td>
                    <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                    <td>
                        <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                        <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?table=<?= $do ?>&id=<?= $row['id'] ?>&#39;)"
                            value="更換圖片">

                    </td>
                </tr>
                <?php
                }

                ?>
            </tbody>



        </table>

        <div class="cent">

            <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='?do=image&p=$prev'> < </a>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                $size = ($i == $now) ? '22px' : '16px';
                echo "<a href='?do=image&p=$i' style='font-size:{$size}'> $i </a>";
            }

            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='?do=image&p=$next'> > </a>";
            }

            ?>
        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do ?>.php?table=<?= $do ?>&#39;)"
                            value="新增校園映像圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>

            <input type="hidden" name="table" value="<?= $do ?>">

        </table>
    </form>
</div>