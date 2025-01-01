<?php include 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php' ?>
<!-- ?php include '/tracker_dash.php'; ? -->
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- Page Content -->


    <!-- Box Content -->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5"><?php echo $count_visitor ?> Page Views</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5"><?php echo $count_points ?> Submissions</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5"><?php echo $count_support ?> Supports</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <!--<div class="col-xl-3 col-sm-6 mb-3">-->
        <!--    <div class="card text-white bg-danger o-hidden h-100">-->
        <!--        <div class="card-body">-->
        <!--            <div class="card-body-icon">-->
        <!--                <i class="fas fa-fw fa-life-ring"></i>-->
        <!--            </div>-->
        <!--            <div class="mr-5">13 New Tickets!</div>-->
        <!--        </div>-->
        <!--        <a class="card-footer text-white clearfix small z-1" href="#">-->
        <!--            <span class="float-left">View Details</span>-->
        <!--            <span class="float-right">-->
        <!--            <i class="fas fa-angle-right"></i>-->
        <!--          </span>-->
        <!--        </a>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
    <!-- End Box Content -->


    <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <!-- End Area Chart Example-->



<?php require_once 'includes/footer.php' ?>