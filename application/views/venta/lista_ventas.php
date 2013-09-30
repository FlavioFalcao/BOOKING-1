<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> Lista de Ventas </span>
                                </div><!-- End widget-header -->    
                          <?php
                              $attributes = array('id' => 'demo');
                              echo form_open('ventas/filtrar_lista_ventas',$attributes);
                           ?>
                          
                            <input name="entrada" required="required" type="text"   value='<?php echo $antes; ?>' class="birthday " >
                            <input name="salida" required="required" type="text"  value='<?php echo $despues; ?>'  class="birthday " >
                     
                            <input name="filtrar" type="submit" class="uibutton" value="FILTRAR">
                         </form>
               <div class="widget-content">
                  
                          <table  class="data_table3 table table-bordered table-striped" >
                            <thead>
                               <tr>

                                    <th align="center" >ACCION</th>
                                    <th align="center" >ID</th>
                                    <th align="center" >CLIENTE</th>
                                    <th align="center" >CUENTA</th>
                                    <th align="center" >APARTAMENTO</th>
                                    <th align="center" >TIPO DE VENTA</th>
                                    <th align="center" >FECHA DE VENTA</th>
                                    <th align="center" >ENTRADA/SALIDA</th>
                                    <th align="center" >GARANTIA</th>
                                    <th align="center" >FACTURADO</th>
                                    <th align="center" >IGV</th>                       
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_ventas as $rowd):
                                       ?>
                    
                                          <tr>
                                            <td>
                                               <?php 
                                                  if ($this->user->descripcion_us == "ADMINISTRADOR") {
                                                ?>
                                                    <span class="tip " >
                      <a onclick="return editar();" href="<?php echo base_url().'ventas/obtener_venta_editar/'.$rowd['id_venta']; ?>" title="Editar" >
                          <img src="<?php echo base_url()?>assets/images/icon/icon_edit.png" />
                      </a>
                                                    </span>
                                                  <?php
                                                  }
                                                ?>
                                               
                    <span class="tip " >
                      <a onclick="return anular();" href="<?php echo base_url().'ventas/anular_venta/'.$rowd['id_venta']; ?>" title="Anular" >
                        <img src="<?php echo base_url()?>assets/images/icon/icon_delete.png" />
                      </a>
                    </span>
                                                 
                                            </td>
                                            <td  align="center"><?php echo $rowd['id_venta'] ?></td>
                                            <td  align="center"><?php echo $rowd['clientev'] ?></td>
                                            <td  align="center"><?php echo $rowd['descripcion_cu'] ?></td>
                                            
                                            <td  align="center"><?php echo $rowd['descripcion_ap'] ?></td>
                                            <td  align="center"><?php echo $rowd['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowd['fecha_venta'] ?></td>
                                            <td  align="center"><?php echo $rowd['entrada'].' - '. $rowd['salida'].'<hr>'.$rowd['num_noches'].' noches' ?>
                                            </td>
                                            <td  align="center"><?php echo $rowd['v_garantia'] ?></td>
                                            <td  align="center"><?php echo $rowd['facturado'] ?></td>
                                            <td  align="center"><?php echo $rowd['igvcont']; ?></td>
                                            
                                          </tr>
        <?php
   endforeach
?>
                                       </tbody>
                             </table>
            

                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->
<script type="text/javascript">
    function editar() {
    var pregunta = confirm("Realmente desea editar la factura?")
    if (pregunta){
    // no haces nada y el form se procesa
    }
    else{
    return false;
    }
    }
    //]]>
</script>
<script type="text/javascript">
    function anular() {
    var pregunta = confirm("Realmente desea anular la factura?")
    if (pregunta){
    // no haces nada y el form se procesa
    }
    else{
    return false;
    }
    }
    //]]>
</script>