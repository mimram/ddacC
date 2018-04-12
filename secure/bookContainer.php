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
                            <h2>BOOK CONTAINER</h2>
                        </div>
                        <div class="body">

                            <div id="mywizard">

                                <div class="step step1">

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
                                            <tbody>
                                            <?php

                                            $sql = "SELECT * FROM viewroute";
                                            $query = $connection->query($sql);
                                            while ($row = mysqli_fetch_assoc($query)) {


                                                ?>

                                                <tr role="row" class="odd">

                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['dep_date'] ?></td>
                                                    <td><?php echo $row['dep_time'] ?></td>
                                                    <td><?php echo $row['dep_from'] ?></td>
                                                    <td><?php echo $row['dep_to'] ?></td>
                                                    <td><?php echo $row['price'] ?></td>
                                                    <td><?php echo $row['totalAvailable'] ?></td>
                                                    <td>
                                                        <div class="step step1">
                                                            <div class="nextStep">
                                                                <button class="btn bg-deep-purple waves-effect"
                                                                        onclick="setBookingVasel(<?php echo $row['id'] . ',' . $row['totalAvailable'] ?>)">
                                                                    Book
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>


                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="step step2">
                                    <form method="post" id="UpdateBookingVassel"
                                          autocomplete="off">

                                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                                            <div class="form-line">
                                                <input type="text" value="" id="bays"
                                                       class="form-control" name="bays"
                                                       placeholder="Number Of Bays" required
                                                       autofocus>
                                            </div>
                                        </div>


                                        <div class="input-group">
                                             <span class="input-group-addon">
                            <i class="material-icons">accessibility</i>
                        </span>
                                            <div class="form-line">
                                                <label class="control-label mb-10"
                                                       for="exampleInputCompany">Choose
                                                    Company</label>

                                                <select class="form-control" required=""
                                                        id="Company">
                                                    <?php

                                                    $SQLQUERY = "SELECT * FROM user where role = 'customer'";
                                                    $result = mysqli_query($connection, $SQLQUERY);

                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control"
                                                   required=""
                                                   id="VasselID"
                                                   placeholder="Enter Contact"
                                                   value="">

                                            <input type="hidden" class="form-control"
                                                   required=""
                                                   id="AvailableVassel"
                                                   placeholder="Enter Contact"
                                                   value="">
                                        </div>


                                        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Book
                                        </button>

                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

<?php include "../include/footer.php" ?>