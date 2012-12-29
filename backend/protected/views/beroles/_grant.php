<?php 
	if($stat){
		$img = Yii::app()->request->baseUrl.'/images/accept.png';
		$url = $this->createUrl('beroles/grant',array('id'=>$id, 'obj'=> $obj,'stat'=>'0'));
		$title = Yii::t('app', 'Click to remove');
		$stat = 0;
	}else{
		$img = Yii::app()->request->baseUrl.'/images/remove.png';
		$url = $this->createUrl('beroles/grant',array('id'=>$id, 'obj'=> $obj,'stat'=>'1'));
		$title = Yii::t('app', 'Click to grant');
		$stat = 1;
	}
	echo json_encode(array('url'=>$url, 'img'=>"<img src='".$img."' title='".$title."'/>", 'stat'=>$stat));
?>