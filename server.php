<?php
header("Content-type: application/json");
include "db/db.php";
session_start();

if (isset($_POST['registerUser'])) {
    $obj = json_decode($_POST["registerUser"]);
    $data = new stdClass();

    $isUserExist = $connection->query("SELECT * FROM user where email='$obj->email'");

    if ($isUserExist->num_rows > 0) {
        $data->status = 'err';
        $data->text = 'Sorry ! User already exist.. Try with different email...';

    } else {
        $query = "INSERT INTO user (name,email,password,role,address,contact) VALUES ('{$obj->name}', '{$obj->email}','{$obj->password}', 'customer','{$obj->address}', '{$obj->contact}')";
        $result = $connection->query($query);

        $data->status = 'success';
        $data->text = 'Registration successful...';

    }


    echo json_encode($data);


}



if (isset($_POST['UpdateBookingVassel'])) {
    $obj = json_decode($_POST["UpdateBookingVassel"]);
    $data = new stdClass();


    $sql = "INSERT INTO booking (bays,company,containerId) VALUES ({$obj->bays}, {$obj->Company},{$obj->VasselID})";
    $query = $connection->query($sql);

    if ($query) {
        $data->status = 'success';
        $data->text = 'Successfully Added.....';

    } else {
        $data->status = 'err';
        $data->text = 'Sorry ! Something Is wrong...';
    }


    echo json_encode($data);


}


if (isset($_POST['loginUser'])) {
    $obj = json_decode($_POST["loginUser"]);
    $sql = "SELECT * FROM user Where email='" . $obj->email . "' AND password='" . $obj->password . "'";
    $query = $connection->query($sql);
    $data = new stdClass();

    if ($query->num_rows > 0) {
        $row = mysqli_fetch_array($query);
        $data->status = 'success';
        $data->text = 'Login Successful...';
        $data->email = $obj->email;
        $data->role = $row['role'];
        $data->name = $row['name'];


    } else {
        $data->status = 'err';
        $data->text = 'Login failed ! Please enter valid username and password...';
    }

    echo json_encode($data);
}


if (isset($_POST['getUserData'])) {
    $obj = json_decode($_POST["getUserData"]);
    $sql = "SELECT * FROM user Where email='" . $obj->email . "' AND role='" . $obj->role . "'";
    $query = $connection->query($sql);
    $data = new stdClass();

    if ($query->num_rows > 0) {
        $row = mysqli_fetch_array($query);
        $data->status = 'success';
        $data->email = $row['email'];
        $data->role = $row['role'];
        $data->contact = $row['contact'];
        $data->name = $row['name'];
        $data->address = $row['address'];

    } else {
        $data->status = 'err';
        $data->text = 'ERR';
    }

    echo json_encode($data);
}


if (isset($_POST['viewRoutes'])) {
    $obj = json_decode($_POST["viewRoutes"]);

    $sql = "SELECT * FROM viewroute";
    $query = $connection->query($sql);
    $data = new stdClass();

    if ($query->num_rows > 0) {
        $data->status = 'success';
        while ($row = mysqli_fetch_assoc($query)) {
            $data->data[] = $row;
        }

    } else {
        $data->status = 'err';
        $data->text = 'ERR';
    }

    echo json_encode($data);
}


if (isset($_POST['sign_up_Agent'])) {
    $obj = json_decode($_POST["sign_up_Agent"]);
    $data = new stdClass();

    $isUserExist = $connection->query("SELECT * FROM user where email='$obj->email'");

    if ($isUserExist->num_rows > 0) {
        $data->status = 'err';
        $data->text = 'Sorry ! User already exist.. Try with different email...';

    } else {
        $query = "INSERT INTO user (name,email,password,role,address,contact) VALUES ('{$obj->name}', '{$obj->email}','{$obj->password}','{$obj->role}' ,'{$obj->address}', '{$obj->contact}')";
        $result = $connection->query($query);

        $data->status = 'success';
        $data->text = 'Registration successful...';

    }


    echo json_encode($data);


}

if (isset($_POST['viewUserList'])) {
    $obj = json_decode($_POST["viewUserList"]);

    $sql = "SELECT * FROM user";
    $query = $connection->query($sql);
    $data = new stdClass();

    if ($query->num_rows > 0) {
        $data->status = 'success';
        while ($row = mysqli_fetch_assoc($query)) {
            $data->data[] = $row;
        }

    } else {
        $data->status = 'err';
        $data->text = 'ERR';
    }

    echo json_encode($data);
}


if (isset($_POST['deleteUser'])) {
    $obj = json_decode($_POST["deleteUser"]);

    $sql = "DELETE FROM user WHERE email ='{$obj->email}'";

    $query = $connection->query($sql);
    $data = new stdClass();

    if ($query) {
        $data->status = 'success';
        $data->text = 'User Successfully Deleted';
    } else {
        $data->status = 'err';
        $data->text = 'ERR' . $connection->error;;

    }

    echo json_encode($data);
}


if (isset($_POST['update_user'])) {
    $obj = json_decode($_POST["update_user"]);

    $sql = "UPDATE user SET name = '{$obj->name}',password = '{$obj->password}',contact = '{$obj->contact}',address = '{$obj->address}',role ='{$obj->role}'  WHERE email='{$obj->email}'";

    $query = $connection->query($sql);
    $data = new stdClass();

    if ($query) {
        $data->status = 'success';
        $data->text = 'User Successfully Update';
    } else {
        $data->status = 'err';
        $data->text = 'ERR' . $connection->error;;

    }

    echo json_encode($data);
}


