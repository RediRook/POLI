
<?php echo $this->Html->script('jquery'); ?>
<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />

<?php echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));?>
<?php echo $this->Html->script('jquery-datepicker1'); ?>
<?php echo $this->Html->script('jquery-datepicker2'); ?>
    <link href="http://live.datatables.net/media/css/demo_table.css" rel="stylesheet">
<?php echo $this->Html->script('dataTable.js'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tb').dataTable( {
                "iDisplayLength": 10,
                "bLengthChange": false,
                "bFilter": false
            });
        });
    </script>
    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat : 'DD, d MM, yy'
            });

        });
    </script>
    <style>
        input{
            width:350px;
        }
        select{
            width:350px;
        }
    </style>

	<h3>Daily Appointment</h3>
    
	<div id="divStart" class="row col-sm-12 text-center">
	<?php
    //Date picker
    echo $this->Form->create('Appointment'); ?>
    <br />

        <?php
        $a = date('l, d F, Y',time());
        if(isset($this->data['Appointment']['queryDate']) && $this->data['Appointment']['queryDate']!=null)
        {
            $a=$this->data['Appointment']['queryDate'];
        }
        echo $this->Form->input('queryDate', array('label'=>'Date','class'=>'datepicker','type'=>'text','div'=>false,'value'=>$a));
        ?>
        <?php echo $this->Form->input('Employee.Employee');?>
		<?php echo $this->Form->button('Search',array('type'=>'submit','class'=>'btn btn-primary'));?>
		<!--<?php echo $this->Form->button('Print',array('id'=>'btnPrint','class'=>'btn btn-primary','type'=>'button','onclick'=> "window.print();"));

		echo $this->Form->end();?>!-->
    </div>

    <div id="resultsTable" class="row col-sm-12">

        <table class="table table-bordered" id="tb">
            <thead>
            <tr>
                <th>Title</th>
                <th >Customer Name</th>
                <th>Employee</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $apt): ?>

                <tr>
                    <td>
                        <?php echo $apt['Appointment']['title']; ?>
                    </td>
                    <td>
                        <?php echo $apt['Applicant']['first_name'].' '.$apt['Applicant']['surname']; ?>

                    </td>

                    <td>
                        <?php echo $apt['Employee']['first_name'].' '.$apt['Employee']['surname'];?>

                    </td>
                    <td>
                        <?php echo date("H:i",strtotime($apt['Appointment']['startTime']))."     ";?>
                    </td>
                    <td>
                        <?php echo date("H:i",strtotime($apt['Appointment']['endTime']))."     ";?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
	
<div class="row col-sm-12">
	<!--<?php $urlAdd = array ('controller'=>'Appointments','action'=>'addAppointment');
	echo $this->Form->button('Add Appointment',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
	?>!-->
    		<?php $url = array('controller'=>'Appointments', 'action'=>'index');
		echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
		<?php echo $this->Form->end(); ?>

	<!--<?php $urlCalendar = array ('controller'=>'/Appointments','action'=>'calendar');
	echo $this->Form->button('View Calendar',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlCalendar)."'"));
	?>!-->
</div>

