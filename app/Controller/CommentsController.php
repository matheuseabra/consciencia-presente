<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

	public $components = array('Session');
	public $helpers = array('Html', 'Form');
	public $name = 'Comments';


	public function index() {
		$this->set('comments', $this->Comment->find('all'));
	}

	public function view($id = null) {

		if (!$id) {
			throw new Exception('Sorry, invalid Comment!');
		}
		$comment = $this->Comment->findById($id);

		if (!$comments) {
			throw new Exception('Sorry, invalid Comment!');
		}
		$this->set('comment', $comment);

	}


	public function add() {

		if ($this->request->is('post')) {
			$this->Comment->create();
			//$this->request->data['Comment']['post_id'] = $this->Auth->user('id');
			if ($this->Comment->save($this->request->data));
			$this->Session->setFlash('Your Comment has been saved');
			$this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}
		$this->Session->setFlash('Unable to save your Comment');
	}

	public function edit($id = null) {
		$this->Comment->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Comment->read();
		} else {
			$this->Comment->save($this->request->data);
			$this->Session->setFlash('Comment has been updated');
			$this->redirect(array('controller' => 'users', 'action' => 'index'));
		}

		$this->loadModel('User');
		$this->set('users', $this->User->find('all'));

		$this->set('username', $this->Auth->user('username'));
	}

	public function delete($id) {
		$this->Comment->id = $id;
		if (!$this->request->is('post') && !$this->request->is('put')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Comment->delete($id)) {
			$this->Session->setFlash('The comment with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('add');
	}

}
