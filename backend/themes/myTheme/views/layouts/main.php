<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php 
        
       if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
            
        $this->renderPartial('application.views.layouts.header',array('backend_asset'=>$backend_asset)); 
        
        ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	
	<div id="topnav">
		<div class="topnav_text"><a href='#'>Home</a> | <a href='#'>My Account</a> | <a href='#'>Settings</a> | <a href='#'>Logout</a> <?php   //shortcut
        $translate=Yii::app()->translate;               
        if($translate->hasMessages()){      
          echo $translate->translateLink('Translate this Page')." | ";                  
        }       
        echo " | ".$translate->editLink('Manage translations')." | ";       
        echo $translate->missingLink('Missing translations');
        ?><a href="<?php echo FRONT_SITE_URL; ?>" id="visit_site" target="_blank">Visit Website</a></div>
	</div>
	
	<div id="header">
		<div id="logo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png"></img><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
    <!--
<?php /*$this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Dashboard', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'test')),
                array('label'=>'Theme Pages',
                  'items'=>array(
                    array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
					array('label'=>'Form Elements', 'url'=>array('/site/page', 'view'=>'forms')),
					array('label'=>'Interface Elements', 'url'=>array('/site/page', 'view'=>'interface')),
					array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
					array('label'=>'Calendar', 'url'=>array('/site/page', 'view'=>'calendar')),
					array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
                  ),
                ),
                array('label'=>'Gii Generated Module',
                  'items'=>array(
                    array('label'=>'Items', 'url'=>array('/theme/index')),
                    array('label'=>'Create Item', 'url'=>array('/theme/create')),
					array('label'=>'Manage Items', 'url'=>array('/theme/admin')),
                  ),
                ),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
    )); */?> --->
	<div id="mainmbMenu"><!--mainmenu-->
    
		<?php 
          $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>t('Dashboard'), 'url'=>array('/besite/index'), 'active'=> ((Yii::app()->controller->id=='besite') && (in_array(Yii::app()->controller->action->id,array('index')))) ? true : false
                        ),                               
                array('label'=>t('Content'),
                       'items'=>array(
                            array('label'=>t('Create Content'), 'url'=>array('/beobject/create')),
                            array('label'=>t('Draft Content'), 'url'=>array('/beobject/draft')),
                            array('label'=>t('Pending Content'), 'url'=>array('/beobject/pending')),
                            array('label'=>t('Published Content'), 'url'=>array('/beobject/published')),
                            array('label'=>t('Manage Content'), 'url'=>array('/beobject/admin'),
                                  'visible'=>user()->isAdmin ? true : false,
                                  'active'=> ((Yii::app()->controller->id=='beobject') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false)
                            )),
                    array('label'=>t('Category'),
                           'items'=>array(
                        array('label'=>t('Create Term'), 'url'=>array('/beterm/create')),
                        
                        array('label'=>t('Manage Terms'), 'url'=>array('/beterm/admin'),
                            'active'=> ((Yii::app()->controller->id=='beterm') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index'))) ? true : false)                                                                                           
                              ),
                        array('label'=>t('Create Taxonomy'), 'url'=>array('/betaxonomy/create')),
                        array('label'=>t('Mangage Taxonomy'), 'url'=>array('/betaxonomy/admin'),
                            'active'=> ((Yii::app()->controller->id=='betaxonomy') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false)                                                                                     
                        
                        ),
                        'visible'=>user()->isAdmin ? true : false,   
                        ),
                    array('label'=>t('Pages'),
                           'items'=>array(
                        array('label'=>t('Create Menu'), 'url'=>array('/bemenu/create'),'visible'=>user()->isAdmin ? true : false,),
                        array('label'=>t('Manage Menus'), 'url'=>array('/bemenu/admin'),
                                'active'=> ((Yii::app()->controller->id=='bemenu') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index'))) ? true : false)),
                        array('label'=>t('Create Queue'), 'url'=>array('/becontentlist/create'),'visible'=>user()->isAdmin ? true : false,),
                        array('label'=>t('Manage Queues'), 'url'=>array('/becontentlist/admin'),
                            'active'=> ((Yii::app()->controller->id=='becontentlist') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index'))) ? true : false)),
                            
                        array('label'=>t('Create Block'), 'url'=>array('/beblock/create'),'visible'=>user()->isAdmin ? true : false,),
                        array('label'=>t('Manage Blocks'), 'url'=>array('/beblock/admin'),
                            'active'=> ((Yii::app()->controller->id=='beblock') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index'))) ? true : false)),
                            
                 
                
                        array('label'=>t('Create Page'), 'url'=>array('/bepage/create'),'visible'=>user()->isAdmin ? true : false,),
                        array('label'=>t('Manage Pages'), 'url'=>array('/bepage/admin'),
                            'active'=> ((Yii::app()->controller->id=='bepage') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false)
                        )),
                    array('label'=>t('Resource'),
                           'items'=>array(
                        array('label'=>t('Create Resource'), 'url'=>array('/beresource/create')),
                        array('label'=>t('Manage Resource'), 'url'=>array('/beresource/admin'),
                             'active'=> ((Yii::app()->controller->id=='resource') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false)
                        
                        )),
                        array('label'=>t('Manage'), 
                           'items'=>array(
                        array('label'=>t('Comments'), 'url'=>array('/comments/admin'),'active'=>Yii::app()->controller->id=='comments' ? true : false),
                        
                        )),
                    array('label'=>t('User'),
                           'items'=>array(
                        array('label'=>t('Create User'), 'url'=>array('/beuser/create')),
                        array('label'=>t('Manage Users'), 'url'=>array('/beuser/admin'),
                              'active'=> ((Yii::app()->controller->id=='beuser') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false
                              ),
                        array('label'=>t('Permission'), 'url'=>array('/rights/assignment'),'active'=>in_array(Yii::app()->controller->id,array('assignment','authItem')) ?true:false),
                        ),
                                                'visible'=>user()->isAdmin ? true : false,   
                        ),
                        array('label'=>t('Settings'), 
                                           'items'=>array(
                                               array('label'=>t('General'), 'url'=>array('/besettings/general')),
                                               array('label'=>t('System'), 'url'=>array('/besettings/system')),
                                         
                                        ),
                                            'visible'=>user()->isAdmin ? true : false,   
                                        ),
                       array('label'=>t('Caching'), 'url'=>array('/becaching/clear'),
                                       'visible'=>user()->isAdmin ? true : false,   
                                        )
            ),
    ));
         /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Dashboard', 'url'=>array('/site/index')),
				array('label'=>'Graphs', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
				array('label'=>'Form', 'url'=>array('/site/page', 'view'=>'forms')),
				array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),				
				array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
				array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
			),
		));*/ ?>
	</div> <!--mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by webapplicationthemes.com<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>