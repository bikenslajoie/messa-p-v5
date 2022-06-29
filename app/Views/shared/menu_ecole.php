<div id="sidebar" class="sidebar  responsive ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">

        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large" style="background-color: #fff">
            <span style="font-size: 19px; color:#666666; font-width: bold"><?php if (isset($anneeactives->periode))  echo dec($anneeactives->periode); ?></span>
            <img style="width: 60%;" class="img-rounded" src="<?php
                                                                if (empty($_SESSION['account']['logo'])) {
                                                                    echo "data: image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBxdWFsaXR5ID0gNzUK/9sAQwAIBgYHBgUIBwcHCQkICgwUDQwLCwwZEhMPFB0aHx4dGhwcICQuJyAiLCMcHCg3KSwwMTQ0NB8nOT04MjwuMzQy/9sAQwEJCQkMCwwYDQ0YMiEcITIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIy/8AAEQgAyAEsAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A9/ooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiii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";
                                                                } else {
                                                                    echo "data:image/png;base64," . $_SESSION['account']['logo'];
                                                                }
                                                                ?>" alt="Profile Picture">


        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="<?php if (!isset($act)) echo "active"; ?>">
            <a href="<?php echo base_url() ?>/app">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> <?php echo $lang['tableauBord'][$_SESSION['lang']]; ?> </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="<?php if (isset($act) and $act == "an") echo "active"; ?>">
            <a href="<?php echo base_url() ?>/annee-academique">
                <i class="menu-icon fa fa-calendar"></i>
                <span class="menu-text"> <?php echo $lang['anneeAcademique'][$_SESSION['lang']]; ?> </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="<?php if (isset($act) and $act == "mp") echo "active"; ?>">
            <a href="<?php echo base_url() ?>mon-payroll">
                <i class="menu-icon fa fa-credit-card"></i>
                <span class="menu-text"> <?php echo $lang['mon_payroll'][$_SESSION['lang']]; ?> </span>
            </a>

            <b class="arrow"></b>
        </li>


        <li class="<?php if (isset($act) and $act == "perso") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">
                    <?php echo $lang['personnels'][$_SESSION['lang']]; ?>
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if (isset($add_perso)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>ajouter-personnel">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['ajouter'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($lst_perso)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>liste-personnel">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['lister'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($pres)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>presence-personnel">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pr&eacute;sence
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php if (isset($pay)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>payroll-personnel">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['ajouter_payroll'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>
                <!--- li class="<?php if (isset($bonus)) echo "active"; ?>">
								<a href="<?php echo base_url() ?>payroll-bonus">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo $lang['ajouter_payroll'][$_SESSION['lang']]; ?>
									<br>( Bonus, 14&egrave;me mois, ...)
								</a>

								<b class="arrow"></b>
							</li --->

                <li class="<?php if (isset($lstpay)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>liste-payroll">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['lister_payroll'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>



                <!--- li class="<?php if (isset($recrutement)) echo "active"; ?>">
								<a href="<?php echo base_url() ?>recrutement">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo $lang['recrutement'][$_SESSION['lang']]; ?>
								</a>

								<b class="arrow"></b>
							</li>


							<li class="<?php if (isset($import_enseignant)) echo "active"; ?>">
								<a href="<?php echo base_url() ?>importer-enseignant">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo "Importer des enseignants"; ?>
								</a>

								<b class="arrow"></b>
							</li ---->


            </ul>
        </li>

        <li class="<?php if (isset($act) and $act == "etu") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> <?php echo $lang['eleves'][$_SESSION['lang']]; ?> </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if (isset($add_etu)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>inscription-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['inscription'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($pre_ins)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>pre-inscription-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['preInscription'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($rech_etu)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>liste-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['recherche'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php if (isset($for_etu)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>formation-classe">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['formationDeClasse'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php if (isset($imp_etu)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>importer-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['importation'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($abs_etu)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>absence-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['absenceRetard'][$_SESSION['lang']]; ?>
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($bull_etu)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>gestion-bulletin-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['bulletin'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?php echo base_url() ?>palmares-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['palmares'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($salle_classe)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>liste-classe">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Salle de classe
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($progmm)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>publipostage">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo "Publipostage"; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($promo_etu)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>changement-annee-academique">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['changementAnneeAcad'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <li class="<?php if (isset($act) and $act == "message") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-envelope-o"></i>
                <span class="menu-text"> <?php echo $lang['message'][$_SESSION['lang']]; ?> </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if (isset($add_mes)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>message-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['send_message'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>



            </ul>
        </li>

        <li class="<?php if (isset($act) and $act == "cal") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-calendar-o"></i>
                <span class="menu-text"> <?php echo $lang['calendrier'][$_SESSION['lang']]; ?> </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="<?php if (isset($lst_event)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>calendrier">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['new_event'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>


            </ul>
        </li>

        <li class="<?php if (isset($act) and $act == "eco") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-credit-card"></i>
                <span class="menu-text"> <?php echo $lang['economat'][$_SESSION['lang']]; ?> </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if (isset($pmt)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>paiement-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['paiement'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($bal)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>balance-eleve">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['balance'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($rec)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>recette-economat">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['recette'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($rap)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>rapport-economat">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['rapport'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($cco)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>configuration-economat">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['config'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php if (isset($afrs)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>autres-frais">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['autreFrais'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="<?php if (isset($act) and $act == "dep") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-area-chart"></i>
                <span class="menu-text"> <?php echo $lang['depenses'][$_SESSION['lang']]; ?> </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if (isset($depaj)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>ajouter-depense">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['ajouter'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($deprap)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>lister-depense">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['rapport'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($rub)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>lister-rubrique">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['listeRubrique'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="<?php if (isset($act) and $act == "rec") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-money"></i>
                <span class="menu-text"> <?php echo $lang['recu'][$_SESSION['lang']]; ?> </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if (isset($recaj)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>load-recu">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['ajouter'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($recrap)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>lister-recu">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['rapport'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <li class="<?php if (isset($act) and $act == "conf") echo "active open"; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text"> <?php echo $lang['config'][$_SESSION['lang']]; ?> </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if (isset($ceco)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>configuration-entreprise">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php
                        echo $lang['confEcole'][$_SESSION['lang']];
                        ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($cpeda)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>discipline">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['confPega'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($gpa)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>mention">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['mention'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if (isset($gpc)) echo "active"; ?>">
                    <a href="<?php echo base_url() ?>liste-groupe">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $lang['listeGroupeEleve'][$_SESSION['lang']]; ?>
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>
        <li class="<?php if (isset($act) and $act == "pwd") echo "active"; ?>">
            <a href="<?php echo base_url() ?>modifier-mot-de-passe" title="Modifier mon mot de passe">
                <i class="menu-icon fa fa-lock"></i>
                <span class="menu-text"> <?php echo $lang['modMotPasse'][$_SESSION['lang']]; ?> </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="<?php if (isset($act) and $act == "g_p") echo "active"; ?>">
            <a href="<?php echo base_url() ?>groupe">
                <i class="menu-icon fa fa-tasks"></i>
                <span class="menu-text"> <?php echo $lang['gestionGroupe'][$_SESSION['lang']]; ?> </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li>
            <a data-fancybox-type="iframe" class="variousF" href="<?php echo base_url() ?>les-tutos">
                <i class="menu-icon fa fa-film"></i>
                <span class="menu-text"> <?php echo $lang['tutoriel'][$_SESSION['lang']]; ?> </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li>
            <a class="variousPetit_2" data-fancybox-type="iframe" href="<?php echo base_url() ?>salle-de-conrefence">
                <i class="menu-icon fa fa-video-camera"></i>
                <span class="menu-text"> Salle des professeurs </span>
            </a>

            <b class="arrow"></b>
        </li>

        <?php if (3 == 2) { ?>
            <li class="<?php if (isset($act) and $act == "boxes") echo "active"; ?>">
                <a href="<?php echo base_url() ?>modules-messa">
                    <i class="menu-icon fa fa-th-list"></i>
                    <span class="menu-text"> Modules </span>
                </a>

                <b class="arrow"></b>
            </li>
        <?php } ?>

        <li class="<?php if (isset($act) and $act == "log") echo "active"; ?>">
            <a href="<?php echo base_url() ?>log">
                <i class="menu-icon fa fa-files-o"></i>
                <span class="menu-text"> <?php echo $lang['log'][$_SESSION['lang']]; ?> </span>
            </a>

            <b class="arrow"></b>
        </li>



    </ul><!-- /.nav-list -->

    <!--
				<div style="width:100%; padding: 10px">
					<img class="img-responsive" src="<?php echo base_url() ?>/images_all/frame_messa.png" />
				</div>

				div style="width:100%;">
					<P style="padding:5px 0px 0px 15px; font-size:16px; font-weight:bold;">Support</P>
					<a href="<?php echo base_url() ?>support">
						<img class="img-responsive" src="<?php echo base_url() ?>/images_all/support.png" />

						</a>

				</div --->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>