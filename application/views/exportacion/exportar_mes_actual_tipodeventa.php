<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=TOTAL_VENTA_MES_ACTUAL_POR_TIPO-VENTA_".date('d-m-Y').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

      $texto = strtoupper("<b><h2><center>"."VENTAS DEL MES ACTUAL HASTA HOY - AGRUPADOS POR TIPO/VENTA:".date("d-m-Y h:i:s A")."</center></h2></b>"."</br>");
      echo $texto;
?> 
     <table  border="1" >
                            <thead>
                               <tr>
                                   <th align="center" >TIPO DE VENTA</th>
                                    <th align="center" >TOTAL FACTURADO</th>
                                    <th align="center" >TOTAL C.FIJOS</th>
                                    <th align="center" >TOTAL C.VARIABLES</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >TOTAL PROFIT</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_ventas_por_tipodeventa_actuales as $row):
                                       ?>
                    
                                          <tr>
                                            <td  align="center"><?php echo $row['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $row['facturado'] ?></td>
                                            <td  align="center"><?php echo $row['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $row['costo_variables'] ?></td>
                                            <td  align="center"><?php echo $row['total_costos'] ?></td>
                                            <td  align="center"><?php echo $row['profit'] ?></td>
                                          </tr>
        <?php
   endforeach
?>
       
                                       </tbody>
                             </table>