<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql) or die("failed");
$output="";
if(mysqli_num_rows($result) > 0){
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr> 
    <th>id</th>
    <th>Name</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)){
        $output.="<tr><td>{$row["id"]}</td><td>{$row["name"]}</td></tr>";
    }
    $output.="</table>";

mysqli_close($conn);

echo $output;
}
else{
    echo "no record found";
}
?>