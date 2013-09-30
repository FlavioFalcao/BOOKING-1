                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> REGISTRAR COSTOS FIJOS DEL CIERRE:</span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                  <table  class="table table-bordered table-striped" >
                                    <thead>
                                                 <tr>                                                       
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
                                      <tr>                   
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['id_consolidado'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['mes_c'].'/'.$listar_fila_cierre_de_mes['ano_c'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['facturado'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['cfijo'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['cfijoper'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['cvariable'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['tcostes'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['profit'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['porcentaje'].'%' ?></b></td>
                                      </tr>
                           
                                    </tbody>
                                  </table>
                                                <div class="formEl_b">
                                                        
                                                        <?php
                                                        echo form_open('cierre_de_mes/registrar_costo_fijo');
                                                        ?>
                                        <fieldset>
                                          <legend>NUEVO COSTO FIJO</legend>
                                          <input name="idcon" type="hidden" value="<?php echo $idcon; ?>" />
                                          <div class="section">
                                            <label>MES</label>   
                                              <div>
                                               <label><?php echo $mes ?></label>
                                               <input name="mes" type="hidden" value="<?php echo $mes; ?>" />
                                            </div>
                                          </div>
                                          <div class="section">
                                            <label>AÑO</label>   
                                              <div>
                                               <label><?php echo $ano ?></label>
                                               <input name="ano" type="hidden" value="<?php echo $ano; ?>" />
                                            </div>
                                          </div>
                                          <div class="section">
                                            <label>APARTAMENTO</label>   
                                              <div>
                                                <select required name="apart" data-placeholder="Seleccione apartamento..." class="chzn-select" >
                                                  <option />
                                              <?php foreach($listar_apartamentos as $rowap): ?>
                                                  <option value="<?php echo $rowap['idapart'] ?>"> <?php echo $rowap['descripcion_ap'] ?> </option>
                                               <? endforeach ?>
                                              </select>
                                              <span style="color:#FF0000;" class="f_help"> (*) </span>
                                            </div>
                                          </div>
                                           <div class="section">
                                              <label> INGRESE COSTE FIJO </label>
                                                <div> <input name="monto" required type="text" class=" large" /><span class="f_help">*</span></div>
                                            </div>
                                         
                                                    <div class="section last">
                                                      <div>
                                                        <input type="submit" value="REGISTRAR" class="uibutton loading" title="Validando">
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
                                    <span><i class="icon-table"></i> REGISTRAR COSTOS PERMANENTES DEL CIERRE: </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                  <table  class="table table-bordered table-striped" >
                                    <thead>
                                                 <tr>                                                       
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
                                      <tr>                   
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['id_consolidado'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['mes_c'].'/'.$listar_fila_cierre_de_mes['ano_c'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['facturado'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['cfijo'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['cfijoper'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['cvariable'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['tcostes'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['profit'] ?></b></td>
                                            <td  align="center"><?php echo $listar_fila_cierre_de_mes['porcentaje'].'%' ?></b></td>
                                      </tr>
                           
                                    </tbody>
                                  </table>
                                   <div class="formEl_b">
                                    <?php
                                      echo form_open('cierre_de_mes/registrar_costo_permanente');
                                    ?>
                                    <fieldset>
                                          <legend>NUEVO COSTO PERMANENTE</legend>
                                    <input name="idcon" type="hidden" value="<?php echo $idcon; ?>" />
                                          <div class="section">
                                            <label>MES</label>   
                                              <div>
                                               <label><?php echo $mes ?></label>
                                                <input name="mes" type="hidden" value="<?php echo $mes; ?>" />
                                            </div>
                                          </div>
                                          <div class="section">
                                            <label>AÑO</label>   
                                              <div>
                                               <label><?php echo $ano ?></label>
                                               <input name="ano" type="hidden" value="<?php echo $ano; ?>" />
                                            </div>
                                          </div>
                                          <div class="section">
                                            <label> INGRESE COSTE PERMANENTE </label>
                                              <div> <input name="monto" required type="text" class=" large" /><span class="f_help">*</span></div>
                                          </div>
                                          <div class="section last">
                                                      <div>
                                                        <input type="submit" value="REGISTRAR" class="uibutton loading" title="Validando">
                                                      </div>
                                                    </div>
                                    </fieldset>
                                      <div class="clearfix"></div>
                                  </div>
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