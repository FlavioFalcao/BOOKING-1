<?php
  header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=VENTAS_TOTALES_POR_MES_".date('d-m-Y').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

    $texto = strtoupper("<b><h2><center>"."VENTAS TOTALES POR MES:".date("d-m-Y h:i:s A")."</center></h2></b>"."</br>");
      echo $texto;
?> 
     <table  border="1" >
                            <thead>
                               <tr>
                                    <th align="center" >ID</th>
                                    <th align="center" >MES/AÑO</th>
                                    <th align="center" >FACTURADO</th>
                                    <th align="center" >C.F</th>
                                    <th align="center" >C.F.P</th>
                                    <th align="center" >C.V</th>
                                    <th align="center" >TOTAL COSTES</th>
                                    <th align="center" >PROFIT</th>
                                    <th align="center" >PORCENTAJE</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                              foreach($listar_cierre as $rowlc):
                                       ?>
                    
                                          <tr>
                                           <td  align="center"><?php echo $rowlc['id_consolidado'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['mes_c'].'/'.$rowlc['ano_c'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['facturado'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['cfijo'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['cfijoper'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['cvariable'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['tcostes'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['profit'] ?></b></td>
                                            <td  align="center"><?php echo $rowlc['porcentaje'].'%' ?></b></td>
                                          </tr>
        <?php
   endforeach
?>
       
                                       </tbody>
                             </table>