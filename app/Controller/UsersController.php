<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $components = array('Session');
    public $helpers = array('Html', 'Form');
    public $name = 'Users';

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    public function admin() {

        $this->set('users', $this->User->find('all'));
        $this->set('username', $this->Auth->user('username'));

        $this->loadModel('Post');
        $this->set('posts', $this->Post->find('all'));

        $this->loadModel('Comment');
        $this->set('comments', $this->Comment->find('all', array(
                    'contain' => array('Comment'),
                    array('conditions' => array(
                            'Comment.post_id' => 'Post.title',
                        ))
        )));

        $this->loadModel('Tag');
        $this->set('tags', $this->Tag->find('all'));
    }

    public function author() {

//        $this->set('users', $this->User->find('all'));
        $this->set('username', $this->Auth->user('username'));

        $this->loadModel('Post');
        $this->set('posts_user', $this->Post->findAllByUserId($this->Auth->user('id')));
        $this->set('posts', $this->Post->find('all'));
         
        $this->loadModel('Comment');
        $this->set('comments', $this->Comment->find('all', array(
                    'contain' => array('Comment'),
                    array('conditions' => array(
                            'Comment.post_id' => 'Post.title',
                        ))
        )));

        $this->loadModel('Tag');
        $this->set('tags', $this->Tag->find('all'));
    }

    public function view($id = null) {

        if (!$id) {
            throw new Exception('Sorry, invalid User!');
        }
        $user = $this->User->findById($id);

        if (!$user) {
            throw new Exception('Sorry, invalid User!');
        }
        $this->set('user', $user);
    }

    public function add() {

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data))   
            $this->Session->setFlash('User has been saved');
            $this->Auth->login();
            return $this->redirect(array('action' => 'author'));
        }
        $this->Session->setFlash('Unable to save User');
    }

    public function edit($id = null) {
        $this->set('username', $this->Auth->user('username'));

        $this->User->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->User->read();
        } else {
            $this->User->save($this->request->data);
            $this->Session->setFlash('User has been updated');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function delete($id) {
        $this->User->id = $id;
        if (!$this->request->is('post') && !$this->request->is('put')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash('The user with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'admin'));
        }
    }

    public function login() {

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $user = $this->Auth->user();
                if ($user['role'] === 'admin') {
                    return $this->redirect(array('controller' => 'users', 'action' => 'admin'));
                } else {
                    return $this->redirect(array('controller' => 'users', 'action' => 'author'));
                }
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
            return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
