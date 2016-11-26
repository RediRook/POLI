
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' />
<?php echo $this->Html->css('jquery.weekcalendar'); ?>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script>

<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->css('bootstrap-multiselect'); ?>
<?php echo $this->Html->script('bootstrap-multiselect'); ?>
<?php echo $this->Html->script('date'); ?>
<?php echo $this->Html->script('jquery.weekcalendar'); ?>
<?php echo $this->Html->script('rosterCalendar'); ?>
<?php echo $this->Html->script('jquery.qtip-1.0.0-rc3.min.js'); ?>


<style>

    .ui-combobox {

        position: relative;
        display: inline-block;
    }
    .ui-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
        height:28px;
        /* adjust styles for IE 6/7 */
        *height: 1.7em;
        *top: 0.1em;
    }
    .ui-combobox-input {
        margin: 0;
        padding: 0.3em;

    }
    .ui-autocomplete-input{

    }

    #patcient{
        display:none;
    }
    form {
        margin: 0 -21px 18px;
    }
    #lblInicator{
        margin-top:0px !important;
        color:red;
        font-style:italic;
    }
    #lblTechnician{
        display:inline !important;
        margin-left:10px;
        font-weight:bold;
    }
    #lbl1{
        display:inline !important;
    }
    .wc-cal-event{
        right: 5px !important;
    }
</style>
<script>
    (function( $ ) {
        $.widget( "ui.combobox", {
            _create: function() {
                var input,
                    self = this,
                    select = this.element.hide(),
                    selected = select.children( ":selected" ),
                    value = selected.val() ? selected.text() : "",
                    wrapper = this.wrapper = $( "<span>" )
                        .addClass( "ui-combobox" )
                        .insertAfter( select );

                input = $( "<input id='inputApplicant' name='applicant'>" )
                    .appendTo( wrapper )
                    .val( value )

                    .addClass( "applicantTest" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: function( request, response ) {
                            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                            response( select.children( "option" ).map(function() {
                                var text = $( this ).text();
                                var value=$( this ).val();
                                if ( this.value && ( !request.term || matcher.test(text) ) )
                                    return {
                                        label: text.replace(
                                            new RegExp(
                                                "(?![^&;]+;)(?!<[^<>]*)(" +
                                                    $.ui.autocomplete.escapeRegex(request.term) +
                                                    ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                            ), "<strong>$1</strong>" ),
                                        id: value,
                                        value: text,
                                        option: this
                                    };
                            }) );
                        },
                        select: function( event, ui ) {
                            ui.item.option.selected = true;
                            self._trigger( "selected", event, {
                                item: ui.item.option
                            });
                            $('#patcient').val(ui.item.id);
                        },
                        change: function( event, ui ) {
                            if ( !ui.item ) {
                                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
                                    valid = false;
                                select.children( "option" ).each(function() {
                                    if ( $( this ).text().match( matcher ) ) {
                                        this.selected = valid = true;
                                        return false;
                                    }
                                });
                                if ( !valid ) {
                                    // remove invalid value, as it didn't match anything
                                    $( this ).val( "" );
                                    select.val( "" );
                                    input.data( "autocomplete" ).term = "";
                                    return false;
                                }
                            }
                        }
                    })
                    .addClass( "ui-widget ui-widget-content ui-corner-left" );

                input.data( "autocomplete" )._renderItem = function( ul, item ) {
                    return $( "<li></li>" )
                        .data( "item.autocomplete", item )
                        .append( "<a id='patientBtn'>" + item.label + "</a>" )
                        .appendTo( ul );
                };

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .appendTo( wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "ui-corner-right ui-combobox-toggle" )
                    .click(function() {
                        // close if already visible
                        if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
                            input.autocomplete( "close" );
                            return;
                        }

                        // work around a bug (likely same cause as #5265)
                        $( this ).blur();

                        // pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                        input.focus();
                    });
            },
            dd: function(value) {
                this.element.val(value);
                this.input.val(value);
            },
            destroy: function() {
                this.wrapper.remove();
                this.element.show();
                $.Widget.prototype.destroy.call( this );
            }
			

        });
    })( jQuery );

    $(function() {
        $( "#combobox" ).combobox();
        $( "#toggle" ).click(function() {
            $( "#combobox" ).toggle();
        });
        $("#datepicker").datepicker({
            dateFormat : 'DD, d MM, yy'
        });
	


    });

