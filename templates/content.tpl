    <div class="jumbotron" style = "height:100px">
		<div class="container">
		<h2><?php echo $h2;?></h2>
		</div>
    </div>
    <?php
$actions = array('list', 'view', 'edit','delete','import');
$targets = array("tmp","discipline","question","answer","topic","test");
if (in_array($action, $actions)&&in_array($target, $targets)){
			require_once $action.ucfirst($target).".tpl";
	} 
    