<?php 
echo $this->element('navbar');
echo $this->fetch('navbar');
?>
<div class="row form-group">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row form-group">
                <div class="col-md-4 col-md-offset-4">
                    <div class="container-fluid">
                        <div class="panel" style="margin-top: 15px;">
                            <div class="panel-body">
                                <div  class="header-line">
                                    <h2>Sign in</h2>
                                </div>                 
                                <div class="user-login-form"> 

                                    <?php echo $this->Session->flash('auth'); ?>
                                    <?php echo $this->Form->create('User'); ?>
                                    <fieldset>
                                        <?php
                                        echo $this->Form->input('username', array('placeholder' => 'Username', 'class' => 'form-control input-lg', 'label' => false));
                                        echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Password', 'class' => 'form-control input-lg', 'label' => false));
                                        ?>
                                        <div class="checkbox">
                                            <?= $this->Form->input('Remember me', array('type' => 'checkbox',
                                                'label' => 'Remember me'));
                                                ?>

                                            </div>
                                        </fieldset>
                                        <?php echo $this->Form->submit('Login', array('class' => 'btn btn-block btn-primary btn-lg', 'id' => 'btu')); 
                                        echo $this->Form->end();  
                                        ?>
                                    </div>



                                    <div class="login-footer">
                                        <p><a href="add">Register</a> | <a href="#">Forgot your password?</a></p>
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