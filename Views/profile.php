<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Register</title>
    <!-- Custom fonts for this template-->
    <link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="./public/css/sb-admin.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .file-input {
            display: none;
        }

        .custom-file-upload {
            cursor: pointer;
            padding: 10px;
            background-color: #e91e63;
            color: #fff;
            border-radius: 5px;
        }

        .card-login {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f8e0e6;
            /* Pink shade */
            padding: 30px;
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
            font-weight: bold;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            background-color: #fff;
        }

        .btn-primary {
            background-color: #ff69b4;
            /* Pink shade */
            border-color: #ff69b4;
        }

        .btn-primary:hover {
            background-color: #ff1493;
            /* Darker pink shade */
            border-color: #ff1493;
        }

        .error {
            font-size: 0.8rem;
            color: #dc3545;
            /* Red color for error messages */
        }

        .btn-link {
            color: #333;
        }

        .btn-link:hover {
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header text-center">Update Profile</div>
            <?php if ($error): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <form id="registrationForm" method="post" action="" name="employeeForm">
                    <div class="text-center mb-3">
                        <img src="profile.jpg" alt="Profile Picture" class="profile-image">
                    </div>
                    <div class="text-center mb-3">
                        <label for="profileImage" class="custom-file-upload">Upload Profile Image</label>
                        <input type="file" id="profileImage" class="file-input" name="profileImage">
                    </div>
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                        <span class="error" id="fnameError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" required>
                        <span class="error" id="lnameError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="error" id="passwordError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span class="error" id="emailError"></span>
                    </div>
                    <br>
                    <div class="mb-3 text-left">
                        <input type="submit" name="update" id="update" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- java script form validation -->
</body>

</html>