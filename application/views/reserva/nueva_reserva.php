<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
          <div class="row-fluid">
                    
                    		<!-- Widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-align-left"></i> Registrar Reservacion </span>
                                </div><!-- End widget-header -->	
                                
                                <div class="widget-content">
                                    <div class="formEl_b">
                                            <?php
                                                $attributes = array('id' => 'demo');
                                                echo form_open('reserva/registrar_reserva',$attributes);
                                            ?>
                                          <fieldset>
                                            <legend>DATOS DEL CLIENTE</legend>

                                            <div class="section">
                                                <label> NOMBRE </label>   
                                                <div> <input name="nombre"  required type="text" class=" large" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> APELLIDO </label>   
                                                <div> <input name="apellido"  required type="text" class=" large" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> EMAIL </label>   
                                                <div> <input name="email"  required type="text" class=" large" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> TELEFONO </label>   
                                                <div> <input name="telefono"  type="text" class="medium" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> PROCEDENCIA </label>   
                                                <div> <input name="proc"  type="text" class="medium" /><span class="f_help"></span></div>
                                            </div>
                                          </fieldset>
                                          <fieldset>
                                            <legend>DATOS DE LA RESERVA</legend>
                                            <div class="section">
                                            <label>cuenta</label>   
                                              <div>
                                                <select name="idcuenta"  required data-placeholder="Seleccione cuenta..." class="chzn-select" tabindex="2">
                                                <option value="" /> 
                                               <?php foreach($listar_cuentas_usuario as $rowcu): ?>
                                                <option value="<?php echo $rowcu['idcuenta'] ?>"> <?php echo $rowcu['descripcion_cu'] ?> </option>
                                               <? endforeach ?>
                                              </select>       
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkin</label>
                                                <div>
                                                    <input name="entrada"  required name="fci" id="entrada" type="text" tabindex="1" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkout</label>
                                                <div>
                                                    <input name="salida"  required name="fco" id="salida" type="text" tabindex="1" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                            <label>Tipo de Reserva</label>   
                                              <div>
                                                <select name="idtipo"  required data-placeholder="Seleccione opcion" class="chzn-select" tabindex="2">
                                                <option value="" /> 
                                                <?php foreach($listar_tipo_venta as $rowtv): ?>
                                                  <option value="<?php echo $rowtv['idtipo_venta'] ?>"> <?php echo $rowtv['tv_descripcion'] ?> </option>
                                               <? endforeach ?>
                                               
                                              </select>       
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. ADULTOS </label>   
                                                <div> <input  name="na"  type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. NIÑOS </label>
                                                <div> <input name="ni"  type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> APARTAMENTO </label>   
                                                <div> <input name="apart"  type="text" class="medium" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM HABITACIONES </label>    
                                                <div> <input name="nh"  required type="text" class="xsmall" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            
                                        </fieldset>
                                        <fieldset>
                                            <legend>CONFIRMACION DE RESERVA</legend>
                                            <div class="section">
                                                <label> MEDIO DE PAGO - GARANTIA</label>
                                              <div> 
                                                <select name="idtipopago"  data-placeholder="Seleccion opcion" class="chzn-select" tabindex="2">
                                                  <option value="" /> 
                                                    <?php foreach($listar_tipo_pago as $rowtp): ?>
                                                      <option value="<?php echo $rowtp['idtipo_pago_garantia'] ?>"> <?php echo $rowtp['descripcion_pg'] ?> </option>
                                                    <? endforeach ?>
                                               
                                                </select> 
                                              </div> 
                                            </div>   
                                            <div class="section">
                                                <label> GARANTIA </label>
                                                <div> <input name="garantia"  type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>   
                                             <div class="section">
                                                <label> PRECIO/NOCHE </label>
                                                <div> <input name="pn"  type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                             <div class="section">
                                                <label> LIMPIEZA </label>
                                                <div> <input name="limpieza"  type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                             <div class="section">
                                                <label> TRANSPORTE </label>
                                                <div> <input name="transporte"  type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label>MENSAJE</label>   
                                                <div> 
                                                  <textarea name="mensaje"  id="Textareaelastic" class="large" cols="" rows=""></textarea>
                                                </div>   
                                                
                                             </div>
                                            <div class="section">
                                                <label> ¿RESERVA CONFIRMADA?<small>¿Cliente dejó ganarantía de pago?</small></label>
                                               <div>
                                                     <div class="checksquared">
                                                            <input type="checkbox" name="estado" id="checkNormal" value="2" />
                                                            <label for="checkNormal" ></label>
                                                     </div>   
                                                    <br><label style="color:#F00; font-size:9px;" for="requerido" title="">()Solo se marcara esta opcion, si el cliente dejo una garantia de pago</label>
                                               </div>
                                            </div>
                                            
                                        </fieldset>
                                         <?php 
                                                  foreach ($permisos as $permiso) {
                                                      if ($permiso['idpermiso'] == 4) {
                                                ?> 
                                            <div class="section last">
                                                <div>
                                                  <input type="submit" value="REGISTRAR" class="uibutton loading" title="Validando">

                                                </div>
                                           </div>
                                          <?php
                                              }
                                            }
                                          ?>
                                        </form>
                                      </div>
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->