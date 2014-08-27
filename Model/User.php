<?php
/**
 * @property User $User
 */
App::uses('Security', 'Utility');

class User extends AppModel {
    public $validate = array(
        'firstname'=>array(
            'rule'=>'notEmpty',
            'message'=>'Please enter a first name.'
        ),
        'email'=>array(
            'rule'=>array('email', true),
            'allowEmpty'=>false,
            'message'=>'Please use the correct email.'
        ),
        'password'=>array(
            'rule'=>array('between', 4,8),
            'allowEmpty'=>false,
            'message'=>'The password should be 4-8 length.'

        )
    );

    public function beforeSave($options=array()){
        $this->data['User']['password'] = Security::hash($this->data['User']['password'], 'sha1', true);
        return true;
    }

}

?>
