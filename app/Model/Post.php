<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Post extends AppModel {

   public $name = 'Post';

   public $useTable = 'posts';

   public $hasMany = array('Comment' => array('counterCache' => true, 'order' => array('Comment.created DESC')), 'Tag');

   public $belongsTo = array('User' => array('counterCache' => true));

   public $validate = array(
    'title' => array('rule' => 'notEmpty'),
    'body' => array('rule' => 'notEmpty')
    );

   public $actsAs = array(
    'Upload.Upload' => array(
        'img' => array(
            'fields' => array(
                'dir' => 'img_dir'
                )
            ),
        )
    );


   public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}
}
