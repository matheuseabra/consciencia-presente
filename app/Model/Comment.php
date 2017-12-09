<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Comment extends AppModel {

	public $name = 'Comment';
	
	public $useTable = 'comments';

	public $belongsTo = array('Post'  => array('counterCache' => true));

	public $validate = array(
    'name' => array('rule' => 'notEmpty'),
    'email' => array('rule' => 'notEmpty'),
    'content' => array('rule' => 'notEmpty')
    );

}


