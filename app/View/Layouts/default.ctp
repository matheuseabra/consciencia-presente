<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Matheus |');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>
        <?php echo $title_for_layout ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    echo $this->fetch('content');


    echo $this->Html->css('bootstrap');
    echo $this->Html->css('dashboard');
    
    echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('bootstrap-hover-dropdown.min');
    ?>

</head>
<body>

    <!-- Login Modal -->

    <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>         <h2>Sign in</h2>
                </div>
                <div class="modal-body">               
                    <div class="user-login-form"> 

                        <?php echo $this->Session->flash('auth'); ?>
                        <?php echo $this->Form->create('User', array('action' => 'login')); ?>

                        <?php
                        echo $this->Form->input('username', array('placeholder' => 'Username', 'class' => 'form-control input-lg', 'label' => false));
                        echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Password', 'class' => 'form-control input-lg', 'label' => false));
                        ?>  

                        <div class="checkbox">                        
                            <?=
                            $this->Form->input('Remember me', array('type' => 'checkbox',
                                'label' => 'Remember me'));
                                ?>
                            </div>

                            <?php
                            echo $this->Form->submit('Login', array('class' => 'btn btn-block btn-default btn-lg', 'id' => 'btu'));
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

        <!-- Register Modal -->

        <div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h2>Please sign up <small style="color: #FFF"> It's free!</small></h2>
                    </div>
                    <div class="modal-body">

                        <div class="user-add-form">
                            <?= $this->Form->create('User', array('controller' => 'users', 'action' => 'add'), array('type' => 'file')); ?>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <?= $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'First Name', 'class' => 'form-control input-lg', 'label' => false)); ?>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <?= $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'Last Name', 'class' => 'form-control input-lg', 'label' => false)); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <?= $this->Form->input('email', array('type' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'class' => 'form-control input-lg', 'label' => false)); ?>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <?= $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username', 'class' => 'form-control input-lg', 'label' => false)); ?>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <?= $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password', 'class' => 'form-control input-lg', 'label' => false)); ?>
                                        <div class="hidden"><?= $this->Form->input('role', array('class' => 'form-control', 'options' => array('author' => 'Author')));?></div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Register" class="btn btn-default btn-block btn-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
    </html>
