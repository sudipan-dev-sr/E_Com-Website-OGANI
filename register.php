<?php
include('Library/config.php');
include('Library/header.php');



if(isset($_POST['register'])) {
   
    $time = time();
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = ($_POST['password']); 
    $mobile    = $_POST['mobile'];
    $address    = $_POST['address'];

    $sql = "INSERT INTO `customers` (`customer_id`, `name`, `email`, `password`,    `phone`, `address`, `timestamp`) VALUES (NULL, '$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[mobile]', '$_POST[address]', '$time')";
    $db->query($sql);

    // if ($db->query($sql) === TRUE) {
    //     echo "Registration successful!";
    // } else 
    // {
    //     echo "Error: " . $db->error;
    // }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Register | E-Commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background:#f5f5f5;">
    <center>
        <div class="login-brand">
        <img src="img/logo.png" alt="Logo">
        </div>
    </center>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h3>Create an Account</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" required class="form-control" placeholder="Enter full name">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" required class="form-control" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required class="form-control" placeholder="Create password">
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" required class="form-control" placeholder="Enter mobile number">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" required class="form-control" placeholder="Enter mobile Address">
                        </div>

                        <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                        <p class="text-center mt-3">Already have an account? <a href="login.php">Login Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


<?php
include('Library/footer.php');

?>