<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('All Employees', '/allemployees');
$this->Html->addCrumb('Edit User', '/editUser/'.$userId);
?>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Edit Staff Details'); ?></span>
                <span class="umstyle2" style="float:right">
                <?php
                    echo "<span class='icon'><a href='".$this->Html->url('/viewUser/'.$userId)."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='View'></a></span>";
                    echo "<span class='icon'><a href='".$this->Html->url('/changeUserPassword/'.$userId)."'><img src='".SITE_URL."usermgmt/img/password.png' border='0' alt='Change Password' title='Change Password'></a></span>";
                    ?>
                </span>
                <div style="clear:both"></div>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
            <p>
            <div class="astreq">Fields marked with <font color='red'>*</font> are required.</div>
            </p>
			<div class="um_box_mid_content_mid" id="register">
				<div class="um_box_mid_content_mid_left">
					<?php echo $this->Form->create('User'); ?>
					<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
			<?php   if (count($userGroups) >2) { ?>
						<div>
							<div class="umstyle3"><?php echo __('Group');?><font color='red'>*</font></div>
							<div class="umstyle4" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
							<div style="clear:both"></div>
						</div>
			<?php   }   ?>
					<div>
						<div class="umstyle3"><?php echo __('Username');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("username" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
                        <div class="umstyle7">Username must be unique and must contain at least 4 characters.</div>
                        <div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('First Name');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("Employee.first_name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('Last Name');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("Employee.surname" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"><?php echo __('Email');?><font color='red'>*</font></div>
						<div class="umstyle4" ><?php echo $this->Form->input("Employee.email" ,array('label' => false,'div' => false,'class'=>"umstyle5" ))?></div>
						<div style="clear:both"></div>
					</div>
					<div>
						<div class="umstyle3"></div>
						<div class="umstyle4"><?php echo $this->Form->Submit(__('Update User'));?></div>
						<div style="clear:both"></div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="um_box_mid_content_mid_right" align="right"></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<script>
document.getElementById("UserUserGroupId").focus();
</script>