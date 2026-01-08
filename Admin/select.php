<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
</head>

<body>

    <a href="add_product.php">Insert New Product</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Price</th>
            <th>Point</th>
        </tr>

        <?php
include_once '../config.php';
$sql = "SELECT * FROM tblproduct ORDER BY pro_id DESC";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['pro_id']."</td>";
        echo "<td>".$row['pro_name']."</td>";

        // show image
        echo "<td><img src='../images/".$row['img']."' width='100'></td>";

        echo "<td>".$row['price']." $</td>";
        echo "<td>".$row['point']." pt</td>";
        echo "</tr>";
    }
}
?>

    </table>

</body>

</html>