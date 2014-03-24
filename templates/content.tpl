    <div class="jumbotron">
      <div class="container">
        <h1>Добро пожаловать!</h1>
        <p> Тестирование студентов.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Начать тестирование &raquo;</a></p>
      </div>
    </div>
    <?php
    if ($action=="import"){
    	require_once "import.tpl";
    }

    if ($action=="view"){
    	require_once "view.tpl";
    }