<div class="row form-group">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row form-group">

                <?php
                echo $this->element('admin-navbar');
                echo $this->fetch('admin-navbar');
                ?>



                <?php
                echo $this->element('admin-sidebar');
                echo $this->fetch('admin-sidebar');
                ?>

                <!--Tab Content -->

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="users">
                        <div class="col-md-9" style="margin-top: 50px;">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="container-fluid">
                                        <div class="admin-sidebar">                              
                                            <div class="header-line-admin-sidebar">
                                                <i class="fa fa-user fa-2x pull-right"></i>
                                                <h4>
                                                <ol class="breadcrumb">
                                                    <li>Users</li>
                                                    <li class="active">All</li>
                                                </ol>
                                            </h4>
                                            </div>
                                        </div>
                                        <table class="table" style="margin-top: 20px;">
                                            <tr>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Posts</th>
                                                <th>Created</th>                         
                                            </tr>

                                            <?php foreach ($users as $user) { ?>
                                                <div class="show">       
                                                    <tr>
                                                        <td><?= $user['User']['username']; ?> 
                                                            <p class="show-actions">
                                                                <?= $this->Html->link('<i class="fa fa-edit"></i> Edit', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('class' => 'label label-warning', 'escape' => false)); ?>
                                                                <?=
                                                                $this->Html->link(
                                                                        $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash')) . ' Delete', '#', array(
                                                                    'class' => 'label label-danger btn-confirm',
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#deleteuser',
                                                                    'data-action' => Router::url('Delete', array('controller' => 'users', 'action' => 'delete', $user['User']['id'])),
                                                                    'escape' => false), false);
                                                                ?>
                                                            </p>
                                                        </td>
                                                        <td><?= $user['User']['name'] . ' ' . $user['User']['last_name']; ?></td>
                                                        <td><?= $user['User']['email']; ?></td>                       
                                                        <td><?= $user['User']['role']; ?></td>

                                                        <td><?= $user['User']['post_count']; ?></td>

                                                        <td><?= $this->Time->format('M j, Y h:i A', $user['User']['created']); ?></td>
                                                    </tr>
                                                </div>
                                            <?php } ?> 
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="allposts">
                        <div class="col-md-9" style="margin-top: 50px;">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="container-fluid">
                                        <div class="admin-sidebar">                              
                                            <div class="header-line-admin-sidebar">
                                                <i class="fa fa-thumb-tack fa-2x pull-right"></i>
                                                <h4>
                                                    <ol class="breadcrumb">
                                                        <li>Posts</li>
                                                        <li class="active">All</li>
                                                    </ol>
                                                </h4>
                                            </div>
                                        </div>
                                        <table class="table" style="margin-top: 20px;">
                                            <tr>
                                                <th>Post</th>
                                                <th>Author</th>

                                            </tr>

                                            <!-- Here's where we loop through our $posts array, printing out post info -->

                                            <?php foreach ($posts as $post) { ?>
                                                <div class="show">
                                                    <tr>
                                                        <td>
                                                            <h4><b><?= $post['Post']['title']; ?></b></h4>
                                                            <p><?= $post['Post']['body']; ?></p>

                                                            <p class="comment-link">Published on
                                                                <a><?= $this->Time->format('M j, Y h:i A', $post['Post']['created']); ?></a>
                                                            </p>

                                                            <p class="show-actions">
                                                                <?= $this->Html->link('<i class="fa fa-edit"></i> Edit', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']), array('class' => 'label label-warning', 'escape' => false)); ?>
                                                                <?=
                                                                $this->Html->link(
                                                                        $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash')) . ' Delete', '#', array(
                                                                    'class' => 'label label-danger btn-confirm',
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#deletepost',
                                                                    'data-action' => Router::url('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id'])),
                                                                    'escape' => false), false);
                                                                ?>
                                                                <?= $this->Html->link('View', array('controller' => 'posts', 'action' => 'view', $post['Post']['id']), array('class' => 'label label-primary', 'escape' => false)); ?>
                                                            </p>
                                                        </td>
                                                        <td><?= $post['User']['username']; ?></tr>
                                                    </tr>
                                                </div>
                                            <?php } ?> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add a User  -->

                    <div class="tab-pane fade" id="add-user">
                        <div class="col-md-9" style="margin-top: 50px;">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="container-fluid">
                                        <div  class="header-line-admin-sidebar">
                                            <i class="fa fa-user fa-1x pull-right"></i><
                                            <h4>
                                                <ol class="breadcrumb">
                                                    <li>Users</li>
                                                    <li class="active">Add</li>
                                                </ol>
                                            </h4>

                                        </div>                      
                                        <div class="user-add-form">
                                            <?= $this->Form->create('User', array('type' => 'file', 'controller' => 'users', 'action' => 'add')); ?>

                                            <?= $this->Form->input('User.photo', array('type' => 'file')); ?>
                                            <?= $this->Form->input('User.photo_dir', array('type' => 'hidden')); ?>
                                            <?= $this->Form->input('name', array('class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Name')); ?>
                                            <?= $this->Form->input('Email', array('type' => 'email', 'class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Email')); ?>
                                            <?= $this->Form->input('username', array('class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Username')); ?>
                                            <?= $this->Form->input('password', array('class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Password')); ?>

                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <?= $this->Form->input('role', array('class' => 'form-control', 'options' => array('admin' => 'Admin', 'author' => 'Author'))); ?>
                                                    <?= $this->Form->submit('Save User', array('class' => 'btn btn-default', 'id' => 'btu')); ?>
                                                    <?= $this->Form->end(); ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add a Post  -->


                    <div class="tab-pane fade" id="add-post">
                        <div class="col-md-9" style="margin-top: 50px;">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="container-fluid">                      
                                        <div  class="header-line-admin-sidebar">
                                            <i class="fa fa-thumb-tack fa-2x pull-right"></i>
                                           <h4>
                                                <ol class="breadcrumb">
                                                    <li>Posts</li>
                                                    <li class="active">Add</li>
                                                </ol>
                                            </h4>
                                        </div>
                                        <div class="post-add-form">

                                            <?php
                                            echo $this->Form->create('Post', array('type' => 'file', 'controller' => 'posts', 'action' => 'add'));
                                            echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Enter your title here'));
                                            echo $this->Form->input('Post.img', array('type' => 'file', 'label'));
                                            echo $this->Form->input('Post.img_dir', array('type' => 'hidden'));
                                            echo $this->Form->input('body', array('rows' => '9', 'cols' => '9', 'class' => 'form-control'));
                                            echo $this->Form->submit('Save Post', array('class' => 'btn btn-default', 'id' => 'btu'));
                                            echo $this->Form->end();
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="comments">
                        <div class="col-md-9" style="margin-top: 50px;">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="container-fluid">                      
                                        <div  class="header-line-admin-sidebar">
                                            <i class="fa fa-comments fa-2x pull-right"></i>
                                            <h4>
                                                <ol class="breadcrumb">
                                                    <li>Comments</li>
                                                    <li class="active">All</li>
                                                </ol>
                                            </h4>
                                        </div>
                                        <table class="table" style="margin-top: 20px;">
                                            <div class="show"> 
                                                <tr>
                                                    <th>Author Info</th>
                                                    <th>Comment</th>  
                                                    <th>In Response</th>
                                                </tr>

                                                <!-- Here's where we loop through our $posts array, printing out post info -->

                                                <?php foreach ($comments as $comment) { ?>
                                                    <tr>
                                                        <td><b><?= $comment['Comment']['name']; ?></b>
                                                            <p><?= $comment['Comment']['email']; ?></p>
                                                            <p class="show-actions">
                                                                <?= $this->Html->link('<i class="fa fa-edit"></i> Edit', array('controller' => 'comments', 'action' => 'edit', $comment['Comment']['id']), array('class' => 'label label-warning', 'escape' => false)); ?>
                                                                <?=
                                                                $this->Html->link(
                                                                        $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash')) . ' Delete', '#', array(
                                                                    'class' => 'label label-danger btn-confirm',
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#deletecomment',
                                                                    'data-action' => Router::url('Delete', array('controller' => 'comments', 'action' => 'delete', $comment['Comment']['id'])),
                                                                    'escape' => false), false);
                                                                ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $comment['Comment']['content']; ?></p>
                                                            <p class="comment-link">Published on
                                                                <a><?= $this->Time->format('M j, Y h:i A', $comment['Comment']['created']); ?></a></p>
                                                        </td>
                                                        <td><p><?= $comment['Post']['title']; ?><p>
                                                            <p class="comment-link"><?= $this->Html->link('View Post', array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'])); ?></p>
                                                        </td>                            
                                                    </tr>
                                                <?php } ?> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- All Tags -->

                    <div class="tab-pane fade" id="alltags">
                        <div class="col-md-9" style="margin-top: 50px;">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="container-fluid">                      
                                        <div  class="header-line-admin-sidebar">
                                            <i class="fa fa-comments fa-2x pull-right"></i>
                                            <h4>
                                                <ol class="breadcrumb">
                                                    <li>Tags</li>
                                                    <li class="active">All</li>
                                                </ol>
                                            </h4>
                                        </div>
                                        <table class="table" style="margin-top: 20px;">
                                            <div class="show"> 
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>  
                                                    <th>Related to</th>
                                                </tr>

                                                <!-- Here's where we loop through our $posts array, printing out post info -->

                                                <?php foreach ($tags as $tag) { ?>
                                                    <tr>
                                                        <td><?= $tag['Tag']['id']; ?></td>
                                                            <td><p><?= $tag['Tag']['name']; ?></p>

                                                            <p class="show-actions">
                                                                <?= $this->Html->link('<i class="fa fa-edit"></i> Edit', array('controller' => 'tags', 'action' => 'edit', $tag['Tag']['id']), array('class' => 'label label-warning', 'escape' => false)); ?>
                                                                <?=
                                                                $this->Html->link(
                                                                        $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash')) . ' Delete', '#', array(
                                                                    'class' => 'label label-danger btn-confirm',
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#deletetag',
                                                                    'data-action' => Router::url('Delete', array('controller' => 'tags', 'action' => 'delete', $tag['Tag']['id'])),
                                                                    'escape' => false), false);
                                                                ?></p>
                                                        </td>
                                                        <td><?=$tag['Tag']['post_id']?></td>                           
                                                    </tr>
                                                <?php } ?> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add a Tag -->

                    <div class="tab-pane fade" id="add-tag">
                        <div class="col-md-9" style="margin-top: 50px;">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="container-fluid">                      
                                        <div  class="header-line-admin-sidebar">
                                            <i class="fa fa-thumb-tack fa-2x pull-right"></i>
                                           <h4>
                                                <ol class="breadcrumb">
                                                    <li>Tags</li>
                                                    <li class="active">Add</li>
                                                </ol>
                                            </h4>
                                        </div>
                                        <div class="tag-add-form">
                                            <?php
                                            echo $this->Form->create('Tag', array('type' => 'file', 'controller' => 'tags', 'action' => 'add'));
                                            echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));
                                            echo $this->Form->submit('Save Tag', array('class' => 'btn btn-default', 'id' => 'btu'));
                                            echo $this->Form->end();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>




<!-- User Delete Modal -->

<div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                Do you want to delete this user?
            </div>
            <div class="modal-footer">
                <?= $this->Form->postLink('Confirm', array('controller' => 'users', 'action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger')); ?>        
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Posts Delete Modal -->

<div class="modal fade" id="deletepost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                Do you want to delete this post?
            </div>
            <div class="modal-footer">
                <?= $this->Form->postLink('Confirm', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']), array('class' => 'btn btn-danger')); ?>    
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!-- Comments Delete Modal -->

<div class="modal fade" id="deletecomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                Do you want to delete this comment?
            </div>
            <div class="modal-footer">
                <?= $this->Form->postLink('Confirm', array('controller' => 'comments', 'action' => 'delete', $comment['Comment']['id']), array('class' => 'btn btn-danger')); ?>    
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!-- Tags Delete Modal -->

<div class="modal fade" id="deletetag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                Do you want to delete this tag?
            </div>
            <div class="modal-footer">
                <?= $this->Form->postLink('Confirm', array('controller' => 'tags', 'action' => 'delete', $tag['Tag']['id']), array('class' => 'btn btn-danger')); ?>    
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>


