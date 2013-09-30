<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8" />
        <title>Sistema de Reservaciones&trade; LIMA-4RENT </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/components/bootstrap/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/zice.style.css" />
        <style type="text/css">
        html {
            background-image: none;
        }
        body{
            background-position:0 0;
            }
        label.iPhoneCheckLabelOn span {
            padding-left:0px
        }
        #versionBar {
            background-color:#212121;
            position:fixed;
            width:100%;
            height:35px;
            bottom:0;
            left:0;
            text-align:center;
            line-height:35px;
            z-index:11;
            -webkit-box-shadow: black 0px 10px 10px -10px inset;
            -moz-box-shadow: black 0px 10px 10px -10px inset;
            box-shadow: black 0px 10px 10px -10px inset;
        }
        .copyright{
            text-align:center; font-size:10px; color:#CCC;
        }
        .copyright a{
            color:#A31F1A; text-decoration:none
        }    
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
         
        <div id="successLogin"></div>
        <div class="text_success"><img src="<?php echo base_url();?>assets/images/loadder/loader_green.gif" alt="Cargando" /><span>Please wait</span></div>
        
        <div id="login">
          <div class="ribbon"></div>
          <div class="inner clearfix">
          <div class="logo"><img src="<?php echo base_url();?>assets/images/logo.jpg" alt="LIMA-4RENT" /></div>
          <div class="formLogin">
              <div style="color:#FF0000; ">
                            <?php if(@$error_login): ?>
                                Error en el usuario o contrase&ntilde;a. Proceda denuevo.
                                <br />
                            <?php endif; ?>
                            
                            <?php echo @validation_errors(); ?>
              </div> 
         <form name="formLogin" id="formLogin" method="post" />
      
                <div class="tip">
                      <input name="username" type="text" id="username_id" title="Username" />
                </div>
                <div class="tip">
                      <input name="password" type="password" id="password" title="Password" />
                </div>
      
                <div class="loginButton">
                  <div style="float:left; margin-left:-9px;">
                      
                  </div>
                  <div class=" pull-right" style="margin-right:-8px;">
                      <div class="btn-group">
                        <input type="submit" class="btn" id="but_login" value="Acceder"/>
                      </div>
                  </div>
                  <div class="clear"></div>
                </div>
      
          </form>
          </div>
        </div>
          <div class="shadow"></div>
        </div>
        
        <!--Login div-->
        <div class="clear"></div>
        <div id="versionBar">
          <div class="copyright"> &copy; Copyright 2012  Todos los derechos reservados <span class="tip"><a href="#" title="LIMA-4RENT">APARTAMENTOS - LIMA-4RENT</a> </span> </div>
          <!-- // copyright-->
        </div>
        
        <!-- Link JScript-->
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/ui/jquery.ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/components/form/form.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/login.js"></script>
        
    </body>
</html>