    <div class="jumbotron" style = "height:100px">
		<div class="container">
		<h2 style ="color: #4169E1;"><?php echo $h2;?></h2>
		</div>
    </div>
<div class="container bordered">
    <?php if (in_array($action, $actions)&&in_array($target, $targets)){?>
	<div class="row">
        <div class="col-md-12">		
			<?php require_once $action.ucfirst($target).".tpl";?>
        </div>
	</div>			
	<?php } ?>
</div>	