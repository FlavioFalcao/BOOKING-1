<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
<style type="text/css">
.graficos {
    width: 100%;
    height: 500px;
}
.graficos-ocupabilidad {
    width: 100%;
    height: 250px;
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
                        <a href="<?php echo base_url().'cierre_de_mes/detalles_de_cierre/'.$mes.'/'.$ano;?>" title="Ir a los Detalles de Mes"> 
                            DETALLES DE VENTA - CIERRE DE MES: <?php echo strtoupper($mes.'/'.$ano).' > ';  ?>
                        </a>
                            GRAFICOS DE VENTA - CIERRE DE MES: <?php echo strtoupper($mes.'/'.$ano);  ?> 
                </span>
            </div><!-- End widget-header -->    
        </div><!-- widget  span12 clearfix-->
    </div><!-- row-fluid -->

                
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> OCUPABILIDAD POR APARTAMENTO <?php echo strtoupper($mes.'/'.$ano);  ?> </span>
                                </div><!-- End widget-header -->    
                                
                              <div class="widget-content">
                            <?php $contador = 0; ?>
                            <?php foreach($listar_facturado_por_apartamentos_entre_el_mes as $rowfxaem): ?>
                            <?php
                            $apartamento = $rowfxaem['descripcion_ap'];
                            $contador += 1; 

                            $estado = 1;

            $this->db->select('SUM( IF( EXTRACT( YEAR_MONTH FROM fecha_real_checkout) = EXTRACT(YEAR_MONTH FROM DATE_ADD('.$this->db->escape($pfechainicio).', INTERVAL 1 MONTH)) 
        and MONTH(fecha_real_checkin) = MONTH('.$this->db->escape($pfechainicio).'),
            DATEDIFF(LAST_DAY('.$this->db->escape($pfechainicio).'),fecha_real_checkin),0)) +
    SUM( IF( EXTRACT( YEAR_MONTH FROM fecha_real_checkout) = EXTRACT( YEAR_MONTH FROM fecha_real_checkin),  
        DATEDIFF(fecha_real_checkout,fecha_real_checkin),0)) + 
        
    SUM( IF( EXTRACT( YEAR_MONTH FROM fecha_real_checkin) = EXTRACT( YEAR_MONTH FROM DATE_SUB('.$this->db->escape($pfechainicio).', INTERVAL 1 MONTH)) 
        and MONTH(fecha_real_checkout) = MONTH('.$this->db->escape($pfechainicio).'),
            DATEDIFF(fecha_real_checkout,DATE('.$this->db->escape($pfechainicio).'))+1,0)) +
            
    SUM( IF (MONTH(fecha_real_checkin) != MONTH('.$this->db->escape($pfechainicio).') 
        and MONTH(fecha_real_checkout) != MONTH('.$this->db->escape($pfechainicio).'),
            DATEDIFF(LAST_DAY('.$this->db->escape($pfechainicio).'),DATE('.$this->db->escape($pfechainicio).') ),0)) +
            
    SUM( IF (EXTRACT( YEAR_MONTH FROM fecha_real_checkin) = EXTRACT( YEAR_MONTH FROM '.$this->db->escape($pfechainicio).') 
        and EXTRACT( YEAR_MONTH FROM fecha_real_checkout) > EXTRACT( YEAR_MONTH FROM DATE_ADD('.$this->db->escape($pfechainicio).', INTERVAL 1 MONTH)), 
            DATEDIFF(LAST_DAY('.$this->db->escape($pfechainicio).'),fecha_real_checkin ),0) ) +
            
    SUM( IF (EXTRACT( YEAR_MONTH FROM fecha_real_checkout) = EXTRACT( YEAR_MONTH FROM '.$this->db->escape($pfechainicio).') 
        and EXTRACT(YEAR_MONTH FROM fecha_real_checkin) < EXTRACT(YEAR_MONTH FROM DATE_SUB('.$this->db->escape($pfechainicio).', INTERVAL 1 MONTH)), 
            DATEDIFF(fecha_real_checkout,DATE('.$this->db->escape($pfechainicio).'))+1,0))
    as total_noches
            ',FALSE);
            //$this->db->select('id_ventaxapart, descripcion_ap');
            $this->db->from('wp_venta');
            $this->db->join('apartamento', 'wp_venta.id_ventaxapart = apartamento.idapart');
            $this->db->where('estado_venta', $estado);
            $this->db->where('descripcion_ap', $apartamento);
            $this->db->where('DATE(fecha_real_checkout) >',$pfechainicio);
            $this->db->where('DATE(fecha_real_checkin) <',$pfechafin);
            $query = $this->db->get();
            $listar_ocupabilidad_por_apartamento = $query->result_array();
                            ?>

<script type="text/javascript">
$(function () { 
    var data = [
        <?php foreach($listar_ocupabilidad_por_apartamento as $rowoxa): ?>
        <?php $desocupado = $dias_mes - $rowoxa['total_noches']; ?>
        {label: "<?php echo strtoupper('OCUPADO').'('.$rowoxa['total_noches'].' noches)' ?>", data: <?php if(empty($rowoxa['total_noches'])) { echo 0 ;}
        else{ echo $rowoxa['total_noches']; } ?>},
        {label: "<?php echo strtoupper('DESOCUPADO').'('.$desocupado.' noches)' ?>", data: <?php if(empty($rowoxa['total_noches'])) { echo 0 ;}
        else{ echo $dias_mes - $rowoxa['total_noches']; } ?>},
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
                position: "nw",
                labelFormatter: function (label, series) {
                            return '<span style="font-size:12px;">' + label + '<span style="color:#FF0000">' + Math.round(series.percent) + '%</span></span>';
                        },
            },
            grid: {
                autoHighlight: true,
                //clickable: true
            }
         };

    $.plot($("#grafico<?php echo $contador; ?>"), data, options);
});
</script>
                                <div class="span5 clearfix">
                                    <h2 ><?php echo strtoupper($apartamento); ?></h2>
                                    <span class="">TOTAL DE DIAS DEL MES : <?php echo $dias_mes; ?></span>
                                    <div class="graficos-ocupabilidad" id="grafico<?php echo $contador; ?>"></div>
                                    <div class="clearfix"></div>
                                    <br />
                                    <hr style="border-color:#333333" />
                                </div>
                            <?php
                                endforeach
                            ?>
                              
                              </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->
                    </div><!-- row-fluid -->
                

                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR APARTAMENTO <?php echo strtoupper($mes.'/'.$ano);  ?> </span>
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
               
                    <div class="row-fluid">
                            <div class="widget span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> PROFIT POR APARTAMENTO  <small class="filtro"><?php echo strtoupper($mes.'/'.$ano);  ?> </small></span>
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
               
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR TIPO DE VENTA  <small class="filtro"><?php echo strtoupper($mes.'/'.$ano);  ?> 
                                    </small></span>
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
                   
                    <div class="row-fluid">
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> FACTURADO POR CUENTAS  <small class="filtro"><?php echo strtoupper($mes.'/'.$ano);  ?> </small></span>
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