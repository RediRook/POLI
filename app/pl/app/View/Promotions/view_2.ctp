<div>
<h2><?php  echo __('Promotion'); ?></h2>
	<dl>
		<dd>
			<h3><?php echo h($promotion['Promotion']['title']); ?></h3>

		</dd>

		<dd>
			<h4><?php echo h($promotion['Promotion']['date']); ?></h4>

		</dd>

		<dd>
            <?php foreach($photos as $photo): ?>

                <img src="<?php echo $this->webroot . "app/webroot/" . $photo['Photo']['file_path'];?>">
            <?php endforeach; ?>
		</dd>
	</dl>
</div>

	<?php $urlEdit = array ('controller'=>'/Promotions/','action'=>'edit',$promotion['Promotion']['id']);
	echo $this->Form->button('Edit',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlEdit)."'"));
	?>
	
	<?php $urlDel = array('controller'=>'Promotions','action'=>'delete',$promotion['Promotion']['id']);
	echo $this->Form->button('Delete',array('class'=>'btn btn-primary','onclick' => "if(confirm('Are you sure you want to delete this promotion?'))location.href='".$this->Html->url($urlDel)."'"));
	?>
	
    <?php $url = array('controller'=>'Promotions', 'action'=>'index');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>


