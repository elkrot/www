    <div class="jumbotron" style = "height:100px">
		<div class="container">
		<h2><?php echo $h2;?></h2>
		</div>
    </div>
<div class="container">
    <?php if (in_array($action, $actions)&&in_array($target, $targets)){?>
	<div class="row">
        <div class="col-md-12">		
			<?php require_once $action.ucfirst($target).".tpl";?>
        </div>
	</div>			
	<?php } ?>
</div>	