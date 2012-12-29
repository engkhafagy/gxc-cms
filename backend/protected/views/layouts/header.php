<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<?php

        $cs=Yii::app()->clientScript;
        $cssCoreUrl = $cs->getCoreScriptUrl();
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');
        $cs->registerCssFile($cssCoreUrl . '/jui/css/base/jquery-ui.css');
                

        //Publish Files from backend assets folders

        $urlScript =  $backend_asset.'/js/backend.js';
		$prettyPhotoScript = $backend_asset.'/js/jquery.prettyPhoto.js';
        $cs->registerScriptFile($urlScript, CClientScript::POS_HEAD);
		$cs->registerScriptFile($prettyPhotoScript, CClientScript::POS_HEAD);
   

?>
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="icon" type="<?php echo $backend_asset; ?>/image/ico" href="favicon.ico">
        
    <!-- common stylesheets-->
        <!-- bootstrap framework css -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/bootstrap/css/bootstrap-responsive.min.css">
        <!-- iconSweet2 icon pack (16x16) -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/img/icsw2_16/icsw2_16.css">
        <!-- splashy icon pack -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/img/splashy/splashy.css">
        <!-- flag icons -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/img/flags/flags.css">
        <!-- power tooltips -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/powertip/jquery.powertip.css">
        <!-- google web fonts -->
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">

    <!-- aditional stylesheets -->
        <!-- jQuery UI theme -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/jquery-ui/css/Aristo/Aristo.css">
        <!-- 2 col multiselect -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/multi-select/css/multi-select.css">
        <!-- enchanced select box, tag handler -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/select2/select2.css">
        <!-- datepicker -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/bootstrap-datepicker/css/datepicker.css">
        <!-- timepicker -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/bootstrap-timepicker/css/timepicker.css">
        <!-- colorpicker -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/bootstrap-colorpicker/css/colorpicker.css">
        <!-- switch buttons -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/ibutton/css/jquery.ibutton.css">
        <!-- UI Spinners -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/jqamp-ui-spinner/css/jqamp-ui-spinner.css">
        <!-- multiupload -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/plupload/js/jquery.plupload.queue/css/plupload-beoro.css">
        <!-- main stylesheet -->
            <link rel="stylesheet" href="<?php echo $backend_asset; ?>/css/beoro.css">
			<link rel="stylesheet" type="text/css" href="<?php echo $backend_asset; ?>/css/custom.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo $backend_asset; ?>/css/ie8.css"><![endif]-->
        <!--[if IE 9]><link rel="stylesheet" href="<?php echo $backend_asset; ?>/css/ie9.css"><![endif]-->
            
        <!--[if lt IE 9]>
            <script src="<?php echo $backend_asset; ?>/js/ie/html5shiv.min.js"></script>
            <script src="<?php echo $backend_asset; ?>/js/ie/respond.min.js"></script>
            <script src="<?php echo $backend_asset; ?>/js/lib/flot-charts/excanvas.min.js"></script>
        <![endif]-->

<!-- blueprint CSS framework 
<link rel="stylesheet" type="text/css" href="<?php echo $backend_asset; ?>/css/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $backend_asset; ?>/css/print.css" media="print" />
-->
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo $backend_asset; ?>/css/ie.css" media="screen, projection" />
<![endif]-->
<!--
<link rel="stylesheet" type="text/css" href="<?php echo $backend_asset; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $backend_asset; ?>/css/form.css" />
-->
<link rel="stylesheet" href="<?php echo $backend_asset; ?>/js/lib/powertip/jquery.powertip.css">
<link rel="stylesheet" type="text/css" href="<?php echo $backend_asset; ?>/css/prettyPhoto.css" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
   <!-- top menu -->
            <script src="<?php echo $backend_asset; ?>/js/jquery.fademenu.js"></script>
<script type="text/javascript" charset="utf-8">
	  $(document).ready(function(){
	    $("a[rel^='prettyPhoto']").prettyPhoto({show_title: true,social_tools: '',deeplinking: false});
	  });
</script>
