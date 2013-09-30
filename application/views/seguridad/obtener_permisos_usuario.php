                  <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i><a href="<?php echo base_url(); ?>seguridad"> SEGURIDAD > </a> ASIGNAR PERMISOS AL USUARIO: </span>
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
                                                   <?php echo validation_errors(); ?>
                                                        
                                                        <?php
                                                        $attributes = array('id' => 'demo');
                                                        echo form_open('seguridad/asignar_permisos',$attributes);
                                                        ?>
                                                    <fieldset> 
                                            <input name="idusuario" type="hidden" value="<?php echo $listar_usuario_fila['id_usuario'] ?>" />
                                                    <legend>ASIGNAR PERMISOS</legend>
                                                     <?php
                                                        $permisos_asignados = array();
                                                            foreach ($listar_permisos_x_usuario as $rowper):
                                                                if($listar_usuario_fila['id_usuario'] == $rowper['id_usuario_per']){
                                                                    $permisos_asignados[] = $rowper['descripcionper']

                                                      ?>
                                                        <div class="section">
                                                           <label> <?php echo $rowper['descripcionper']; ?> <small>Check/Uncheck</small></label>
                                                          <div>
                                                              <div class="checksquared">
                                                                   <input checked type="checkbox" name="permisos[]" id="checkNormal"  value="<?php echo $rowper['idpermiso']; ?>"/>
                                                                <label for="checkNormal" title=""></label>
                                                             </div>
                                                          </div>
                                                        </div>

                                                        <?php 
                                                            }
                                                        ?> 
                                                        <?php endforeach //NO ASIGNADOS ?>
                                                         <?php 
                                                                            
                                                        //print_r($permisos_asignados);
                                                            foreach ($listar_permisos_x_usuario_sin_asignar as $rowsinasig):
                                                                 $contador = 0;
                                                                foreach ($permisos_asignados as $key => $value) {
                                                                    if( $permisos_asignados[$key] == $rowsinasig['descripcionper'] ){
                                                                        $contador+=1;
                                                                    }
                                                                }
                                                                if($contador == 0){
                                                        ?>
                                                          <div class="section">
                                                           <label> <?php echo $rowsinasig['descripcionper']; ?> <small>Check/Uncheck</small></label>
                                                          <div>
                                                              <div class="checksquared">
                                                                   <input unchecked type="checkbox" name="permisos[]" id="checkNormal"  value="<?php echo $rowsinasig['idpermiso']; ?>"/>
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