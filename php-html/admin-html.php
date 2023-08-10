<?php 

session_start();
require_once('./php/connect.php');

  if(empty($_SESSION['admin_id'])) {
    header('location: ./admin-login');
  }

  $checkID = mysqli_prepare($conn, "SELECT m.member_id, m.m_email, m.m_username,
  m.m_password, m.m_name, m.m_lastname, m.m_phone, m.m_img, m.create_date,
  m.modify_date, l.m_level FROM m_member m
  JOIN m_level l ON m.m_level = l.m_id
  WHERE member_id=?");

  mysqli_stmt_bind_param($checkID, "i", $_SESSION['admin_id']);
  mysqli_stmt_execute($checkID);
  $res = mysqli_stmt_get_result($checkID);
  $row = mysqli_fetch_assoc($res);


?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>  </title>
  <!-- Chang title Dynamic -->
  <?php require "./php/title-dynamic.php"; ?>

  <!-- Favicon -->
  <link rel="icon" href="./icons/favicon.png" type="image/png">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" type="text/css" href="./css/sb-admin-2.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/fileinput.css" media="all">
  <!-- Custom style for DataTable  -->
  <link rel="stylesheet" type="text/css" href="./css/dataTables.bootstrap4.css" media="all">
  <!-- Custom fonts for this template-->
  <link href="./fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Sweet Alert 2 CSS -->
  <link href="./css/sweetalert2.css" rel="stylesheet" type="text/css">
  <!-- jQuery Bootstrap  -->
  <script src="./js/jquery.min.js"></script>
  <script src="./js/jquery.easing.js"></script>
</head>
<body id="page-top">