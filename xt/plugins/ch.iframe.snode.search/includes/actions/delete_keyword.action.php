<?php
/**
 * Delete Keyword
 */
XT::query("DELETE FROM " . $GLOBALS['plugin']->getTable('search_kw') . " WHERE id =" . $GLOBALS['plugin']->getValue('id'),__FILE__,__LINE__);
XT::log("Keyword has been deleted ",__FILE__,__LINE__,XT_INFO);
$GLOBALS['plugin']->setAdminModule('kw');
?>
