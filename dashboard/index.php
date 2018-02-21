<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location:../index.php');
    exit;
} else {
    include('../crud.php');

    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body class="bg-bleu text-white">
    <?php include('../navbar.php'); ?>
    <main>
        <div class="container-fluid">
            <div class="row pt-5">
                <?php
                //CHECK URL
                if (isset($_GET['user']) || isset($_GET['form']) || isset($_GET['question']) || isset($_GET['step'])) {
                    //Users
                    if (isset($_GET['user'])) {
                        if (isset($_GET['delete'])) {
                            deleteUser($sql_connect, $_GET['user']);
                            header('location:index.php');
                        } else if ($_GET['user'] === 'create') {
                            createUser($sql_connect,''.$_POST['firstname'].'',''.$_POST['lastname'].'',''.$_POST['phone'].'',''.$_POST['email'].'',''.password_hash($_POST['password'],PASSWORD_DEFAULT).'',''.$_POST['society'].'',''.$_POST['city'].'','1','0');
                            header('location:index.php');
                        }
                    }
                    //Forms
                    if (isset($_GET['form'])) {
                        if (isset($_GET['delete'])) {
                            deleteForm($sql_connect, $_GET['form']);
                            header('location:index.php');
                        } else if (isset($_GET['view'])) {
                            ?>
                            <div class="col-12">
                                <?php include('formview.php') ?>
                            </div>
                            <?php
                        } else if ($_GET['form'] === 'create') {
                            createForm($sql_connect,''.$_POST['title'].'');
                            $form_id = $sql_connect->insert_id;
                            header('location:index.php?form='.$form_id.'&view');
                        }
                    }
                    //Steps
                    if (isset($_GET['step'])) {
                        if (isset($_GET['delete'])) {
                            deleteStep($sql_connect, $_GET['step']);
                            header('location:index.php?form='.$_GET['formid'].'&view');
                        } else if ($_GET['step'] === 'create') {
                            createStep($sql_connect,$_GET['formid'],''.$_POST['step'].'');
                            header('location:index.php?form='.$_GET['formid'].'&view');
                        }
                    }
                    //Questions
                    if (isset($_GET['question'])) {
                        if (isset($_GET['delete'])) {
                            deleteQuestion($sql_connect, $_GET['question']);
                            header('location:index.php?form='.$_GET['formid'].'&view');
                        } else if ($_GET['question'] === 'create') {
                            createQuestion($sql_connect,$_GET['stepid'],''.$_POST['question'].'');
                            header('location:index.php?form='.$_GET['formid'].'&view');
                        }
                    }
                } else {
                    ?>
                    <div class="col-6">
                        <?php include('userslist.php'); ?>
                    </div>
                    <div class="col-6">
                        <?php include('formslist.php'); ?>
                    </div>
                <?php }  ?>
            </div>
        </div>
    </main>
    <?php include('../footer.php'); ?>
    <!-- SCRIPTS -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function () {contsize();});
        $(window).bind("resize",function(){contsize();});
        function contsize() {
            w = $(window).height();
            $('#formblock').css('height',''+ (w-200) +'px');
            $('#stepbox').css('height',''+ (w-430) +'px');
        }
        $('#nav').bind("click",function(){
            contsize();
        });
    </script>
    </body>
    </html>
<?php }