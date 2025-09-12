<?php
class forms {
    public function signup() {
        ?>
        <form method="post" action="process_signup.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <?php $this->submit_button("signup", "Sign Up"); ?>
            <a href="./signin.php">Already have an account? Log in</a>
        </form>
        <?php
    }

    private function submit_button($name, $value) {
        ?>
        <button type="submit" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
            <?php echo $value; ?>
        </button>
        <?php
    }

    public function login() {
        ?>
        <form method="post" action="process_login.php"> 
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <?php $this->submit_button("login", "Login"); ?>
            <a href="./index.php">Don’t have an account? Sign up</a>
        </form>
        <?php
    }
}
?>
