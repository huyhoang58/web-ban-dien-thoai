<?php
require("../config/connect.php");
//note:kiểm tra tất cả các trang
session_start();
if(isset($_GET["task"]) && $_GET["task"] == "logout"){
    session_unset();
}
if(!$_SESSION){
    header("location:index.php");
}else{
    echo"đây là: ". $_SESSION["username"];
    echo"<a class='btn btn-danger' href='index.php?task=logout'>Đăng xuất</a>";
    echo"<a class='btn btn-success' href='mana_danhmuc.php'>Quản Trị Danh Mục</a>";
    echo"<a class='btn btn-info' href='product.php'>Thêm sản phẩm</a>";
    echo"<a class='btn btn-dark' href='pro.php'>Quản trị sản phẩm</a>";
}
?>

