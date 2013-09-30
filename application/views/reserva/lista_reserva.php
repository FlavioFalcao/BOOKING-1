<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> Reservaciones Entrantes </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                          <!-- Table UITab -->
                                        <div id="UITab" style="position:relative;">
                                          <ul class="tabs">
                                              <li ><a href="#tab1"> Sin Confirmar </a></li>  
                                              <li ><a href="#tab2"> Confirmadas </a></li>
                                              <li ><a href="#tab3"> Despachadas </a></li>         
                                          </ul>
        <div class="tab_container">
            <div id="tab1" class="tab_content">

                          <table  class="data_table2 table table-bordered table-striped">
                            <thead>
                               <tr>
                                                                                            
                                   <th align="center" >ACCION </th>

                                    <th align="center" >CODIGO</th>
                                    <th align="center" >CLIENTE</th>
                                    <th align="center" >TELEFONO</th>
                                    <th align="center" >EMAIL</th>
                                    <th align="center" >CUENTA</th>
                                    <th align="center" >NUM. HABIT.</th>
                                    <th align="center" >NUM. ADULTOS</th>
                                    <th align="center" >NUM. NIÑOS</th>
                                    <th align="center" ><a href="<?php echo base_url().'reserva/ordenar_lista/'.'DESC' ?>">IN/OUT</a></th>
                                    <th align="center" >TIPO DE RESERVA</th>                                
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_r_sinconfirmar as $rowsc):
                                       ?>
                    
                                          <tr>
                                            <td  align="center">
                                              <?php 
                                                  foreach ($permisos as $permiso) {
                                                      if ($permiso['idpermiso'] == 11) {
                                                ?> 
                                                    <span class="tip " >
                                                      <a onclick="return editar();" href="<?php echo base_url().'reserva/obtener_reserva_editar_sc/'.$rowsc['id_reservacion']; ?>" title="Editar" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/icon_edit.png" />
                                                      </a>
                                                    </span>
                                                  <?php
                                                      }
                                                  }
                                                ?>
                                              <?php 
                                                  foreach ($permisos as $permiso) {
                                                      if ($permiso['idpermiso'] == 13) {
                                                ?> 
                                                    <span class="tip " >
                                                      <a onclick="return confirmar();" href="<?php echo base_url().'reserva/obtener_reserva_confirmar/'.$rowsc['id_reservacion']; ?>" title="Confirmar" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/derecha.png" />
                                                      </a>
                                                    </span>
                                                  <?php
                                                      }
                                                  }
                                                ?>
                                             
                                              <span class="tip " >
                                                <a href="<?php echo base_url().'reserva/notas/'.$rowsc['id_reservacion']; ?>" title="Ver Notas" >
                                                <img src="<?php echo base_url()?>assets/images/icon/seguir.png" />
                                                </a>
                                              </span>
                                              <?php
                                              if ($rowsc['r_bandera'] == 1)
                                                {
                                              ?>
                                                  <span class="tip " >
                                                    <a href="<?php echo base_url().'reserva/cambiar_status/'.$rowsc['id_reservacion']; ?>" title="Cambiar Status" >    
                                                    <img src="<?php echo base_url()?>assets/images/icon/punto_verde.png" />
                                                    </a>
                                                  </span>
                                              <?php
                                              }
                                              elseif ($rowsc['r_bandera'] == 2){
                                              ?>
                                                    <span class="tip " >
                                                      <a href="<?php echo base_url().'reserva/cambiar_status/'.$rowsc['id_reservacion']; ?>" title="Cambiar Status" >    
                                                      <img src="<?php echo base_url()?>assets/images/icon/punto_amarillo.png" />
                                                      </a>
                                                    </span>
                                               <?php
                                              }
                                              elseif ($rowsc['r_bandera'] == 3){
                                              ?>
                                                    <span class="tip " >
                                                      <a href="<?php echo base_url().'reserva/cambiar_status/'.$rowsc['id_reservacion']; ?>" title="Cambiar Status" >    
                                                      <img src="<?php echo base_url()?>assets/images/icon/punto_rojo.png" />
                                                      </a>
                                                    </span>
                                              <?php
                                              }
                                              ?>

                                            </td>     
                                            <td  align="center"><?php echo $rowsc['id_reservacion'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['nombre'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['r_telefono'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['r_email'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['descripcion_cu'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['num_habitaciones'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['num_adultos'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['num_infantes'] ?></b></td>
                                            <td  align="center"><?php echo $rowsc['entrada']." - <br>". $rowsc['salida'] ?></td>
                                            <td  align="center"><?php echo $rowsc['tv_descripcion'] ?></b></td>

                                            
                                          </tr>
                    
        <?php
   endforeach
?>
                                       </tbody>
                                    </table>
                                              </div>
                                              <!--tab1-->
                                              
                                              
                <div id="tab2" class="tab_content"> 
                                                
                          <table  class="data_table2 table table-bordered table-striped" >
                            <thead>
                               <tr>
                                                                                            
                                   <th align="center" >ACCION</th>

                                    <th align="center" >CLIENTE</th>
                                    <th align="center" >TELEFONO</th>
                                    <th align="center" >EMAIL</th>
                                    <th align="center" >NUM. HABIT.</th>
                                    <th align="center" >NUM. ADULTOS</th>
                                    <th align="center" >NUM. NIÑOS</th>
                                    <th align="center" ><a href="<?php echo base_url().'reserva/ordenar_lista/'.'DESC' ?>">IN/OUT</a></th>
                                  
                                    <th align="center" >APART.</th>
                                    <th align="center" >CUENTA</th>
                                    <th align="center" >TIPO DE RESERVA</th>
                                    <th align="center" >TIPO/GARANTIA</th>
                                    <th align="center" >TOTAL A PAGAR</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_r_confirmada as $rowc):
                                       ?>
                    
                                          <tr>
                                            <td align="center">
                                              <?php 
                                                  foreach ($permisos as $permiso) {
                                                      if ($permiso['idpermiso'] == 12) {
                                                ?> 
                                                    <span class="tip " >
                                                      <a onclick="return editar();" href="<?php echo base_url().'reserva/obtener_reserva_editar_c/'.$rowc['id_reservacion']; ?>" title="Editar" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/icon_edit.png" />
                                                      </a>
                                                    </span>
                                                  <?php
                                                      }
                                                  }
                                                ?>
                                              <?php 
                                                  foreach ($permisos as $permiso) {
                                                      if ($permiso['idpermiso'] == 14) {
                                                ?> 
                                                    <span class="tip " >
                                                      <a onclick="return facturar();" href="<?php echo base_url().'reserva/obtener_reserva_facturar/'.$rowc['id_reservacion']; ?>" title="Facturar" >
                                                        <img src="<?php echo base_url()?>assets/images/icon/facturar.png" />
                                                      </a>
                                                    </span>
                                                  <?php
                                                      }
                                                  }
                                                ?>
                                              <span class="tip">
                                                <a href="<?php echo base_url().'reserva/notas/'.$rowc['id_reservacion']; ?>" title="Ver Notas">
                                                <img src="<?php echo base_url()?>assets/images/icon/seguir.png" />
                                                </a>
                                              </span> 
                                             
                                            
                                            </td>
                                            <td  align="center"><?php echo $rowc['nombre'] ?></td>
                                            <td  align="center"><?php echo $rowc['r_telefono'] ?></td>
                                            <td  align="center"><?php echo $rowc['r_email'] ?></td>
                                            
                                            <td  align="center"><?php echo $rowc['num_habitaciones'] ?></b></td>
                                            <td  align="center"><?php echo $rowc['num_adultos'] ?></td>
                                            <td  align="center"><?php echo $rowc['num_infantes'] ?></td>
                                            <td  align="center"><?php echo $rowc['entrada']." - <br>". $rowc['salida'] ?></td>
                                            <td  align="center"><?php echo $rowc['apart'] ?></td>
                                            <td  align="center"><?php echo $rowc['descripcion_cu'] ?></td>
                                            <td  align="center"><?php echo $rowc['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowc['descripcion_pg']."<br>". $rowc['garantia'] ?></td>
                                            <td  align="center">
                                              <?php 
                                              $total= ($rowc['precioxnoche']* $rowc['nnoche'])+$rowc['transporte']+ $rowc['limpieza'];
                                              echo '('.round($rowc['precioxnoche']).' * '.$rowc['nnoche'].')+'.round($rowc['transporte']).'+'.round($rowc['limpieza']).'<b>'
              .' = '.round($total).'</b>'
                                              ?>
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


                                    <th align="center" >CLIENTE</th>
                                    <th align="center" >TELEFONO</th>
                                    <th align="center" >EMAIL</th>
                                    <th align="center" >NUM. HABIT.</th>
                                    <th align="center" >NUM. ADULTOS</th>
                                    <th align="center" >NUM. NIÑOS</th>
                                    <th align="center" ><a href="<?php echo base_url().'reserva/ordenar_lista/'.'DESC' ?>">IN/OUT</a></th>

                                    <th align="center" >CUENTA</th>
                                    <th align="center" >TIPO DE RESERVA</th>
                                    <th align="center" >TIPO/GARANTIA</th>
                                    <th align="center" >TOTAL A PAGAR</th>                        
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_r_despachada as $rowd):
                                       ?>
                    
                                          <tr>
                                            <td  align="center"><?php echo $rowd['nombre'] ?></td>
                                            <td  align="center"><?php echo $rowd['r_telefono'] ?></td>
                                            <td  align="center"><?php echo $rowd['r_email'] ?></td>
                                            
                                            <td  align="center"><?php echo $rowd['num_habitaciones'] ?></b></td>
                                            <td  align="center"><?php echo $rowd['num_adultos'] ?></td>
                                            <td  align="center"><?php echo $rowd['num_infantes'] ?></td>
                                            <td  align="center"><?php echo $rowd['entrada']." - <br>". $rowd['salida'] ?></td>
                                            <td  align="center"><?php echo $rowd['descripcion_cu'] ?></td>
                                            <td  align="center"><?php echo $rowd['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowd['descripcion_pg']."<br>". $rowd['garantia'] ?></td>
                                            <td  align="center">
                                              <?php 
                                              $total= ($rowd['precioxnoche']* $rowd['nnoche'])+$rowd['transporte']+ $rowd['limpieza'];
                                              echo '('.round($rowd['precioxnoche']).' * '.$rowd['nnoche'].')+'.round($rowd['transporte']).'+'.round($rowd['limpieza']).'<b>'
              .' = '.round($total).'</b>'
                                              ?>
                                            </td>
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
    var pregunta = confirm("Realmente desea editar la reservacion?")
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
    function confirmar() {
    var pregunta = confirm("Realmente desea confirmar la reservacion?")
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
    function facturar() {
    var pregunta = confirm("Realmente desea facturar la reservacion?")
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
    function facturar() {
    var pregunta = confirm("Realmente desea facturar la reservacion?")
    if (pregunta){
    // no haces naday el form se procesa
    }
    else{
    return false;
    }
    }
    //]]>
    </script>