<?php
$result=  XT::query("SELECT count(*) as cnt from " . XT::getTable('forum_notification') . "
WHERE topic_id = " . XT::getValue('topic_id') . " and user_id = " . XT::getUserID() . " AND type=0",__FILE__,__LINE__);
$count = XT::getQueryData($result);

if($count[0]['cnt']>0){
    XT::query("update " . XT::getTable('forum_notification') . "
    set  `watchdate`='" . time() . "' where `topic_id`='" . XT::getValue('topic_id') . "' AND type=0",__FILE__,__LINE__);
}else{
    XT::query("insert into " . XT::getTable('forum_notification') . "
    ( `topic_id`, `user_id`, `watchdate`, `notified`, `type` ) values 
    (  '" . XT::getValue('topic_id') . "', '" . XT::getUserID() . "',  '" . time() .  "',  '0',  '0' )",__FILE__,__LINE__);
}

?>