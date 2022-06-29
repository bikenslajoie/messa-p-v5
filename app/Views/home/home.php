<?php
function pourcentage($a, $b, $val)
{
    $res = (intval($val) * 100) / (intval($a) + intval($b));
    return round($res, 2);
}
$lm     = explode("____", $licence_montant);
$sexe     = explode(",", $TotalParSexe);
$pieces = explode(",__", $totaleleveparclasse);

$sexec = explode(",__", $TotalParClasSexe);


if (empty($pieces[1])) {
    $pieces[1]     = "";
}

if (empty($pieces[0])) {
    $pieces[0]    = 0;
}

if (empty($sexec[1])) {
    $sexec[1]     = 0;
}

if (empty($sexec[0])) {
    $sexec[0]    = 0;
}



$eff_m = array('0');
$eff_f = array('0');

if (isset($sexe[0]) and $sexe[0] == "") {
    $eff_m = explode(",", $sexec[0]);
}
if (isset($sexe[1]) and $sexe[1] == "") {
    $eff_f = explode(",", $sexec[1]);
}
$annee = "";
if (isset($anneeactives->periode)) {
    $annee = dec($anneeactives->periode);
}

$data_rec = "";
if (isset($_SESSION['total_record'])) {
    $data_rec = $_SESSION['total_record'];
}
if (isset($pieces[1])) {
    $les_boites = explode(",", $pieces[1]);
} else {
    $les_boites = array();
}

?>

