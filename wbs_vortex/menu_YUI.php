
<script type="text/javascript">
			WBS.wait.show();
            YAHOO.example.onMenuBarReady = function() {

                // Animation object
                var oAnim;


                // Utility function used to setup animation for submenus

                function setupMenuAnimation(p_oMenu) {

                    if(!p_oMenu.animationSetup) {

                        var aItems = p_oMenu.getItemGroups();

                        if(aItems && aItems[0]) {

                            var i = aItems[0].length - 1;
                            var oSubmenu;

                            do {

                                oSubmenu = p_oMenu.getItem(i).cfg.getProperty("submenu");

                                if(oSubmenu) {

                                    oSubmenu.beforeShowEvent.subscribe(onMenuBeforeShow, oSubmenu, true);
                                    oSubmenu.showEvent.subscribe(onMenuShow, oSubmenu, true);

                                }

                            }
                            while(i--);

                        }

                        p_oMenu.animationSetup = true;

                    }

                }


                // "beforeshow" event handler for each submenu of the menu bar
                function onMenuBeforeShow(p_sType, p_sArgs, p_oMenu) {

                    if(oAnim && oAnim.isAnimated()) {

                        oAnim.stop();
                        oAnim = null;

                    }

                    YAHOO.util.Dom.setStyle(this.element, "overflow", "hidden");
                    YAHOO.util.Dom.setStyle(this.body, "marginTop", ("-" + this.body.offsetHeight + "px"));

                }


                // "show" event handler for each submenu of the menu bar
                function onMenuShow(p_sType, p_sArgs, p_oMenu) {

                    oAnim = new YAHOO.util.Anim(
                        this.body, 
                        { marginTop: { to: 0 } },
                        .5, 
                        YAHOO.util.Easing.easeOut
                    );

                    oAnim.animate();

                    var me = this;

                    function onTween() {

                        me.cfg.refireEvent("iframe");

                    }

                    function onAnimationComplete() {

                        YAHOO.util.Dom.setStyle(me.body, "marginTop", ("0px"));
                        YAHOO.util.Dom.setStyle(me.element, "overflow", "visible");

                        setupMenuAnimation(me);

                    }


                    /*
                         Refire the event handler for the "iframe" 
                         configuration property with each tween so that the  
                         size and position of the iframe shim remain in sync 
                         with the menu.
                    */

                    if(this.cfg.getProperty("iframe") == true) {

                        oAnim.onTween.subscribe(onTween);

                    }

                    oAnim.onComplete.subscribe(onAnimationComplete);
                
                }


                // "beforerender" event handler for the menu bar

                function onMenuBeforeRender(p_sType, p_sArgs, p_oMenu) {

                    var oSubmenuData = {
	<?
	
$mensagem = false;
if ($mensagem)
{
	$img_msg = "../wbs_base/images/msg_nova.gif";
}
else
{
	$img_msg = "../wbs_base/images/msg.gif";
}

		//PEGA O MENU DO USUÁRIO LOGADO
		$user_menu = $banco->gera_array("codpg as cpg,
  (select codmenu from seguranca where seguranca.codpg = cpg AND NOT habilitado = 'N') as c_menu,
  (select nomem from seguranca where seguranca.codpg = cpg AND NOT habilitado = 'N') as nomem,
  (select arquivo from seguranca where seguranca.codpg = cpg AND NOT habilitado = 'N') as arquivo,
  (select novo from seguranca where seguranca.codpg = cpg AND NOT habilitado = 'N') as novo,
  (select habilitado from seguranca where seguranca.codpg = cpg AND NOT habilitado = 'N') as habilitado,
  (select habilitado from seguranca_menu where seguranca_menu.codmenu = c_menu AND NOT habilitado = 'N') as menu_habilitado,
  (select image from seguranca_menu where seguranca_menu.codmenu = c_menu AND NOT habilitado = 'N') as image,
  (select menu from seguranca_menu where c_menu = seguranca_menu.codmenu AND NOT habilitado = 'N') as menu,codgrp","segurancaacesso","codgrp=".$userlogged['codgrp']." ORDER BY c_menu,nomem");
		
		//$user_menu = $banco->gera_array(" `a`.`codgrp` AS `codgrp`,`a`.`codpg` AS `codpg`,`a`.`inicio` AS `inicio`,`s`.`nomem` AS `nomem`,`s`.`arquivo` AS `arquivo`,`s`.`actionpg` AS `actionpg`,`s`.`descr` AS `descr`,`s`.`c_menu` AS `c_menu`,`s`.`modulo` AS `modulo`,`s`.`manutencao` AS `manutencao`,`s`.`senha` AS `senha`,`s`.`novo` AS `novo`,`m`.`menu` AS `menu`,`m`.`image` AS `image`,`s`.`cor` AS `cor`","((`segurancaacesso` `a` left join `seguranca` `s` on((`a`.`codpg` = `s`.`codpg`))) left join `seguranca_menu` `m` on((`s`.`c_menu` = `m`.`c_menu`)))","((`s`.`habilitado` = _latin1'S') and (`m`.`habilitado` = _latin1'S')) AND `codgrp` = ".$userlogged['codgrp']." ORDER BY c_menu");
		
		
		//$user_menu = $banco->gera_array('*','v_menu',"codgrp = '".$userlogged['codgrp']."'ORDER BY c_menu, nomem");
		
		
		//$user_menu = $banco->gera_array('*','seguranca,segurancagrp,seguranca_menu,segurancaacesso','segurancagrp.codgrp='.$userlogged['codgrp'].' AND segurancaacesso.codgrp='.$userlogged['codgrp'].' AND segurancagrp.codgrp='.$userlogged['codgrp'].' ORDER BY seguranca_menu.c_menu', 'nomem');
		$tmpcod = -1;

		foreach($user_menu as $linha) {

			//CHECA SE VAI CRIAR NOVA CATEGORIA
			if ($linha['c_menu'] != $tmpcod) {
				
				//CHECA SE VAI FECHAR O BLOCO DA CATEGORIA
				if ($tmpcod != -1)
					echo "],";
				
				$tmpcod = $linha['c_menu'];
	?>
		"menu<?=$linha['c_menu']?>": [
	<?
			}

			//IMPRIME OS SUB-ITENS DO MENU
			if (!($linha['nomem']=='')) {
				if ($linha['novo'] == "S") {
		?>
					{ text: "<?=$linha['nomem']?> <b> New!</b>", url: "restrito.php?Action=list&pg=<?=$linha['cpg']?>&desloc=0&menu_not=0" },
		<?
				} else {
		?>
					{ text: "<?=$linha['nomem']?>", url: "../wbs_base/restrito.php?Action=list&pg=<?=$linha['cpg']?>&desloc=0&menu_not=0", onclick:{fn:WBS.wait.show} },
		<?
				}
			}
		}
	?>
		]
                    };

<?
		$tmpcod = 0;
		$k = 0;
		foreach($user_menu as $linha) {

			//CHECA SE VAI CRIAR NOVA CATEGORIA
			if ($linha['c_menu'] != $tmpcod) {
					$tmpcod = $linha['c_menu'];
?>
                    this.getItem(<?=$k?>).cfg.setProperty("submenu", { id:"menu<?=$linha['c_menu']?>", itemdata: oSubmenuData["menu<?=$linha['c_menu']?>"] });
<?
					$k++;
			}
		}
?>

             //       setupMenuAnimation(this);

                }


                // Initialize the root menu bar

                var oMenuBar = new YAHOO.widget.MenuBar("menuwbs", { zindex:2000, autosubmenudisplay:true, hidedelay:750, lazyload:true });


                // Subscribe to the "beforerender" event

                oMenuBar.beforeRenderEvent.subscribe(onMenuBeforeRender, oMenuBar, true);

                // Render the menu bar

                oMenuBar.render();
                
            };


            // Initialize and render the menu bar when it is available in the DOM

            YAHOO.util.Event.onContentReady("menuwbs", YAHOO.example.onMenuBarReady);
			

</script>
		<div id="menu">
		<div id="menuwbs" class="yuimenubar">
			<div class="bd">
				<ul>
                
				<?	//pre($user_menu);
					//pre($banco->get_sql());
					//$menu = $banco->gera_array('*','v_menu',"codgrp = '".$userlogged['codgrp']."' ORDER BY c_menu, nomem");
					//print_r($menu);
						$tmpcod = 0;
						foreach($user_menu as $linha) {

							//CHECA SE VAI CRIAR NOVA CATEGORIA
							if ($linha['c_menu'] != $tmpcod) {
									$tmpcod = $linha['c_menu'];
				?>
					<li class="yuimenubaritem" style="vertical-align:bottom;"><img src="../wbs_base/images/<?=$linha['image']?>" alt='<?=$linha['menu']?>' style="position:relative;" width="32px" height="32px"><br /><?=$linha['menu']; ?></li>
				<?
							}
						}
						$grp = $banco->gera_array('nomegrp','segurancagrp',"codgrp=".$userlogged['codgrp']);
				?>
				</ul>
			</div>
		</div>
		</div>
        <pre><? //print_r($user_menu[0]); ?></pre>
        <div style="float:left; margin-top:1px; display:block"><a href="<? echo "$PHP_SELF"; ?>"><img src="<?=IMAGES?>logotipowbs2_1.jpg" width="150" height="30" border="0" /></a><br /><img src="<?=IMAGES?>logotipowbs2_2.jpg" width="150" height="80" border="0"><br /><a href="<? echo "$PHP_SELF"; ?>"><img src="<?=IMAGES?>logotipowbs2_3.jpg" width="150" height="30" border="0" /></a></div><div style="position:relative; float:left;"><a href="../wbs_base/restrito.php"><img src="<?=IMAGES?>bt_home.gif" width="78" height="23" border="0" /></a></div>  <div style="position:relative; float:left; margin-top:120px;"><b>LOGIN:</b> <?=$userlogged[1]?> <b>GRUPO:</b> <?=$grp[0]['nomegrp']?></div>
         <div style="position:absolute; top:5px; right:5px;"><a href='logout.php?doit=logout'><img src="<?=IMAGES?>logout.gif" alt="Sair do Sistema" border="0" width="78px" height="23px"></a></div>
       
         <div style="float:right; margin-top:114px;"><a href="<? echo "$PHP_SELF?Action=list&pg=$pg_sel&pg_ped=$pg_ped"; ?>" target="_blank"><img src="<?=$img_msg;?>" width="91px" height="25"/></a></div> 
        