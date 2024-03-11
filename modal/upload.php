<?php
$table = $_GET['table'];

switch ($table) {
    case "title":
        echo "<h3>更新網站標題圖片</h3>";
        break;
    case "mvim":
        echo "<h3>更新動畫圖片</h3>";
        break;
    case "image":
        echo "<h3>更新校園映像圖片</h3>";
        break;
}
?>

<hr>
<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <?php
                switch ($table) {
                    case "title":
                        echo "標題區圖片:";
                        break;
                    case "mvim":
                        echo "動畫圖片:";
                        break;
                    case "image":
                        echo "校園映像圖片:";
                        break;
                }
                ?>

            </td>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="更新"><input type="reset" value="重置"></td>
            <td></td>
        </tr>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="table" value="<?= $_GET['table'] ?>">
    </table>
</form>