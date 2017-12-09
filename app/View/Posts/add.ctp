<div class="row form-group">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row form-group">
                <?php 
                echo $this->element('admin-navbar');
                echo $this->fetch('admin-navbar');
                ?>
                <div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="container-fluid">                      
                                <div  class="header-line">
                                    <h2>Add a Post</h2>
                                </div>
                                <div class="post-add-form">

                                    <?php
                                    echo $this->Form->create('Post', array('type' => 'file'));
                                    echo $this->Form->input('title', array('class' => 'form-control'));
                                    echo $this->Form->input('Post.img', array('type' => 'file'));
                                    echo $this->Form->input('Post.img_dir', array('type' => 'hidden'));
                                    echo $this->Form->input('body', array('rows' => '9', 'class' => 'form-control'));
                                    echo $this->Form->submit('Save Post', array('class' => 'btn btn-success', 'id' => 'btu'));
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

