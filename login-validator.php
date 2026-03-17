<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    require __DIR__ . "/PDO-ref.php";
    try {
        $pdo = getPDO();
        echo "<p>Connected successfully!</p>";
    } 
    catch (PDOException $e) {
        echo "<p>Connection failed: " . $e->getMessage() . "</p>";
    }

    $email = $_GET["email"];
    $password = hash("sha256", $_GET["password"]);
    try {
    	$passwordRows = executeSQL("SELECT password_hash FROM customer WHERE customer.password_hash = " . "'" . $password . "'" . ";", $pdo);
        $emailRows = executeSQL("SELECT email FROM customer WHERE customer.email = " . "'" . $email . "'" . ";", $pdo);
    }
    catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    echo count($emailRows);
    echo count($passwordRows);

    if (count($emailRows) == 1 and count($passwordRows) == 1)  {
        echo "its working my aoufbaiusygfiuy";
    }
    else {
        // header("Location: " . __DIR__ . "/login-form.html");
        echo "<script>window.location.href='login-form.html'</script>";
        // header("Location: " . "~or24002898/energy-drink%20store/login-form.html");    
        // exit;
}
    
    ?><br>
</body>
</html>