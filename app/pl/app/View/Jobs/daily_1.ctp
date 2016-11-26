
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
            width:245px;
        }
        select{
            width:245px;
        }
    </style>

	<h3>Daily Job</h3>
    
	<div id="divStart" class="row col-sm-12 text-center">
	<?php
    //Date picker
    echo $this->Form->create('Job'); ?>
    <br />

        <?php
        $a = date('l, d F, Y',time());
        if(isset($this->data['Job']['queryDate']) && $this->data['Job']['queryDate']!=null)
        {
            $a=$this->data['Job']['queryDate'];
        }
        echo $this->Form->input('queryDate', array('label'=>'Date','class'=>'datepicker','type'=>'text','div'=>false,'value'=>$a));
        ?>
        <?php echo $this->Form->input('Staff.Staff');?>
		<?php echo $this->Form->button('Search',array('type'=>'submit','class'=>'btn btn-primary'));?>
		<?php echo $this->Form->button('Print',array('id'=>'btnPrint','class'=>'btn btn-primary','type'=>'button','onclick'=> "window.print();"));

		echo $this->Form->end();?>
    </div>

    <div id="resultsTable" class="row col-sm-12">

        <table class="table table-bordered" id="tb">
            <thead>
            <tr>
                <th>Title</th>
                <th >Customer Name</th>
                <th>Staff</th>
                <th>Service</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Location</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $apt): ?>

                <tr>
                    <td>
                        <?php echo $apt['Job']['title']; ?>
                    </td>
                    <td>
                        <?php echo $apt['Customer']['firstName']." ".$apt['Customer']['lastName']; ?>

                    </td>

                    <td>
                        <?php foreach($apt['Staff'] as $staff): ?>

                            <?php echo $staff['staff_name']; ?>
                            &nbsp;
                        <?php endforeach; ?>

                    </td>
                    <td>
                        <?php foreach($apt['Service'] as $service): ?>

                            <?php echo $service['name']; ?>
                            &nbsp;
                        <?php endforeach; ?>

                    </td>
                    <td>
                        <?php echo date("H:i",strtotime($apt['Job']['startTime']))."     ";?>
                    </td>
                    <td>
                        <?php echo date("H:i",strtotime($apt['Job']['endTime']))."     ";?>
                    </td>
                    <td>
                        <?php echo $apt['Customer']['address'];?>
                    </td>
                    <td>
                        <?php echo $apt['Job']['comment'];?>
                    </td>
                    <td>
                        <?php echo $this->Html->image("send.png", array('url'=>(array('controller'=>'jobs','action' => 'send', $apt['Job']['id']))));?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
	
<div class="row col-sm-12">
	<?php $urlAdd = array ('controller'=>'/Jobs/','action'=>'addJob');
	echo $this->Form->button('Add Job',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
	?>

	<?php $urlCalendar = array ('controller'=>'/Jobs/','action'=>'calendar');
	echo $this->Form->button('View Calendar',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlCalendar)."'"));
	?>
</div>

