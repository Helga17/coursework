<?php
//$_SESSION['id'] = 8;
//$_SESSION['is_admin'] = true;
?>

<main class="col-lg-12 pt-1 col-md-12">
    <div class="container-fluid mt-4">
        <div  class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    Мапа
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
                            Нрафік кількості дерев за станом
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
                            Календар подій
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