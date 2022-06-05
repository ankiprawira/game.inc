<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameInc</title>

    <!-- CSS only -->
    <style>
        nav {
            background: #1b2838;
        }

        thead {
            background: #1b2838;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c3c1353c4c.js" crossorigin="anonymous"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
</head>

<body>
    <!-- Connector untuk menghubungkan PHP dan SPARQL -->
    <?php
    require_once("sparqllib.php");
    $searchInput = "";

    if (isset($_POST['search'])) {
        $searchInput = $_POST['search'];
        $data = sparql_get(
            "http://localhost:3030/gaminc",
            "
            PREFIX id: <https://gameinc.com/>
            PREFIX item: <https://gameinc.com/ns/item#>
            
            SELECT *
            WHERE {
                ?id     item:Title             ?Title ;
                        item:Developer         ?Developer ;
                        item:Publisher         ?Publisher ;
                        item:Year              ?Year;
                        item:Genre             ?Genre ;
                        item:Platform          ?Platform;
                        item:Harga             ?Harga . 
                        FILTER 
                        (regex (?Title, '$searchInput', 'i') 
                        || regex (?Developer, '$searchInput', 'i') 
                        || regex (?Publisher, '$searchInput', 'i') 
                        || regex (?Year, '$searchInput', 'i') 
                        || regex (?Genre, '$searchInput', 'i') 
                        || regex (?Platform, '$searchInput', 'i') 
                        || regex (?Harga, '$searchInput', 'i'))
                }
            "
        );
    } else {
        $data = sparql_get(
            "http://localhost:3030/gaminc",
            "
            PREFIX id: <https://gameinc.com/>
            PREFIX item: <https://gameinc.com/ns/item#>
            
            SELECT *
            WHERE {
                ?id     item:Title             ?Title ;
                        item:Developer         ?Developer ;
                        item:Publisher         ?Publisher ;
                        item:Year              ?Year;
                        item:Genre             ?Genre ;
                        item:Platform          ?Platform;
                        item:Harga             ?Harga .  
            }
            "
        );
    }

    if (!isset($data)) {
        print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
    }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container container-fluid">
            <a class="navbar-brand" href="index.php"><img src="https://i.ibb.co/3NJnhWk/Game-Inc-logo-removebg-preview-small.png" style="width:180px" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 h5">
                </ul>
                <form class="d-flex" role="search" action="" method="post" id="search" name="search">
                    <input class="form-control me-2" type="search" placeholder="Search for games" aria-label="Search" name="search">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Body -->
    <div class="container container-fluid my-3 mb-5">
        <?php
        if ($searchInput != NULL) {
        ?>
            <i class="fa-solid fa-magnifying-glass"></i><span> Showing results for <b>"<?php echo $searchInput; ?>"</b></span>
        <?php
        }
        ?>

        <table class="table table-bordered table-hover text-center table-responsive sortable">
            <thead class="text-white align-middle">
                <tr>
                    <th>Title</th>
                    <th>Developer</th>
                    <th>Publisher</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Platform</th>
                    <th>Price ($)</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php foreach ($data as $data) : ?>
                    <td><?= $data['Title'] ?></td>
                    <td><?= $data['Developer'] ?></td>
                    <td><?= $data['Publisher'] ?></td>
                    <td><?= $data['Year'] ?></td>
                    <td><?= $data['Genre'] ?></td>
                    <td><?= $data['Platform'] ?></td>
                    <td><?= $data['Harga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        if ($searchInput != NULL) {
        ?>
            <a href="resultspage.php">
                <button type="button" class="btn btn-danger float-end">Reset</button>
            </a>
        <?php
        }
        ?>
    </div>

    <!-- Footer -->
    <?php
    if ($searchInput != NULL) {
    ?>
        <footer class="footer text-light text-center bg-dark pb-1 fixed-bottom">
            <p>Copyright - Anki Prawira Hidayat</p>
        </footer>
    <?php
    } else {
    ?>
        <footer class="footer text-light text-center bg-dark pb-1">
            <p>Copyright - Anki Prawira Hidayat</p>
        </footer>
    <?php
    }
    ?>
</body>

</html>