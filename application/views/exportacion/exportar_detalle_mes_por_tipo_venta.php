<?php
  header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=TOTAL_DE_".$mes."-".$ano."_"."POR_TIPO-VENTA"."_".date('d-m-Y').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

     $texto = "<b><h2><center>"."VENTAS DE:"." ".$mes."-".$ano." "."AGRUPADOS POR TIPO DE VENTA"." ".date("d-m-Y h:i:s A")."</center></h2></b>"."</br>"; 
      echo strtoupper($texto);
?> 
     <table  border="1" >
                            <thead>
                               <tr>
                                  <th align="center" >TIPO DE VENTA</th>
                                    <th align="center" >TOTAL FACTURADO</th>
                                    <th align="center" >TOTAL C.F</th>
                                    <th align="center" >TOTAL C.F.P</th>
                                    <th align="center" >TOTAL C.V</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >TOTAL PROFIT</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_ventas_por_tipodeventa_del_mes as $rowvxtv):
                                       ?>
                    
                                          <tr>
                                             <td  align="center"><?php echo $rowvxtv['tv_descripcion'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['facturado'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['costo_fijos'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['costo_fijosper'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['costo_variables'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['total_costos'] ?></td>
                                            <td  align="center"><?php echo $rowvxtv['profit'] ?></td>
                                          </tr>
        <?php
   endforeach
?>
       
                                       </tbody>
                             </table>