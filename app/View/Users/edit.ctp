<div class="row form-group">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row form-group">

                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <div class="blog-logo">

                          <h4 class="navbar-text"> 
                            <?= $this->Html->image('cake.icon.png', array('alt' => 'Cake')); ?>
                            <?=$this->Html->link(' Matheus', array('controller' => 'posts', 'action' => 'index')); ?></h4>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right" style="padding-right: 25px;"> 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-1x"></i><?=' '.$username;?><b class="caret"></b></a>                         
                                <ul class="dropdown-menu">                                
                                    <li><a href="#">Termos de Uso</a></li>
                                    <li><a href="#">Politica de Privacidade</a></li>
                                    <li><a href="#">Copyright</a></li>
                                    <li class="divider"></li>
                                    <li><?=$this->Html->link('Logout', array('action' => 'logout'));?></li>
                                </ul>
                            </li>

                        </ul>    
                    </div>
                </div>
            </nav>



            

            <div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                <div class="panel">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="header-line-admin-sidebar">
                                <h3>Edit Users<i class="fa fa-user fa-1x pull-right"></i></h3>
                            </div>
                            <div class="edit-user-form">
                                <?php
                                echo $this->Form->create('User', array('type' => 'file'));

                                echo $this->Form->input('User.photo', array('type' => 'file'));

                                $this->Form->input('User.photo_dir', array('type' => 'hidden'));

                                echo $this->Form->input('name', array('class' => 'form-control'));

                                echo $this->Form->input('email', array('type' => 'email', 'class' => 'form-control'));

                                echo $this->Form->input('username', array('class' => 'form-control'));

                                echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('admin' => 'Admin', 'author' => 'Author')));

                                echo $this->Form->input('id', array('type' => 'hidden'));

                                echo $this->Form->submit('Update User', array('class' => 'btn btn-success', 'id' => 'btu'));
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