<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Example</title>
</head>
<body>
 
    <h2>Form Validation in PHP</h2>
 
<?php
// PHP VALIDATION LOGIC
 
$name = $age = $email = $membership = $department = $phone = "";
$nameErr = $ageErr = $emailErr = $membershipErr = $departmentErr = $phoneErr = "";
 
 
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

    // --- Validate Membership Type ---
    if (empty($_POST["membership"])) {
        $membershipErr = "Please select a membership type";
    } else {
        $membership = $_POST["membership"];
    }

    // --- Validate Department ---
    if (empty($_POST["department"])) {
        $departmentErr = "Please select your department";
    } else {
        $department = $_POST["department"];
    }

    // --- Validate Contact Number ---
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = $_POST["phone"];

        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "Phone number must contain exactly 11 digits";
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

    Membership Type:
    <input type="radio" name="membership" value="Regular Member" <?php if ($membership=="Regular Member") echo "checked"; ?>> Regular Member
    <input type="radio" name="membership" value="Executive Member" <?php if ($membership=="Executive Member") echo "checked"; ?>> Executive Member
    <input type="radio" name="membership" value="Volunteer" <?php if ($membership=="Volunteer") echo "checked"; ?>> Volunteer
    <span style="color:red">
        * <?php echo $membershipErr; ?>
    </span>

    <br><br>

    Department:
    <select name="department">
        <option value="" <?php if ($department=="") echo "selected"; ?>>-- Select Department --</option>
        <option value="CSE" <?php if ($department=="CSE") echo "selected"; ?>>CSE</option>
        <option value="EEE" <?php if ($department=="EEE") echo "selected"; ?>>EEE</option>
        <option value="BBA" <?php if ($department=="BBA") echo "selected"; ?>>BBA</option>
        <option value="English" <?php if ($department=="English") echo "selected"; ?>>English</option>
        <option value="Architecture" <?php if ($department=="Architecture") echo "selected"; ?>>Architecture</option>
    </select>
    <span style="color:red">
        * <?php echo $departmentErr; ?>
    </span>

    <br><br>

    Contact Number:
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span style="color:red">
        * <?php echo $phoneErr; ?>
    </span>

    <br><br>
 
    <input type="submit" name="submit" value="Submit">
 
</form>
 
<?php
 
 
if ($_SERVER["REQUEST_METHOD"] == "POST" &&    empty($nameErr) &&    empty($ageErr) &&    empty($emailErr) && empty($membershipErr) && empty($departmentErr) && empty($phoneErr))
    {
 
    echo "<h3>Your Input:</h3>";
    echo "Name: $name <br>";
    echo "Age: $age <br>";
    echo "Email: $email <br>";
    echo "Membership Type: $membership <br>";
    echo "Department: $department <br>";
    echo "Contact Number: $phone <br>";
}
?>
 
</body>
</html>