<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>MESSA - Gestion Ecole</title>

    <meta name="description" content="Messa application Ecole">
    <meta name="keywords" content="ecole, messa, parent, Application Messa">
    <meta name="author" content="LAJOIE-ZIDOR ET CO">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jquery-ui.min.css" />
    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/fullcalendar.min.css" />

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/chosen.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/daterangepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-colorpicker.min.css" />


    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/images_all/favicon.png">
    <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/messa.css" />
    <script src="<?php echo base_url() ?>/assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/Chart.bundle.js"></script>


    <!--[if IE]>
<script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
		  <script src="<?php echo base_url() ?>/assets/js/excanvas.min.js"></script>
		<![endif]-->

    <script type="text/javascript">
        var base_url = '<?php echo base_url() ?>/';
    </script>
    <script src="<?php echo base_url() ?>/assets/tools/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui.min.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/jquery-ui.custom.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.sparkline.index.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.flot.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/moment.min.js"></script>
    <script src='<?php echo base_url() ?>/assets/js/cal/fullcalendar.min.js'></script>
    <script src='<?php echo base_url() ?>/assets/js/cal/locale-all.js'></script>

    <!-- ace scripts -->
    <script src="<?php echo base_url() ?>/assets/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootbox.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.maskedinput.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/mesjs.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/utils.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/ace.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap-colorpicker.min.js"></script>

    <!-- inline scripts related to this page -->
    <script src="<?php echo base_url() ?>/assets/mytools/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="<?php echo base_url() ?>/assets/mytools/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <script src="<?php echo base_url() ?>/assets/mytools/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script src="<?php echo base_url() ?>/assets/mytools/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <script src="<?php echo base_url() ?>/assets/mytools/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url() ?>/assets/js/ace-extra.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/langues/<?php echo $_SESSION['lang']; ?>/langue.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-30872381-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-30872381-6');
    </script>


    <style type="text/css">
        .embed-responsive {
            position: relative;
            display: block;
            height: 0;
            padding: 0;
            overflow: hidden;
        }

        .infobox {
            border: 0px;
        }
    </style>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/mytools/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/mytools/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/mytools/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <!-- style>
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #ffcccc;
}
</style -->

</head>

<body class="no-skin">

    <div id='ajax_loader' style="position: fixed; left: 50%; top: 50%; display: none;">
        <i class="ace-icon fa fa-spinner fa-spin orange fa-5x"></i>
    </div>

    <div id="navbar" style="background-color:#006699" class="navbar navbar-default          ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="<?php echo base_url() ?>/app" class="navbar-brand">
                    <small>
                        <img src="<?php echo base_url() ?>/images_all/logo2.png" height="23px" />
                    </small>
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <!-- li class="grey dropdown-modal">
							<a title="Espace de stockage" data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
								<i class="ace-icon fa fa-tasks"></i>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-tasks"></i>
									Espace de stockage
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li --->

                    <!--- li class="blue dropdown-modal">
	<a href="javascript:void(0)" title="Solde">
		SOLDE: $10 USD
	</a>
</li>

<li class="green dropdown-modal">
	<a href="<?php echo base_url() ?>/support" title="Support">
		<i class="ace-icon fa fa-comments-o icon-animated-vertical"></i>
	</a>
