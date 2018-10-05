

		<div class="login-page noborder">
			<div class="form noborder">
				<?php echo $this->Html->image('Cash_Mate_logo.png', array('width' => '180px')); ?><br/><br/>
				<?php echo $this->Form->create('User', array('class' => 'm-t-5')); ?>
				<?php echo $this->Session->flash(); ?>				
					<?php echo $this->Form->input('username', array('placeholder' => 'USERNAME', 'label' => false, 'class' => 'nooutline bold color-ccc noshadow noborder noradius form-control input-lg graybg')); ?>
					<?php echo $this->Form->input('password', array('placeholder' => 'PASSWORD', 'label' => false, 'class' => 'nooutline bold color-ccc noshadow noborder noradius form-control input-lg graybg')); ?>					
					<button type="submit" class="btn btn-danger m-t-28 bold noborder nooutline">LOG IN</button>				
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	






