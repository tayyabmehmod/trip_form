<?php
session_start(); // Start session

// ✅ Show SweetAlert if session flag is set
$showPopup = false;
if (isset($_SESSION['submitted']) && $_SESSION['submitted'] === true) {
    $showPopup = true;
    unset($_SESSION['submitted']); // clear it after showing once
}

// ✅ Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "form");
    

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form inputs
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $number     = $_POST['number'];
    $department = $_POST['department'];
    $semester   = $_POST['semester'];
    $section    = $_POST['section'];
    $rollnumber = $_POST['rollnumber'];

    // Insert into DB
    $sql = "INSERT INTO trip (Name, Email, Phone_number, Department, Semester, Section, Roll_number, Date)
            VALUES ('$name', '$email', '$number', '$department', '$semester', '$section', '$rollnumber', current_timestamp())";

    if (mysqli_query($con, $sql)) {
        $_SESSION['submitted'] = true; // Set flag
        header("Location: index.php"); // Redirect to avoid resubmission
        exit();
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UOL Trip Form</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="intro">
        <img class="bg" src="images/lahore-campus.webp" alt="UOL">
        <h1>Welcome to UOL trip form</h1>
        <h3>Enter your details for confirmation of participation</h3><br>
        <form id="tripForm" action="" method="post" onsubmit="return validateForm()">
           <input type="text" name="name" placeholder="Enter your name" id="name" required>
    <input type="email" name="email" placeholder="Enter your email" id="email" required>
    <input type="text" name="number" placeholder="Enter your phone number" id="number" required>
    <input type="text" name="department" placeholder="Enter your department" id="department" required>
    <input type="text" name="semester" placeholder="Enter your semester" id="semester" required>
    <input type="text" name="section" placeholder="Enter your section" id="section" required>
    <input type="text" name="rollnumber" placeholder="Enter your roll number" id="rollnumber" required>
    <button class="btn">Submit</button>
</form>

    </div>

    <?php if ($showPopup): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Form Submitted!',
            text: '✅ Thank you for joining the trip!',
            confirmButtonColor: '#3085d6'
        });
    </script>
    <?php endif; ?>

    <script>
function validateForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const number = document.getElementById("number").value.trim();
    const department = document.getElementById("department").value.trim();
    const semester = document.getElementById("semester").value.trim();
    const section = document.getElementById("section").value.trim();
    const rollnumber = document.getElementById("rollnumber").value.trim();

    // Simple checks
    if (!name || !email || !number || !department || !semester || !section || !rollnumber) {
        alert("Please fill in all fields.");
        return false;
    }

    // Email format
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Phone number should be 10-15 digits
    const phonePattern = /^[0-9]{10,15}$/;
    if (!phonePattern.test(number)) {
        alert("Please enter a valid phone number (digits only, 10–15 digits).");
        return false;
    }


    return true; // ✅ All validations passed
}
</script>

</body>
</html>
