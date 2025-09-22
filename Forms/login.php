
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Styles/login_styles.css">
</head>
<body>
    
    <div id="form-container">
        <form action="/Internet-Application-Programming-/dispay_users.php" method="POST">
            
            <div id="login-container">
                <div id="heading">
                    <div id ="logo"></div>
                    <h2 id="login-heading">Login</h2>
                </div>
                
                <div class="text-field-container">
                    <label for="username" class="text-field-label">Email:</label>
                    <input class="text-field" type="text" id="username" name="username" required><br><br>
                </div>
                
                <div class="text-field-container">
                    <label for="password" class = "text-field-label">Password:</label>
                    <input class="text-field" type="password" id="password" name="password" required><br><br>
                </div>
                <a href=""></a>
                <button type="submit" class="button">Login</button>
            </div>  

            <div id="create-account-container"><a href="/Internet-Application-programming-/Forms/signup.php">Don't have an account? Create one</a><br><br></div>
            
        </form>
    </div>
</body>
</html>

