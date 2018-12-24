<? //$inc = new YUI(); ?>
<? //$inc->addTree(); ?>

<div id="central">
			<?  $tab = new tabs('forms');
				$tab->addTab("modulos/formularios/grid_form.php","Formulários", false);
				$tab->addTab("modulos/formularios/grid_field.php","Campos", false);
				$tab->show_tabs(0);
			//include('tree_form.php');
			//include('modulos/formularios/grid_form.php');
			?>
</div>
<div id="rodape"><div id="msg"></div></div>
<div id="left"><? //include('TESTE_treehander.php') ; ?> </div>
 <?php
 	include(C_PATH_CLASS."layout.class.php");
	$layout = new layout();
	$layout->addUnit(array('position'=>'left', 'scroll'=>true, 'body'=>'left', 'width'=>'45', 'resize'=>true, gutter=>'2px'));
	$layout->addUnit(array('position'=>'top', 'body'=>'principal', 'height'=>'145'));
 	$layout->addUnit(array('position'=>'center', 'scroll'=>true, 'body'=>'central'));
	$layout->addUnit(array('position'=>'bottom', 'height'=>'20','body'=>'rodape'));
	//$layout->make_layout('');
 ?>