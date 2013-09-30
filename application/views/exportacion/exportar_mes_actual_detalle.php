<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=TOTAL_VENTA_MES_ACTUAL_".date('d-m-Y').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

      $texto = strtoupper("<b><h2><center>"."VENTAS DEL MES ACTUAL HASTA HOY:".date("d-m-Y h:i:s A")."</center></h2></b>"."</br>"); 
      echo $texto;
?> 
     <table border="1" >
                            <thead>
                               <tr>
                                                                                            
                                   <th align="center" >CLIENTE</th>
                                   <th align="center" >TIPO DE VENTA</th>
                                    <th align="center" >APARTAMENTO</th>
                                    <th align="center" >ENTRADA/SALIDA</th>
                                    <th align="center" >NUM. NOCHES</th>
                                    <th align="center" >FACTURADO</th>
                                    <th align="center" >C. FIJOS</th>
                                    <th align="center" >C. VARIABLES</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >PROFIT</th>
                                    <th align="center" >PORCENTAJE</th>
                                    <th align="center" >PROCEDENCIA</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_ventas_actuales as $rowlva):
                                       ?>
                    
                                          <tr>
                                            <td  align="center"><?php echo $rowlva['clientev'] ?></b></td>
                                            <td  align="center"><?php echo $rowlva['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowlva['descripcion_ap'] ?></td>
                                            <td  align="center"><?php echo $rowlva['entrada'].'<br />'.$rowlva['salida'] ?></td>
                                            <td  align="center"><?php echo $rowlva['num_noches'] ?></td>
                                            <td  align="center"><?php echo $rowlva['facturado'] ?></td>
                                            <td  align="center"><?php echo $rowlva['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $rowlva['costo_variables'] ?></td>
                                            <td  align="center"><?php echo $rowlva['total_costos'] ?></td>
                                            <td  align="center"><?php echo $rowlva['profit'] ?></td>
                                            <td  align="center"><?php echo round($rowlva['porcentaje'],2).'%' ?></td>
                                            <td  align="center"><?php echo $rowlva['procedencia'] ?></td>
                                          </tr>
        <?php
   endforeach
?>
                          
                                        <tr>
                                            <td  align="center"> TOTAL </b></td>
                                            <td  align="center"></td>
                                            <td  align="center"></td>
                                            <td  align="center"></td>
                                            <td  align="center"></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['facturado'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['costo_variables'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['total_costos'] ?></td>
                                            <td  align="center"><?php echo $listar_total_ventas_actuales['profit'] ?></td>
                                            <td  align="center"><?php echo round($listar_total_ventas_actuales['porcentaje'],2).'%' ?></td>
                                            <td  align="center"></td>
                                          </tr>
       
                                       </tbody>
                             </table>