<?php
// in your view file

?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<li><?php echo $this->Html->link(__('Home'), array('controller' => 'Pagecontents')); ?> </li>
	</ul>
</div>
<?php  
    echo $this->Html->scriptBlock(  
        "function selectURL(url) {  
            if (url == '') return false;  

            url = '".$this->Html->url('/uploads/')."' + url;  

            field = window.top.opener.browserWin.document.forms[0].elements[window.top.opener.browserField];  
            field.value = url;  
            if (field.onchange != null) field.onchange();  
            window.top.close();  
            window.top.opener.browserWin.focus();  
        }"  
    );  
?>  

<?php  
    echo $this->Form->create(  
        null,  
        array(  
            'type' => 'file',  
            'url' => array(  
                'action' => 'upload'  
            )  
        )  
    );  
    echo $this->Form->label(  
        'Image.image',  
        'Upload image'  
    );  
    echo $this->Form->file(  
        'Image.image'  
    );      
    echo $this->Form->end('Upload');  
?>  

<?php if(isset($images[0])): ?>

	<table cellpadding= "0" cellspacing="0">
	<tr>
			<th>Image name</th>
			<th>Image preview</th>
			<th>Size</th>
			<th>Uploaded Date</th>
			<th></th>
	</tr>
	<?php foreach ($images as $the_image): ?>
	<?php $fileurl = $the_image['basename']; ?>
	<tr>
	    <td><?php echo $this->Html->link($the_image['basename'],'#',array('onclick' => 'selectURL("'.$the_image['basename'].'");'));?></td>
		<td><?php echo $this->Html->image('/uploads/'.$the_image['basename'], array('width' => '75px')); ?>&nbsp;</td>
		<td><?php echo $this->Number->toReadableSize($the_image['size']);  ?>&nbsp;</td>
		<td><?php echo $this->Time->format('d-m-Y h:i:s A', $the_image['last_changed'], null, +10);  ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $fileurl), null, __('Are you sure you want to delete the image %s?', $fileurl)); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php endif;?>