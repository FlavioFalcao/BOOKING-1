<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> 
                                      VENTAS DEL MES ACTUAL - <?php echo strtoupper(date('F Y')).' > ';  ?> 
                                      <a href="<?php echo base_url();?>reporte_actual/graficos_actuales.html" title="Ir a los Gráficos">
                                        GRAFICOS DEL MES ACTUAL - <?php echo strtoupper(date('F Y'));  ?>
                                      </a>
                                    </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                          <!-- Table UITab -->
                                        <div id="UITab" style="position:relative;">
                                          <ul class="tabs">
                                              <li ><a href="#tab1"> Ventas del Mes Actual - Detalle </a></li>
                                              <li ><a href="#tab2"> Ventas del Mes Actual - Por Tipo de Venta </a></li>        
                                          </ul>
          <div class="tab_container">                         
                <div id="tab1" class="tab_content"> 
                    <div class="btn-group pull-top-right btn-square">
                      <a class="btn  btn-large " href="<?php echo base_url().'reporte_actual/exp_venta_actual_detalle';?>"><i class="icon-th-list"></i> Exportar a Excel</a>
                    </div>                           
                          <table  class="data_table2 table table-bordered table-striped" >
                            <thead>
                               <tr>
                                                                                            
                                   <th align="center" >CLIENTE</th>
                                   <th align="center" >TIPO DE VENTA</th>
                                    <th align="center" >APARTAMENTO</th>
                                    <th align="center" >ENTRADA/SALIDA</th>
                                    <th align="center" >NUM. NOCHES</th>
                                    <th align="center" >FACTURADO</th>
                                    <th align="center" >C. FIJOS</th>
                                    <th align="center" >C. VARIABLES</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >PROFIT</th>
                                    <th align="center" >PORCENTAJE</th>
                                    <th align="center" >PROCEDENCIA</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_ventas_actuales as $rowlva):
                                       ?>
                    
                                          <tr>
                                            <td  align="center"><?php echo $rowlva['clientev'] ?></b></td>
                                            <td  align="center"><?php echo $rowlva['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowlva['descripcion_ap'] ?></td>
                                            <td  align="center"><?php echo $rowlva['entrada'].'<br />'.$rowlva['salida'] ?></td>
                                            <td  align="center"><?php echo $rowlva['num_noches'] ?></td>
                                            <td  align="center"><?php echo $rowlva['facturado'] ?></td>
                                            <td  align="center"><?php echo $rowlva['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $rowlva['costo_variables'] ?></td>
                                            <td  align="center"><?php echo $rowlva['total_costos'] ?></td>
                                            <td  align="center"><?php echo $rowlva['profit'] ?></td>
                                            <td  align="center"><?php echo round($rowlva['porcentaje'],2).'%' ?></td>
                                            <td  align="center"><?php echo $rowlva['procedencia'] ?></td>
                                          </tr>
        <?php
   endforeach
?>
                          
                                        <tr>
                                            <td  align="center"> TOTAL </b></td>
                                            <td  align="center"></td>
                                            <td  align="center"></td>
                                            <td  align="center"></td>
                                            <td  align="center"></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['facturado'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['costo_variables'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['total_costos'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['profit'] ?></td>
                                            <td  align="center"><?php echo round($listar_total_ventas_actuales['porcentaje'],2).'%' ?></td>
                                            <td  align="center"></td>
                                          </tr>
       
                                       </tbody>
                             </table>
              </div>
              <!--tab2-->
              <div id="tab2" class="tab_content"> 
                    <div class="btn-group pull-top-right btn-square">
                      <a class="btn  btn-large " href="<?php echo base_url().'reporte_actual/exp_venta_actual_por_tipo_venta';?>"><i class="icon-th-list"></i> Exportar a Excel</a>
                    </div>                         
                          <table  class="data_table3 table table-bordered table-striped" >
                            <thead>
                               <tr>
                                    <th align="center" >TIPO DE VENTA</th>
                                    <th align="center" >TOTAL FACTURADO</th>
                                    <th align="center" >TOTAL C.FIJOS</th>
                                    <th align="center" >TOTAL C.VARIABLES</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >TOTAL PROFIT</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_ventas_por_tipodeventa_actuales as $rowvxtv):
                                       ?>
                    
                                          <tr>
                                            <td  align="center"><?php echo $rowvxtv['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['facturado'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['costo_variables'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['total_costos'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['profit'] ?></td>
                                          </tr>
        <?php
   endforeach
?>
                                       </tbody>
                             </table>
              </div>
              <!--tab3-->                 
          </div>
       </div><!-- End UITab -->
                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->
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