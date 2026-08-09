<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Example</title>
</head>
<body>
 
    <h2>Form Validation in PHP</h2>
 
<?php
// PHP VALIDATION LOGIC
 
$name = $age = $email = "";
$nameErr = $ageErr = $emailErr = "";
 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // --- Validate Name ---
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
 
        // Check if only letters and spaces
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }
 
   
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = $_POST["age"];
 
        // Check if number and in valid range
        if (!is_numeric($age) || $age < 18 || $age > 30) {
            $ageErr = "Age must be between 18 and 30";
        }
    }
 
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
 
        // Check if valid email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
}
 
?>
 
 
 
<form method="post" action="">
 
    Name:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red">
        * <?php echo $nameErr; ?>
    </span>
 
    <br><br>
 
    Age:
    <input type="text" name="age" value="<?php echo $age; ?>">
    <span style="color:red">
        * <?php echo $ageErr; ?>
    </span>
 
    <br><br>
 
    Email:
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red">
        * <?php echo $emailErr; ?>
    </span>
 
    <br><br>
 
    <input type="submit" name="submit" value="Submit">
 
</form>
 
<?php
 
 
if ($_SERVER["REQUEST_METHOD"] == "POST" &&    empty($nameErr) &&    empty($ageErr) &&    empty($emailErr))
    {
 
    echo "<h3>Your Input:</h3>";
    echo "Name: $name <br>";
    echo "Age: $age <br>";
    echo "Email: $email <br>";
}
?>
 
</body>
</html>