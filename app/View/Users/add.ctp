<?php
echo $this->element('navbar');
echo $this->fetch('navbar');
?>
<div class="row form-group">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row form-group">
                
                <div class="col-md-4 col-md-offset-4" style="margin-top: 50px;">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="header-line-user-add-form">
                                    <h3>Welcome! It's not a member? <p>Sign up</p></h3>
                                </div>                 
                                <div class="user-add-form">
                                    <?= $this->Form->create('User', array('type' => 'file')); ?>
                                    <?= $this->Form->input('User.photo', array('type' => 'file', '')); ?>
                                    <?= $this->Form->input('User.photo_dir', array('type' => 'hidden')); ?>
                                    <?= $this->Form->input('name', array('class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Name')); ?>
                                    <?= $this->Form->input('Email', array('type' => 'email', 'class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Email')); ?>
                                    <?= $this->Form->input('username', array('class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Username')); ?>
                                    <?= $this->Form->input('password', array('class' => 'form-control', 'style' => 'margin-bottom: 20px', 'placeholder' => 'Password')); ?>
                                    <?= $this->Form->submit('Save User', array('class' => 'btn btn-success')); ?>
                                    <?= $this->Form->end(); ?>
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