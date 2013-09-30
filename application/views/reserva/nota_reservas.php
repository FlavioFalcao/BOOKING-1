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
                                    <span><i class="icon-table"></i><a href="<?php echo base_url(); ?>reserva/reservaciones_entrantes"> RESERVACIONES ENTRANTES > </a> NOTAS </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                           <table  class="table table-bordered table-striped" >
                                              <thead>
                                                 <tr>
                                                                                                              
                                                     <th align="center" > ID </th>

                                                      <th align="center" >Cliente</th>
                                                      <th align="center" >Entrada</th>
                                                      <th align="center" >Salida</th>
                                                      <th align="center" >Procedencia</th>

                                                                                        
                                                  </tr>
                                              </thead>
                                              <tbody>
                                           
                                      
                                                            <tr>
                                                              
                                                              <td  align="center"><?php echo $fila_reserva['id_reservacion'] ?></b></td>

                                                              <td  align="center"><?php echo $fila_reserva['nombre'] ?></b></td>
                                                              <td align="center"><?php echo $fila_reserva['entrada']; ?></td>
                                                              <td align="center"><?php echo $fila_reserva['salida']; ?></td>
                                                              <td align="center"><?php echo $fila_reserva['r_procedencia']; ?></td>

                                                            </tr>
                           
                                                </tbody>
                                              </table>
                                                <div class="formEl_b">
                                                   <?php echo validation_errors(); ?>
                                                        
                                                        <?php
                                                        $attributes = array('id' => 'accounForm', 'class' => 'form-horizontal');
                                                        echo form_open('reserva/registrar_nota_reserva',$attributes);
                                                        ?>
                                                    <fieldset>
                                                    <legend>NUEVA NOTA</legend>
                                                    <div class="section">
                                                      <label>MENSAJE</label>
                                                      <input  name="idreserva" type="hidden" value='<?php echo $fila_reserva['id_reservacion']; ?>'>
                                                      <div> 
                                                        <textarea required name="mensaje" id="Textareaelastic" class="large" cols="" rows=""></textarea>
                                                      </div>   
                                                      
                                                   </div>
                                                    <div class="section last">
                                                      <div>
                                                        <input type="submit" value="REGISTRAR" class="uibutton loading" title="Validando..">
                                                      </div>
                                                    </div>
                                                    </fieldset>
                                                  </form>
                                                </div>
                                                
                                             
                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->
                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> LISTA DE NOTAS PARA LA RESERVA N° <?php echo $fila_reserva['id_reservacion']?> CLIENTE: <?php echo $fila_reserva['nombre']?>  </span>
                                </div><!-- End widget-header -->    
                                
                        <div class="widget-content">
                          <table  class="table table-bordered table-striped" id="dataTable1">
                            <thead>
                               <tr>
                                                                                            
                                    <th align="center" >ACCION</th>
                                    <th align="center" >CODIGO</th>
                                    <th align="center" >MENSAJE</th>
                                    <th align="center" >FECHA/NOTA</th>
                                                                      
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_nota_reserva as $rownota):
                                       ?>
                    
                                          <tr>
                                            <td  align="center" width="5">
                      
                                              <span class="tip " >
                                                <a  onclick="return anular();" href="<?php echo base_url().'reserva/anular_nota/'.$rownota['idnota'].'/'.$rownota['id_reservacion']; ?>" title="Anular Nota" >
                                                <img src="<?php echo base_url()?>assets/images/icon/icon_delete.png" />
                                                </a>
                                              </span>
                                            
                                            </td>     
  
                                            <td  align="center"><?php echo $rownota['id_reservacion'] ?></b></td>

                                            
                                            <td  align="center">
      <?php 
                      $texto= $rownota['mensaje_nota'];
                      $idnota= $rownota['idnota'];
                      If (strlen($texto)>100){
                        $textrunc = substr($texto,0,100);
                        $textcort = substr($texto,100);
                        
      echo nl2br('<span>'.$textrunc.'</span>'.'<span id='.$idnota.' class="hide_text">'.$textcort.'</span> '.'<p style="color:#FF0000; cursor:pointer;" href= #'.$idnota.'> Ver Mas </p>');
                        }
                      else
                      {
                        echo nl2br($rownota['mensaje_nota']);
                        }
       ?>
                                            </td>
                                            <td  align="center"><?php echo $rownota['fecha_nota'] ?></td>
                                                            
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
            $('p').on('click', function() {
                if($($(this).attr('href')).is(':hidden')){
                    $(this).empty().append('Ocultar');
                    $($(this).attr('href')).removeClass('hide_text').addClass('show_text');
                } else {
                    $(this).empty().append('Ver mas');
                    $($(this).attr('href')).removeClass('show_text').addClass('hide_text');
                }
            });
      
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