<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>

    <title>Performance</title>
</head>

<body>

    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <!-- admin -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle px-2 py-2" height="110" alt="Avatar" loading="lazy">
                    </div>
                    <div class="col-md-6 py-5 px-5">
                        <h4>Admin</h4>
                        <h5>online</h5>
                    </div>
                </div>
            </div>
            <!-- sidebar items -->
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-2 mt-4">
                    <a href="#" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                        <i class="fas fa-home fa-fw me-1"></i><span>Dashboard</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                        <i class="fas fa-database fa-fw me-1"></i><span>Master Data</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                        <i class="fas fa-truck fa-fw me-1"></i><span>Manajemen Aset</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 ripple active">
                        <i class="fas fa-book fa-fw me-1"></i><span>Performance Monitoring</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                </button>
                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.png" height="25" alt="MDB Logo" loading="lazy" />
                </a>
                <!-- title -->
                <h3 class="px-5">Cascading Planning and Strategy</h3>
                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <a class="nav-link me-3 me-lg-0" href="#">
                        <i class="fas fa-commenting" style="color: white"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">2</span>
                    </a>
                    <a class="nav-link me-3 me-lg-0" href="#">
                        <i class="fas fa-bell " style="color: white"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">4</span>
                    </a>
                    <a class="nav-link  d-flex align-items-center" href="#">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle" height="22" alt="Avatar" loading="lazy" />
                    </a>
                    <a class="nav-link me-3 me-lg-0" href="#">
                        <i class="fas fa-sign-out " style="color: white"></i>
                    </a>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <?= $this->renderSection('content'); ?>
        </div>
    </main>

    <!-- footer -->
    <footer class="bg-white text-black text-center pl-2 py-2">
        <div class="container">
            <h5 class="mb-0 ps-5 ">PT.Kaltim Coal & PT.JIM &copy; 2023 </h5>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = new mdb.Sidebar(document.getElementById('sidebarMenu'));


        });
    </script>
</body>

</html>