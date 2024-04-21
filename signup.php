<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
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
    input[type="text"], input[type="email"], input[type="password"] {
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
    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
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
    .links {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
    }
    .links a {
      color: #555555;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .links a:hover {
      color: #4CAF50;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Sign Up</h1>
    <form action="process_signup.php" method="POST" novalidate>
      <input autocomplete="off" type="text" placeholder="Your Name" name="username" required>
      <input autocomplete="off" type="email" placeholder="Your Email" name="email" required>
      <input autocomplete="off" type="password" placeholder="Create a Password" id="password" name="password" required>
      <input autocomplete="off" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
      <button type="submit">Sign Up</button>
      <div class="links">
        <span>Already have an account? </span><a href="login.php">Login here</a>
      </div>
    </form>
  </div>
</body>
</html>



