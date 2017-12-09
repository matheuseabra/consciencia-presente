<?php $this->start('admin-sidebar'); ?>
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
                <h4><a href="javascript:;" data-toggle="collapse" data-target="#userdropdown"><i class="fa fa-fw fa-users pull-left"></i>Users</a></h4>
                <ul id="userdropdown" class="collapse">
                  <li>
                    <a href="#users" role="tab" data-toggle="tab">All Users</a>
                  </li>
                  <li>
                    <a href="#add-user" role="tab" data-toggle="tab">Add User</a>
                  </li>
                </ul>
              </li>

              <li class="list-group-item">
                <h4><a href="javascript:;" data-toggle="collapse" data-target="#postdropdown"><i class="fa fa-fw  fa-thumb-tack pull-left"></i>Posts</a></h4>
                <ul id="postdropdown" class="collapse">
                  <li>
                    <a href="#allposts" role="tab" data-toggle="tab">All Posts</a>
                  </li>
                  <li>
                    <a href="#add-post" role="tab" data-toggle="tab">Add Post</a>
                  </li>
                </ul>                
              </li>

              <li class="list-group-item">
                <h4><a href="#messages" role="tab" data-toggle="tab">Media</a><i class="fa fa-fw fa-picture-o pull-left"></i></h4>
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

<?php $this->end(); ?>
