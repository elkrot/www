    <div class="jumbotron" style = "height:100px">
		<div class="container">
		<h2><?php echo $h2;?></h2>
		</div>
    </div>
    <?php
    if ($action=="import"){
    	require_once "import.tpl";
    }

    if ($action=="view"){
		switch ($target) {
		case "tmp" :
			require_once "viewTmp.tpl";
			break;
		case "discipline" :
			require_once "viewDiscipline.tpl";
			break;
		case "question" :
			require_once "viewQuestion.tpl";
			break;
		case "test" :
			require_once "viewTest.tpl";
			break;
		case "answer" :
			require_once "viewAnswer.tpl";
			break;
		case "topic" :
			require_once "viewTopic.tpl";
			break;
		default :
			;
			break;
		}
			
    }