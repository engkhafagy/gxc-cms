<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div id="login-wrapper" class="clearfix">
    <div class="main-col">
        <img src="<?php echo Yii::app()->request->baseUrl?>/gfx/logo.jpg" alt="" class="logo_img" />
        <div class="panel">
            <p class="heading_main">Account Login</p>
				<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-content',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>
				    
				<div class="notification noteinformation png_bg">
				<div>
				<?php echo t('Please fill in your Username and Password'); ?>
				    
				    <?php if (user()->isGuest) echo 'Guest'; else echo 'Member' ; ?>
				</div>
				</div>
									
				<div>
				        <?php echo $form->error($model,'username'); ?>
				        <?php echo $form->label($model,'username'); ?>
				        <?php echo $form->textField($model,'username',array('class'=>'text-input')); ?>
				</div>
				<div class="clear"></div>
				<div>
				        <?php echo $form->error($model,'password'); ?>
				        <?php echo $form->label($model,'password'); ?>
				        <?php echo $form->passwordField($model,'password',array('class'=>'text-input')); ?>
				</div>
				<div class="clear"></div>
				<div id="remember-password" >
				        <?php echo $form->checkBox($model,'rememberMe',array('style'=>'float:left;margin-right: 5px;')); ?>
				        <?php echo $form->label($model,'rememberMe'); ?>
				        <?php echo $form->error($model,'rememberMe'); ?>
				</div>
				<div class="clear"></div>
				<div>
				    <?php echo CHtml::submitButton(t('Login'),array('id'=>'login-content-button','class'=>'bebutton')); ?>
				    
				</div>
				<br class="clear" />
									
				
				
				<?php $this->endWidget(); ?>
				</div><!-- form -->
            </div>
        </div>
    </div>
    
