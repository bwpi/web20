<?php foreach ($out as $key => $value):?>
	<li class="nav-item">
        <a class="btn-sb" href="<?=HTTP_HOST?>admin/<?=$key?>">
            <span class="btn-sb-icon"><i class="fa fa-gear" aria-hidden="true" ></i></span>
            <span class="btn-sb-text"><?=$value?></span>
        </a>
        <?php if ($this->view=='ktp'&&$key=="ktp"):?>            
            <ul class="navbar-nav ml-5">                            
                <?php foreach ($ktp_files as $keys => $values):?>
                    <?php $values = str_replace('.json', '', $values);?>
                    <li class="nav-item">
                        <a class="btn-sb" href="<?=HTTP_HOST?>admin/ktp?id=<?= $values;?>">
                            <span class="btn-sb-icon"><i class="fa fa-gear" aria-hidden="true" ></i></span>
                            <span class="btn-sb-text"><?= $values;?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
    </li>
<?php endforeach;?>