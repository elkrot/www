    <!-- Fixed navbar -->
    <div class="navbar-inner navbar navbar-fixed-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="<?php echo SERVER_NAME_URL;?>"><span class="glyphicon glyphicon-list-alt"></span>Главная
		</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
         
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Тестирование<b class="caret"></b></a>
			<ul class="dropdown-menu">
			<li class="dropdown"><a href="<?php echo Html::Link("test","goto");?>">Перейти к тестам</a></li>
			<li class="dropdown"><a href="<?php echo Html::Link("statistics","list");?>">Мои результаты</a></li>
			</ul>
			</li>
            <?php
            if (Authentication::isAdmin()){
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Администрирование <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo Html::Link("discipline","list");?>">Дисциплины</a></li>
				<li><a href="<?php echo Html::Link("topic","list");?>">Темы</a></li>
                <li><a href="<?php echo Html::Link("question","list");?>">Вопросы</a></li>
                <li><a href="<?php echo Html::Link("test","list");?>">Тесты</a></li>
                <li class="divider"></li>
				<li class="dropdown-header">Импорт</li>
                <li><a href="<?php echo Html::Link("tmp","import");?>">Импорт</a></li>
              </ul>
            </li>
			<?php } ?>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
		  <li style ="color: #4169E1;"><a href="#">Добро пожаловать , <?php echo Authentication::GetUserName();?></a></li>
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
	