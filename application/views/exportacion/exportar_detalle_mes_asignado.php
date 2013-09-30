<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=TOTAL_DE".$mes."/".$ano."_".date('d-m-Y').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

$texto = "<b><h2><center>"."VENTAS DEL MES DE:"." ".$mes."/".$ano." ".date("d-m-Y h:i:s A")."</center></h2></b>"."</br>"; 
      echo strtoupper($texto);
?> 
     <table  border="1" >
                            <thead>
                               <tr>
                                     <th align="center" >CLIENTE</th>
                                   <th align="center" >TIPO DE VENTA</th>
                                    <th align="center" >APARTAMENTO</th>
                                    <th align="center" >ENTRADA/SALIDA</th>
                                    <th align="center" >FACTURADO</th>
                                    <th align="center" >C.F</th>
                                    <th align="center" >C.F.P</th>
                                    <th align="center" >C.V</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >PROFIT</th>
                                    <th align="center" >PORCENTAJE</th>
                                    <th align="center" >PROCEDENCIA</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_ventas_del_mes as $rowlva):
                                       ?>
                    
                                          <tr>
                                          <td  align="center"><?php echo $rowlva['clientev'] ?></b></td>
                                            <td  align="center"><?php echo $rowlva['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowlva['descripcion_ap'] ?></td>
                                            <td  align="center"><?php echo $rowlva['entrada'].' - '.$rowlva['salida'].'<br />'.$rowlva['num_noches'].' noche(s)' ?></td>
                                            <td  align="center"><?php echo $rowlva['facturado'] ?></td>
                                            <td  align="center"><?php echo $rowlva['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $rowlva['costo_fijosper'] ?></td>
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
                                            <td style="color:#ff0000;font-weight:bold;" align="center"> TOTAL </b></td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center">-</td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center">-</td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center">-</td>
                                            <td style="color:#ff0000;font-weight:bold;" align="center"><?php echo $listar_total_ventas_del_mes['facturado'] ?></td>
                                            <td style="color:#ff0000;font-weight:bold;" align="center"><?php echo $listar_total_ventas_del_mes['costo_fijos'] ?></td>
                                            <td style="color:#ff0000;font-weight:bold;" align="center"><?php echo $listar_total_ventas_del_mes['costo_fijosper'] ?></td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center"><?php echo $listar_total_ventas_del_mes['costo_variables'] ?></td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center"><?php echo $listar_total_ventas_del_mes['total_costos'] ?></td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center"><?php echo $listar_total_ventas_del_mes['profit'] ?></td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center"><?php echo round($listar_total_ventas_del_mes['porcentaje'],2).'%' ?></td>
                                            <td style="color:#ff0000;font-weight:bold;"  align="center">-</td>
                                          </tr>
       
                                       </tbody>
                             </table>