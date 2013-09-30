                      <div class="row-fluid">
                    
                    		<!-- Widget -->
                            <div class="widget  span12 clearfix">
          
                                <div class="widget-header">
                                    <span><i class="icon-align-left"></i>
                                    <a href="<?php echo base_url(); ?>reserva/reservaciones_entrantes" >
                                      <small> RESERVACIONES ENTRANTES > </small>
                                    </a> EDICION DE LA RESERVA </span>  
                                </div><!-- End widget-header -->	
                                
                                <div class="widget-content">
                                    <div class="formEl_b">
                                            <?php
                                                $attributes = array('id' => 'demo');
                                                echo form_open('reserva/editar_reserva_c',$attributes);
                                            ?>
                                          <fieldset>
                                            <legend>DATOS DEL CLIENTE</legend>
                                              <input  name="id_reservacion" type="hidden" value="<?php echo $listar_fila_reserva['id_reservacion'] ?>" />
                                            <div class="section">
                                                <label> NOMBRE </label>
                                                <div> 
                                                  <input name="nombre" type="text" class=" large" value="<?php echo $listar_fila_reserva['r_nombre'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label> APELLIDO </label>   
                                                <div> <input name="apellido" type="text" class=" large" value="<?php echo $listar_fila_reserva['r_apellido'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> EMAIL </label>   
                                                <div> <input name="email" type="text" class=" large" value="<?php echo $listar_fila_reserva['r_email'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> TELEFONO </label>   
                                                <div> <input name="telefono" type="text" class="medium" value="<?php echo $listar_fila_reserva['r_telefono'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> PROCEDENCIA </label>   
                                                <div> <input name="proc" type="text" class="medium" value="<?php echo $listar_fila_reserva['r_procedencia'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                          </fieldset>
                                          <fieldset>
                                            <br/>
                                            <legend>DATOS DE LA RESERVA</legend>
                                            <div class="section">
                                            <label>Cuenta</label>   
                                              <div>
                                                <select name="idcuenta" data-placeholder="Seleccione cuenta..." class="chzn-select" tabindex="2">
                                                  <option value="<?php echo $listar_fila_reserva['idcuenta']  ?>"><?php echo $listar_fila_reserva['descripcion_cu']; ?></option> 
                                                 <?php foreach($listar_cuentas_usuario as $rowcu): ?>
                                                 <?php if($rowcu['idcuenta'] != $listar_fila_reserva['idcuenta']){ ?>
                                                  <option value="<?php echo $rowcu['idcuenta'] ?>"> <?php echo $rowcu['descripcion_cu'] ?> </option>
                                               <? } endforeach ?>
                                              </select>
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkin</label>
                                                <div>
                                                    <input name="entrada" id="entrada" type="text" tabindex="1" value="<?php echo $listar_fila_reserva['entrada'] ?>" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkout</label>
                                                <div>
                                                    <input name="salida" id="salida" type="text" tabindex="1" value="<?php echo $listar_fila_reserva['salida'] ?>" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                            <label>Tipo de Reserva</label>   
                                              <div>
                                                <select name="idtipo" data-placeholder="Seleccione opcion" class="chzn-select" tabindex="2">
                                               <option value="<?php echo $listar_fila_reserva['idtipo_venta']  ?>"><?php echo $listar_fila_reserva['tv_descripcion']; ?></option> 
                                            
                                                <?php foreach($listar_tipo_venta as $rowtv): ?>
                                                  <?php if($rowtv['idtipo_venta'] != $listar_fila_reserva['idtipo_venta'] ){ ?>
                                                  <option value="<?php echo $rowtv['idtipo_venta'] ?>"> <?php echo $rowtv['tv_descripcion'] ?> </option>
                                                <?php } endforeach ?>
                                               
                                              </select>       
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. ADULTOS </label>   
                                                <div> <input name="na" type="text" class="xsmall" value="<?php echo $listar_fila_reserva['num_adultos'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. NIÑOS </label>
                                                <div> <input name="ni" type="text" class="xsmall" value="<?php echo $listar_fila_reserva['num_infantes'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM HABITACIONES </label>    
                                                <div> <input name="nh" type="text" class="xsmall" value="<?php echo $listar_fila_reserva['num_habitaciones'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> APARTAMENTO </label>
                                                <div> <input name="apart" type="text" class="xsmall" value="<?php echo $listar_fila_reserva['apart'] ?>" /></div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                          <legend>CONFIRMACION DE RESERVA</legend>
                                            <div class="section">
                                                <label> MEDIO DE PAGO - GARANTIA</label>
                                              <div> 
                                                <select name="idtipopago" data-placeholder="Seleccion opcion" class="chzn-select" tabindex="2">
                                                   <option value="<?php echo $listar_fila_reserva['idtipo_venta']  ?>"><?php echo $listar_fila_reserva['descripcion_pg']; ?></option> 
                                                    <?php foreach($listar_tipo_pago as $rowtp): ?>
                                                      <?php if($rowtv['idtipo_pago_garantia'] != $listar_fila_reserva['idtipo_pago_garantia'] ){ ?>
                                                      <option value="<?php echo $rowtp['idtipo_pago_garantia'] ?>"> <?php echo $rowtp['descripcion_pg'] ?> </option>
                                                    <? } endforeach ?>
                                               
                                                </select> 
                                              </div> 
                                            </div>   
                                            <div class="section">
                                                <label> GARANTIA </label>
                                                <div> <input name="garantia" value="<?php echo $listar_fila_reserva['garantia'] ?>" type="text" class="xsmall"  /><span class="f_help"></span></div>
                                            </div>   
                                             <div class="section">
                                                <label> PRECIO/NOCHE </label>
                                                <div> <input name="pn" value="<?php echo $listar_fila_reserva['precioxnoche'] ?>" type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                             <div class="section">
                                                <label> LIMPIEZA </label>
                                                <div> <input name="limpieza" value="<?php echo $listar_fila_reserva['limpieza'] ?>" type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                             <div class="section">
                                                <label> TRANSPORTE </label>
                                                <div> <input name="transporte" value="<?php echo $listar_fila_reserva['transporte'] ?>" type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>

                                        </fieldset>
                                        <br/>
                                            <div class="section last">
                                                <div>
                                                  <input type="submit" value="Guardar Cambios" class="uibutton loading" />
                                                </div>
                                           </div>
                                        </form>
                                      </div>
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->