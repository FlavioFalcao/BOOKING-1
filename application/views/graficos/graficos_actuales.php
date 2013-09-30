<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
<style type="text/css">
.graficos {
    width: 100%;
    height: 500px;
}
span.align-left{
    float: left;
}
span.align-right{
    float: right;
}
span.total{
    font-size: 16px;
    font-weight: bold;
    color: #FF0000;
}
small.filtro{
    color: #FF0000;
}
</style>
<script type="text/javascript">
$(function () { 
    var data = [
        <?php 
            foreach($listar_facturado_por_apartamento as $rowfxa):
        ?>
        {label: "<?php echo strtoupper($rowfxa['descripcion_ap']).'('.$rowfxa['monto_total'].')' ?>", data: <?php if(empty($rowfxa['monto_total'])) { echo 0 ;}
        else{ echo $rowfxa['monto_total']; } ?>},
        <?php
            endforeach
        ?>
    ];

    var options = {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                labelBoxBorderColor: "#7C1C1D",
                show: true,
                labelFormatter: function (label, series) {
                            return '<span style="font-size:12px;">' + label + '<span style="color:#FF0000">' + Math.round(series.percent) + '%</span></span>';
                        },
            },
            grid: {
                autoHighlight: true,
                hoverable: true,
                clickable: true
            }
         };

    $.plot($("#facturado_x_apartamento"), data, options);
     $("#facturado_x_apartamento").bind("plothover", function(event, pos, obj){
        if (!obj){return;}
        percent = parseFloat(obj.series.percent).toFixed(2);

        var html = [];
        html.push("<div style=\"flot:left;height:20px;text-align:center;padding:5px;margin:10px;border:1px solid black;background-color:", obj.series.color, "\">",
                  "<span style=\"font-weight:bold;color:black\">", obj.series.label, " (", percent, "%)</span>",
                  "</div>");

        $("#interactivo_fxa").html(html.join(''));        
    });
});
</script>
<script type="text/javascript">
$(function () { 
    var data = [
        <?php 
            foreach($listar_profit_por_apartamento as $rowpxa):
        ?>
        {label: "<?php echo strtoupper($rowpxa['descripcion_ap']).'('.$rowpxa['profit'].')' ?>", data: <?php if(empty($rowpxa['profit'])) { echo 0 ;}
        else{ echo $rowpxa['profit']; } ?>},
        <?php
            endforeach
        ?>
    ];

    var options = {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                labelBoxBorderColor: "#7C1C1D",
                show: true,
                labelFormatter: function (label, series) {
                            return '<span style="font-size:12px;">' + label + '<span style="color:#FF0000">' + Math.round(series.percent) + '%</span></span>';
                        },
            },
            grid: {
                autoHighlight: true,
                hoverable: true,
                clickable: true
            }
         };

    $.plot($("#profit_x_apartamento"), data, options);
     $("#profit_x_apartamento").bind("plothover", function(event, pos, obj){
        if (!obj){return;}
        percent = parseFloat(obj.series.percent).toFixed(2);

        var html = [];
        html.push("<div style=\"flot:left;height:20px;text-align:center;padding:5px;margin:10px;border:1px solid black;background-color:", obj.series.color, "\">",
                  "<span style=\"font-weight:bold;color:black\">", obj.series.label, " (", percent, "%)</span>",
                  "</div>");

        $("#interactivo_pxa").html(html.join(''));        
    });
});
</script>
<script type="text/javascript">
$(function () { 
    var data = [
        <?php 
            foreach($listar_facturado_por_tipodeventa as $rowfptv):
        ?>
        {label: "<?php echo strtoupper($rowfptv['tv_descripcion']).'('.$rowfptv['monto_total'].')' ?>", data: <?php if(empty($rowfptv['monto_total'])) { echo 0 ;}
        else{ echo $rowfptv['monto_total']; } ?>},
        <?php
            endforeach
        ?>
    ];

    var options = {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                labelBoxBorderColor: "#7C1C1D",
                show: true,
                labelFormatter: function (label, series) {
                            return '<span style="font-size:12px;">' + label + '<span style="color:#FF0000">' + Math.round(series.percent) + '%</span></span>';
                        },
            },
            grid: {
                autoHighlight: true,
                hoverable: true,
                clickable: true
            }
         };

    $.plot($("#facturado_x_tipodeventa"), data, options);
     $("#facturado_x_tipodeventa").bind("plothover", function(event, pos, obj){
        if (!obj){return;}
        percent = parseFloat(obj.series.percent).toFixed(2);

        var html = [];
        html.push("<div style=\"flot:left;height:20px;text-align:center;padding:5px;margin:10px;border:1px solid black;background-color:", obj.series.color, "\">",
                  "<span style=\"font-weight:bold;color:black\">", obj.series.label, " (", percent, "%)</span>",
                  "</div>");

        $("#interactivo_fptv").html(html.join(''));        
    });
});
</script>

