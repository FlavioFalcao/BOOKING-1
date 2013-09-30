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


                    <div class="row-fluid">
                      <div class="widget  span12 clearfix">
                        <div class="widget-header">
                          <span><i class="icon-table"></i> Generador de Graficos </span>
                        </div><!-- End widget-header -->
                        <div class="widget-content">
                            <?php
                                $attributes = array('id' => 'demo');
                                echo form_open('graficos_personalizados/filtrar_graficos_por_fechas',$attributes);
                            ?>
                             <input name="entrada" required="required" type="text"   value='<?php echo $fecha_antes; ?>' class="birthday small" >
                                <input  name="salida" required="required" type="text"  value='<?php echo $fecha_despues; ?>' class="birthday small" >
                                <input name="filtrar" type="submit" class="uibutton" value="Filtrar por fechas">

                            </form>
                            
                            <?php
                                $attributes = array('id' => 'demo');
                                echo form_open('graficos_personalizados/filtrar_graficos_por_apartamentos',$attributes);
                            ?>
                            <?php 
                                foreach($listar_apartamentos_x_venta as $rowap):
                            ?>
                                    <span> 
                                    <?php echo $rowap['descripcion_ap']; ?>
                                    <input name="entrada" type="hidden" value="<?php echo $fecha_antes; ?>">
                                    <input name="salida" type="hidden" value="<?php echo $fecha_despues; ?>">
                                    <input type="checkbox" name="apartamentos[]"  value="<?php echo $rowap['idapart']; ?>"/>
                                    </span> <?php echo '  *  '?>

                            <?php endforeach ?>
                            <div>
                                <input name="filtrar" type="submit" class="uibutton" value="Filtrar por apartamentos">
                            </div>
                            </form>
                        </div>
                      </div><!-- widget  span12 clearfix-->
                            <!-- Table widget -->
                    </div>
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
<script type="text/javascript">
$(function () { 
    var datafxa = [
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

    $.plot($("#facturado_x_apartamento"), datafxa, options);
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
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR APARTAMENTO <small class="filtro"><?php echo 'DESDE: '.$fecha_antes.' HASTA: '.$fecha_despues; ?></small></span>
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
<script type="text/javascript">
$(function () { 
    var datapxa = [
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

    $.plot($("#profit_x_apartamento"), datapxa, options);
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
                    <div class="row-fluid">
                            <div class="widget span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> PROFIT POR APARTAMENTO  <small class="filtro"><?php echo 'DESDE: '.$fecha_antes.' HASTA: '.$fecha_despues; ?></small></span>
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
<script type="text/javascript">
$(function () { 
    var datafptv = [
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

    $.plot($("#facturado_x_tipodeventa"), datafptv, options);
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
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR TIPO DE VENTA  <small class="filtro"><?php echo 'DESDE: '.$fecha_antes.' HASTA: '.$fecha_despues; ?></small></span>
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
<script type="text/javascript">
$(function () { 
    var datafpc = [
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

    $.plot($("#facturado_x_cuenta"), datafpc, options);
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
                                    <span><i class="icon-table"></i> FACTURADO POR CUENTAS  <small class="filtro"><?php echo 'DESDE: '.$fecha_antes.' HASTA: '.$fecha_despues; ?></small></span>
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
<script type="text/javascript">
function anular() {
var pregunta = confirm("Realmente desea anular el registro?")
if (pregunta){
// no haces naday el form se procesa
}
else{
return false;
}
}
//]]>
</script>