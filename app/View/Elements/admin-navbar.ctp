<?php $this->start('admin-navbar'); ?>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-1x"></i><?=' '.$username;?><b class="caret"></b></a>                         
            <ul class="dropdown-menu">                                
              <li><a href="#">Termos de Uso</a></li>
              <li><a href="#">Politica de Privacidade</a></li>
              <li><a href="#">Copyright</a></li>
              <li class="divider"></li>
              <li><?=$this->Html->link('<i class="fa fa-power-off fa-1x"></i>  Logout', array('action' => 'logout'), array('escape' => false));?></li>
            </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>  
  <?php $this->end(); ?>