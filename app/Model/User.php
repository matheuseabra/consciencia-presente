<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $name = 'User';
    public $useTable = 'users';
    public $hasMany = array('Post' => array('counterCache' => true));
    
    public $validate = array(
        'username' => array(
            'rule' => 'notEmpty'
        ),
        'password' => array(
            'rule' => 'notEmpty'
        ),
        'email' => array(
            'rule' => 'notEmpty'
        ),
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'last_name' => array(
            'rule' => 'notEmpty'
        ),
    );
    public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                )
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
            );
        }
        return true;
    }

}
