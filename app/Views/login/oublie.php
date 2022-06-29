<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login Page - Messa</title>
    <meta name="description" content="Messa application Ecole">
    <meta name="keywords" content="ecole, messa, parent, Application Messa">
    <meta name="author" content="LAJOIE-ZIDOR ET CO">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/messa.css" />
    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ace-rtl.min.css" />
    <link rel="shortcut icon" href="<?php echo base_url() ?>/images_all/favicon.png">

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url() ?>/assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/respond.min.js"></script>
    <![endif]-->


</head>

<body style="background-color: #ffffff">
    <!-- /.main-container -->


    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Title -->
                <h1 class="mt-4">
                    <a href="https://messa.online/">
                        <img src="<?php echo base_url() ?>/images_all/logo1.png" />
                    </a>
                </h1>
            </div>
            <div class="col-lg-4" style="text-align: right">
                <h1 class="mt-4">
                    <span class="badge <?php if ($l_lan == 'ht') {
                                            echo "badge-success";
                                        } else {
                                            echo "badge-info";
                                        } ?>">
                        <a href="<?php echo base_url() ?>/changer-langue/ht/<?php echo $uri->getSegment(1); ?>">
                            <img src="<?php echo base_url() ?>/images_all/ht.png" width="30px" /></a>
                    </span>
                    <span class="badge <?php if ($l_lan == 'fr') {
                                            echo "badge-success";
                                        } else {
                                            echo "badge-info";
                                        } ?>">
                        <a href="<?php echo base_url() ?>/changer-langue/fr/<?php echo $uri->getSegment(1); ?>">
                            <img src="<?php echo base_url() ?>/images_all/fr.png" width="30px" /></a>
                    </span>
                    <span class="badge <?php if ($l_lan == 'us') {
                                            echo "badge-success";
                                        } else {
                                            echo "badge-info";
                                        } ?>">
                        <a href="<?php echo base_url() ?>/changer-langue/us/<?php echo $uri->getSegment(1); ?>">
                            <img src="<?php echo base_url() ?>/images_all/us.png" width="30px" /></a>
                    </span>
                </h1>
            </div>


            <div class="col-lg-6">
                <img style="width: 100%" src="<?php echo base_url() ?>/images_all/2022-login.gif" />

            </div>

            <div class="col-lg-6">
                <h1><?php echo $lang['titre_login'][$l_lan] ?></h1>
                <h4><?php echo $lang['espace_login'][$l_lan] ?></h4>
                <div class="space"></div>
                <div class="space"></div>

                <fieldset>
                    <label class="block clearfix"><strong>
                            <?php echo $lang['idlogin'][$l_lan] ?>:
                        </strong>
                        <span class="block input-icon input-icon-right">
                            <input maxlength="50" type="text" class="form-control" id="username" placeholder="<?php echo $lang['idlogin'][$l_lan] ?>" />
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                    </label>

                    <input type="hidden" id="password" />


                    <div class="space"></div>
                    <div class="space"></div>

                    <div class="clearfix">
                        <div id="erreur" class="alert alert-danger hide">
                            <?php echo $lang['mes_login3'][$l_lan] ?>
                        </div>

                        <div id="bon" class="alert alert-success hide">
                            <?php echo $lang['mes_login2'][$l_lan] ?>
                        </div>

                        <button type="button" onclick="ConnectOublie()" id="btn_connect" class="width-65 btn btn-lg btn-primary">
                            <i class="ace-icon fa fa-sign-in"></i>
                            <span class="bigger-110" id="de"><?php echo $lang['reinitialiserMotDepasse'][$l_lan] ?></span>
                        </button>
                    </div>

                    <div class="space-4"></div>
                    <br>
                    <h4><a href="<?php echo base_url() ?>/auth-messa"><?php echo $lang['btn_login'][$l_lan] ?></a></h4>
                </fieldset>

            </div>

        </div>

        <?php require_once('footer.php') ?>
        <!-- /.row -->



    </div>


    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script type="text/javascript">
        var base_url = '<?php echo base_url() ?>/';
    </script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/loginjs/login.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>


    <div id='ajax_loader' style="position: fixed; left: 47%; top: 20%; display: none;">
        <i class="ace-icon fa fa-spinner fa-spin orange fa-5x"></i>
    </div>


</body>

</html>
<script>
    $('#username').keypress(function(event) {

        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            ConnectOublie()
        }

    });
</script>