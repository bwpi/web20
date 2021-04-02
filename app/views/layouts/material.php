<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <link href="<?=HTTP_HOST;?>css/core.css" rel="stylesheet">
    <title><?= ($title) ? $title : 'title'?></title>

</head>

<body>
    <div id="message"></div>
    <div class="bg"><img src="<?=HTTP_HOST;?>img/bg0.png" alt="bg"></div>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Collapsed content</h5>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
    </div>
    <nav class="navbar fixed-top navbar-expand-md navbar-dark navbar-new shadow-lg">
        <button class="navbar-toggler m-0 p-0" type="button" data-toggle="collapse"
            data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler material-icons">
                settings
            </span>
        </button>
        <button class="navbar-toggler m-0 p-0" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler material-icons">
                menu
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="sidebar-active p-0" id="sidebar">
        <div class="btn-sidebar-collaps" id="sidebar-collaps">
            <span class="material-icons m-0 p-0 no-rotate">
                arrow_right
            </span>
        </div>

        <div class="sidebar-content">
            <div class="btn-group-vertical btn-block m-0 p-0">
                <ul class="navbar-nav">
                    <?php if (isset($left_menu)) echo($left_menu);?>
                </ul>                
            </div>            
        </div>
    </div>
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col" id="content">
                    <?php if (isset($msg)) echo($msg);?>
                    <?= $content;?>
                </div>                
            </div>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <script src="<?=HTTP_HOST;?>js/admin.js"></script>
</body>

</html>