<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.js"></script>
</head>

<body>
    <h2>Halaman Utama</h2>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-primary bg-dark">
                <a class="navbar-brand" href="#">WEB</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="index.php?page=list-mhs">List Mahasiswa</a>
      <a class="nav-link" href="index.php?page=add-mhs">Tambah Mahasiswa</a>
      <a class="nav-link" href="index.php?page=list-motor">List Motor</a>
      <a class="nav-link" href="index.php?page=add-motor">Tambah Motor</a>
    </div>
  </div>
</nav>
            </div>
            <div class="col-12">
                <?php
                $halaman = "view/home.php";
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case "list-mhs":
                            $halaman = "view/mahasiswa/index.php";
                            break;
                        case "update-mhs":
                            $halaman = "view/mahasiswa/formUbah.php";
                            break;
                        case "add-mhs":
                            $halaman = "view/mahasiswa/formTambah.php";
                            break;
                        case "delete-mhs":
                            $halaman = "view/mahasiswa/konfirmasiHapus.php";
                            break;
                        case "list-motor":
                            $halaman = "view/motor/index.php";
                            break;
                        case "add-motor":
                            $halaman = "view/motor/formTambah.php";
                            break;
                        case "update-motor":
                            $halaman = "view/motor/formUbah.php";
                            break;
                        case "delete-motor":
                            $halaman = "view/motor/konfirmasiHapus.php";
                            break;
                    }
                }
                include $halaman;
                ?>
            </div>
        </div>
    </div>
</body>

</html>