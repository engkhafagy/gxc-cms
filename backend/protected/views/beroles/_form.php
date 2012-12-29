<div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
    'id' => 'roles-form',
    'enableAjaxValidation' => false,
    'enableClientValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>false,
    ),
));
?>
<p class="note">
        Fields with <span class="required">*</span> are required.
</p>

<div class="section" style="border: 1px solid;padding: 9px;">
        <div class="title">
            <img src="<?php echo Yii::app()->request->baseUrl;?>/gfx/icons/small/controls.png" alt="Controls">
            <span class="hide"></span>
        </div>
        <div class="content">
            <button type="reset" name="reset">
                <span><?php echo Yii::t('app','Reset');?> </span>
            </button>
            <button type="submit" class="green" name="submit">
                <span><?php echo Yii::t('app','Sumbit');?></span>
            </button>
            <?php if(Yii::app()->controller->action->id == 'create'):?>
                <button type="submit" class="green" name="submitgenerate">
                    <span><?php echo Yii::t('app','Sumbit And Generate');?></span>
                </button>
            <?php endif;?>
            <button type="submit" class="red" name="cancel">
                <span><?php echo Yii::t('app','Cancel');?></span>
            </button>
        </div>
</div>

        <?php echo $form->errorSummary($model); ?>
        <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model, 'title', array('maxlength' => 100)); ?>
        <?php echo $form->error($model,'title'); ?>
        </div><!-- row -->
        <div class="row">
        <?php echo $form->labelEx($model,'alias'); ?>
        <?php echo $form->textField($model, 'alias', array('maxlength' => 100)); ?>
        <?php echo $form->error($model,'alias'); ?>
        </div><!-- row -->

<?php $this->endWidget(); ?>
</div><!-- form -->

<?php if(Yii::app()->controller->action->id == 'update' && $_GET['id'] != 1):?>
<div class="section" style="border: 1px solid;padding: 9px; ">
        <div class="title">
            <?php echo Yii::t('app', 'Backend Permissions')?>
            <span class="hide"></span>
        </div>
        <div class="content" style="display: block; ">
                <div class="row">
                    <table>
                        <tr>
                            <th>
                                <?php echo Yii::t('app', 'Controllers')?>
                            </th>
                            <?php foreach($Be_tableHeader as $kk1=>$vv1):?>
                            <td>
                                <?php echo $kk1;?>
                            </td>
                            <?php endforeach;?>
                            <td>
                            </td>
                        </tr>
                    <?php foreach($Be_permissions as $k=>$v):?>
                        <tr>
                            <td>
                                <strong>
                                <?php echo $k;
                                
                                ?>
                                </strong>
                            </td>
                            <?php foreach($Be_tableHeader as $kk1=>$vv1):?>
                            <td>
                                <?php 
                                if(isset($v[$k.'.'.$kk1])){
                                    if($v[$k.'.'.$kk1]){
                                        $img = Yii::app()->request->baseUrl.'/images/accept.png';
                                        $url = $this->createUrl('beroles/grant',array('id'=>$_GET['id'], 'obj'=> $k.'.'.$kk1,'stat'=>'0'));
                                        $title = Yii::t('app', 'Click to remove');
                                        $stat = 0;
                                    }else{
                                        $img = Yii::app()->request->baseUrl.'/images/remove.png';
                                        $url = $this->createUrl('beroles/grant',array('id'=>$_GET['id'], 'obj'=> $k.'.'.$kk1,'stat'=>'1'));
                                        $title = Yii::t('app', 'Click to grant');
                                        $stat = 1;
                                    }
                                    echo "<a href='{$url}' class='grantPermissions' stat='{$stat}'><img src='".$img."' title='".$title."'/></a>";//.$k1arr[1];
                                }
                                ?>
                            </td>
                            <?php endforeach;?>
                            <td>
                                <a href='#' class='grantAll'>
                                    <?php echo Yii::t('app', 'Grant All')?>
                                </a>
                                
                            </td>
                        </tr>   
                    <?php endforeach;?>
                    </table>
                </div>
        </div>
        </div>
        
        <!-- FRONT END PERMISSIONS -->
        <div class="section" style="border: 1px solid;padding: 9px; margin-top: 10px;">
        <div class="title">
            <?php echo Yii::t('app', 'Frontend Permissions')?>
            <span class="hide"></span>
        </div>
        <div class="content" style="display: block; ">
                <div class="row">
                    <table>
                        <tr>
                            <th>
                                <?php echo Yii::t('app', 'Controllers')?>
                            </th>
                            <?php foreach($Fe_tableHeader as $kk1=>$vv1):?>
                            <td>
                                <?php echo $kk1;?>
                            </td>
                            <?php endforeach;?>
                            <td>
                            </td>
                        </tr>
                    <?php foreach($Fe_permissions as $k=>$v):?>
                        <tr>
                            <td>
                                <strong>
                                <?php echo $k;
                                
                                ?>
                                </strong>
                            </td>
                            <?php foreach($Fe_tableHeader as $kk1=>$vv1):?>
                            <td>
                                <?php 
                                if(isset($v[$k.'.'.$kk1])){
                                    if($v[$k.'.'.$kk1]){
                                        $img = Yii::app()->request->baseUrl.'/images/accept.png';
                                        $url = $this->createUrl('beroles/grant',array('id'=>$_GET['id'], 'obj'=> $k.'.'.$kk1,'stat'=>'0'));
                                        $title = Yii::t('app', 'Click to remove');
                                        $stat = 0;
                                    }else{
                                        $img = Yii::app()->request->baseUrl.'/images/remove.png';
                                        $url = $this->createUrl('beroles/grant',array('id'=>$_GET['id'], 'obj'=> $k.'.'.$kk1,'stat'=>'1'));
                                        $title = Yii::t('app', 'Click to grant');
                                        $stat = 1;
                                    }
                                    echo "<a href='{$url}' class='grantPermissions' stat='{$stat}'><img src='".$img."' title='".$title."'/></a>";//.$k1arr[1];
                                }
                                ?>
                            </td>
                            <?php endforeach;?>
                            <td>
                                <a href='#' class='grantAll'>
                                    <?php echo Yii::t('app', 'Grant All')?>
                                </a>
                                
                            </td>
                        </tr>   
                    <?php endforeach;?>
                    </table>
                </div>
        </div>
        </div>
        
</div>
<?php endif;?>
<script type="text/javascript">
jQuery(document).ready(function(){

    jQuery('.grantAll').click(function(e){
        e.preventDefault();
        jQuery(this).parents('tr').find(".grantPermissions[stat='1']").trigger('click');
    })
    
    jQuery('.grantPermissions').click(function(e){
        e.preventDefault();
        var link = jQuery(this);
        var url = jQuery(this).attr('href');
        jQuery.ajax({
            url: url,
            beforeSend: function ( xhr ) {
                jQuery(link).html("<img src='<?php echo Yii::app()->request->baseUrl.'/images/ajax-loader.gif'?>'/>");
            },
            success: function(data) {
                data = jQuery.parseJSON(data);
                jQuery(link).attr('href', data.url);
                jQuery(link).attr('stat', data.stat);
                jQuery(link).html(data.img);
            }
        });
    })
})
</script>
