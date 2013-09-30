                  <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i><a href="<?php echo base_url(); ?>seguridad"> SEGURIDAD > </a> EDICION DEL USUARIO </span>
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
                                                        echo form_open('seguridad/editar_usuario',$attributes);
                                                        ?>
                                                    <fieldset>
                                            <input name="idusuario" type="hidden" value="<?php echo $listar_usuario_fila['id_usuario'] ?>" />
                                                    <legend>EDITAR USUARIO</legend>
                                            <div class="section">
                                                <label> NICK </label>   
                                                <div> <input required name="nick" type="text" class=" large" value="<?php echo $listar_usuario_fila['nick'] ?>" />
                                                  <span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> PASSWORD </label>   
                                                <div> 
                                                  <input name="pass" autocomplete="off" type="password" class=" large" />
                                                  <span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                            <label>TIPO DE USUARIO</label>   
                                              <div>
                                                <select required name="idtipous" data-placeholder="Seleccione opcion..." class="chzn-select" tabindex="2">
                                                  <option value="<?php echo $listar_usuario_fila['tipo_usuario_id_tipous'] ?>"> <?php echo $listar_usuario_fila['descripcion_us'] ?> </option>
                                              <?php foreach($listar_tipo_usuario as $rowtu): ?>
                                              <?php if($rowtu['id_tipous'] != $listar_usuario_fila['tipo_usuario_id_tipous']){ ?>
                                                  <option value="<?php echo $rowtu['id_tipous'] ?>"> <?php echo $rowtu['descripcion_us'] ?> </option>
                                               <?php } endforeach ?>
                                              </select>
                                              <span style="color:#FF0000;" class="f_help"> (*) </span>
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> CELULAR </label>   
                                                <div> 
                                                  <input name="celular" type="text" class="medium" value="<?php echo $listar_usuario_fila['celular'] ?>" />
                                                  <span class="f_help"></span></div>
                                            </div>
                                                    </fieldset>
                                          <div class="section last">
                                                <div>
                                                  <input type="submit" value="Guardar datos " class="uibutton" title = "validando.." />
                                                </div>
                                           </div>
                                                  </form>
                                                </div>
                                                
                                             
                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->