<div class="page-content">
    <!-- /.page-header -->

    <div class="row">

        <div class="col-lg-2 col-md-12 col-sm-2">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div style="width: 100%">
                    <div id="canvas-holder">
                        <div style="text-align:center"><strong><?php echo $lang['effectif'][$_SESSION['lang']] ?> <?php if (isset($anneeactives->periode))  echo dec($anneeactives->periode); ?></strong></div>
                        <canvas id="chart-area" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <div class="infobox infobox-green">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-users"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo number_format($totaleleve, 0, ',', ' '); ?></span>
                        <div class="infobox-content"><?php echo $lang['eleve'][$_SESSION['lang']] ?></div>
                    </div>
                </div>

                <div class="infobox infobox-blue">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-male"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo $sexe[1] ?></span>
                        <div class="infobox-content"><?php echo $lang['garcon'][$_SESSION['lang']] ?></div>
                    </div>
                </div>

                <div class="infobox infobox-pink">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-female"></i>
                    </div>
                    <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo $sexe[0] ?></span>
                        <div class="infobox-content"><?php echo $lang['fille'][$_SESSION['lang']] ?></div>
                    </div>

                </div>

                <div class="infobox infobox-purple" style="height:90px">
                    <?php
                    if (intval($totaleleve) == 0) {
                        $total_parent         = 0;
                        $parent_connecte     = 0;
                        $pourcent_parent_connecte     = 0;
                    } else {
                        $total_parent         = $totaleleve;
                        $parent_connecte     = $les_connect_parents;
                        $pourcent_parent_connecte     = round((($parent_connecte * 100) / $total_parent), 2);
                    }

                    ?>
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-link"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number" title="<?php echo $pourcent_parent_connecte ?>%"><?php echo $parent_connecte . " / " . $total_parent ?></span>
                        <div class="infobox-content"><?php echo $pourcent_parent_connecte . "% " . $lang['parent_connect'][$_SESSION['lang']] ?></div>
                        <div class="progress progress-mini progress-striped active">
                            <div style="width:<?php echo $pourcent_parent_connecte ?>%" class="progress-bar progress-bar-success"></div>
                        </div>
                    </div>
                </div>


                <?php foreach ($TotalEns as $tw) { ?>
                    <div class="infobox infobox-red" style="height:77px">
                        <div class="infobox-icon">
                            <i class="ace-icon fa fa-users"></i>
                        </div>

                        <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $tw->total; ?></span>
                            <div class="infobox-content"><strong><?php echo $tw->nom_groupe; ?> (s)</strong></div>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['account']['groupe'] == "admin") {
                    if (!in_array($_SESSION['account']['parent'], $les_clients_montant_fixe)) {
                ?>
                        <div class="infobox infobox-purple">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-ticket"></i>
                            </div>

                            <div class="infobox-data">
                                <span class="infobox-data-number"><?php echo $lm[0] ?></span>
                                <div class="infobox-content">Licences</div>
                            </div>
                        </div>
                <?php }
                } ?>


            </div>

        </div>


        <div class="col-lg-10 col-md-12 col-sm-10">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
                if (!isset($sexec[0])) {
                    $eff_m = 0;
                } else {
                    $eff_m = explode(",", $sexec[0]);
                }
                if (!isset($sexec[1])) {
                    $eff_f = 0;
                } else {
                    $eff_f = explode(",", $sexec[1]);
                }


                for ($r = 0; $r < count($les_boites); $r++) {
                ?>

                    <div class="col-xs-12 pricing-box visible-xs visible-sm">
                        <div class="widget-box widget-color-blue">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter"><?php echo trim($les_boites[$r], '"') ?></h5>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <ul class="list-unstyled spaced2">
                                        <li>
                                            <i class="ace-icon fa fa-female pink"></i>
                                            <strong>F: </strong><?php echo $eff_f[$r] ?>
                                        </li>

                                        <li>
                                            <i class="ace-icon fa fa-male blue"></i>
                                            <strong>M: </strong><?php echo $eff_m[$r] ?>
                                        </li>
                                    </ul>

                                    <hr />
                                    <div class="price">
                                        <strong>TOTAL: </strong><?php echo intval($eff_m[$r]) + intval($eff_f[$r]) ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php } ?>



                <div class="col-lg-12 visible-lg visible-md">
                    <div style="width: 100%">
                        <canvas id="canvas" height="250" width="800"></canvas>
                    </div>
                </div>

                <div class="col-lg-12 visible-lg visible-md">
                    <div style="width: 100%">
                        <canvas id="canvas2" height="250" width="800"></canvas>
                    </div>
                </div>
                <div class="col-lg-12 visible-lg visible-md">
                    <div style="width: 100%">
                        <canvas id="canvas3" height="250" width="800"></canvas>
                    </div>
                </div>

                <div class="col-lg-12">

                    <?php echo "<h4>" . $lang['progressionPedagogique'][$_SESSION['lang']] . "</h4><p><span class='succes'>S: Succès</span> <span class='echec'>E: Echec</span></p>" ?>
                    <hr>

                </div>
                <?php
                $resultatAn = explode('___ANNEE___', $resultatAnnuel);
                $annee_pie = explode('__', $resultatAn[0]);
                ?>
                <div class="col-lg-2 col-md-6 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body center">
                            <p style="text-align: center"><?= $annee_pie[0] ?></p>
                            <div class="bas_1">S : <?= $annee_pie[1] ?></div>
                            <div class="bas_2">E : <?= $annee_pie[2] ?></div>
                            <div style="width: 85%; margin: 0 auto;">
                                <canvas id="moy1" width="200" height="200"></canvas>
                            </div>
                            <div class="bas_1">S : <?= pourcentage($annee_pie[1], $annee_pie[2], $annee_pie[1]) . "%" ?></div>
                            <div class="bas_2">E : <?= pourcentage($annee_pie[1], $annee_pie[2], $annee_pie[2]) . "%" ?></div>
                        </div>
                    </div>
                </div>
                <?php
                $periode = explode('___PERIODE__', rtrim($resultatAn[1], '___PERIODE__'));
                for ($e = 0; $e < count($periode); $e++) {
                    $pp = explode('__', $periode[$e]); ?>
                    <div class="col-lg-2 col-md-6 col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-body center">
                                <p id="titre<?= $e ?>" style="text-align: center"></p>
                                <div class="bas_1">S : <?= $pp[1] ?></div>
                                <div class="bas_2">E : <?= $pp[2] ?></div>
                                <div style="width: 85%; margin: 0 auto;">
                                    <canvas id="p<?php echo $e ?>" width="200" height="200"></canvas>
                                </div>

                                <div class="bas_1">S : <?= pourcentage($pp[1], $pp[2], $pp[1]) . "%" ?></div>
                                <div class="bas_2">E : <?= pourcentage($pp[1], $pp[2], $pp[2]) . "%" ?></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>


        <!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

<?php
$dataset = "";
$graph_periode = "";

$la_couleur = array(
    '#4dc9f6',
    '#f67019',
    '#f53794',
    '#537bc4',
    '#acc236',
    '#166a8f',
    '#00a950',
    '#58595b',
    '#8549ba',
    '#0066ff',
    '#33cc33',
    '#ff6600',
    '#ff00ff',
    '#993333',
    '#660033',
    '#ff3300',
    '#003300',
    '#ff9900',
    '#cc0000',
    '#cc6600',
    '#cc9900',
    '#cc0099',
    '#804d4d',
    '#663300'
);


$cl = -1;
$dataset = "";

foreach ($MoyenneDiscipline as $row_set) {
    $cl++;

    $el = "";
    if ($cl == 0) {
        $graph_periode = dec($row_set->lesperiodes);
        $r = explode(';', $graph_periode);
    }

    if (isset($r[0]) and $r[0] != "") {
        $sur1 = $row_set->la_somme_coefficient1;
        if ($sur1 == 0) {
            $sur1 = 1;
        }
        $el .= round((($row_set->la_somme_e1 / $sur1) * 10), 2) . ",";
    }
    if (isset($r[1]) and $r[1] != "") {
        $sur2 = $row_set->la_somme_coefficient2;
        if ($sur2 == 0) {
            $sur2 = 1;
        }
        $el .= round((($row_set->la_somme_e2 / $sur2) * 10), 2) . ",";
    }
    if (isset($r[2]) and $r[2] != "") {
        $sur3 = $row_set->la_somme_coefficient3;
        if ($sur3 == 0) {
            $sur3 = 1;
        }
        $el .= round((($row_set->la_somme_e3 / $sur3) * 10), 2) . ",";
    }
    if (isset($r[3]) and $r[3] != "") {
        $sur4 = $row_set->la_somme_coefficient4;
        if ($sur4 == 0) {
            $sur4 = 1;
        }
        $el .= round((($row_set->la_somme_e4 / $sur4) * 10), 2) . ",";
    }
    if (isset($r[4]) and $r[4] != "") {
        $sur5 = $row_set->la_somme_coefficient5;
        if ($sur5 == 0) {
            $sur5 = 1;
        }
        $el .= round((($row_set->la_somme_e5 / $sur5) * 10), 2) . ",";
    }
    if (isset($r[5]) and $r[5] != "") {
        $sur6 = $row_set->la_somme_coefficient6;
        if ($sur6 == 0) {
            $sur6 = 1;
        }
        $el .= round((($row_set->la_somme_e6 / $sur6) * 10), 2) . ",";
    }
    if (isset($r[6]) and $r[6] != "") {
        $sur7 = $row_set->la_somme_coefficient7;
        if ($sur7 == 0) {
            $sur7 = 1;
        }
        $el .= round((($row_set->la_somme_e7 / $sur7) * 10), 2) . ",";
    }
    if (isset($r[7]) and $r[7] != "") {
        $sur8 = $row_set->la_somme_coefficient8;
        if ($sur8 == 0) {
            $sur8 = 1;
        }
        $el .= round((($row_set->la_somme_e8 / $sur8) * 10), 2) . ",";
    }
    if (isset($r[8]) and $r[8] != "") {
        $sur9 = $row_set->la_somme_coefficient9;
        if ($sur9 == 0) {
            $sur9 = 1;
        }
        $el .= round((($row_set->la_somme_e9 / $sur9) * 10), 2) . ",";
    }
    if (isset($r[9]) and $r[9] != "") {
        $sur10 = $row_set->la_somme_coefficient10;
        if ($sur10 == 0) {
            $sur10 = 1;
        }
        $el .= round((($row_set->la_somme_e10 / $sur10) * 10), 2) . ",";
    }
    if (isset($r[10]) and $r[10] != "") {
        $sur11 = $row_set->la_somme_coefficient11;
        if ($sur11 == 0) {
            $sur11 = 1;
        }
        $el .= round((($row_set->la_somme_e11 / $sur11) * 10), 2) . ",";
    }
    if (isset($r[11]) and $r[11] != "") {
        $sur12 = $row_set->la_somme_coefficient12;
        if ($sur12 == 0) {
            $sur12 = 1;
        }
        $el .= round((($row_set->la_somme_e12 / $sur12) * 10), 2) . ",";
    }


    if ($row_set->la_somme_coefficient1 > 0) {


        $dataset .= "{
						label: '" . addslashes(dec($row_set->discipline)) . "',
						backgroundColor: '" . $la_couleur[$cl] . "',
						borderColor: '" . $la_couleur[$cl] . "',
						data: [
							0,
							" . trim($el, ",") . "
						],
						fill: false
					},";
    }
}

