<div class="row form-group">
<div class="col-md-12">
<div class="container-fluid">
<div class="row form-group">

<?php
echo $this->element('admin-navbar');
echo $this->fetch('admin-navbar');
?>



<div class="col-md-3" style="margin-top: 50px;">
<div class="panel">
<ul class="list-group">
<div class="panel-body">
<div class="container-fluid">
    <div class="list-unstyled">
        <ul class="list-group nav nav-tabs nav-stacked" role="tablist">

            <li class="list-group-item">
                <div class="header-line">
                    <h3>Admin Settings<i class="fa fa-cogs fa-1x pull-right"></i></h3>
                </div>
            </li>

            <li class="list-group-item">
                <h4><a href="javascript:;" data-toggle="collapse" data-target="#post-dropdown"><i class="fa fa-fw  fa-thumb-tack pull-left"></i>Posts</a></h4>
                <ul id="post-dropdown" class="collapse">
                    <li class="active">
                        <a href="#mineposts" role="tab" data-toggle="tab">Mine</a>
                    </li>
                    <li>
                        <a href="#allposts" role="tab" data-toggle="tab">All Posts</a>
                    </li>
                    <li>
                        <a href="#add-post" role="tab" data-toggle="tab">Add Post</a>
                    </li>
                </ul>                
            </li>

            <li class="list-group-item">
                <h4><a href="#media" role="tab" data-toggle="tab">Media</a><i class="fa fa-fw fa-picture-o pull-left"></i></h4>
            </li>

            <li class="list-group-item">
                <h4><a href="#comments" role="tab" data-toggle="tab">Comments</a><i class="fa fa-fw fa-comments pull-left"></i></h4>
            </li>

            <li class="list-group-item">
                <h4><a href="javascript:;" data-toggle="collapse" data-target="#tagdropdown"><i class="fa fa-fw  fa-tags pull-left"></i>Tags</a></h4>
                <ul id="tagdropdown" class="collapse">
                  <li>
                    <a href="#alltags" role="tab" data-toggle="tab">All Tags</a>
                </li>
                <li>
                    <a href="#add-tag" role="tab" data-toggle="tab">Add Tag</a>
                </li>
            </ul>     
        </li>

    </ul>

</div>
</div>                                                    
</div>
</ul>
</div>
</div>

<!--Tab Content -->


<div class="tab-content">
<div class="tab-pane fade in active" id="mineposts">
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
                    <li class="active">Mine</li>
                </ol>
            </h4>
        </div>
    </div>
    <table class="table" style="margin-top: 20px;">
        <tr>
            <th>Post</th>
            <th>Author</th>

        </tr>

        <!-- Mine Posts -->

        <?php foreach ($posts_user as $post) { ?>
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

                    <!-- All Posts -->

                    <?php foreach ($posts as $post) { ?>
                    <div class="show">
                        <tr>
                            <td>
                                <h4><b><?= $post['Post']['title']; ?></b></h4>
                                <p class="comment-link">Published on
                                    <a><?= $this->Time->format('M j, Y h:i A', $post['Post']['created']); ?></a>
                                </p>

                                <p class="show-actions">
                                    <?=
                                    $this->Html->link('View', array('controller' => 'posts', 'action' => 'view', $post['Post']['id']), array('class' => 'label label-primary', 'escape' => false));
                                    ?>
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

<div class="tab-pane fade" id="edit-post">
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
                    <div class="edit-post-form">
                        <?php
                        echo $this->Form->create('Post');
                        echo $this->Form->input('title', array('class' => 'form-control'));
                        echo $this->Form->input('Post.img', array('type' => 'file'));
                        echo $this->Form->input('Post.img_dir', array('type' => 'hidden'));
                        echo $this->Form->input('body', array('rows' => '9', 'class' => 'form-control'));
                        echo $this->Form->input('id', array('type' => 'hidden'));
                        echo $this->Form->submit('Update Post', array('class' => 'btn btn-success'));
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
                            </ol>
                        </h4>
                    </div>
                    <table class="table" style="margin-top: 20px;">
                        <div class="show"> 
                            <tr>
                                <th>#</th>
                                <th>Author Info</th>
                                <th>Comment</th>  
                                <th>In Response</th>
                            </tr>

                            <!-- Here's where we loop through our $posts array, printing out post info -->

                            <?php foreach ($comments as $comment) { ?>
                            <tr>
                                <td><?= $comment['Comment']['id']; ?></td>
                                <td><b><?= $comment['Comment']['name']; ?></b>
                                    <p><?= $comment['Comment']['email']; ?></p>
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
                            </div>
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
                                    <td><b><?= $tag['Tag']['id']; ?></b>
                                        <p><?= $tag['Tag']['name']; ?></p>

                                        <p class="show-actions">
                                            <?= $this->Html->link('<i class="fa fa-edit"></i> Edit', array('controller' => 'tags', 'action' => 'edit', $comment['Tag']['id']), array('class' => 'label label-warning', 'escape' => false)); ?>
                                            <?=
                                            $this->Html->link(
                                                $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash')) . ' Delete', '#', array(
                                                    'class' => 'label label-danger btn-confirm',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#deletecomment',
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
            <div class="modal-footer" style="border-radius: 0px;">
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





