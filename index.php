<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameInc</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body {

            background: #FFFFFF;
        }

        .height {

            height: 100vh;
        }

        .form {

            position: relative;
        }

        .form .fa-search {

            position: absolute;
            top: 20px;
            left: 20px;
            color: #9ca3af;

        }

        .form span {

            position: absolute;
            right: 17px;
            top: 13px;
            padding: 2px;
            border-left: 1px solid #d1d5db;

        }

        .left-pan {
            padding-left: 7px;
        }

        .left-pan i {

            padding-left: 10px;
        }

        .form-input {

            height: 55px;
            text-indent: 33px;
            border-radius: 10px;
        }

        .form-input:focus {

            box-shadow: none;
            border-color: black;
        }

        img {
            max-width: 90%;
            height: auto;
            margin-bottom: 10px;
            margin-left: 30px;
        }

        a,
        u {
            text-decoration: none;
        }
    </style>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <img src="https://i.ibb.co/ZGSMj6Y/GameInc.jpg" alt="GameInc" border="0">
                <form class="form" role="search" action="resultspage.php?searchInput" method="post" id="search" name="search">
                    <i class="fa fa-search"></i>
                    <input type="search" name="search" class="form-control form-input" placeholder="Search for games...">
                </form>
                <a href="resultspage.php">
                    <p class="text-center mt-2">See all list</p>
                </a>
            </div>
        </div>
    </div>

    <footer class="footer text-light text-center bg-dark pb-1 fixed-bottom">
        <p>Copyright &copy; All rights reserved - Anki Prawira Hidayat</p>
    </footer>

</body>

</html>