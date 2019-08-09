<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="author" content="fahmidwisyahputra(@dwifhmi), MochFahmi(@fahmidion_)">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/frontend/img/logoclp.png') ?>">
  <title>Dashboard CLP</title>
  <!-- others css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/metisMenu.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/slicknav.min.css') ?>">
  <!-- amchart css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/typography.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/default-css.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/styles.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('lib/backend/css/responsive.css') ?>">
  <!-- modernizr css -->
  <script src="<?php echo base_url('lib/backend/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
  <style>
  #snackbar {
    visibility: hidden;
    /* Hidden by default. Visible on click */
    min-width: 250px;
    /* Set a default minimum width */
    margin-left: -125px;
    /* Divide value of min-width by 2 */
    background-color: #e65640;
    /* Black background color */
    color: #fff;
    /* White text color */
    text-align: center;
    /* Centered text */
    border-radius: 2px;
    /* Rounded borders */
    padding: 16px;
    /* Padding */
    position: fixed;
    /* Sit on top of the screen */
    z-index: 1;
    /* Add a z-index if needed */
    right: 5%;
    /* Center the snackbar */
    bottom: 30px;
    /* 30px from the bottom */
  }

  /* Show the snackbar when clicking on a button (class added with JavaScript) */
  #snackbar.show {
    visibility: visible;
    /* Show the snackbar */
    /* Add animation: Take 0.5 seconds to fade in and out the snackbar. 
  However, delay the fade out process for 2.5 seconds */
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }

  /* Animations to fade the snackbar in and out */
  @-webkit-keyframes fadein {
    from {
      bottom: 0;
      opacity: 0;
    }

    to {
      bottom: 30px;
      opacity: 1;
    }
  }

  @keyframes fadein {
    from {
      bottom: 0;
      opacity: 0;
    }

    to {
      bottom: 30px;
      opacity: 1;
    }
  }

  @-webkit-keyframes fadeout {
    from {
      bottom: 30px;
      opacity: 1;
    }

    to {
      bottom: 0;
      opacity: 0;
    }
  }

  @keyframes fadeout {
    from {
      bottom: 30px;
      opacity: 1;
    }

    to {
      bottom: 0;
      opacity: 0;
    }
  }
  </style>
</head>