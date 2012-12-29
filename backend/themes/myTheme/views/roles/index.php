<?php

/*$this->breadcrumbs = array(
	Roles::label(2),
	'Index',
);

$this->menu = array(
	array('label'=>'Create' . ' ' . Roles::label(), 'url' => array('create')),
	array('label'=>'Manage' . ' ' . Roles::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Roles::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */



$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('roles-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
 // page size
Yii::app()->clientScript->registerScript('initPageSize',"
    $('.change-pagesize').live('change', function() {
        $.fn.yiiGridView.update('roles-grid',{ data:{ pageSize: $(this).val() }})
    });"
,CClientScript::POS_READY);

?>





<div class="section" style="border: 1px solid;padding: 9px;">
        <div class="title">
            <img src="<?php  echo Yii::app()->request->baseUrl;?>/gfx/icons/small/controls.png" alt="Controls">
            <span class="hide"></span>
        </div>
        <div class="content">
            <a href="<?php echo Yii::app()->createUrl($this->Id."/create")?>" class="item small tip-s" original-title="Add"><img src="<?php echo Yii::app()->request->baseUrl;?>/gfx/icons/small/add.png" alt="Add"></a>
        </div>
</div>

<!-- report-generator-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'roles-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        'alias',
        'created',
        'updated',
        array(
            'class' => 'CButtonColumn'
        ),
    ),
));
