<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Sistema de Reservaciones&trade; LIMA-4RENT </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Link shortcut icon
        <link rel="shortcut icon" type="image/ico" href="images/favicon.ico"/> 
        -->
        <!-- CSS Stylesheet-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/components/bootstrap/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/components/bootstrap/bootstrap-responsive.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/zice.style.css"/>
		<style type="text/css" title="currentStyle">
			@import "../../media/css/demo_page.css";
			@import "../../media/css/demo_table.css";
			@import "<?php echo base_url();?>assets/media_export/css/TableTools.css";
		</style>
        
        
        
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/ui/jquery.ui.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/ui/timepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/colorpicker/js/colorpicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/form/form.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/elfinder/js/elfinder.full.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/datatables/dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/jscrollpane/jscrollpane.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/editor/jquery.cleditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/chosen/chosen.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/validationEngine/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/validationEngine/jquery.validationEngine-en.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/fullcalendar/fullcalendar.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/flot/excanvas.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/flot/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/uploadify/uploadify.js"></script>       
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/Jcrop/jquery.Jcrop.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/smartWizard/jquery.smartWizard.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>assets/media_export/ZeroClipboard/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>assets/media_export/js/TableTools.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/zice.custom.js"></script>
        
        </head>        
        <body>        
        
            <!-- Header -->
            <div id="header">
                <ul id="account_info" class="pull-right"> 
                    
                    <li class="setting">
                        Bienvenido, <b class="red"> <?php echo $this->user->descripcion_us ?>: <?php echo $this->user->nick; ?></b>
                        
                    </li>
                    <li class="logout" title="Salir"><a href="<?php echo base_url();?>acceso/logout">Cerrar Sesión</a></li> 
                </ul>
            </div><!-- End Header -->