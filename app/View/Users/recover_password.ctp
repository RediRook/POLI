<?php 
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/'.$clientcase['Clientcase']['id']);
$this->Html->addCrumb('Recover Password', '/usermgmt/users/recoverPassword/'.$clientcase['Clientcase']['id']);
?>
<h2>Recover Client Password</h2>
    This form can be used to generate a new password for a client account. It will send an email to the client with the message entered below, their login details, and a signature or closing paragraph if one is included.
    <?php echo $this->Form->create('User');?>
    <fieldset>
        <?php
        echo $this->Form->hidden('id', array('default' => $clientcase['User']['id']));
        echo $this->Form->input('message', array('type'=>'textarea', 'style'=>'width: 480px; height: 300px;'));
        echo $this->Form->input('signature', array('type'=>'textarea', 'style'=>'width: 480px; height: 100px;'));
        ?>
    </fieldset>

    <?php echo $this->Form->end(__('Send')); ?>
