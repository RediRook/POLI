

<div>
<div id="left_login">
<div id="flash_msg"><?php echo $this->Session->flash(); ?></div>
<h1>Reset Your Password</h1>
  <?php echo $this->Form->create(); ?>
    <table>
    <tbody>
    <tr height="37px"><td></td>
    <td>
    <?php echo $this->Session->flash(); ?>
    </td></tr>
    <tr>
     <td valign="top" style="text-align:right"><label>Password*</label></td>
    <td>
<?php  echo $this->Form->input('password',array("type"=>"password","name"=>"data[User][password]",'id'=>'email_input','placeholder'=>'New Password','label' => false));?>

    </td>
    <td valign="middle" style="text-align:right"></td>
    </tr>
    <tr>
     <td valign="top" style="text-align:right"><label>Confirm Password*</label></td>
    <td><?php echo $this->Form->input('token_hash',array("type"=>"password","name"=>"data[User][token_hash]",'id'=>'email_input','placeholder'=>'Confirm your password','label' => false));?>

    </td>
    <td></td>


    </tr>
    <tr>
    <td></td>
 <td>

 <input class="btn btn-primary" type="submit" value="Save"/>
 </td>
    </tr>
    </tbody>
    </table>
   <?php 	echo $this->Form->end();?>
  </div>

  </div>