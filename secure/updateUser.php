<?php include "../include/header.php" ?>
<?php include "../db/db.php" ?>

<?php

if (!isset($_GET['userEmail'])) {
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}


$emailAddress = $_GET['userEmail'];
$sql = "SELECT * from user WHERE email ='{$emailAddress}'";
$query = $connection->query($sql);

if ($query->num_rows > 0) {
    $row = mysqli_fetch_assoc($query);

} else {
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';

}

?>


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
                            <h2>UPDATE USER</h2>
                        </div>
                        <div class="body">
                            <form id="update_user" method="POST">
                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                                    <div class="form-line">
                                        <input type="text" value="<?php echo $row['name'] ?>" id="name"
                                               class="form-control" name="namesurname"
                                               placeholder="Name Surname" required
                                               autofocus>
                                    </div>
                                </div>
                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                                    <div class="form-line">
                                        <input type="email" value="<?php echo $row['email'] ?>" id="email"
                                               class="form-control" name="email"
                                               placeholder="Email Address"
                                               required readonly>
                                    </div>
                                </div>

                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                                    <div class="form-line">
                                        <input type="password" id="password" class="form-control" name="password"
                                               minlength="6" value="<?php echo $row['password'] ?>"
                                               placeholder="Password"
                                               required>
                                    </div>
                                </div>
                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                                    <div class="form-line">
                                        <input type="password" id="confirm" value="<?php echo $row['password'] ?>"
                                               class="form-control" name="confirm" minlength="6"
                                               placeholder="Confirm Password" required>
                                    </div>
                                </div>

                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">call</i>
                        </span>
                                    <div class="form-line">
                                        <input type="text" id="contact" value="<?php echo $row['contact'] ?>"
                                               class="form-control" name="contact"
                                               placeholder="Contact Number"
                                               required>
                                    </div>
                                </div>


                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">location_on</i>
                        </span>
                                    <div class="form-line">
                                        <textarea id="address" class="form-control" name="address" required
                                                  placeholder="Address"><?php echo $row['address'] ?></textarea>
                                    </div>
                                </div>


                                <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">accessibility</i>
                        </span>
                                    <div class="form-line">
                                        <input name="user" <?php echo ($row['role']) == 'agent' ? 'checked' : '' ?> type="radio" id="agent" value="agent"/>
                                        <label for="agent">Agent</label>
                                        <input name="user" <?php echo ($row['role']) == 'admin' ? 'checked' : '' ?> type="radio" value="admin" id="admin"/>
                                        <label for="admin">Admin</label>
                                    </div>
                                </div>


                                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Update</button>

                            </form>


                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

<?php include "../include/footer.php" ?>