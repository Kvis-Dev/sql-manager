<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Simple Sidebar - Start Bootstrap Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css/sidebar.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        
        <link rel="stylesheet" href="/codemirror/lib/codemirror.css" />
        <script src="/codemirror/lib/codemirror.js"></script>
        <script src="/codemirror/sql.js"></script>
        <link rel="stylesheet" href="/codemirror/addon/hint/show-hint.css" />
        <script src="/codemirror/addon/hint/show-hint.js"></script>
        <script src="/codemirror/addon/hint/sql-hint.js"></script>
    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <?php include BASE . '/tpl/menu.left.php'; ?>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
