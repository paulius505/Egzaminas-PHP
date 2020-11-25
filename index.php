<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>View Records</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

<h1>View Records</h1>

<?php

include('connect-db.php');


if ($result = $mysqli->query("SELECT * FROM players ORDER BY id"))
{

if ($result->num_rows > 0)
{

echo "<table border='1' cellpadding='10'>";


echo "<tr><th>ID</th><th>CheckBox</th><th>First Name</th><th>Last Name</th><th></th><th></th></tr>";

while ($row = $result->fetch_object())
{

echo "<tr>";
echo "<td>" . $row->id . "</td>";
echo "<td><input  type='checkbox' value=" . $row->checkbox . "</td>";
echo "<td>" . $row->firstname . "</td>";
echo "<td>" . $row->lastname . "</td>";
echo "<td><a href='records.php?id=" . $row->id . "'>Edit</a></td>";
echo "<td><a href='delete.php?id=" . $row->id . "'>Delete</a></td>";
echo "</tr>";
}

echo "</table>";
}

else
{
echo "No results to display!";
}
}

else
{
echo "Error: " . $mysqli->error;
}

$mysqli->close();

?>

<a href="records.php">Add New Record</a>
</body>
</html>