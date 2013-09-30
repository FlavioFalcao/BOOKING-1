<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                      <div class="row-fluid">
                    
                    		<!-- Widget -->
                            <div class="widget  span12 clearfix">
          
                                <div class="widget-header">
                                    <span><i class="icon-align-left"></i>
                                    <a href="<?php echo base_url(); ?>reserva/reservaciones_entrantes" >
                                      <small> RESERVACIONES ENTRANTES > </small>
                                    </a> FACTURACION DE LA RESERVA </span>  
                                </div><!-- End widget-header -->	
                                
                                <div class="widget-content">
                                    <div class="formEl_b">
                                            <?php
                                                $attributes = array('id' => 'demo');
                                                echo form_open('reserva/facturar_reserva',$attributes);
                                            ?>
                                          <fieldset>
                                            <input name="idr" type="hidden" class=" large" value="<?php echo $listar_fila_reserva['id_reservacion'] ?>" />
                                            <legend>DATOS DEL CLIENTE</legend>
                                            <div class="section">
                                                <label> CLIENTE </label>   
                                                <div> <input name="cliente" type="text" class=" large" value="<?php echo $listar_fila_reserva['r_nombre'].' '.$listar_fila_reserva['r_apellido'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
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
                                            <legend>FACTURACION DE LA RESERVA</legend>
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
                                                <label>Fecha de Venta</label>
                                                <div>
                                                    <input name="fventa" id="fventa" type="text" tabindex="1" value="<?php echo $listar_fila_reserva['entrada'] ?>" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
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
                                                <label> MEDIO DE PAGO - GARANTIA</label>
                                              <div> 
                                                <select name="idtipopago" data-placeholder="Seleccion opcion" class="chzn-select" tabindex="2">
                                                   <option value="<?php echo $listar_fila_reserva['idtipo_venta']  ?>"><?php echo $listar_fila_reserva['descripcion_pg']; ?></option> 
                                                    <?php foreach($listar_tipo_pago as $rowtp): ?>
                                                      <?php if($rowtp['idtipo_pago_garantia'] != $listar_fila_reserva['idtipo_pago_garantia'] ){ ?>
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
                                                <label> FACTURADO </label>
                                                <?php 
                                                $total = ($listar_fila_reserva['precioxnoche'] * $listar_fila_reserva['nnoche']) + $listar_fila_reserva['transporte'] + $listar_fila_reserva['limpieza']
                                                ?>
                                                <div> <input name="facturado" value="<?php echo $total ?>" type="text" class="xsmall"  /><span class="f_help"></span></div>
                                            </div>  
                                            <div class="section">
                                              <div> 
                                                <select name="idapart" data-placeholder="Seleccion opcion" class="chzn-select" tabindex="2">
                                                  <option /> Seleccione Apartamento
                                                    <?php foreach($listar_apartamentos as $rowap): ?>
                                                      <option value="<?php echo $rowap['idapart'] ?>"> <?php echo $rowap['descripcion_ap'] ?> </option>
                                                    <? endforeach ?>
                                               
                                                </select> <?php echo "El cliente eligió: ".$listar_fila_reserva['apart'] ?>
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> COSTOS VARIABLES </label>
                                                <div> <input name="cv" type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                      <label> IGV <small>Check/Uncheck</small></label>
                                                      <div>
                                                           <div class="checksquared">
                                                                  <input type="checkbox" name="igv" id="checkNormal"  value="1"/>
                                                                  <label for="checkNormal" title=""></label>
                                                           </div>   
                                                           
                                                      </div>
                                          </div>
                                        </fieldset>
                                        <br/>
                                            <?php 
                                                foreach ($permisos as $permiso) {
                                                      if ($permiso['idpermiso'] == 3) {
                                                ?> 
                                            <div class="section last">
                                                <div>
                                                  <input type="submit" value="Facturar Reserva" class="uibutton validando.." />
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