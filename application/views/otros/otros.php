<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> Gestion de Tipos </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                          <!-- Table UITab -->
                                        <div id="UITab" style="position:relative;">
                                          <ul class="tabs">
                                              <li><a href="#tab1"> Añadir Tipo de Pago </a></li>  
                                              <li><a href="#tab2"> Añadir Tipo de Cuenta </a></li>            
                                          </ul>
                                          <div class="tab_container">
                    
                                              <div id="tab1" class="tab_content">
                                                <div class="formEl_b">
                                                   <?php echo validation_errors(); ?>
                                                        
                                                        <?php
                                                        $attributes = array('id' => 'accounForm', 'class' => 'form-horizontal');
                                                        echo form_open('otros/registrar_tipo_pago',$attributes);
                                                        ?>
                                                    <fieldset>
                                                    <legend>NUEVO TIPO DE PAGO</legend>
                                                    <div class="section">
                                                        <label> DESCRIPCION </label>   
                                                        <div> <input name="descripcion" required type="text" class=" large" /><span class="f_help">*</span></div>
                                                    </div>
                                                    <div class="section last">
                                                      <div>
                                                        <input type="submit" value="REGISTRAR" class="uibutton loading" title="Saving">
                                                      </div>
                                                    </div>
                                                    </fieldset>
                                                  </form>
                                                </div>
                          <table  class="table table-bordered table-striped" id="dataTable1">
                            <thead>
                               <tr>
                                                                                            
                                   <th align="center" >ACCION</th>

                                    <th align="center" >CODIGO</th>

                                    <th align="center" >DESCRIPCION</th>

                                                                      
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_tipo_pago as $rowtipo):
                                       ?>
                    
                                          <tr>
                                            <td  align="center" width="1">
                                            <?php
                                              if($this->user->id_tipous == 1000){
                                                ?>
                                                <span class="tip " >
                                                <a onclick="return anular();" href="<?php echo base_url().'otros/anular_tipo_pago/'.$rowtipo['idtipo_pago_garantia']; ?>" title="Anular" >    
                                                <img src="<?php echo base_url()?>assets/images/icon/icon_delete.png" />
                                                </a>
                                              </span>
                                            <?php
                                              }
                                            ?>
                                             
                                            
                                            </td>     
  
                                            <td  align="center"><?php echo $rowtipo['idtipo_pago_garantia'] ?></b></td>

                                            <td  align="center"><?php echo $rowtipo['descripcion_pg'] ?></b></td>

                                          </tr>
                    
        <?php
   endforeach
?>
                                       </tbody>
                                    </table>
                                              </div>
                                              <!--tab1-->
                                              
                                              
                <div id="tab2" class="tab_content">
                  <div class="formEl_b">  
                                                 <?php echo validation_errors(); ?>
                                                        
                                                <?php
                                                        echo form_open('otros/registrar_cuenta',$attributes);
                                                ?>
                                                   
                                                      <fieldset>
                                                      <legend> NUEVO TIPO DE CUENTA</legend>
                                                   
                                                    <div class="section">
                                                        <label> DESCRIPCION </label>   
                                                        <div> <input name="descripcion" required type="text" class=" large" /><span class="f_help">*</span></div>
                                                    </div>
                  <?php
                    foreach ($permisos as $permiso) {
                        if ($permiso['idpermiso'] == 6) {
                  ?>


                                                    <div class="section last">
                                                      <div>
                                                        <input type="submit" value="REGISTRAR" class="uibutton loading" title="Saving">
                                                      </div>
                                                    </div>
                  <?php
                        }
                    }
                    ?>
                                                  </fieldset>
                                                  </form>
                                                </div>  
                                                
                          <table  class="table table-bordered table-striped" id="dataTable">
                            <thead>
                               <tr>
                                                                                            
                                   <th align="center"  width="1" >ACCION</th>

                                    <th align="center" width="200">CODIGO</th>

                                    <th align="center" width="125">DESCRIPCION</th>

                                                                      
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_cuentas_usuario as $rowcuenta):
                                       ?>
                    
                                          <tr>
                                            <td  align="center" width="1">
                                            <?php
                                              if($this->user->id_tipous == 1000){
                                                ?>
                                              <span class="tip">
                                                <a onclick="return anular();" href="<?php echo base_url().'otros/anular_cuenta/'.$rowcuenta['idcuenta']; ?>" title="Anular">
                                                <img src="<?php echo base_url()?>assets/images/icon/icon_delete.png" />
                                                </a>
                                              </span> 
                                              <?php
                                              }
                                            ?>
                                            
                                            </td>     

                                            <td  align="center"><?php echo $rowcuenta['idcuenta'] ?></td>

                                            <td  align="center"><?php echo $rowcuenta['descripcion_cu'] ?></td>

                                          </tr>
        <?php
   endforeach
?>
                                       </tbody>
                                    </table>
                                              </div>
                                              <!--tab2-->
                                              
                                          </div>
                                      </div><!-- End UITab -->
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