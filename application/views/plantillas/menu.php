              <!-- left_menu -->
              <div id="left_menu">
                    <ul id="main_menu" class="main_menu">
                      <li class="<?php if ($active == '1' ) echo 'select'; ?>"><a href="<?php echo base_url();?>inicio.html"><span class="ico gray shadow home" ></span><b>Inicio</b></a></li>
                      <li class="<?php if ($active == '2' ) echo 'select'; ?>"><a href="<?php echo base_url();?>reserva.html" ><span class="ico gray shadow cutter"></span><b>Registrar Reserv.</b></a> </li>
                      <li class="<?php if ($active == '3' ) echo 'select'; ?>"><a href="<?php echo base_url();?>reserva/reservaciones_entrantes.html"><span class="ico gray  dimensions" ></span><b>Reserv. Entrantes</b></a> </li>
                      <li class="<?php if ($active == '4' ) echo 'select'; ?>"><a href="<?php echo base_url();?>ventas/listar_ventas.html"><span class="ico gray shadow   encrypt"></span><b>Lista de Ventas</b> </a></li>
                      <li class="<?php if ($active == '5' ) echo 'select'; ?>"><a href="<?php echo base_url();?>ventas.html"><span class="ico gray shadow  pencil"></span><b>Registrar Venta</b> </a></li>
                      <li class="<?php if ($active == '6' ) echo 'select'; ?>"><a href="<?php echo base_url();?>apartamentos.html"><span class="ico gray shadow pictures_folder"></span><b>Apartamentos </b></a></li>
                      <li class="<?php if ($active == '7' ) echo 'select'; ?>"><a href="<?php echo base_url();?>otros.html"><span class="ico gray shadow  file"></span><b> Gestion de Tipos </b></a></li>
                      <li class="<?php if ($active == '8' ) echo 'select'; ?>"><a href="<?php echo base_url();?>graficos_personalizados.html"><span class="ico gray shadow stats_lines"></span><b>Graficos</b> </a></li>
                   <?php if($this->user->id_tipous <> 1002 ){ ?>
                      <li class="<?php if ($active == '9' ) echo 'select'; ?>"><a href="#"><span class="ico gray shadow print"></span><b>Reportes</b> </a>
                        <ul>
                          <li><a href="<?php echo base_url();?>reporte_actual.html"> Ventas del Mes </a></li>
                          <li><a href="<?php echo base_url();?>cierre_de_mes.html"> Cierre de Mes </a></li>
                        </ul>
                      </li>
                    <?php
                      }
                    ?>
                    <?php
                    if($this->user->id_tipous == 1000 ){
                      ?>
                    <li class="<?php if ($active == '10' ) echo 'select'; ?>"><a href="<?php echo base_url();?>seguridad.html"><span class="ico gray shadow calendar"></span><b> Seguridad </b></a></li>
                    <?php
                      }
                    ?>
                    </ul>
               </div>