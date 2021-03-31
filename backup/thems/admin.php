<!DOCTYPE html>
<html lang="en">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/header.html';?>
<body class="text-center">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/side_bar.html';?>
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<div class="inner">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/nav_bar.html';?>
		</div>
		<div class="row">
			<div class="col-lg-3 d-none d-sm-block" id="left_panel">
				<?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/left_bar.html';?>
			</div>
			<div class="col-lg-9">
				<div class="h3"><?php echo $main;?></div>
				<div id="content">...</div>				
			</div>
		</div>
	</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/footer.html';?>
<script><?php echo $set;?></script>
</body>
</html>
