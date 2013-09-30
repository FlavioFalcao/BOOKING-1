                  <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i><a href="<?php echo base_url(); ?>seguridad"> SEGURIDAD > </a> ASIGNAR CUENTAS AL USUARIO: </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                           <table  class="table table-bordered table-striped" >
                                              <thead>
                                                 <tr>
                                                                                                              
                                                     <th align="center" > CODIGO </th>

                                                      <th align="center" >NICK</th>
                                                      <th align="center" >TIPO DE USUARIO</th>
                                                      <th align="center" >CELULAR</th>
                                                                                        
                                                  </tr>
                                              </thead>
                                              <tbody>

                                                            <tr>
                                                              
                                                              <td  align="center"><?php echo $listar_usuario_fila['id_usuario'] ?></b></td>

                                                              <td  align="center"><?php echo $listar_usuario_fila['nick'] ?></b></td>
                                                              <td align="center"><?php echo $listar_usuario_fila['descripcion_us']; ?></td>
                                                              <td align="center"><?php echo $listar_usuario_fila['celular']; ?></td>
                                                            </tr>
                           
                                                </tbody>
                                              </table>
                                                <div class="formEl_b">
                                                      
                                                        <?php
                                                        $attributes = array('id' => 'demo');
                                                        echo form_open('seguridad/asignar_cuentas',$attributes);
                                                        ?>
                                                    <fieldset>
                                            <input name="idusuario" type="hidden" value="<?php echo $listar_usuario_fila['id_usuario'] ?>" />
                                                    <legend>ASIGNAR CUENTAS</legend>
                                                        <?php
                                                        $cuentas_asignadas = array();
                                                            foreach ($listar_cuentas_x_usuario as $rowcu):
                                                                if($listar_usuario_fila['id_usuario'] == $rowcu['id_usuario_det']){
                                                                    $cuentas_asignadas[] = $rowcu['descripcion_cu']

                                                      ?>
                                                        <div class="section">
                                                           <label> <?php echo $rowcu['descripcion_cu']; ?> <small>Check/Uncheck</small></label>
                                                          <div>
                                                              <div class="checksquared">
                                                                   <input checked type="checkbox" name="cuentas[]" id="checkNormal"  value="<?php echo $rowcu['idcuenta']; ?>"/>
                                                                <label for="checkNormal" title=""></label>
                                                             </div>
                                                          </div>
                                                        </div>

                                                        <?php 
                                                            }
                                                        ?> 
                                                        <?php endforeach //NO ASIGNADOS ?>
                                                         <?php 
                                                                            
                                                       
                                                            foreach ($listar_cuentas_x_usuario_sin_asignar as $rowsinasig):
                                                                 $contador = 0;
                                                                foreach ($cuentas_asignadas as $key => $value) {
                                                                    if( $cuentas_asignadas[$key] == $rowsinasig['descripcion_cu'] ){
                                                                        $contador+=1;
                                                                    }
                                                                }
                                                                if($contador == 0){
                                                        ?>
                                                          <div class="section">
                                                           <label> <?php echo $rowsinasig['descripcion_cu']; ?> <small>Check/Uncheck</small></label>
                                                          <div>
                                                              <div class="checksquared">
                                                                   <input unchecked type="checkbox" name="cuentas[]" id="checkNormal"  value="<?php echo $rowsinasig['idcuenta']; ?>"/>
                                                                <label for="checkNormal" title=""></label>
                                                             </div>
                                                          </div>
                                                        </div>

                                                        <?php } endforeach ?>
                                                    </fieldset>
                                          <div class="section last">
                                                <div>
                                                  <input type="submit" value=" Asignar " class="uibutton" title = "validando.." />
                                                </div>
                                           </div>
                                                  </form>
                                                </div>
                                                
                                             
                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->