</script>

<div class="row">
<div class="row col-sm-12">
    <?php echo $this->Session->flash(); ?>
    <form>
    <p><label class="lblLine" for="datepicker" >Date: </label> <input type="text" id="datepicker">
        <button id="btnSaveSettings" style ="width:77px; height:32px" type="button">Go</button>
	</form>
	<div class="row col-sm-12">

	<?php $urlDaily = array ('controller'=>'/Appointments/','action'=>'daily');
	echo $this->Form->button('View Daily Appointment',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlDaily)."'"));
	?>
	 
	 <?php $url = array('controller'=>'Appointments', 'action'=>'index');
		echo $this->Form->button('View All Appointments',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
		<?php echo $this->Form->end(); ?>
         
</div>
    <div id='calendar'></div>
    <div class="model hide">
    <div id="event_add_container">
	<div class="row col-sm-12">
        <form role="form">
		<div class="col-sm-3">
			<span><strong>Date: </strong></span><span class="date_holder"></span><br />
			
			<input type="hidden" name="id"/>
			<label for="title">Title: </label><textarea class="form-control" style="margin-bottom:10px;" type="text" name="title"></textarea>
                        
                        <?php   echo $this->Form->input('combobox', array('label'=>'Applicant:','type'=>'select','div'=>false,'name'=>'applicant','options'=>$applicants, 'empty'=>'(Choose an applicant)'));?>
                        
                        <input type="hidden" name= "data[Employee][id]" value ="<?php echo $employees['Employee']['id']; ?>"/>
			<?php   echo $this->Form->input('patcient', array('label'=>false,'type'=>'select','Hidden'=>'Hidden','div'=>false,'name'=>'patient','options'=>$applicants));?>
                        <br />
			<br />
			<label for="start">Start Time: </label><select name="start" style="position:absolute;right:10px;"><option value="">Select Start Time</option></select>

			<br />
			<label for="end">End Time: </label><select name="end" style="position:absolute;right:10px;"><option value="">Select End Time</option></select>
		</div>
		<div class="col-sm-3">

			
		</div>
		<div class="col-sm-3">
			<?php echo $this->Form->input('status',array('style' => "position:absolute;right:10px;", 'hidden' => 'hidden', 'label'=>'','name'=>'status','options'=>array('NotFinished'=>'Not Finished','Finished'=>'Finished')));?>

		</div>

            <div class="ui-widget">
            </div>
		</form>
    </div>

</div>
    </div>
    
    <div class="model hide">
    <div id="event_edit_container">
	<div class="row col-sm-12">
        <form role="form">
		<div class="col-sm-3">
			<span><strong>Date: </strong></span><span class="date_holder"></span><br />
			
			<input type="hidden" name="id"/>
			<label for="title">Title: </label><textarea class="form-control" style="margin-bottom:10px;" type="text" name="title"></textarea>

                        <?php   echo $this->Form->input('combobox', array('label'=>'Applicant:','type'=>'select','div'=>false,'name'=>'applicant','options'=>$applicants, 'empty'=>'(Choose an applicant)'));?>
                       
                        <input type="hidden" name= "data[Employee][id]" value ="<?php echo $employees['Employee']['id']; ?>"/>
			<br />
			<br />
			<label for="start">Start Time: </label><select name="start" style="position:absolute;right:10px;"><option value="">Select Start Time</option></select>

			<br />
			<label for="end">End Time: </label><select name="end" style="position:absolute;right:10px;"><option value="">Select End Time</option></select>
		</div>
		<div class="col-sm-3">
			<?php echo $this->Form->input('status',array('style' => "position:absolute;right:10px;", 'label'=>'Status','name'=>'status','options'=>array('NotFinished'=>'Not Finished','Finished'=>'Finished')));?>

		</div>

            <div class="ui-widget">
            </div>
		</form>
    </div>

</div>
    </div>