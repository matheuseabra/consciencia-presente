<?php $this->start('navbar'); ?>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-left">
        <li><a data-toggle="modal" data-target="#loginmodal">Login</a></li>
        <li><a data-toggle="modal" data-target="#registermodal">Register</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
      <ul class="nav navbar-nav social-icons">
        <li><a href="#"><i class="fa fa-1x fa-github"></i></a></li>
        <li><a href="#"><i class="fa fa-1x fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-1x fa-dropbox"></i></a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">        
        <div class="input-group add-on">
          <div class="input text">
            <input name="data[ ]" class="form-search" placeholder="Search" type="text">
          </div>
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</nav>
<?php $this->end(); ?>
