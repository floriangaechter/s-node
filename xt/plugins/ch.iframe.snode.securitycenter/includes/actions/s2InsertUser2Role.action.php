<?PHP
XT::query("DELETE
   FROM 
       " . XT::getTable('user_roles') . " 
   WHERE 
       role_id= " . $GLOBALS['plugin']->getSessionValue('role_id') . " 
   AND 
       user_id= " . $GLOBALS['plugin']->getValue('user_id')
,__FILE__,__LINE__);
XT::query("INSERT
   INTO 
       " . XT::getTable('user_roles') . " 
       (user_id, role_id)
    VALUES 
        (" . $GLOBALS['plugin']->getValue('user_id') . " , 
         " . $GLOBALS['plugin']->getSessionValue('role_id') . " 
        )
     ",__FILE__,__LINE__,0);


$GLOBALS['preplugin_content'] .= "<script language=\"javascript\"><!--
yoffset = window.parent.frames['slave2'].pageYOffset;
window.parent.frames['slave2'].document.forms[0].x" . $GLOBALS['plugin']->getBaseId() . "_yoffset.value=yoffset
window.parent.frames['slave2'].document.forms[0].submit();
//-->
</script>";
?>