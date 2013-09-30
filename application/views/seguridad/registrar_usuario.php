<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> SEGURIDAD </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                          <!-- Table UITab -->
                                        <div id="UITab" style="position:relative;">
                                          <ul class="tabs">
                                              <li ><a href="#tab1"> Nuevo Usuario </a></li>  
                                              <li ><a href="#tab2"> Lista de Usuarios </a></li>
                                              <li ><a href="#tab3"> Lista de Permisos </a></li>         
                                          </ul>
          <div class="tab_container">
                <div id="tab1" class="tab_content">
                      <div class="formEl_b">
                                            <?php
                                                $attributes = array('id' => 'demo');
                                                echo form_open('seguridad/registrar_usuario',$attributes);
                                            ?>
                                          <fieldset>
                                            <input name="idventa" type="hidden" class=" large" />
                                            <legend>NUEVO USUARIO</legend>
                                            <div class="section">
                                                <label> NICK </label>   
                                                <div> <input autocomplete = "off" required name="nick" type="text" class=" large" />
                                                  <span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                                <label> PASSWORD </label>   
                                                <div> 
                                                  <input autocomplete = "off" required name="pass" type="password" class=" large" />
                                                  <span style="color:#FF0000;" class="f_help"> (*) </span></div>
                                            </div>
                                            <div class="section">
                                            <label>TIPO DE USUARIO</label>   
                                              <div>
                                                <select required name="idtipous" data-placeholder="Seleccione opcion..." class="chzn-select" tabindex="2">
                                                  <option />
                                              <?php foreach($listar_tipo_usuario as $rowtu): ?>
                                                  <option value="<?php echo $rowtu['id_tipous'] ?>"> <?php echo $rowtu['descripcion_us'] ?> </option>
                                               <? endforeach ?>
                                              </select>
                                              <span style="color:#FF0000;" class="f_help"> (*) </span>
                                              </div>
                                            </div>
                                            <div class="section">
                                                <label> CELULAR </label>   
                                                <div> 
                                                  <input name="celular" type="text" class="medium" />
                                                  <span class="f_help"></span></div>
                                            </div>
                                           
                                          </fieldset>
                                          <fieldset>
                                            
                                            <legend>ASIGNAR CUENTAS</legend>
                                           
                                           <?php foreach($listar_cuentas as $rowcu): ?>
                                            <div class="section">
                                               <label> <?php echo $rowcu['descripcion_cu']; ?> <small>Check/Uncheck</small></label>
                                              <div>
                                                  <div class="checksquared">
                                                       <input type="checkbox" name="cuentas[]" id="checkNormal"  value="<?php echo $rowcu['idcuenta']; ?>"/>
                                                    <label for="checkNormal" title=""></label>
                                                 </div>
                                              </div>
                                            </div>
                                           <? endforeach ?>
                                        </fieldset>
                                         <fieldset>
                                            
                                            <legend>ASIGNAR PERMISOS</legend>
                                            <?php foreach($listar_permisos as $rowper): ?>
                                            <div class="section">
                                               <label> <?php echo $rowper['descripcionper']; ?> <small>Check/Uncheck</small></label>
                                              <div>
                                                  <div class="checksquared">
                                                       <input type="checkbox" name="permisos[]" id="checkNormal"  value="<?php echo $rowper['idpermiso']; ?>"/>
                                                    <label for="checkNormal" title=""></label>
                                                 </div>
                                              </div>
                                            </div>
                                           <? endforeach ?>
                                        </fieldset>
                                        <br/>
                                            
                                            <div class="section last">
                                                <div>
                                                  <input type="submit" value="REGISTRAR " class="uibutton" title = "validando.." />
                                                </div>
                                           </div>
                                         
                                        </form>
                                      </div>
                         
                </div>
             <!--tab1-->                          
                <div id="tab2" class="tab_content"> 
                                                
                          <table  class="data_table2 table table-bordered table-striped" >
                            <thead>
                               <tr>
                                                                                            
                                   <th align="center" >ACCION</th>
                                   <th align="center" >CODIGO</th>
                                    <th align="center" >NICK</th>
                                    <th align="center" >TIPO DE USUARIO</th>
                                    <th align="center" >CELULAR</th>
                                    <th align="center" >CUENTAS ASIGNADAS</th>
                                    <th align="center" >PERMISOS ASIGNADOS</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_usuario as $rowus):
                                       ?>
                    
                                          <tr>
                                            <td align="center">
                                                    <span class="tip " >
                                                      <a onclick="return editar();" href="<?php echo base_url().'seguridad/obtener_usuario_editar/'.$rowus['id_usuario']; ?>" title="Editar" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/icon_edit.png" />
                                                      </a>
                                                    </span>
                                                    <span class="tip " >
                                                      <a onclick="return asignar_c();" href="<?php echo base_url().'seguridad/obtener_cuentas_asignar/'.$rowus['id_usuario']; ?>" title="Asignar Cuentas" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/ver_cuentas.png" />
                                                      </a>
                                                    </span>
                                                    <span class="tip " >
                                                      <a onclick="return asignar_p();" href="<?php echo base_url().'seguridad/obtener_permisos_asignar/'.$rowus['id_usuario']; ?>" title="Asignar Permisos" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/ver_permisos.png" />
                                                      </a>
                                                    </span>
                                                    <span class="tip " >
                                                      <a onclick="return anular();" href="<?php echo base_url().'seguridad/anular_usuario/'.$rowus['id_usuario']; ?>" title="Anular" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/icon_delete.png" />
                                                      </a>
                                                    </span>
                                                
                                            </td>
                                            <td  align="center"><?php echo $rowus['id_usuario'] ?></b></td>
                                            <td  align="center"><?php echo $rowus['nick'] ?></td>
                                            <td  align="center"><?php echo $rowus['descripcion_us'] ?></td>
                                            <td  align="center"><?php echo $rowus['celular'] ?></td>
                                            
                                            <td  align="center">
                                        <?php foreach($listar_cuentas_usuario as $rowcu): ?>
                                            <?php 
                                            if ($rowcu['id_usuario_det'] == $rowus['id_usuario']){
                                                echo $rowcu['descripcion_cu'].', ';
                                            }
                                            ?>

                                        <?php  endforeach ?>
                                            </td>
                                            <td  align="center">
                                        <?php foreach($listar_permisos_usuario as $rowper): ?>
                                            <?php 
                                            if ($rowper['id_usuario_per'] == $rowus['id_usuario']){
                                                echo $rowper['idpermiso'].', ';
                                            }
                                            ?>

                                        <?php endforeach ?>
                                            </td>
                                          
                                          </tr>
        <?php
   endforeach
?>
                                       </tbody>
                             </table>
              </div>
              <!--tab2-->
                             
                      <div id="tab3" class="tab_content"> 
                                                
                          <table  class="data_table3 table table-bordered table-striped" >
                            <thead>
                               <tr>
                                    <th align="center" >CODIGO</th>
                                    <th align="center" >PERMISO</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_permisos as $row):
                                       ?>
                    
                                          <tr>
                                            <td  align="center"><?php echo $row['idpermiso'] ?></td>
                                            <td  align="center"><?php echo $row['descripcionper'] ?></td>
                                          </tr>
        <?php
   endforeach
?>
                                       </tbody>
                             </table>
              </div>
              <!--tab3-->                 
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
<script type="text/javascript">
    function editar() {
    var pregunta = confirm("Realmente desea editar el registro?")
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
    function asignar_c() {
    var pregunta = confirm("Realmente desea asignar cuentas?")
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
    function asignar_p() {
    var pregunta = confirm("Realmente desea asignar permisos?")
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