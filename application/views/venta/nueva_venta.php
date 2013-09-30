<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                      <div class="row-fluid">
                    
                    		<!-- Widget -->
                            <div class="widget  span12 clearfix">
          
                                <div class="widget-header">
                                    <span><i class="icon-align-left"></i>
                                    NUEVA FACTURACION
                                  </span>  
                                </div><!-- End widget-header -->
                                
                                <div class="widget-content">
                                    <div class="formEl_b">
                                            <?php
                                                $attributes = array('id' => 'demo');
                                                echo form_open('ventas/registrar_venta',$attributes);
                                            ?>
                                          <fieldset>
                                            <input name="idventa" type="hidden" class=" large" />
                                            <legend>DATOS DEL CLIENTE</legend>
                                            <div class="section">
                                                <label> CLIENTE </label>   
                                                <div> <input required name="cliente" type="text" class=" large" />
                                                  <span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> EMAIL </label>   
                                                <div> 
                                                  <input required name="email" type="text" class=" large" />
                                                  <span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> TELEFONO </label>   
                                                <div> 
                                                  <input name="telefono" type="text" class="medium" />
                                                  <span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> PROCEDENCIA </label>   
                                                <div> <input name="proc" type="text" class="medium" />
                                                  <span class="f_help"></span></div>
                                            </div>
                                          </fieldset>
                                          <fieldset>
                                            <br/>
                                            <legend>FACTURACION</legend>
                                            <div class="section">
                                            <label>Cuenta</label>   
                                              <div>
                                                <select required name="idcuenta" data-placeholder="Seleccione cuenta..." class="chzn-select" tabindex="2">
                                                  <option />
                                              <?php foreach($listar_cuentas_usuario as $rowcu): ?>
                                                  <option value="<?php echo $rowcu['idcuenta'] ?>"> <?php echo $rowcu['descripcion_cu'] ?> </option>
                                               <? endforeach ?>
                                              </select>
                                              <span style="color:#FF0000;" class="f_help"> (*) </span>
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha de Venta</label>
                                                <div>
                                                    <input required name="fventa" id="fventa" type="text" tabindex="1" value="<?php echo date("Y-m-d")?>" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkin</label>
                                                <div>
                                                    <input required name="entrada" id="entrada" type="text" tabindex="1" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label>Fecha checkout</label>
                                                <div>
                                                    <input required name="salida" id="salida" type="text" tabindex="1" />
                                                    <span style="color:#FF0000;" class="f_help"> (*) </span>
                                                </div>
                                            </div>
                                            <div class="section">
                                            <label>Tipo de Venta</label>   
                                              <div>
                                                <select required name="idtipo" data-placeholder="Seleccione opcion" class="chzn-select" tabindex="2">
                                               <option></option> 
                                            
                                                <?php foreach($listar_tipo_venta as $rowtv): ?>
                                                  <option value="<?php echo $rowtv['idtipo_venta'] ?>"> <?php echo $rowtv['tv_descripcion'] ?> </option>
                                                <?php endforeach ?>
                                               
                                              </select>
                                              <span style="color:#FF0000;" class="f_help"> (*) </span>    
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. ADULTOS </label>   
                                                <div> <input name="na" type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM. NIÑOS </label>
                                                <div> <input name="ni" type="text" class="xsmall" /><span class="f_help"></span></div>
                                            </div>
                                            <div class="section">
                                                <label> NUM HABITACIONES </label>    
                                                <div> <input required name="nh" type="text" class="xsmall" />
                                                  <span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                               
                                            <div class="section">
                                                <label> GARANTIA </label>
                                                <div> <input name="garantia" type="text" class="xsmall"  />
                                                  <span class="f_help"></span></div>
                                            </div>   
                                            <div class="section">
                                                <label> FACTURADO </label>
                                                <div> <input required name="facturado" type="text" class="xsmall"  />
                                                  <span class="f_help">(*)</span></div>
                                            </div>  
                                            <div class="section">
                                              <label>APARTAMENTO</label>
                                              <div>
                                                <select required name="idapart" data-placeholder="Seleccion opcion" class="chzn-select" tabindex="2">
                                                 <option></option> 
                                                    <?php foreach($listar_apartamentos as $rowap): ?>
                                                      <option value="<?php echo $rowap['idapart'] ?>"> <?php echo $rowap['descripcion_ap'] ?> </option>
                                                    <? endforeach ?>
                                               
                                                </select>
                                                <span style="color:#FF0000;" class="f_help"> (*) </span>
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> COSTOS VARIABLES </label>
                                                <div> <input name="cv" type="text" class="xsmall" />
                                                  <span class="f_help"></span></div>
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
                                                  <input type="submit" value="Registrar " class="uibutton" title = "validando.." />
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