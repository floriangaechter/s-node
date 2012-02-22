<?php

if(XT::getPermission('list')){

    // Enable Char filter and navigator
    XT::enableAdminCharFilter('title');
    XT::enableAdminNavigator('groups');
    
    if(XT::getPermission('add')){
        // Add buttons
        XT::addButton("Add role", "addRole");
    }
    
    // Get users list
    $result = XT::query("
        SELECT 
            id,
            title,
            description,
            active
        FROM 
            " . XT::getTable('roles') . XT::getAdminCharFilter() . " 
        ORDER BY 
            title ASC 
        LIMIT 
            " . XT::getAdminNavigatorLimit() . "
        ",__FILE__,__LINE__);
    
    XT::assign("DATA", XT::getQueryData($result));
    
    // Build plugin
    $content = XT::build('overview.tpl');
    
}

?>
