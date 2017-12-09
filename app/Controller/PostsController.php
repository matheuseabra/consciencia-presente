<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class PostsController extends AppController {


    public $helpers = array('Html', 'Form');
    public $name = 'Posts';


    public function index() {
        $this->set('posts', $this->Post->find('all', array(
            'contain' => array('User'),
            'order'=> array('Post.created'=>'ASC'),
            array('conditions' => array(
                'Post.user_id' => 'User.id',

                ))

            )));

        $this->set('recents', $this->Post->find('all', array('limit' => 4, 
            'order'=> array('Post.created'=>'desc'))));

        $this->Post->Comment->find('all', array(
            'contain' => array('Comment'),
            array('conditions' => array(
                'Comment.post_id' => 'Post.id',        
                )),
            ));
        
    }

    public function view($id = null) {

        if (!$id) {
            throw new Exception('Sorry, invalid Post!');
        }
        $post = $this->Post->findById($id);

        if (!$post) {
            throw new Exception('Sorry, invalid Post!');
        }
        $this->set('post', $post);
    }

    public function add() {

        $this->set('username', $this->Auth->user('username'));

        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data))
                ;
            $this->Session->setFlash('Your Post has been saved');

            $user = $this->Auth->user();
                if ($user['role'] === 'admin') {
                    return $this->redirect(array('controller' => 'users', 'action' => 'admin'));
                } else {
                    return $this->redirect(array('controller' => 'users', 'action' => 'author'));
                }
        }
        
        $this->Session->setFlash('Unable to save your Post');
    }

    public function edit($id = null) {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->read();
        } else {
            $this->Post->save($this->request->data);
            $this->Session->setFlash('Your post has been updated');
            $this->redirect(array('controller' =>  'users', 'action' => 'index'));
        }

        $this->loadModel('User');
        $this->set('users', $this->User->find('all'));

        $this->set('username', $this->Auth->user('username'));
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            $this->Session->setFlash('The Post with id: ' . $id . 'has been deleted');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user) {   
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
