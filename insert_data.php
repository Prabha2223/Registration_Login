<?php
//Connect to MongoDB
require_once __DIR__ . '/vendor/autoload.php';
$mongo = new MongoDB\Client('mongodb://localhost:27017');
$collection = $mongo->Register->Details;

//Connect to MySQL
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'register';

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Query MongoDB and insert data into MySQL
$users = $collection->find([], ['projection' => ['_id' => 0]]);
foreach ($users as $Details) {  
    $username = mysqli_real_escape_string($conn, $Details->username);
    $email = mysqli_real_escape_string($conn, $Details->email);
    $password = mysqli_real_escape_string($conn, $Details->password);

    $sql = "INSERT INTO details (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $sql);
}
$sql = "DELETE t1 FROM details t1
        INNER JOIN details t2 
        WHERE t1.id > t2.id 
        AND t1.username = t2.username";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Duplicates removed successfully";
} else {
  echo "Error removing duplicates: " . $conn->error;
}

//Close MySQL connection
mysqli_close($conn);

//echo 'Data inserted successfully.';
?>