</li !-->
                    <?php
                    if (!empty($cl->duree) and abs($cl->duree) <= 60) {
                    ?>
                        <li class="red">
                            <a href="javascript:void(0)" title="Date d'expiration" style="font-size: 13px; padding-right: 40px; padding-left: 40px; ">
                                <strong>Votre contrat MESSA expire le: <span style="font-size: 18px"><?php echo dateVersChaineText($cl->au) ?>.</span> Contactez votre administrateur.</strong>
                            </a>
                        </li>
                    <?php } ?>


                    <li class="blue dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
                            <i class="ace-icon fa fa-calendar icon-animated-vertical"></i>
                            <span class="badge badge-success"><?php echo $tot_anniv; ?></span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-calendar-o"></i>
                                <?php echo $tot_anniv . ' ' . $lang['notif_birthday'][$_SESSION['lang']]; ?>
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li>
                                        <a href="<?php echo base_url() ?>/anniversaire" class="clearfix">
                                            <?php
                                            echo $lang['v_a_birthday'][$_SESSION['lang']]
                                                . $tot_anniv .
                                                $lang['30_birthday'][$_SESSION['lang']];
                                            ?>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="<?php echo base_url() ?>/anniversaire">
                                    <?php echo $lang['see_all_birthday'][$_SESSION['lang']]; ?>
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <?php if (isset($_SESSION['liste_definitive']) and $_SESSION['liste_definitive'] == '1') { ?>
                        <li class="grey dropdown-modal">
                            <a href="javascript:void(0)" title="<?php echo $lang['liste_definitive'][$_SESSION['lang']] ?>" onclick="Liste_definitive();">
                                <i class="ace-icon fa fa-list-ol icon-animated-vertical"></i>
                            </a>
                        </li>
                    <?php } ?>


                    <li class="purple dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
                            <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                            <span class="badge badge-important"><?php echo $total_nofifer; ?></span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-exclamation-triangle"></i>
                                <?php echo $total_nofifer; ?> Notification(s)
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                    <li>
                                        <a href="<?php echo base_url() ?>/notification">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <?php if ($total_nofifer > 1) {
                                                        echo "Vous avez " . $total_nofifer . " nouvelles notifications";
                                                    } else {
                                                        echo "Vous avez " . $total_nofifer . " nouvelle notification";
                                                    } ?>

                                                </span>
                                            </div>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="<?php echo base_url() ?>/notification">
                                    See all notifications
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="green dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
                            <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                            <span class="badge badge-success"><?php echo $total_mesnoti; ?></span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-envelope-o"></i>
                                <?php echo $total_mesnoti; ?> Message(s)
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li>
                                        <a href="<?php echo base_url() ?>/notification-message" class="clearfix">
                                            <?php if ($total_mesnoti > 1) {
                                                echo "Vous avez " . $total_mesnoti . " nouveaux messages";
                                            } else {
                                                echo "Vous avez " . $total_mesnoti . " nouveau message";
                                            } ?>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="<?php echo base_url() ?>/notification-message">
                                    See all messages
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="light-blue dropdown-modal">
                        <a href="javascript:void(0)" title="Update data" onclick="update_board();">
                            <i class="ace-icon fa fa-refresh"></i>
                        </a>
                    </li>
                    <li class="blue" style="padding:0px 10px 0px 10px">

                        <span class="badge <?php if ($_SESSION['lang'] == "ht") {
                                                echo "badge-success";
                                            } else {
                                                echo "badge-info";
                                            } ?>">
                            <a href="<?php echo base_url() ?>/changer-langue/ht/<?php echo $uri->getSegment(1); ?>">
                                <img src="<?php echo base_url() ?>/images_all/ht.png" width="20px" /></a></span>
                        <span class="badge <?php if ($_SESSION['lang'] == "fr") {
                                                echo "badge-success";
                                            } else {
                                                echo "badge-info";
                                            } ?>">
                            <a href="<?php echo base_url() ?>/changer-langue/fr/<?php echo $uri->getSegment(1); ?>">
                                <img src="<?php echo base_url() ?>/images_all/fr.png" width="20px" /></a></span>
                        <span class="badge <?php if ($_SESSION['lang'] == "us") {
                                                echo "badge-success";
                                            } else {
                                                echo "badge-info";
                                            } ?>">
                            <a href="<?php echo base_url() ?>/changer-langue/us/<?php echo $uri->getSegment(1); ?>">
                                <img src="<?php echo base_url() ?>/images_all/us.png" width="20px" /></a></span>

                    </li>


                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="javascript:void(0)" class="dropdown-toggle">
                            <span class="user-info">
                                <small><?php echo $lang['bienvenue'][$_SESSION['lang']] ?>,</small>
                                <?php echo dec($_SESSION['account']['prenom'] . " " . $_SESSION['account']['nom']); ?>
                                <input type="hidden" id="codedoralyaentete" value="<?php echo $_SESSION['account']['parent']; ?>" />
                                <input type="hidden" id="annee_ajax" value="<?php if (isset($anneeactives->periode)) echo dec($anneeactives->periode); ?>" />
                                <input type="hidden" id="mm_type" value="ecole" />
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                            <li>
                                <a href="javascript:void(0)">
                                    <i class="ace-icon fa fa-code"></i>
                                    <?php echo $lang['code'][$_SESSION['lang']] ?>: <?php echo $_SESSION['account']['parent']; ?>
                                </a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="ace-icon fa fa-key"></i>
                                    Login: <?php echo $_SESSION['account']['identifiant']; ?>
                                </a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="ace-icon fa fa-at"></i>
                                    Email: <?php echo $_SESSION['account']['email']; ?>
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="<?php echo base_url() ?>/login_param/SeDeconnecter">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    <?php echo $lang['seDeconnecter'][$_SESSION['lang']] ?>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <?php
        if ($uri->getSegment(1) == "palmares-eleve") {
        } else {
            if ($uri->getSegment(1) == "support") {
            } else {
                if ($uri->getSegment(1) == "palmares-mobile") {
                } else {
                    require_once('menu_ecole.php');
                }
            }
        } ?>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <strong><?php echo dec($_SESSION['account']['institution']); ?></strong>
                        </li>

                    </ul><!-- /.breadcrumb -->

                    <div class="nav-search" id="nav-search">
                        <form class="form-search" method="POST" action="<?php echo base_url() ?>/liste-eleve">
                            <span class="input-icon">
                                <input maxlength="50" type="text" name="cle" placeholder="<?php echo $lang['recherche'][$_SESSION['lang']] ?>..." class="nav-search-input" id="cle" autocomplete="off" />
                                <i class="ace-icon fa fa-search nav-search-icon"></i>
                            </span>
                            <img src="https://messa.online/img/online.gif" id="img_yes" width="25px" />
                            <img src="https://messa.online/img/offline.png" id="img_no" width="25px" />
                        </form>
                    </div><!-- /.nav-search -->
                </div>