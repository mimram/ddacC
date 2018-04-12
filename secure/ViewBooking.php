<?php include "../include/header.php" ?>
<?php include "../db/db.php" ?>

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
                            <h2>VIEW BOOKING</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TOTAL BAYS</th>
                                        <th>CUSTOMER NAME</th>
                                        <th>EMAIL</th>
                                        <th>DEP_DATE/DEP_TIME</th>
                                        <th>DEP_FROM</th>
                                        <th>DEP_TO</th>
                                        <th>PRICE</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                     <?php
                                        $result = mysqli_query($connection, "SELECT booking.id as bookingvasselID, booking.bays, booking.company, booking.containerId, user.id as customerID, user.name as customername, user.email, user.address, user.contact, viewroute.id as viewrouteID, viewroute.container, viewroute.dep_date, viewroute.dep_time, viewroute.dep_from, viewroute.dep_to, viewroute.price FROM user INNER JOIN booking ON booking.company = user.id INNER JOIN viewroute on booking.containerId = viewroute.id");
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>



                                    <tr>
                                        <td><?php echo $row['bookingvasselID'] ?></td>
                                        <td><?php echo $row['bays'] ?></td>
                                        <td><?php echo $row['customername'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['dep_date'].'---'.$row['dep_time'] ?></td>
                                        <td><?php echo $row['dep_from'] ?></td>
                                        <td><?php echo $row['dep_to'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                    </tr>
                                            <?php
                                        }
                                     ?>
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