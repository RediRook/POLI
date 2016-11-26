
<div>
	<h2><?php echo __('Page'); ?></h2>
	<?php echo $pagecontent['Pagecontent']['page']; ?>
	
	<h2><?php echo __('Content'); ?></h2>
	<?php echo $pagecontent['Pagecontent']['content']; ?>
</div>
<div class="actions">
	<?php $urlEdit = array ('controller'=>'/Pagecontents/','action'=>'edit',$pagecontent['Pagecontent']['id']);
    		echo $this->Form->button('Edit',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlEdit)."'"));
    		?>

   <?php $url = array('controller'=>'/Pagecontents/', 'action'=>'index');
    		echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
    		?>
</div>
