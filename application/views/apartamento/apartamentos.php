<?php $permisos = cargar_permisos_del_usuario($this->user->id_usuario);?>
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> Gestion de Apartamentos </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                    
                                              <div id="tab1" class="tab_content">
                                                <div class="formEl_b">
                                                   <?php echo validation_errors(); ?>
                                                        
                                                        <?php
                                                        $attributes = array('id' => 'accounForm', 'class' => 'form-horizontal');
                                                        echo form_open('apartamentos/registrar_apartamento',$attributes);
                                                        ?>
                                                    <fieldset>
                                                    <legend>NUEVO APARTAMENTO</legend>
                                                    <div class="section">
                                                        <label> DESCRIPCION </label>   
                                                        <div> <input name="descripcion" required type="text" class=" large" /><span class="f_help">*</span></div>
                                                    </div>
                                                    <div class="section">
                                                        <label> UBICACION </label>   
                                                        <div> <input name="ubicacion" required type="text" class=" large" /><span class="f_help">*</span></div>
                                                    </div>
                                                    <div class="section last">
                                                      <div>
                                                        <input type="submit" value="REGISTRAR" class="uibutton loading" title="Validar">
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
                                    <th align="center" >UBICACION</th>
                                                                      
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_apartamentos as $row):
                                       ?>
                    
                                          <tr>
                                            <td  align="center" width="1">
                                              <?php 
                                                foreach ($permisos as $permiso) {
                                                      if ($permiso['idpermiso'] == 2) {
                                                ?> 
                                              <span class="tip " >
                                                <a href="<?php echo base_url().'apartamentos/obtener_apartamento/'.$row['idapart']; ?>" title="Editar" >    
                                                <img src="<?php echo base_url()?>assets/images/icon/icon_edit.png" />
                                                </a>
                                              </span>
                                              <?php
                                                }
                                              }
                                              ?>
                                            </td>     
  
                                            <td  align="center"><?php echo $row['idapart'] ?></b></td>

                                            <td  align="center"><?php echo $row['descripcion_ap'] ?></b></td>
                                            <td  align="center"><?php echo $row['ubicacion'] ?></b></td>
                                          </tr>
                    
        <?php
   endforeach
?>
                                       </tbody>
                                    </table>
                                              </div>

                                         
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