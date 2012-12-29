<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php

		if (YII_DEBUG)
			$backend_asset = Yii::app() -> assetManager -> publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
		else
			$backend_asset = Yii::app() -> assetManager -> publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);

		//echo Yii::getPathOfAlias('cms.assets.backend');
		//echo  Yii::app()->baseUrl.'/js/file.js'
		$this -> renderPartial('application.views.layouts.header', array('backend_asset' => $backend_asset));
		?>
	</head>
	<body class="bg_d">
		<!-- main wrapper (without footer) -->
		<div class="main-wrapper">
			<!-- top bar -->
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
	<div class="container">
		<div id="fade-menu" class="pull-left">
                    
          <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>false,
			'activeCssClass'=>'list_active',
			'items'=>array(
					array('label'=>'<span id="menu_dashboard" class="micon"></span>'.t('Dashboard'), 'url'=>array('/besite/index') ,'linkOptions'=>array('class'=>'menu_0'),
                                   'active'=> ((Yii::app()->controller->id=='besite') && (in_array(Yii::app()->controller->action->id,array('index')))) ? true : false
					    ),                               
					array('label'=>'<span id="menu_content" class="micon"></span>'.t('Content'),  'url'=>'javascript:void(0);','linkOptions'=>array('class'=>'menu_1' ), 'itemOptions'=>array('id'=>'menu_1'), 
					       'items'=>array(
						array('label'=>t('Create Content'), 'url'=>array('/beobject/create')),
						array('label'=>t('Draft Content'), 'url'=>array('/beobject/draft')),
						array('label'=>t('Pending Content'), 'url'=>array('/beobject/pending')),
						array('label'=>t('Published Content'), 'url'=>array('/beobject/published')),
						array('label'=>t('Manage Content'), 'url'=>array('/beobject/admin'),
						      'visible'=>user()->isAdmin ? true : false,
						      'active'=> ((Yii::app()->controller->id=='beobject') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false)
					    )),
					array('label'=>'<span id="menu_taxonomy" class="micon"></span>'.t('Category'), 'url'=>'javascript:void(0);','linkOptions'=>array('id'=>'menu_2','class'=>'menu_2'),  'itemOptions'=>array('id'=>'menu_2'),
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
					array('label'=>'<span id="menu_page" class="micon"></span>'.t('Pages'), 'url'=>'javascript:void(0);','linkOptions'=>array('id'=>'menu_3','class'=>'menu_3'), 'itemOptions'=>array('id'=>'menu_3'),
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
					array('label'=>'<span id="menu_resource" class="micon"></span>'.t('Resource'), 'url'=>'javascript:void(0);','linkOptions'=>array('id'=>'menu_4','class'=>'menu_4'), 'itemOptions'=>array('id'=>'menu_4'), 
					       'items'=>array(
						array('label'=>t('Create Resource'), 'url'=>array('/beresource/create')),
						array('label'=>t('Manage Resource'), 'url'=>array('/beresource/admin'),
						     'active'=> ((Yii::app()->controller->id=='resource') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false)
						
					    )),
						array('label'=>'<span id="menu_manage" class="micon"></span>'.t('Manage'), 'url'=>'javascript:void(0);','linkOptions'=>array('id'=>'menu_5','class'=>'menu_5'), 'itemOptions'=>array('id'=>'menu_5'), 
					       'items'=>array(
						array('label'=>t('Comments'), 'url'=>array('/comments/admin'),'active'=>Yii::app()->controller->id=='comments' ? true : false),
						//array('label'=>'Like/Rating', 'url'=>array('/like/admin')),
						//array('label'=>'Survey', 'url'=>array('/survey/admin')),
						     
						
					    )),
					array('label'=>'<span id="menu_user" class="micon"></span>'.t('User'), 'url'=>'javascript:void(0);','linkOptions'=>array('id'=>'menu_6','class'=>'menu_6'), 'itemOptions'=>array('id'=>'menu_6'), 
					       'items'=>array(
						array('label'=>t('Create User'), 'url'=>array('/beuser/create')),
						array('label'=>t('Manage Users'), 'url'=>array('/beuser/admin'),
						      'active'=> ((Yii::app()->controller->id=='beuser') && (in_array(Yii::app()->controller->action->id,array('update','view','admin','index')))) ? true : false
						      ),
						array('label'=>t('Permission'), 'url'=>array('/rights/assignment'),'active'=>in_array(Yii::app()->controller->id,array('assignment','authItem')) ?true:false),
					    ),
                                                'visible'=>user()->isAdmin ? true : false,   
					    ),
                        array('label'=>'<span id="menu_setting" class="micon"></span>'.t('Settings'), 'url'=>'javascript:void(0);','linkOptions'=>array('id'=>'menu_7','class'=>'menu_7'), 'itemOptions'=>array('id'=>'menu_7'), 
                                           'items'=>array(
                                               array('label'=>t('General'), 'url'=>array('/besettings/general')),
                                               array('label'=>t('System'), 'url'=>array('/besettings/system')),
                                         
                                        ),
                                            'visible'=>user()->isAdmin ? true : false,   
                                        ),
                       array('label'=>'<span id="menu_caching" class="micon"></span>'.t('Caching'), 'url'=>array('/becaching/clear'),'linkOptions'=>array('id'=>'menu_8','class'=>'menu_8'), 'itemOptions'=>array('id'=>'menu_8'), 
                                           'items'=>array(
                                             
                                        ),
                                            'visible'=>user()->isAdmin ? true : false,   
                                        )
					
				),
			)); ?>
		
		</div>

						 <div id="nav">
							<ul class="right">
                            	<li>
                                <?php	                                            
                                $translate=Yii::app()->translate;
                                echo $translate->dropdown();                                                                                       
                                 ?>
                            &nbsp;</li>
								<li style="color: beige;"><?php echo t('Welcome'); ?>, <strong><?php echo user()->getModel('display_name'); ?></strong>&nbsp;|&nbsp;</li>
								<li><a href="<?php echo Yii::app()->request->baseUrl?>/beuser/updatesettings"><?php echo t('Settings'); ?></a>&nbsp;|&nbsp;</li>
								<li><a href="<?php echo Yii::app()->request->baseUrl?>/beuser/changepass"><?php echo t('Change Password'); ?></a>&nbsp;|&nbsp;</li>
								<li><a href="<?php echo Yii::app()->request->baseUrl?>/besite/logout"><?php echo t('Sign out'); ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- header -->
			<header>
				<div class="container">
					<div class="row">
						<div class="span3">
							<div class="main-logo">
								<a href="index28ad.php?page=dashboard"><img src="<?php echo $backend_asset; ?>/img/logo.png" alt=" Admin" style="width: 32px;height: 36px;"></a>
							</div>
						</div>
						<div class="span5">
							<nav class="nav-icons">
								<ul>
									<li>
										<a href="javascript:void(0)" class="ptip_s" title="Dashboard"><i class="icsw16-home"></i></a>
									</li>
									<li>
										<a href="javascript:void(0)" class="ptip_s" title="Content"><i class="icsw16-create-write"></i></a>
									</li>
									<li>
										<a href="javascript:void(0)" class="ptip_s" title="Mailbox"><i class="icsw16-mail"></i><span class="badge badge-info">6</span></a>
									</li>
									<li>
										<a href="javascript:void(0)" class="ptip_s" title="Comments"><i class="icsw16-speech-bubbles"></i><span class="badge badge-important">14</span></a>
									</li>
									<li class="active">
										<span class="ptip_s" title="Statistics (active)"><i class="icsw16-graph"></i></span>
									</li>
									<li>
										<a href="javascript:void(0)" class="ptip_s" title="Settings"><i class="icsw16-cog"></i></a>
									</li>
								</ul>
							</nav>
						</div>
						<div class="span4">
							<div class="user-box">
								<div id="language-bar" >
									<?php	//shortcut
										$translate=Yii::app()->translate;				
										if($translate->hasMessages()){		
										  echo $translate->translateLink('Translate this Page')."|";				  
										}		
										echo $translate->editLink('Manage translations')."|";		
										echo $translate->missingLink('Missing translations');
										
										
										?>
			  					</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- breadcrumbs -->
			<div class="container">
				<ul id="breadcrumbs">
					<li style="margin-top: 3px">
						<a href="javascript:void(0)"><i class="icon-home"></i></a>
					</li>
					<li>
						<a href="javascript:void(0)">Content</a>
					</li>
					<li>
						<a href="javascript:void(0)">Article: Lorem ipsum dolor...</a>
					</li>
					<li>
						<a href="javascript:void(0)">Comments</a>
					</li>
					<li>
						<span>Lorem ipsum dolor sit amet...</span>
					</li>
				</ul>
			</div>
			<!-- main content -->
			<div class="container">
				<div class="row-fluid">
					<div class="span2">
						<div class="sidebar">
							<ul id="pageNav">
								<li>
									<a href="#n_slider_progressbar">Slider, Progressbar</a>
								</li>
								<li>
									<a href="#n_multiselect">Multiselect</a>
								</li>
								<li>
									<a href="#n_combobox">Combobox</a>
								</li>
								<li>
									<a href="#n_ench_select">Enchanced select box, tag handler</a>
								</li>
								<li>
									<a href="#n_fileupload">Fileupload</a>
								</li>
								<li>
									<a href="#n_masked_inputs">Masked inputs</a>
								</li>
								<li>
									<a href="#n_strength_meter">Password strength meter</a>
								</li>
								<li>
									<a href="#n_datepicker">Datepicker</a>
								</li>
								<li>
									<a href="#n_timepicker">Timepicker</a>
								</li>
								<li>
									<a href="#n_colorpicker">Colorpicker</a>
								</li>
								<li>
									<a href="#n_switch_buttons">Switch Buttons</a>
								</li>
								<li>
									<a href="#n_autosize_textarea">Autosize Textarea</a>
								</li>
								<li>
									<a href="#n_word_character_limiter">Textarea counter</a>
								</li>
								<li>
									<a href="#n_spinners">UI Spinners</a>
								</li>
								<li>
									<a href="#n_multiupload">Multiupload</a>
								</li>
								<li>
									<a href="#n_wysiwg">WYSIWG Editor</a>
								</li>
								<li>
									<a href="#n_regular_elements">Form controls</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="span10">
						<?php if(isset($this->menu)) :?>
						<?php if(count($this->menu) >0 ): ?>
							<div class="header-info">
								<?php
								   
								    $this->widget('zii.widgets.CMenu', array(
								'items'=>$this->menu,
								'htmlOptions'=>array(),
								    ));
								   
								?>
							</div>
                        <?php endif; ?>
                        <?php endif; ?>
					<div class="w-box">
                            <div class="w-box-header">
                                <h4><?php echo (isset($this->titleImage)&&($this->titleImage!=''))? '<img src="'.$backend_asset.'/'.$this->titleImage.'" />' : ''; ?><?php echo isset($this->pageTitle)? $this->pageTitle : '';  ?></h4>
                            </div>
                            <?php if (isset($this->pageHint)&&($this->pageHint!='')) : ?>
								<p><?php echo $this->pageHint; ?></p>
							<?php endif; ?>
                            <div class="w-box-content cnt_a">
								<?php echo $content; ?>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="footer_space"></div>
		</div>
		<!-- footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="span5">
						<div>
							&copy; Your Company 2012
						</div>
					</div>
					<div class="span7">
						<ul class="unstyled">
							<li>
								<a href="#">First link</a>
							</li>
							<li>
								&middot;
							</li>
							<li>
								<a href="#">Second link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!-- Common JS -->
        <!-- bootstrap Framework plugins -->
            <script src="<?php echo $backend_asset; ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- top mobile menu -->
            <script src="<?php echo $backend_asset; ?>/js/selectnav.min.js"></script>
        <!-- actual width/height of hidden DOM elements -->
            <script src="<?php echo $backend_asset; ?>/js/jquery.actual.min.js"></script>
        <!-- jquery easing animations -->
            <script src="<?php echo $backend_asset; ?>/js/jquery.easing.1.3.min.js"></script>
        <!-- power tooltips -->
            <script src="<?php echo $backend_asset; ?>/js/lib/powertip/jquery.powertip-1.1.0.min.js"></script>
        <!-- date library -->
            <script src="<?php echo $backend_asset; ?>/js/moment.min.js"></script>
        <!-- common functions -->
            <script src="<?php echo $backend_asset; ?>/js/beoro_common.js"></script>

        <!-- colorbox -->
            <script src="<?php echo $backend_asset; ?>/js/lib/colorbox/jquery.colorbox.min.js"></script>
        <!-- responsive image grid -->
            <script src="<?php echo $backend_asset; ?>/js/lib/wookmark/jquery.imagesloaded.min.js"></script>
            <script src="<?php echo $backend_asset; ?>/js/lib/wookmark/jquery.wookmark.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				//* jQuery.browser.mobile (http://detectmobilebrowser.com/)
				//* jQuery.browser.mobile will be true if the browser is a mobile device
				(function(a) {
					jQuery.browser.mobile = /android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
				})(navigator.userAgent || navigator.vendor || window.opera);
				//replace themeforest iframe
				if(jQuery.browser.mobile) {
					if(top !== self)
						top.location.href = self.location.href;
				}
				if($(window).width() > '1280') {
					$('body').append('<a href="javascript:void" class="fluid_lay" style="position:fixed;top:6px;right:10px;z-index:10000" title="fluid layout"><i class="splashy-arrow_state_grey_left"></i><i class="splashy-arrow_state_grey_right"></i></a>');
					$('.fluid_lay').click(function() {
						var url = window.location.href;
						if(url.indexOf('?') > -1) {
							url += '&fluid=1'
						} else {
							url += '?fluid=1'
						}
						window.location.href = url;
					});
					$(window).on('resize', function() {
						if($(window).width() > '1280') {
							$('.fluid_lay').show();
						} else {
							$('.fluid_lay').hide();
						}
					})
				}
			})
		</script>

		<!-- From Site  -->
		<script type="text/javascript">
			$(document).ready(function() {
				//Hide the second level menu
				$('#left-sidebar ul li ul').hide();
				//Show the second level menu if an item inside it active
				$('li.list_active').parent("ul").show();

				$('#left-sidebar').children('ul').children('li').children('a').click(function() {

					if($(this).parent().children('ul').length > 0) {
						$(this).parent().children('ul').toggle();
					}

				});
			});

		</script>
	</body>
</html>