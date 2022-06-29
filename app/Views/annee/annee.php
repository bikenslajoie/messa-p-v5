<div class="page-header">
    <h1>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            <?php echo $lang['anneeAcademique'][$_SESSION['lang']] ?>
        </small>
    </h1>
</div>
<div class="page-content">
    <!-- /.page-header -->
    <div class="row">
        <?php if ($_SESSION['droit']['conf_peda'] == "1") { ?>
            <div class="col-lg-12 col-md-12 col-xs-12">

                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="alert alert-warning">
                        <?php echo $lang['message_annee'][$_SESSION['lang']] ?>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12">

                    <!--- form class="form-inline" role="form" data-toggle="validator" id="form1" name="form1" method="post" action="parser.php">
						  
						  <div class="form-group">
							<input maxlength="10" type="text" size="35" class="form-control" name="anneeacad" id="anneeacad" placeholder="<?php echo $lang['anneeAcademique'][$_SESSION['lang']] ?> (*)" required />
						  </div>
						  
							<button class="btn btn-sm btn-primary" type="button" onclick="Add_anneeAcademique()">
							   <i class="ace-icon fa fa-check"></i>
								<?php echo $lang['ajouter'][$_SESSION['lang']] ?>
							</button>
						<input type="hidden" name="add_anneeacad" id="add_anneeacad" value="ok" />
						<input type="hidden" name="session1" id="session1" value="" />
						<input type="hidden" name="session2" id="session2" value="" />
						<input type="hidden" name="session3" id="session3" value="" />
						<input type="hidden" name="session4" id="session4" value="" />
						
						</form --->
                    <br />
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <span id="value_annee"></span>

                </div>
            </div>

            <script src="<?php echo base_url() ?>/assets/anneejs/annee.js"></script>
            <script>
                Get_Les_annees();
            </script>

        <?php } else {
            require_once APPPATH . 'Views/shared/pas_access.php';
        } ?>
    </div><!-- /.row -->
</div><!-- /.page-content -->