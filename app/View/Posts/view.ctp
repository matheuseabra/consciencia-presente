<div class="row form-group">
    <div class="col-md-12">
        <div class="container">
            <div class=""> 
                <h1 class="blog-title">CakePHP Blog</h1>
                <p class="blog-description">The official example template of creating a blog with Bootstrap.</p>
            </div>
            <?php
            echo $this->element('navbar');
            echo $this->fetch('navbar');
            ?>     
            <div class="row form-group">
                <div class="col-md-8">               
                        <div class="panel">
                        <div class="panel-body panel-post">
                            <div class="container-fluid">
                                <div class="post-image">                        
                                    <?= $this->Html->image('/files/Post/img/' . $post['Post']['img_dir'] . '/' . $post['Post']['img']) ?>                     
                                </div>
                                
                                <h2 class="post-title">
                                    <?= $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
                                </h2>

                                <div class="blog-meta">
                                    <p><a><i class="fa fa-calendar"></i> <?= $this->Time->format('M j, Y', $post['Post']['created']); ?></a>
                                        <a><i class="glyphicon glyphicon-user"></i> <?= $post['User']['username']; ?></a></p>                        
                                    </div>
                                </div>

                                
                                

                                <div class="container-fluid" >
                                    <div class="post-body">
                                        <p><?= $post['Post']['body']; ?></p>                          
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="comment-add-form">
                            <h3>Leave a Comment</h3>
                            <?php
                            echo $this->Form->create('Comment', array('controller' => 'comments', 'action' => 'add'));
                            echo $this->Form->input('post_id', array('type' => 'hidden', 'value' => $post['Post']['id']));

                            echo $this->Form->input('content', array('rows' => '3', 'class' => 'form-control', 'placeholder' => 'Enter your comment here...', 'label' => false));
                            ?>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <?= $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name', 'label' => false)); ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email', 'type' => 'email', 'label' => false)); ?>
                                </div>
                            </div>
                            <?=
                            $this->Form->submit('Publish Comment', array('class' => 'btn btn-default'));
                            echo $this->Form->end();
                            ?>
                        </div>

                        <div class="header-line-comment"><h3><i class="fa fa-fw fa-comments fa-1x pull-left"></i><?= $post['Post']['comment_count']; ?> Comments</h3></div>

                        <?php foreach ($post['Comment'] as $comment) { ?>

                            <div class="post-comments">
                                <div class="row form-group" >
                                    <div class="col-md-3">
                                        <p class="commentInfo"><?= $comment['name']; ?> <small class="commentDateStamp"><?= $this->Time->format($comment['created'], '%d/%m/%Y at %H:%M %p'); ?></small></p>
                                    </div>
                                    <div class="col-md-9" >                    
                                        <div class="panel" >
                                            <div class="panel-body bubble">
                                                <div class="container-fluid" >
                                                    <p><?= $comment['content']; ?></p>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>               
                            </div>

                        <?php } ?>
                        <div class="post-divider"></div>              
                </div>




                <!--                <div class="col-md-4">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="container-fluid">
                                                <div class="sidebar"> 
                                                    <div class="about">
                                                        <div class="" style="background-color: #535233; color: #FFF;">
                                                            <h3>About</h3>
                                                        </div>
                                                        <i class="fa fa-quote-left fa-1x pull-left"></i>
                                                        <p>Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...        <i class="fa fa-quote-right fa-1x"></i></p>
                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <h3>About</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="about">
                                    <i class="fa fa-quote-left fa-1x pull-left"></i>
                                    <p>Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...  <i class="fa fa-quote-right fa-1x"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <h3>Archives</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="sidebar"> 
                                    <div class="archives">
                                        <ul class="list-unstyled">
                                            <li><a href="#">March 2014</a></li>
                                            <li><a href="#">February 2014</a></li>
                                            <li><a href="#">January 2014</a></li>
                                            <li><a href="#">December 2013</a></li>
                                            <li><a href="#">November 2013</a></li>
                                            <li><a href="#">October 2013</a></li>
                                            <li><a href="#">September 2013</a></li>
                                            <li><a href="#">August 2013</a></li>
                                            <li><a href="#">July 2013</a></li>
                                            <li><a href="#">June 2013</a></li>
                                            <li><a href="#">May 2013</a></li>
                                            <li><a href="#">April 2013</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="container-fluid">
                                <h3>Tag Cloud</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <a href='#' class='tag-link-5' title='2 topics' style='font-size: 16.4pt;'>Another Tag</a>
                                <a href='#' class='tag-link-14' title='2 topics' style='font-size: 16.4pt;'>Clown</a>
                                <a href='#' class='tag-link-7' title='1 topic' style='font-size: 8pt;'>Design</a>
                                <a href='#' class='tag-link-9' title='1 topic' style='font-size: 11pt;'>Diary</a>
                                <a href='#' class='tag-link-13' title='1 topic' style='font-size: 8pt;'>Gallery</a>
                                <a href='#' class='tag-link-16' title='1 topic' style='font-size: 16pt;'>Image</a>
                                <a href='#' class='tag-link-15' title='1 topic' style='font-size: 12pt;'>Mimes</a>
                                <a href='#' class='tag-link-6' title='3 topics' style='font-size: 22pt;'>More Tags</a>
                                <a href='#' class='tag-link-11' title='1 topic' style='font-size: 9pt;'>Post</a>
                                <a href='#' class='tag-link-18' title='1 topic' style='font-size: 10pt;'>Single</a>
                                <a href='#' class='tag-link-4' title='1 topic' style='font-size: 16pt;'>Tag</a>
                                <a href='#' class='tag-link-8' title='3 topics' style='font-size: 19pt;'>Video</a>
                                <a href='#' class='tag-link-8' title='3 topics' style='font-size: 13pt;'>Truth</a>
                                <a href='#' class='tag-link-8' title='3 topics' style='font-size: 22pt;'>Power</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
