<?php include "../include/header.php" ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>VIEW ROUTE</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dep Date</th>
                                        <th>Dep Time</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Price</th>
                                        <th>Available</th>
                                    </tr>
                                    </thead>
                                    <tbody id="viewRoutes">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

<?php include "../include/footer.php" ?>