<?php /* Smarty version 2.6.9, created on 2011-06-08 10:29:33
         compiled from /Applications/MAMP/htdocs/s-node/xt/templates//default/ch.iframe.snode.catalog/admin/edit_node.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', '/Applications/MAMP/htdocs/s-node/xt/templates//default/ch.iframe.snode.catalog/admin/edit_node.tpl', 6, false),array('function', 'toggle_editor', '/Applications/MAMP/htdocs/s-node/xt/templates//default/ch.iframe.snode.catalog/admin/edit_node.tpl', 18, false),array('function', 'actionIcon', '/Applications/MAMP/htdocs/s-node/xt/templates//default/ch.iframe.snode.catalog/admin/edit_node.tpl', 31, false),)), $this); ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>
?TPL=<?php echo $this->_tpl_vars['TPL']; ?>
" method="POST" name="edit_node">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/buttons.tpl", 'smarty_include_vars' => array('data' => $this->_tpl_vars['EDIT_NODE_BUTTONS'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/lang_selector_submit.tpl", 'smarty_include_vars' => array('form' => 'edit_node','action' => 'saveNode')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <table cellspacing="0" cellpadding="0" width="100%">
  <tr>
   <td class="table_header" colspan="2"><?php echo ((is_array($_tmp='Node data')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
  </tr>
  <tr>
   <td class="left"><?php echo ((is_array($_tmp='name')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
   <td class="right"><input type="text" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_title" value="<?php echo $this->_tpl_vars['NODE']['title']; ?>
" size="42"></td>
  </tr>
 <tr>
   <td class="left"><?php echo ((is_array($_tmp='Subtitle')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
   <td class="right"><input type="text" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_subtitle" value="<?php echo $this->_tpl_vars['NODE']['subtitle']; ?>
" size="42"></td>
 </tr>
  <tr>
   <td class="left"><?php echo ((is_array($_tmp='description')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
   <td class="right"><?php echo toggle_editor(array('id' => 'description'), $this);?>

   <textarea id="x<?php echo $this->_tpl_vars['BASEID']; ?>
_description" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_description" rows="6" cols="65"><?php echo $this->_tpl_vars['NODE']['description']; ?>
</textarea></td>
  </tr>

  <tr>
   <td class="left"><?php echo ((is_array($_tmp='public')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
   <td class="right">
   <input type="checkbox" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_public" <?php if ($this->_tpl_vars['NODE']['public'] == 1): ?> checked="checked" <?php endif; ?> /><?php echo ((is_array($_tmp='public')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
  </tr>

  <tr>
   <td class="left"><?php echo ((is_array($_tmp='Main image')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
   <td class="right">
    <a href="#" onclick="popup('<?php echo $_SERVER['PHP_SELF']; ?>
?TPL=597&x240_field=x<?php echo $this->_tpl_vars['BASEID']; ?>
_image&x240_form=edit_node',770,470,'picker');"><img style="cursor: hand; cursor: pointer;" src="<?php echo $this->_tpl_vars['XT_IMAGES']; ?>
icons/pick_photo.png" title="<?php echo ((is_array($_tmp='Pick an image')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp='Pick an image')) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
" /></a><?php echo actionIcon(array('action' => 'deleteNodeImage','icon' => "delete.png",'form' => 'edit_node','title' => 'Delete Image','ask' => "Are you sure you want to delete this image relation?"), $this);?>
<br />
    <?php if ($this->_tpl_vars['NODE']['image'] < 1): ?>
    <img name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_image_view" src="<?php echo $this->_tpl_vars['XT_IMAGES']; ?>
spacer.gif" alt="" />
    <?php else: ?>
    <<?php if ($this->_tpl_vars['NODE']['image_version'] == 'embed'): ?>embed<?php else: ?>img<?php endif; ?> name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_image_view" src="<?php echo $this->_tpl_vars['XT_WEB_ROOT']; ?>
download.php?file_id=<?php echo $this->_tpl_vars['NODE']['image']; ?>
&file_version=2" <?php if ($this->_tpl_vars['NODE']['image_version'] != 'embed'): ?>alt=""<?php else: ?>width="100%"<?php endif; ?> class="picked" />
    <?php endif; ?>
   </td>
  </tr>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/widgets/relations.tpl", 'smarty_include_vars' => array('cid' => $this->_tpl_vars['NODE_ID'],'ctitle' => $this->_tpl_vars['NODE']['title'],'ctype' => 1201,'formname' => 'edit_node')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </table>

 <input type="hidden" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_node_id" value="<?php echo $this->_tpl_vars['NODE_ID']; ?>
">
 <input type="hidden" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_save_lang" value="<?php echo $this->_tpl_vars['ACTIVE_LANG']; ?>
">
 <input type="hidden" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_node_pid" value="">
 <input type="hidden" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_image" value="<?php echo $this->_tpl_vars['NODE']['image']; ?>
">
 <input type="hidden" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_image_version" value="<?php echo $this->_tpl_vars['NODE']['image_version']; ?>
">
 <input type="hidden" name="x<?php echo $this->_tpl_vars['BASEID']; ?>
_module" value="<?php echo $this->_tpl_vars['ADMINMODULE']; ?>
" />
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/editor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>