$lib = explode(";", $graph_periode);
$t = "";
for ($a = 0; $a < count($lib); $a++) {
    if ($lib[$a] != "") {
        $t .= "'" . $lib[$a] . "',";
    }
}

?>
<script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    //==================== PIE1 ====================
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    <?php echo $sexe[0] ?>,
                    <?php echo $sexe[1] ?>,
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                ' F <?php
                    $sur_calcul = (intval($sexe[0]) + intval($sexe[1]));
                    if ($sur_calcul <= 0) {
                        $sur_calcul = 1;
                    }
                    echo round((intval($sexe[0]) * 100) / $sur_calcul) . "%";
                    ?> ',
                ' M <?php
                    $sur_calcul = (intval($sexe[0]) + intval($sexe[1]));
                    if ($sur_calcul <= 0) {
                        $sur_calcul = 1;
                    }
                    echo round((intval($sexe[1]) * 100) / $sur_calcul) . "%"; ?> '
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            }
        }
    };
    //============================ BAR 1 ==========================
    var color = Chart.helpers.color;
    var barChartData = {
        labels: [<?php echo $pieces[1]; ?>],
        datasets: [{
            label: 'Total ',
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1,
            data: [
                <?php echo $pieces[0]; ?>
            ]
        }]

    };

    /* ============================= BAR 2 ============================== */
    var barChartData2 = {
        labels: [<?php echo $pieces[1]; ?>],
        datasets: [{
            label: 'Total F ',
            backgroundColor: 'rgb(255, 99, 132, 0.3)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1,
            data: [
                <?php echo $sexec[1] ?>
            ]
        }, {
            label: 'Total M ',
            backgroundColor: 'rgb(54, 162, 235, 0.3)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 1,
            data: [
                <?php echo $sexec[0] ?>
            ]
        }]

    };

    // =======================  LINE  ==========================
    var configLine = {
        type: 'line',
        data: {
            labels: ['__', <?php echo trim(trim($t), ",") ?>],
            datasets: [

                <?php echo trim($dataset, ",") ?>

            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: '<?php echo $lang['progression_discipline'][$_SESSION['lang']] ?>'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: false,
                        labelString: 'Value'
                    }
                }]
            }
        }
    };

    //=============================================================
    window.onload = function() {
        var ctx = document.getElementById('chart-area').getContext('2d');
        window.myPie = new Chart(ctx, config);

        //===========

        var ctx2 = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx2, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: '<?php echo html_entity_decode($lang['listeEleveClasse'][$_SESSION['lang']]) . " : " . dec($anneeactives->periode) ?>'
                },
                scaleShowValues: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            autoSkip: false
                        }
                    }]
                }
            }
        });
    };

    //============================

    var ctx3 = document.getElementById('canvas2').getContext('2d');
    window.myBar = new Chart(ctx3, {
        type: 'bar',
        data: barChartData2,
        options: {
            responsive: true,
            legend: {
                display: false,
            },
            title: {
                display: true,
                text: '<?php echo html_entity_decode($lang['listeEleveClasseSexe'][$_SESSION['lang']]) . " : " . $annee ?>'
            },
            scaleShowValues: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });
    // ==============================================

    var ctx4 = document.getElementById('canvas3').getContext('2d');
    window.myLine = new Chart(ctx4, configLine);

    // ============================================== 	
</script>

<script>
    var config_a = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    <?= $annee_pie[1] ?>, <?= $annee_pie[2] ?>
                ],
                backgroundColor: [
                    'rgb(46, 139, 87)',
                    'rgb(220, 20, 60)',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                ' S ',
                ' E '
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            }
        }
    };

    var ctx_aa = document.getElementById('moy1').getContext('2d');
    window.myPie = new Chart(ctx_aa, config_a);
</script>


<script>
    <?php for ($r = 0; $r < count($periode); $r++) {
        $pp = explode('__', $periode[$r]);
    ?>
        var config_p<?php echo $r ?> = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        <?= $pp[1] ?>, <?= $pp[2] ?>
                    ],
                    backgroundColor: [
                        'rgb(46, 139, 87)',
                        'rgb(220, 20, 60)',
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    ' S ',
                    ' E '
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                }
            }
        };
        $("#titre<?= $r ?>").html('<?= $pp[0] ?>');
        var ctx_p<?php echo $r ?> = document.getElementById('p<?php echo $r ?>').getContext('2d');
        window.myPie = new Chart(ctx_p<?php echo $r ?>, config_p<?php echo $r ?>);

    <?php } ?>
</script>