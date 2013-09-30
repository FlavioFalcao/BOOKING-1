<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                      <div class="row-fluid">
                    
                    		<!-- Widget -->
                            <div class="widget  span12 clearfix">
          
                                <div class="widget-header">
                                    <span><i class="icon-align-left"></i>
                                    <a href="<?php echo base_url(); ?>ventas/listar_ventas" >
                                      <small> LISTA DE VENTAS > </small>
                                    </a> EDICION DE LA VENTA N° <?php echo $listar_fila_venta['id_venta']; ?> 
                                  </span>  
                                </div><!-- End widget-header -->
                                
                                <div class="widget-content">
                                    <div class="formEl_b">
                                            <?php
                                                $attributes = array('id' => 'demo');
                                                echo form_open('ventas/editar_venta',$attributes);
                                            ?>
                                          <fieldset>
                                            <input name="idventa" type="hidden" class=" large" value="<?php echo $listar_fila_venta['id_venta'] ?>" />
                                            <legend>DATOS DEL CLIENTE</legend>
                                            <div class="section">
                                                <label> CLIENTE </label>   
                                                <div> <input name="cliente" type="text" class=" large" value="<?php echo $listar_fila_venta['clientev'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> EMAIL </label>   
                                                <div> 
                                                  <input name="email" type="text" class=" large" value="<?php echo $listar_fila_venta['emailv'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> TELEFONO </label>   
                                                <div> <input name="telefono" type="text" class="medium" value="<?php echo $listar_fila_venta['telefonov'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> PROCEDENCIA </label>   
                                                <div> <input name="proc" type="text" class="medium" value="<?php echo $listar_fila_venta['procedencia'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                          </fieldset>
                                          <fieldset>
                                            <br/>
                                            <legend>FACTURACION</legend>
                                            <div class="section">
                                            <label>Cuenta</label>   
                                              <div>
                                                <select name="idcuenta" data-placeholder="Seleccione cuenta..." class="chzn-select" tabindex="2">
                                                  <option value="<?php echo $listar_fila_venta['id_ventaxcuenta']  ?>"><?php echo $listar_fila_venta['descripcion_cu']; ?></option> 
                                                 <?php foreach($listar_cuentas_usuario as $rowcu): ?>
                                                 <?php if($rowcu['idcuenta'] != $listar_fila_venta['id_ventaxcuenta']){ ?>
                                                  <option value="<?php echo $rowcu['idcuenta'] ?>"> <?php echo $rowcu['descripcion_cu'] ?> </option>
                                               <? } endforeach ?>
                                              </select>
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha de Venta</label>
                                                <div>
                                                    <input name="fventa" id="fventa" type="text" tabindex="1" value="<?php echo $listar_fila_venta['fecha_venta'] ?>" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkin</label>
                                                <div>
                                                    <input name="entrada" id="entrada" type="text" tabindex="1" value="<?php echo $listar_fila_venta['entrada'] ?>" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkout</label>
                                                <div>
                                                    <input name="salida" id="salida" type="text" tabindex="1" value="<?php echo $listar_fila_venta['salida'] ?>" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                            <label>Tipo de Reserva</label>   
                                              <div>
                                                <select name="idtipo" data-placeholder="Seleccione opcion" class="chzn-select" tabindex="2">
                                               <option value="<?php echo $listar_fila_venta['wp_tipoventa_idtipo_venta']  ?>"><?php echo $listar_fila_venta['tv_descripcion']; ?></option> 
                                            
                                                <?php foreach($listar_tipo_venta as $rowtv): ?>
                                                  <?php if($rowtv['idtipo_venta'] != $listar_fila_venta['wp_tipoventa_idtipo_venta'] ){ ?>
                                                  <option value="<?php echo $rowtv['idtipo_venta'] ?>"> <?php echo $rowtv['tv_descripcion'] ?> </option>
                                                <?php } endforeach ?>
                                               
                                              </select>       
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. ADULTOS </label>   
                                                <div> <input name="na" type="text" class="xsmall" value="<?php echo $listar_fila_venta['num_real_adultos'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. NIÑOS </label>
                                                <div> <input name="ni" type="text" class="xsmall" value="<?php echo $listar_fila_venta['num_real_ninos'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM HABITACIONES </label>    
                                                <div> <input name="nh" type="text" class="xsmall" value="<?php echo $listar_fila_venta['num_habitaciones'] ?>" /><span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                               
                                            <div class="section">
                                                <label> GARANTIA </label>
                                                <div> <input name="garantia" value="<?php echo $listar_fila_venta['v_garantia'] ?>" type="text" class="xsmall"  /><span class="f_help"></span></div>
                                            </div>   
                                            <div class="section">
                                                <label> FACTURADO </label>
                                                <div> <input name="facturado" value="<?php echo $listar_fila_venta['facturado'] ?>" type="text" class="xsmall"  /><span class="f_help"></span></div>
                                            </div>  
                                            <div class="section">
                                              <label>APARTAMENTO</label>
                                              <div>
                                                <select name="idapart" data-placeholder="Seleccion opcion" class="chzn-select" tabindex="2">
                                                 <option value="<?php echo $listar_fila_venta['id_ventaxapart']; ?>"><?php echo $listar_fila_venta['descripcion_ap']; ?></option> 
                                                    <?php foreach($listar_apartamentos as $rowap): ?>
                                                  <?php if($rowap['idapart'] != $listar_fila_venta['id_ventaxapart'] ){ ?>
                                                      <option value="<?php echo $rowap['idapart'] ?>"> <?php echo $rowap['descripcion_ap'] ?> </option>
                                                    <? } endforeach ?>
                                               
                                                </select> 
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> COSTOS FIJOS </label>
                                                <div> <input name="cf" type="text" class="xsmall"  value="<?php echo $listar_fila_venta['costo_fijos'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> COSTOS VARIABLES </label>
                                                <div> <input name="cv" type="text" class="xsmall"  value="<?php echo $listar_fila_venta['costo_variables'] ?>" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                      <label> IGV <small>Check/Uncheck</small></label>
                                                      <div>
                                                           <div class="checksquared">
                                                            <?php
                                                              if($listar_fila_venta['igv']== 1){
                                                            ?>
                                                  <input checked type="checkbox" name="igv" id="checkNormal"  value="1"/>  
                                                            <?php
                                                              }else{
                                                                ?>
                                                  <input unchecked type="checkbox" name="igv" id="checkNormal"  value="1"/>
                                                                <?php
                                                              }
                                                            ?>
                                                                  
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
                                                  <input type="submit" value="Guardar Cambios" class="uibutton validando.." />
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