<?php

class BerolesController extends BeController/*GxController*/ {
    
	public function actionView($id) {
		//$this->layout=false;
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Roles'),
        ));
	}
    
	public function actionCreate() {
		$model = new Roles;
        if (isset($_POST['Roles'])) {
            $model->setAttributes($_POST['Roles']);
            $model->created = date('Y-m-d H:i:s');
            $model->updated = date('Y-m-d H:i:s');
            if ($model->save()) {
                $authItem = new AuthItem;
                $authItem->name = $_POST['Roles']['title'];
                $authItem->type = 2;
                $authItem->save();
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else{
                    if(isset($_POST['submitgenerate']))
                        $this->redirect(array('update', 'id' => $model->id));
                    else
                        $this->redirect(array('index'));
                }
            }
        }
        $this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
	   $model = $this->loadModel($id, 'Roles');
        $name = $model->title;
        $authItem = new AuthItem;
        $authItemChild = new AuthItemChild;
        $authAssignment = new AuthAssignment;
        
        if (isset($_POST['Roles'])) {
            $model->setAttributes($_POST['Roles']);
            $model->updated = date('Y-m-d H:i:s');
            if ($model->save()) {
                $authItem->updateAll(array('name' => $_POST['Roles']['title']), "name = '".$name."'");
                $authItemChild->updateAll(array('parent' => $_POST['Roles']['title']), "parent = '".$name."'");
                $authAssignment->updateAll(array('itemname' => $_POST['Roles']['title']), "itemname = '".$name."'");
                $this->redirect(array('index'));
            }
        }
        
        //setting view for permissions      
        /*$auth = new AuthItem();
        $authItemChild = new AuthItemChild();
        $criteria = new CDbCriteria;  
        $criteria->addCondition('type = 1 AND name Like "Be%"');
        $data = $auth->findAll($criteria);
        $controllers = CHtml::listData($data, 'name' , 'name');
        $permissions = array();
        $tableHeader = array();
        foreach ($controllers as $controller){
            $controllerName = substr($controller, 0, -2);
            $criteria = new CDbCriteria;
            $criteria->addCondition("name like '{$controllerName}%' and name != '{$controllerName}.*'");
            $data = $auth->findAll($criteria);
            $actions = CHtml::listData($data, 'name' , 'name');
            foreach($actions as $action){
                $actions[$action] = AuthItemChild::model()->exists("parent = '{$name}' and child = '{$action}'");
                $tableHeader[(substr($action, strlen($controllerName)+1))] = $action;
            }
            $permissions[$controllerName]= $actions;
        }
        ksort($tableHeader);*/
        $front_end = $this->getPermissions('Fe', $name);
        $back_end  = $this->getPermissions('Be', $name);
        //end of permissions

        $this->render('update', array(
                'model' => $model,
                'Be_permissions'=>$back_end[1],
                'Be_tableHeader'=>$back_end[0],
                'Fe_permissions'=>$front_end[1],
                'Fe_tableHeader'=>$front_end[0]
                ));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Roles')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
	    $model = new Roles('search');
        $model->unsetAttributes();
        if (isset($_GET['pageSize'])) {
            Yii::app()->params['defaultPageSize']=(int)$_GET['pageSize'];
        }
        if (isset($_GET['Roles']))
            $model->setAttributes($_GET['Roles']);
        $this->render('index', array(
            'model' => $model,
        ));
	}

	public function actionAdmin() {
		$model = new Roles('search');
		$model->unsetAttributes();

		if (isset($_GET['Roles']))
			$model->setAttributes($_GET['Roles']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
    
    public function actionGrant($id, $obj, $stat){
        $model = $this->loadModel($id, 'Roles');
        $authItemChild = new AuthItemChild();
        $roleName = $model->title;
        $authItemChild->parent = $roleName;
        $authItemChild->child = $obj;
        if($stat){
            $authItemChild->save();
        }else{
            $authItemChild->deleteAll("parent = '".$roleName."' AND child = '".$obj."'");
        }
        $this->renderPartial('_grant', array('id'=> $id, 'obj'=> $obj, 'stat'=>$stat));
    }
    
    protected function getPermissions($display_type, $name) {
        $auth = new AuthItem();
        $authItemChild = new AuthItemChild();
        $criteria = new CDbCriteria;
        if($display_type == "Be") {
            $criteria->addCondition('type = 1 AND name Like "Be%"');
        }
        else {
            $criteria->addCondition('type = 1 AND name Not Like "Be%"');
        }
        $data = $auth->findAll($criteria);
        $controllers = CHtml::listData($data, 'name' , 'name');
        $permissions = array();
        $tableHeader = array();
        foreach ($controllers as $controller){
            $controllerName = substr($controller, 0, -2);
            $criteria = new CDbCriteria;
            $criteria->addCondition("name like '{$controllerName}%' and name != '{$controllerName}.*'");
            $data = $auth->findAll($criteria);
            $actions = CHtml::listData($data, 'name' , 'name');
            foreach($actions as $action){
                $actions[$action] = AuthItemChild::model()->exists("parent = '{$name}' and child = '{$action}'");
                $tableHeader[(substr($action, strlen($controllerName)+1))] = $action;
            }
            $permissions[$controllerName]= $actions;
        }
        ksort($tableHeader);
        return array($tableHeader, $permissions);
    }
}
