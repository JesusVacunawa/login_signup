<?php
include 'database.php';
$is_invalid = false;
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
//   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    // $is_invalid = true;
//   } else {
    $stmt = $mysqli->prepare("SELECT id, password_hash FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $user = $result->fetch_assoc();

    if($user) {
        // Debugging output
        var_dump($password); // Check the password entered by the user
        var_dump($user['password_hash']);
        if (password_verify($password, $user['password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            session_regenerate_id();
            header("Location: index.php");
            exit();
        } else {
            $is_invalid = true;
            $message = "Incorrect Password";
        }
    } else {
        $is_invalid = true;
        $message = "Email not found";
    }   
}


// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 400px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
    }

    h1 {
      text-align: center;
      color: #333333;
      margin-bottom: 30px;
      font-weight: 600;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 15px;
      margin-bottom: 20px;
      border: none;
      border-bottom: 2px solid #cccccc;
      background-color: transparent;
      font-size: 16px;
      transition: border-color 0.3s ease;
      outline: none;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #4CAF50;
    }

    button {
      width: 100%;
      padding: 15px;
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
      outline: none;
    }

    button:hover {
      background-color: #45a049;
    }

    .error-message {
      color: #ff0000;
      font-size: 14px;
      margin-top: 5px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Login Page</h1>
    <?php if ($is_invalid) : ?>
      <p class="error-message">Invalid Email or Password</p>
    <?php endif; ?>
    <form method="post">
      <input autocomplete="off" type="email" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
      <input autocomplete="off" type="password" placeholder="Password" name="password" id="password">
      <button type="submit">Login</button>
    </form>
  </div>
</body>

</html>
