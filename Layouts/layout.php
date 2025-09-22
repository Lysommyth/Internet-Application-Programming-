<?php
class layout {
    public function header($conf) {
        ?>
        <header>
            <h1>Welcome to <?php print $conf['site_name']; ?></h1>
        </header>
        <?php
    }

    public function form_content($conf, $form) {
        ?>
        <div id="page-content">
            <div id="form-section">
                <?php
               
                $current = $_SERVER['PHP_SELF'];

                if ($current === '/Internet-Application-Programming-/Forms/signup.php') {
                    $form->signup();
                } elseif ($current === '/Internet-Application-Programming-/Forms/login.php') {
                    $form->login();
                } else {
                    echo "<p>No form found for this page.</p>";
                }
                ?>
            </div>

            <div id="info-section">
                <h2>Extra Content</h2>
                <p>
                    This is an additional section where you can place text, 
                    images, or instructions for your users.  
                    Since this version doesn’t use Bootstrap, 
                    you can style <code>#info-section</code> and <code>#form-section</code> 
                    in your own CSS.
                </p>
                <button type="button">Example button</button>
            </div>
        </div>
        <?php
    }
    public function footer($conf) {
        ?>
        <footer>
            <p>Copyright &copy; <?php echo date("Y"); ?> <?php print $conf['site_name']; ?> - All Rights Reserved</p>
        </footer>
        <?php
    }
}