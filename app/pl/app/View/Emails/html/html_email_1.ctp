



<p>Dear <?php echo $job['Customer']['customer_name'].",";?></p>


<p> We are from Bayside gardener would like to notify you on the jobs we did during our previous visit on<?php echo $job['Job']['startTime']; ?> to <?php echo $job['Job']['endTime']; ?></p>
  <p> Staff name: <?php foreach($job['Staff'] as $staff): ?></p>

        <?php echo $staff['staff_name'] ?>
        &nbsp;
    <?php endforeach; ?>

  <p> Jobs done:</p>
        <?php foreach($job['Service'] as $service): ?>

            <?php echo $service['name'] ?>
            &nbsp;
        <?php endforeach; ?>

<p>If you have any questions please send us an email or contact us at -19238-19481=0</p>

Thank you

Michael amerana



  


