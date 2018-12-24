<?php $b = new bd(); ?>
<?php $res = $b->gera_array('uf','tb_estados','true'); ?>
<option value="MG">MG</option>
<?php foreach ($res as $rec) { ?>
	<option value="<?=$rec['uf']?>"><?=$rec['uf']?></option>
<?php } //endforeach?>