<?php

/**
 * This is the Widget for create new User.
 * 
 * @author Tuan Nguyen <nganhtuan63@gmail.com>
 * @version 1.0
 * @package cmswidgets.user
 *
 */
class UserCreateWidget extends CWidget
{
    
    public $visible=true; 
 
    public function init()
    {
        
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
 
    protected function renderContent()
    { 
                                      
        $model=new UserCreateForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='usercreate-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['UserCreateForm']))
        {
                $model->attributes=$_POST['UserCreateForm'];
                // validate user input password
                if($model->validate()){
                    
                        $new_user = new User;
                        $new_user->scenario='create';
                        $new_user->username=$model->username;
                        $new_user->email=$model->email;
                        $new_user->display_name=$model->display_name;
                        $new_user->password=$model->password;
                        $new_user->role_id=$model->role_id;                        
                        if($new_user->save()){
                            //sayyed: insert new record into table [gxc_auth_assignment] Role:userid
                            $role = Roles::model()->find(array('condition' => 'id='.$new_user->role_id));
                            $auth_assignment = new AuthAssignment;
                            $auth_assignment->itemname = $role->title;
                            $auth_assignment->userid = $new_user->user_id;
                            $auth_assignment->save();
                            user()->setFlash('success',t('Create new User Successfully!'));                                        
                        }
                        
                        $model= new UserCreateForm;
                        Yii::app()->controller->redirect(array('create'));

                }
        }

        $this->render('cmswidgets.views.user.user_create_widget',array('model'=>$model));
    }   
}
