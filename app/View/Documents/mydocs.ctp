<?php 
$this->Html->addCrumb('My account', '/Clientcases/myaccount');
$this->Html->addCrumb('My Documents', '/documents/mydocs');
?>
<div class="documents view">
<h2>My Documents</h2><br>

    <br>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseOne">
                        Ancestor Documents
                    </a><a class="btn pull-right" data-toggle="modal" href="#myModal1">Upload</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php if (!empty($ancestordocuments)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th class="heading">Ancestor Type</th>
                                <th class="heading">Document Type</th>
                                <th class="heading">File name</th>
                                <th class="heading">Uploaded</th>
                                <th class="actions"><?php echo __('View'); ?></th>
                            </tr>
                            <?php foreach ($ancestordocuments as $ancestordocument): ?>
                                <tr class="list">
                                    <td valign="top">
                                        <?php echo h($ancestordocument['Ancestortype']['ancestor_type']); ?>
                                    </td>
                                    <td valign="top">
                                        <?php echo h($ancestordocument['Documenttype']['type']); ?>
                                    </td>
                                    <td valign="top"><?php echo h($ancestordocument['Document']['filename']); ?>&nbsp;</td>
                                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y',$ancestordocument['Document']['created'])); ?>&nbsp;</td>
                                    <td>
                                        <?php echo h($ancestordocument['0']['comments']); ?>
                                        <?php echo $this->html->link($this->html->image("comments_icon.png"), array('controller' => 'docnotes', 'action' => 'mynotes', $ancestordocument['Document']['id']), array('escape' => false)); ?>
                                        <?php echo $this->html->link($this->html->image("download_icon.png"), array('action' => 'sendfile', $ancestordocument['Document']['id']), array('escape' => false)); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-target="#collapseTwo">
                        Applicant Documents
                    </a><a class="btn pull-right" data-toggle="modal" href="#myModal2" >Upload</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php if (!empty($applicantdocuments)):
                        ?>

                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th class="heading">Applicant</th>
                                <th class="heading">Document Type</th>
                                <th class="heading">File Name</th>
                                <th class="heading">Uploaded</th>
                                <th class="heading">View</th>
                            </tr>
                            <?php foreach ($applicantdocuments as $applicantdocument):
                        if($applicantdocument['Applicant']['clientcase_id'] == $clientcase['Clientcase']['id']){ ?>
                                <tr class="list">
                                    <td valign="top">
                                        <?php echo h($applicantdocument['Applicant']['first_name'].' '.$applicantdocument['Applicant']['surname']); ?>
                                    </td>
                                    <td valign="top">
                                        <?php echo h($applicantdocument['Documenttype']['type']); ?>
                                    </td>
                                    <td valign="top"><?php echo h($applicantdocument['Document']['filename']); ?>&nbsp;</td>
                                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y',$applicantdocument['Document']['created'])); ?>&nbsp;</td>
                                    <td>
                                        <?php echo h($applicantdocument['0']['comments']); ?>
                                        <?php echo $this->html->link($this->html->image("comments_icon.png"), array('controller' => 'docnotes', 'action' => 'mynotes', $applicantdocument['Document']['id']), array('escape' => false)); ?>
                                        <?php echo $this->html->link($this->html->image("download_icon.png"), array('action' => 'sendfile', $applicantdocument['Document']['id']), array('escape' => false)); ?>
                                    </td>
                                </tr>
                            <?php }
                            endforeach; ?>
                        </table>

                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal hide" id="myModal1"><!-- note the use of "hide" class -->

    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3>Upload a document relating to an ancestor</h3>
    </div>
    <div class="modal-body">

        <?php echo $this->Form->create('Document', array('type' => 'file', 'default' => 'false', 'action' => 'uploadancestor'));?>
        <fieldset>
            <?php
            //echo $this->Form->hidden('archive_id', array('default' => $client['Client']['archive_id']));
            echo $this->Form->input('file', array('id' => 'file', 'type' => 'file'));
            echo $this->Form->input('ancestortype_id', array('id' => 'ancestortype_id','options'=>$ancestorTypes, 'label'=>'Family member'));
            echo $this->Form->input('documenttype_id', array('id' => 'documenttype_id','options'=>$documentTypes, 'label'=>'Type of document'));

            ?>
        </fieldset>
    </div>
    <div class="modal-footer">
        <?php echo $this->Form->end(__('Upload File')); ?>
    </div>
</div>


<div class="modal hide" id="myModal2"><!-- note the use of "hide" class -->

    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3>Upload a document relating to an applicant</h3>
    </div>
    <div class="modal-body">

        <?php echo $this->Form->create('Document', array('type' => 'file', 'default' => 'false', 'action' => 'uploadapplicant'));?>
        <fieldset>
            <?php
            //echo $this->Form->hidden('archive_id', array('default' => $client['Client']['archive_id']));
            echo $this->Form->input('file', array('type' => 'file'));
            echo $this->Form->input('applicant_id', array('options'=>$applicants, 'label'=>'Applicant'));
            echo $this->Form->input('documenttype_id', array('options'=>$documentTypes, 'label'=>'Type of document'));
            ?>
        </fieldset>
    </div>
    <div class="modal-footer">
        <?php echo $this->Form->end(__('Upload File')); ?>
    </div>
</div>
