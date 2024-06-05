<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Category</title>
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
            <div class="card-header text-center">Add Category</div>
            <?php if ($error): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <form id="categoryForm" method="post" action="" name="categoryForm" enctype="multipart/form-data">
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>
                    <br>
                    <div class="mb-3 text-left">
                        <input type="submit" name="addcategory" id="addcategory" value="Add Blog Category"
                            class="btn btn-primary">
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