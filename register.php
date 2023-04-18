<?php
    // Connect to MongoDB

    require_once __DIR__ . '/vendor/autoload.php';
    $client=new MongoDB\Client("mongodb://localhost:27017");
    // Select database and collection
    $db = $client->Register;
    $collection = $db->Details;
    
    // Prepare statement

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    $statement = $collection->insertOne([
        'username' => $username,
        'email' => $email,
        'password' => $password ,
    ]);

    // Check if statement was executed successfully
    if ($statement) {
        echo "Registration successful!";
    } else {
        echo "Error: Unable to register user.";
    }
?>
