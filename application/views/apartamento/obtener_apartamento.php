    <style type="text/css">
            .hide_text {
                display: none;
                visibility: hidden;
            }
            .show_text {
                display: inline;
                visibility: visible;
            }
    </style>
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i><a href="<?php echo base_url(); ?>apartamentos"> APARTAMENTOS > </a> EDICION DEL APARTAMENTO </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                           <table  class="table table-bordered table-striped" >
                                              <thead>
                                                 <tr>
                                                                                                              
                                                     <th align="center" > ID </th>

                                                      <th align="center" >Apartamento</th>
                                                      <th align="center" >Ubicación</th>

                                                                                        
                                                  </tr>
                                              </thead>
                                              <tbody>
                                           
                                      
                                                            <tr>
                                                              
                                                              <td  align="center"><?php echo $listar_fila_apartamento['idapart'] ?></b></td>

                                                              <td  align="center"><?php echo $listar_fila_apartamento['descripcion_ap'] ?></b></td>
                                                              <td align="center"><?php echo $listar_fila_apartamento['ubicacion']; ?></td>

                                                            </tr>
                           
                                                </tbody>
                                              </table>
                                                <div class="formEl_b">
                                                   <?php echo validation_errors(); ?>
                                                        
                                                        <?php
                                                        $attributes = array('id' => 'demo');
                                                        echo form_open('apartamentos/editar_apartamento',$attributes);
                                                        ?>
                                                    <fieldset>
                                                      <input name="idapart" type="hidden" value="<?php echo $listar_fila_apartamento['idapart'] ?>" />
                                                    <legend>EDITAR APARTAMENTO</legend>
                                                    <div class="section">
                                                        <label> DESCRIPCION </label>   
                                                        <div> <input name="descripcion" required type="text" class=" large" value="<?php echo $listar_fila_apartamento['descripcion_ap'] ?>" /><span class="f_help">*</span></div>
                                                    </div>
                                                    <div class="section">
                                                        <label> UBICACION </label>   
                                                        <div> <input name="ubicacion" required type="text" class=" large" value="<?php echo $listar_fila_apartamento['ubicacion'] ?>" /><span class="f_help">*</span></div>
                                                    </div>
                                                    <div class="section last">
                                                      <div>
                                                        <input type="submit" value="GUARDAR CAMBIOS" class="uibutton loading" title="Validando..">
                                                      </div>
                                                    </div>
                                                    </fieldset>
                                                  </form>
                                                </div>
                                                
                                             
                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->