<?php
ob_start();
session_start();

include 'connect.php';

if (isset($_POST['adminlogin'])) {

    $admin_username = $_POST['admin_username'];
    $admin_password = md5($_POST['admin_password']);

    $adminQuery = $db->prepare("SELECT * FROM admin WHERE admin_username=:username and admin_password=:password");
    $adminQuery->execute(array(
        'username' => $admin_username,
        'password' => $admin_password
    ));

    $count = $adminQuery->rowCount();

    if ($count == 1) {
        $_SESSION['admin_username'] = $admin_username;
        header("Location:../production/index.php");
        exit;
    } else {
        header("Location:../production/login.php?status=false");
        exit;
    }
}

if (isset($_POST['addcategory'])) {

    $addcategory = $db->prepare("INSERT INTO category SET
        category_name=:category_name
    ");

    $add = $addcategory->execute(array(
        'category_name' => $_POST['category_name']
    ));

    if ($add) {
        header("Location:../production/add_category.php?status=true");
    } else {
        header("Location:../production/add_category.php?status=false");
    }
}

if (isset($_GET['category_id'])) {

    $deleteCategory = $db->prepare("DELETE FROM category WHERE category_id=:category_id");
    $deleteCategory->execute(array(
        'category_id' => $_GET['category_id']
    ));

    if ($deleteCategory) {
        header("Location:../production/categories.php?status=true");
    } else {
        header("Location:../production/categories.php?status=false");
    }
}

if (isset($_POST['updatecategory'])) {

    $category_id = $_POST['category_id'];

    $updateCategory = $db->prepare("UPDATE category SET category_name=:category_name WHERE category_id=:category_id");
    $updateCategory->execute(array(
        'category_name' => $_POST['category_name'],
        'category_id' => $_POST['category_id']
    ));

    if ($updateCategory) {
        header("Location:../production/edit_category.php?status=true&category_id=$category_id");
    } else {
        header("Location:../production/edit_category.php?status=false");
    }
}
