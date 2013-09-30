                    <div class="row-fluid">
                    
                            <!-- Table widget -->
                            <div class="widget  span12 clearfix">
                            
                                <div class="widget-header">
                                    <span><i class="icon-table"></i> Calendario de Eventos </span>
                                </div><!-- End widget-header -->    
                                
                                <div class="widget-content">
                                          <!-- Table UITab -->
                                    <div id="UITab" style="position:relative;">
                                          <ul class="tabs">
                                              <li><a href="#tab1"> Ventas </a></li>  
                                              <li><a href="#tab2"> Reservaciones </a></li>            
                                          </ul>
                                          <div class="tab_container">
                    
                                              <div id="tab1" class="tab_content"> 
                                                  <div id='calendar_venta' ></div>
                                              </div><!--tab1-->
                                              
                                              
                                              <div id="tab2" class="tab_content"> 
                                                  <div id='calendar_reserva' ></div> 
                                              </div><!--tab2-->
                                              
                                          </div>
                                    </div><!-- End UITab -->
                                      <div class="clearfix"></div>
                  
                                </div><!--  end widget-content -->
                            </div><!-- widget  span12 clearfix-->

                    </div><!-- row-fluid -->

<script type="text/javascript">
    $(function() {    
    // Calendar 
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();   
      $('#calendar_reserva').fullCalendar({
        header: {
          left: 'title',
          center: 'prev,next  ',
          right: 'today month,basicWeek,agendaDay'
        },
        buttonText: {
          prev: 'Previous',
          next: 'Next '
        },
        editable: true,
        refetchEvents :'refetchEvents',
        selectable: true,
        selectHelper: true,
        dayClick: function(date, allDay, jsEvent, view) {
        var nDate=$.fullCalendar.formatDate( date, 'd' );
        var dDate=$.fullCalendar.formatDate( date, 'dddd ' );
        var fullDate=$.fullCalendar.formatDate( date, ' MMMM , yyyy' );
        $('#calendar_reserva .fc-header-title h2').html('<div class="dateBox"><div class="nD">'+nDate+'</div><div class="dD">'+dDate+'<div class="fullD">'+fullDate+'</div><div></div><div class="clear"></div>');
        },
        events: '<?php echo base_url() ?>index.php/inicio/calendario_reserva'
      });  
    }); 
</script>
<script type="text/javascript">
    $(function() {    
    // Calendar 
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();   
      $('#calendar_venta').fullCalendar({
        header: {
          left: 'title',
          center: 'prev,next  ',
          right: 'today month,basicWeek,agendaDay'
        },
        buttonText: {
          prev: 'Previous',
          next: 'Next '
        },
        editable: true,
        refetchEvents :'refetchEvents',
        selectable: true,
        selectHelper: true,
        dayClick: function(date, allDay, jsEvent, view) {
        var nDate=$.fullCalendar.formatDate( date, 'd' );
        var dDate=$.fullCalendar.formatDate( date, 'dddd ' );
        var fullDate=$.fullCalendar.formatDate( date, ' MMMM , yyyy' );
        $('#calendar_venta .fc-header-title h2').html('<div class="dateBox"><div class="nD">'+nDate+'</div><div class="dD">'+dDate+'<div class="fullD">'+fullDate+'</div><div></div><div class="clear"></div>');
        },
        events: '<?php echo base_url();?>index.php/inicio/calendario_venta'
      });  
    }); 
</script>