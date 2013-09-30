                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> Registrar Cierre </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">

                                                <div class="formEl_b">
                                                   <?php echo validation_errors(); ?>
                                                        
                                                        <?php
                                                        echo form_open('cierre_de_mes/registrar_cierre');
                                                        ?>
                                                    <fieldset>
                                                    <legend>NUEVO CIERRE DE MES</legend>
                                          <div class="section">
                                            <label>MES</label>   
                                              <div>
                                                <select required name="mes" data-placeholder="Seleccione mes..." class="chzn-select" >
                                                  <option />
                                              <?php foreach($listar_meses as $rowm): ?>
                                                  <option value="<?php echo $rowm['mes'] ?>"> <?php echo $rowm['mes'] ?> </option>
                                               <? endforeach ?>
                                              </select>
                                              <span style="color:#FF0000;" class="f_help"> (*) </span>
                                            </div>
                                          </div>
                                          <div class="section">
                                            <label>AÑO</label>
                                              <div>
                                                <select required name="ano" data-placeholder="Seleccione año..." class="chzn-select" >
                                                  <option />
                                              <?php foreach($listar_anos as $rowa): ?>
                                                  <option value="<?php echo $rowa['ano'] ?>"> <?php echo $rowa['ano'] ?> </option>
                                               <? endforeach ?>
                                              </select>
                                              <span style="color:#FF0000;" class="f_help"> (*) </span>
                                            </div>
                                          </div>
                                                    <div class="section last">
                                                      <div>
                                                        <input type="submit" value="REGISTRAR" class="uibutton loading" title="Saving">
                                                      </div>
                                                    </div>
                                                    </fieldset>
                                                  </form>
                                                </div>
                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> Lista de Cierres </span>
                                  <div class="btn-group pull-right btn-square padding-5">
                                    <a class="btn  btn-large " href="<?php echo base_url().'cierre_de_mes/exp_lista_cierres/';?>"><i class="icon-th-list"></i> Exportar a Excel</a>
                                  </div>
                                </div><!-- End widget-header -->    
                                 
                        <div class="widget-content">

                          <table  class="table table-bordered table-striped" id="dataTable1">
                            <thead>
                               <tr>
                                                                                            
                                    <th align="center" >ACCION</th>
                                    <th align="center" >ID</th>
                                    <th align="center" >MES/AÑO</th>
                                    <th align="center" >FACTURADO</th>
                                    <th align="center" >C.F</th>
                                    <th align="center" >C.F.P</th>
                                    <th align="center" >C.V</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >PROFIT</th>
                                    <th align="center" >PORCENTAJE</th>

                                                                      
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_cierre as $rowlc):
                                       ?>
                    
                                          <tr>
                                            <td  align="center">
                      
                                              <span class="tip " >
                                                <a onclick="return anular();" href="<?php echo base_url().'cierre_de_mes/eliminar_cierre/'.$rowlc['id_consolidado']; ?>" title="Eliminar" >    
                                                <img src="<?php echo base_url()?>assets/images/icon/icon_delete.png" />
                                                </a>
                                              </span>
                                              <span class="tip " >
                                                <a onclick="return actualizar();" href="<?php echo base_url().'cierre_de_mes/actualizar_cierre/'.$rowlc['id_consolidado'].'/'.$rowlc['mes_c'].'/'.$rowlc['ano_c']; ?>" title="Actualizar" >    
                                                <img src="<?php echo base_url()?>assets/images/icon/actualizar.png" />
                                                </a>
                                              </span>
                                              <span class="tip " >
                                                <a href="<?php echo base_url().'cierre_de_mes/detalles_de_cierre/'.$rowlc['mes_c'].'/'.$rowlc['ano_c']; ?>" title="Ver Detalles" >    
                                                <img src="<?php echo base_url()?>assets/images/icon/detalle.png" />
                                                </a>
                                              </span>
                                              <span class="tip " >
                                                <a href="<?php echo base_url().'cierre_de_mes/graficos_del_mes/'.$rowlc['mes_c'].'/'.$rowlc['ano_c']; ?>" title="Ver Gráficos" >    
                                                <img src="<?php echo base_url()?>assets/images/icon/grafico.png" />
                                                </a>
                                              </span>
                                              <span class="tip " >
                                                <a href="<?php echo base_url().'cierre_de_mes/agregar_costos/'.$rowlc['id_consolidado'].'/'.$rowlc['mes_c'].'/'.$rowlc['ano_c']; ?>" title="Actualizar Costos" >    
                                                <img src="<?php echo base_url()?>assets/images/icon/costo.png" />
                                                </a>
                                              </span>
                                            
                                            </td>     
  
                                            <td  align="center"><?php echo $rowlc['id_consolidado'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['mes_c'].'/'.$rowlc['ano_c'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['facturado'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['cfijo'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['cfijoper'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['cvariable'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['tcostes'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['profit'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['porcentaje'].'%' ?></b></td>

                                          </tr>
                    
        <?php
   endforeach
?>
                                       </tbody>
                                    </table>
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
<script type="text/javascript">
function actualizar() {
var pregunta = confirm("Realmente desea actualizar el registro?")
if (pregunta){
// no haces naday el form se procesa
}
else{
return false;
}
}
//]]>
</script>