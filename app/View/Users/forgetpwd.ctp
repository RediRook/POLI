  

 <style>
 #email_input {width: 15em;}
 
 </style>  
   
<div>    
<div id="left_login">
 <div id="flash_msg"><?php echo $this->Session->flash(); ?></div>
<h1>Change Password</h1>
  <?php echo $this->Form->create('User', array('action' => 'forgetpwd')); ?>
    <table>
    <tbody>
    <tr height="37px"><td></td>
    <td>
    </td></tr>
    <tr>
     <td valign="top" style="text-align:right"><label>Email*</label></td>
    <td>
<?php  echo $this->Form->input('username',array('id'=>'email_input','placeholder'=>'Your Email','label' => false));?>
    </td>
    <td valign="middle" style="text-align:right"><span class="label_login">eg. test@gamil.com</span></td>
    </tr>
    <tr>
    <td></td>
  <td><input class="btn btn-primary" type="submit" value="Get New Password"/></td>
    </tr>
    </tbody>
    </table>
   <?php 	echo $this->Form->end();?>
  </div> 

  </div>