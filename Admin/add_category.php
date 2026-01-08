<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>

<body>
    <h1>Form Add New Category</h1>
    <form method="post" action="added_category.php" enctype="multipart/form-data">
        <table border="0" width=500 cellspacing=10>
            <tr>
                <td>Category name</td>
                <td><input type="text" name="txtname"></td>
            </tr>
            <tr>
                <td>Picture</td>
                <td><input type="file" name="files"></td>
            </tr>
            <tr>
                <td>status</td>
                <td><input type="text" name="txtstatus"></td>
            </tr>
            <tr>
                <td colspan=2>
                    <input type="submit" name="btnadd" value="add Menu">
                </td>
            </tr>
        </table>
        </table>
    </form>
</body>

</html>