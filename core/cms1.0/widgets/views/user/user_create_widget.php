<div class="form">
<?php $this->render('cmswidgets.views.notification'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'usercreate-form',
        'enableAjaxValidation'=>true,       
        )); 
?>

<?php echo $form->errorSummary($model); ?>
<div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
</div>
<div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
</div>
<div class="row">
        <?php echo $form->labelEx($model,'display_name'); ?>
        <?php echo $form->textField($model,'display_name'); ?>
        <?php echo $form->error($model,'display_name'); ?>
</div>
<div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
</div>

<div class="row">
        <?php echo $form->labelEx($model,'role_id'); ?>
        <?php echo $form->dropDownList($model, 'role_id', GxHtml::listDataEx(Roles::model()->findAllAttributes(null, true)), array('prompt'=>Yii::t('app','Select Role'),'title'=>Yii::t('Roles','tooltip-Roles-role_id'))); ?>
        <?php echo $form->error($model,'role_id'); ?>
</div>


<div class="row buttons">
        <?php echo CHtml::submitButton(t('Save'),array('class'=>'bebutton')); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">    
    CopyString('#UserCreateForm_email','#UserCreateForm_username','email');
    CopyString('#UserCreateForm_email','#UserCreateForm_display_name','email');
</script>
</div><!-- form -->
