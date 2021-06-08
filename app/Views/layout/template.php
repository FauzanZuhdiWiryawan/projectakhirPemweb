<!doctype html>
<html lang="en">


<head>
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../css/nucleo-icons.css" rel="stylesheet" />
    <link href="../css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../css/soft-ui-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- Bootstrap CSS -->
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../css/soft-ui-dashboard.css" rel="stylesheet" />

</head>


<body>
    <wrapper class="d-flex flex-column">
        <?php
        $navbar = isset($navbar) ? $navbar : null;

        if ($navbar == null) {
            echo $this->include('layout/navbar.php');
        }


        ?>
        <?php
        $sidebar = isset($sidebar) ? $sidebar : null;

        if ($sidebar == null) {
            echo $this->include('layout/sidebar.php');
        }


        ?>


        <main>
            <!-- Optional JavaScript; choose one of the two! -->
            <?= $this->renderSection('content') ?>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="../js/soft-ui-dashboard.js"></script>
            <script src="../js/core/popper.min.js"></script>
            <script src="../js/core/bootstrap.min.js"></script>
            <script src="../js/plugins/smooth-scrollbar.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
            </script>
            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
        </main>
        <?php
        $footer = isset($footer) ? $footer : null;

        if ($footer == null) {
            echo $this->include('layout/footer.php');
        }

        ?>
    </wrapper>
</body>



</html>