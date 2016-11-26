
        <div id="divMsg">
			<?php echo $this->Session->flash(); ?> 
		</div>
		<div class="col-md-6 col-md-offset-3">
				<?php
				echo $this->Form->create();
				echo $this->Form->input('username', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Username'));
				echo $this->Form->input('password', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'placeholder'=>'Enter Password'));
				

            echo $this->Form->button('Log in', array('type'=>'submit', 'style' => "margin-top:10px;margin-right:10px;", 'id'=>'btnLogin', 'class'=>'btn btn-primary'));

            echo $this->Html->link("Forget Password ?",array("controller"=>"users","action"=>"forgetpwd"));
					?>
		</div>