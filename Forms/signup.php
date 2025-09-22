
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Styles/signup_styles.css">
</head>
<body>
    <div id="form-container">
        <form action="/Internet-Application-Programming-/process_signup.php" method="POST">
            <div id="signup-container">
                <div id="heading">
                    <div id="logo"></div>
                    <h2 id="signup-heading">Create Account</h2>
                </div>
                
                <div class="text-field-container">
                    <label for="username" class="text-field-label">Full Name:</label>
                    <input class="text-field" type="text" id="username" name="username" required>
                </div>
                
                <div class="text-field-container">
                    <label for="email" class="text-field-label">Email:</label>
                    <input class="text-field" type="email" id="email" name="email" required>
                </div>
                
                <div class="text-field-container">
                    <label for="password" class="text-field-label">Password:</label>
                    <input class="text-field" type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="button">Sign Up</button>
            </div>

            <div id="login-redirect-container">
                <a href="/Internet-Application-Programming-/Forms/login.php">Already have an account? Login</a>
            </div>
        </form>
    </div>
</body>
</html>




