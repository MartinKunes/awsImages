<?php
//metoda pro registraci a vložení jména a heslo do databáze
$email = $_POST['email'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

// Connect to the database
$conn = new mysqli("127.0.0.1", "root", "", "register");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if($password === $password1){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO register (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email,  $hashed_password);
        $stmt->execute();
        $myfile = fopen("main.php", "r");
        header("Location: main.php");
        return;
    } else {

        echo "Invalid password...";

    }


}
?>





