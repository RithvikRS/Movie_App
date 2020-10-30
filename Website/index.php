<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <title>Trailer App</title>
</head>

<body>
    <div class="container">
        <?php
        session_start();
        echo "<h1>Welcome to Trailer Box ".$_SESSION['name']."</h1>"
        ?>
        <form>
            <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search..." />
            </div>

            <button type="submit" class="btn" id="search">
          Search for a movie
        </button>
        </form>
        <div id="movies-searchable"></div>
        <div id="movies-container"></div>
    </div>
    <script src="./assets/js/apiTransaction.js"></script>
    <script src="./assets/js/app.js"></script>
    <a class="btn" href="http://localhost/Project/">Logout</a>

</body>

</html>