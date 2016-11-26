
<div>
<h2><?php  echo __('News'); ?></h2>
	<dl>


		<dd>
			<h3><?php echo h($news['News']['title']); ?></h3>
		</dd>

		<dd>
			<h4><?php echo h($news['News']['date']); ?></h4>
		</dd>

		<dd>
			<p><?php echo $news['News']['body'] ?></p>
		</dd>
	</dl>
</div>

	<?php $urlEdit = array ('controller'=>'/News/','action'=>'edit',$news['News']['id']);
	echo $this->Form->button('Edit',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlEdit)."'"));
	?>
	
	<?php $urlDel = array('controller'=>'News','action'=>'delete',$news['News']['id']);
	echo $this->Form->button('Delete',array('class'=>'btn btn-primary','onclick' => "if(confirm('Are you sure you want to delete this news?'))location.href='".$this->Html->url($urlDel)."'"));
	?>
	
    <?php $url = array('controller'=>'news', 'action'=>'index');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
	?>


