    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-list-alt"></span>Главная
		</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
         
            <li><a href="#about">Тестирование</a></li>
            <?php
            if (Authentication::isAdmin()){
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Администрирование <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Дисциплины</a></li>
                <li><a href="#">Вопросы</a></li>
                <li><a href="#">Тесты</a></li>
                <li class="divider"></li>

               
				<li class="dropdown-header">Импорт</li>
                <li><a href="<?php echo SERVER_NAME_URL;?>?action=import">Импорт</a></li>
                
              </ul>
            </li>
			<?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
	