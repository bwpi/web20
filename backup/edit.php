<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
    <?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'info' . '/blocks/html/header.html';?>
<body class="text-center">
	<?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'info' . '/blocks/html/side_bar.html';?>
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<div class="inner">
			<?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'info' . '/blocks/html/nav_bar.html';?>
		</div>
		<div class="row">
			<div class="col-lg-3 d-none d-sm-block" id="left_panel">
				<?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'info' . '/blocks/html/left_bar.html';?>
			</div>
			<div class="col-lg-9">
				<div class="h3"><?php echo $main;?></div>
				<div id="content">...</div>
			</div>
		</div>
	</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'info' . '/blocks/html/footer.html';?>
<script><?php echo $set;?></script>
<script>
$('.historyAPI').after('<a class="plus"><i class="fas fa-plus"></i></a><a class="minus"><i class="fas fa-minus"></i></a>');
$('.plus, .minus').hide().addClass('btn bg-transparent m-0 p-1');
$('.plus').click(function(){
        $(this).after('\n<a class="btn btn-light historyAPI new"><font style="vertical-align: inherit;" contenteditable="true">.</font></a>');
        $('.historyAPI').on('click', function(e){      
                    e.preventDefault();
                    });
        $('.new').click(function(){
        	$(this).after('<div class="ed"><input type="text" id="id"><input type="text" id="href"><button class="ok">OK</button></div>');
        	$('.ok').click(function(){
        		$('font').attr('contenteditable',false);
        		var id = $('#id').val();
        		var href = $('#href').val();
        		$('a.new').attr('href',href);
        		$('a.new').attr('id',id);
        		$('a.new').removeClass('new');
        		$('.ed').remove();
        		returne: false;
			});
        });        
    });
	
$('.minus').click(function(){
        $('#new').remove();       
    });
</script>
</body>
</html>
