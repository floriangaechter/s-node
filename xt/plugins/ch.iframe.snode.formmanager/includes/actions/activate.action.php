<?php
XT::query("UPDATE " . $GLOBALS['plugin']->getTable('forms') . " SET active = 1 WHERE id = " . $GLOBALS['plugin']->getValue('form_id'),__FILE__,__LINE__);
?>