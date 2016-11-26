<?php 
$this->Html->addCrumb('My account', '/Clientcases/myaccount');
$this->Html->addCrumb('Case Progress', '/ResearchTasks/progress');
?>
<?php if($tasks != null){ ?>
<h2>Progress on your case</h2>
<table>
    <tr>
        <th>Task Description</th>
        <th>Status</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td>
                <?php echo h($task['ResearchTask']['description']); ?>
            </td>
            <td>
                <?php echo h($task['ResearchTask']['status']) ?></td>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<?php } else { ?>
<h2>There are currently no tasks being undertaken</h2>
<?php } ?>