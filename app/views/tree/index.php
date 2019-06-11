<?php
$_SESSION['id'] = 8;
$_SESSION['is_admin'] = true;
?>


<header>
    <nav class="navbar bg-white text-dark justify-content-end">
        <ul class="nav">
            <li class="nav-item pr-4">
                <i class="fa fa-user-o" aria-hidden="true"></i>
            </li>
        </ul>
    </nav>
</header>

<main class="col-lg-12 pt-1 col-md-12">
    <div class="container-fluid mt-4">
        <div  class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    Google Map
                </div>
                <div class="card-body">
                    <?php require_once (__DIR__ . '/partials/map.php'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Histogram
                        </div>
                        <div class="card-body">
                            <?php require_once (__DIR__ . '/partials/graph.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5 mb-2">
            <div class="row wow fadeIn">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            Calendar
                        </div>
                        <div class="card-body">
                            <?php require_once (__DIR__ . '/partials/calendar.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<footer class="nav justify-content-center mt-5">footer</footer>