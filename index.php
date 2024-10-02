
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Query </title>
</head>
<body>
    
<?php
require_once 'conection.php';

$con = connection();

$sql = "select p.ProductName as NombreProducto, c.CategoryName as Categoria, p.UnitPrice as Precio
    from Products p
    join Categories c on p.CategoryID = c.CategoryID
    where p.UnitPrice >
    (select avg(p2.UnitPrice) from Products p2 where p2.CategoryID = p.CategoryID);";

$query = mysqli_query($con, $sql);

echo "<table border='1'>";
echo "<tr>";
echo "<th>Nombre del Producto</th>";
echo "<th>Categoría</th>";
echo "<th>Precio</th>";
echo "</tr>";

while ($row = mysqli_fetch_array($query)) {
    echo "<tr>";
    echo "<td>" . $row['NombreProducto'] . "</td>";
    echo "<td>" . $row['Categoria'] . "</td>";
    echo "<td>" . $row['Precio'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>