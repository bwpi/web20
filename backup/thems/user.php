<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/config.php';
  $title = $title_u;
  $main = $main_u;
  $set = $set_u;
?>
<!DOCTYPE html>
<html lang="en">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/header.html';?>
<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <div class="inner">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/nav_bar.html';?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/info.html';?><br/>
        </div>	
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/search.html';?>
        <div class="row">
            <div class="col-sm-12">
                <div class="h3"><?php echo $main;?></div>
                <div id="cont_ent"><?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/main.html';?></div>
            </div>
        </div>
    </div>
    <div class="information d-none">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/all/information.html';?>        
    </div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/blocks/html/footer.html';?>
<script><?php echo $set;?></script>
</body>
</html>