<script type="text/javascript">
$(function () { 
    var data = [
        <?php 
            foreach($listar_facturado_por_cuenta as $rowfpc):
        ?>
        {label: "<?php echo strtoupper($rowfpc['descripcion_cu']).'('.$rowfpc['monto_total'].')' ?>", data: <?php if(empty($rowfpc['monto_total'])) { echo 0 ;}
        else{ echo $rowfpc['monto_total']; } ?>},
        <?php
            endforeach
        ?>
    ];

    var options = {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                labelBoxBorderColor: "#7C1C1D",
                show: true,
                labelFormatter: function (label, series) {
                            return '<span style="font-size:12px;">' + label + '<span style="color:#FF0000">' + Math.round(series.percent) + '%</span></span>';
                        },
            },
            grid: {
                autoHighlight: true,
                hoverable: true,
                clickable: true
            }
         };

    $.plot($("#facturado_x_cuenta"), data, options);
     $("#facturado_x_cuenta").bind("plothover", function(event, pos, obj){
        if (!obj){return;}
        percent = parseFloat(obj.series.percent).toFixed(2);

        var html = [];
        html.push("<div style=\"flot:left;height:20px;text-align:center;padding:5px;margin:10px;border:1px solid black;background-color:", obj.series.color, "\">",
                  "<span style=\"font-weight:bold;color:black\">", obj.series.label, " (", percent, "%)</span>",
                  "</div>");

        $("#interactivo_fpc").html(html.join(''));        
    });
});
</script>
    <div class="row-fluid">
        <div class="widget  span12 clearfix">
                            
            <div class="widget-header">
                <span><i class="icon-table"></i>
                        <a href="<?php echo base_url();?>reporte_actual.html" title="Ir a los Reportes">
                            VENTAS DEL MES ACTUAL - <?php echo strtoupper(date('F Y')).' > ';  ?> 
                        </a>
                            GRAFICOS DEL MES ACTUAL - <?php echo strtoupper(date('F Y'));  ?> 
                </span>
            </div><!-- End widget-header -->    
        </div><!-- widget  span12 clearfix-->
    </div><!-- row-fluid -->
                <?php
                $bandera_fxa = 0;
                    foreach ($permisos as $permiso) {
                        if ($permiso['idpermiso'] == 7) {
                            $bandera_fxa = 1;
                        }
                    }
                ?>
                <?php
                    if($bandera_fxa != 1){
                ?>
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR APARTAMENTO <?php echo strtoupper(date('F Y')).' > ';  ?> </span>
                                </div><!-- End widget-header -->    
                                
                              <div class="widget-content">
                                
                                <div >
                                    <span id="interactivo_fxa"></span>
                                </div>

                                <div class="graficos" id="facturado_x_apartamento"></div>
                                <span class="align-right total">TOTAL : <?php echo $monto_total_fxa; ?></span>
                              <div class="clearfix"></div>
                              </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->
                    </div><!-- row-fluid -->
                <?php
                    }
                ?>
                <?php
                $bandera_pxa = 0;
                    foreach ($permisos as $permiso) {
                        if ($permiso['idpermiso'] == 8) {
                            $bandera_pxa = 1;
                        }
                    }
                ?>
                <?php
                    if($bandera_pxa != 1){
                ?>
                    <div class="row-fluid">
                            <div class="widget span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> PROFIT POR APARTAMENTO  <small class="filtro"><?php echo strtoupper(date('F Y')).' > ';  ?> </small></span>
                                </div><!-- End widget-header -->    
                                
                              <div class="widget-content">
                                
                                <div >
                                    <span id="interactivo_pxa"></span>
                                </div>

                                <div class="graficos" id="profit_x_apartamento"></div>
                                <span class="align-right total">TOTAL : <?php echo $monto_total_pxa; ?></span>
                              <div class="clearfix"></div>
                              </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->
                    </div><!-- row-fluid -->
                <?php
                    }
                ?>
                <?php
                $bandera_fxtv = 0;
                    foreach ($permisos as $permiso) {
                        if ($permiso['idpermiso'] == 9) {
                            $bandera_fxtv = 1;
                        }
                    }
                ?>
                <?php
                    if($bandera_fxtv != 1){
                ?>
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR TIPO DE VENTA  <small class="filtro"><?php echo strtoupper(date('F Y')).' > ';  ?> </small></span>
                                </div><!-- End widget-header -->    
                                
                              <div class="widget-content">
                                
                                <div >
                                    <span id="interactivo_fptv"></span>
                                </div>

                                <div class="graficos" id="facturado_x_tipodeventa"></div>
                                <span class="align-right total">TOTAL : <?php echo $monto_total_fptv; ?></span>
                              <div class="clearfix"></div>
                              </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->
                    </div><!-- row-fluid -->
                    <?php
                        }
                    ?>
                    <?php
                    $bandera_fxc = 0;
                    foreach ($permisos as $permiso) {
                        if ($permiso['idpermiso'] == 10) {
                            $bandera_fxc = 1;
                        }
                    }
                    ?>
                <?php
                    if($bandera_fxc != 1){
                ?>
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR CUENTAS  <small class="filtro"><?php echo strtoupper(date('F Y')).' > ';  ?> </small></span>
                                </div><!-- End widget-header -->    
                                
                              <div class="widget-content">
                                
                                <div >
                                    <span id="interactivo_fpc"></span>
                                </div>

                                <div class="graficos" id="facturado_x_cuenta"></div>
                                <span class="align-right total">TOTAL : <?php echo $monto_total_fpc; ?></span>
                              <div class="clearfix"></div>
                              </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->
                    </div><!-- row-fluid -->
                    <?php
                        }
                    ?>