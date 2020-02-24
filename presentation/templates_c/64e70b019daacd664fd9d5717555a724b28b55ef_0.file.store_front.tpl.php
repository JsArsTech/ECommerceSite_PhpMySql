<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-12 22:11:44
  from '/media/jsars/74D0704FD0701996/Projects/Code/PhpEcommerce/tshirtshop/presentation/templates/store_front.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e44e8a06b0487_20614916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64e70b019daacd664fd9d5717555a724b28b55ef' => 
    array (
      0 => '/media/jsars/74D0704FD0701996/Projects/Code/PhpEcommerce/tshirtshop/presentation/templates/store_front.tpl',
      1 => 1581574299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:departments_list.tpl' => 1,
  ),
),false)) {
function content_5e44e8a06b0487_20614916 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/media/jsars/74D0704FD0701996/Projects/Code/PhpEcommerce/tshirtshop/presentation/smarty_plugins/function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>
 
<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "configs/site.conf", null, 0);
?>

<?php echo smarty_function_load_presentation_object(array('filename'=>"store_front",'assign'=>"obj"),$_smarty_tpl);?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'site_title');?>
</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/tshirtshop.css}"/>		
	</head>
	<body>
		<div id="doc">
			<div id="bd">
				<div>
					<div id="header">
						<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/tshirtshop.png" alt="tshirtshop logo"/>
						</a>
					</div>
					<div id="contents">
						Place contents here
					</div>
				</div>
			</div>
			<div>
				<?php $_smarty_tpl->_subTemplateRender("file:departments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			</div>
		</div>
	</body>
</html><?php }
}
