<?php
include('Library/config.php');
 include('Library/header.php');

?>

    <style>
        body {
            background: linear-gradient(135deg,rgb(202, 253, 253),rgb(242, 240, 245));
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .card-header {
            background: #fff;
            border-bottom: none;
            padding: 30px 20px;
        }
        .card-header h3 {
            margin: 0;
            font-weight: bold;
            color: #333;
        }
        .card-body {
            background: #fff;
            padding: 30px 20px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
        }
        .btn-primary {
            background: #667eea;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #5a67d8;
        }
        .text-center a {
            color: #667eea;
            font-weight: 600;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .login-brand {
            text-align: center;
            padding: 30px 0 10px;
        }
        .login-brand img {
            width: 80px;
        }
        .login-brand h2 {
            color: #fff;
            font-weight: 700;
            margin-top: 10px;
        }
    </style>


<div class="container mt-5">
    <div class="login-brand">
        <img src="img/logo.png" alt="Logo">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h3>Login to Your Account</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="verify.php">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" required class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required class="form-control" placeholder="Enter your password">
                        </div>

                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        <p class="text-center mt-3">Don't have an account? <a href="register.php">Register Now</a></p>
                        <p class="text-center"><a href="forgot_password.php">Forgot Password?</a></p>
                         <p class="text-center"><a href="index.php">Home</a></p>
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
