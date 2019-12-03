<?php
// Include config file
require_once "../parts/header.php";
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM client WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty(trim($_POST['email']))) {
        $email_err = "Please enter an email";
    }
    else {
        $email = trim($_POST['email']);
    }

    if(empty(trim($_POST['nume']))) {
        $nume_err = "Please enter a name";
    }
    else {
        $nume = trim($_POST['nume']);
    }

    if(empty(trim($_POST['prenume']))) {
        $prenume_err = "Please enter a surname";
    }
    else {
        $prenume = trim($_POST['prenume']);
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO client (username, password, email, nume, prenume) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_username, $param_password, $email, $nume, $prenume);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            var_dump($sql);
            var_dump($param_username, $param_password, $email, $nume, $prenume);
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("Location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<div class="form-wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($nume_err)) ? 'has-error' : ''; ?>">
            <label>Nume</label>
            <input type="text" name="nume" class="form-control" value="<?php echo $nume; ?>">
            <span class="help-block"><?php echo $nume_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($prenume_err)) ? 'has-error' : ''; ?>">
            <label>Prenume</label>
            <input type="text" name="prenume" class="form-control" value="<?php echo $prenume; ?>">
            <span class="help-block"><?php echo $prenume_err; ?></span>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>


<?php require_once '../parts/footer.php';