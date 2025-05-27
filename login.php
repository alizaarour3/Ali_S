<?php
$conn = mysqli_connect("localhost", "root", "", "ali_s"); 
if ($error = mysqli_connect_errno()) {
    die("Connection failed: " . $error);
}
?>
<link rel="stylesheet" href="log.css">

<?php session_start(); ?>
<?php
?>
<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $error = "";

    // create query
    $query = "SELECT * from users where email = '$email' AND password = '$password';";

    // execute query
    $result = mysqli_query($conn, $query);
    $nb = mysqli_fetch_assoc($result);
    if ($nb) {
        $error = "";
        $_SESSION['id'] = $nb['id'];
        

        


        header("Location: index.html", true);
    } else $error = "Incorrect credentials";
}
?>

<div action="login.php " class="center">
    <h1>Login</h1>
    <p style="text-align: center;color: red"> <?php if ($error) echo $error ?></p>

    <form method="POST">
        <div class="txt_field">
            <input type="text" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" autocomplete="off" required>
            <span></span>
            <label>Password</label>
        </div>
        <input class="account_button" name="submit" type="Submit" value="login">
      
    </form>
</div>
