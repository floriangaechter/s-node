<?php

// Parameter :: Style
$style = $GLOBALS['plugin']->getParam('style') != '' ? $GLOBALS['plugin']->getParam('style') : 'default.tpl';

// Parameter :: Category ID
$category = $GLOBALS['plugin']->getParam('category') != '' ? $GLOBALS['plugin']->getParam('category') : $GLOBALS['plugin']->getValue('category');

if($GLOBALS['auth']->isAuth() && XT::getPermission('statuschange')){
    $active = ''; 
} else {
    $active = 'AND a.active = 1';
}

// Get random article id
$result = XT::query("
    SELECT
        news_id
    FROM
        " . XT::getTable('newsmanager_tree_rel') . "
    WHERE
        node_id = '" . $category . "'
    ORDER BY
        RAND()
    LIMIT 1
",__FILE__,__LINE__);

while($row = $result->FetchRow()){
    $id = $row['news_id'];
}

if($id > 0){
    
    // Preview mode
    if($GLOBALS['plugin']->getValue('preview') == 1 && XT::getPermission('edit')){
        
        // Normal view
        $result = XT::query("
            SELECT
                a.id,
                a.title,
                a.subtitle,
                a.autor,
                a.introduction,
                a.maintext,
                a.creation_date,
                a.image,
                a.image_version,
                a.image_link,
                a.image_link_target,
                a.image_zoom,
                a.rid,
                f.description as image_description
            FROM
                " . $GLOBALS['plugin']->getTable("newsmanager_v") . " as a LEFT JOIN 
                " . $GLOBALS['plugin']->getTable("files") . " as f ON (f.id = a.image)
            WHERE
                a.id = " . $id . "
                " . $active . "
                AND a.latest = 1
                AND a.lang = '" . $GLOBALS['lang']->getLang() . "'
            ",__FILE__,__LINE__,0);
        
        $data = array();
        while($row = $result->FetchRow()){
            if($title != ''){
                XT::assign("TITLE", $title);
            } else {
                XT::assign("TITLE", $row['title']);
            }
            if($row['image_version'] != ''){
                XT::assign("IMAGE_VERSION", '_' . $row['image_version']);
            }
            $data[] = $row;
        }
        
        $article = $data[0];
        XT::assign("NEWS", $article);
        
        if($article['id'] > 0){
            $result = XT::query("
                SELECT
                    a.id,
                    a.title,
                    a.subtitle,
                    a.maintext,
                    a.image,
                    a.image_link,
                    a.image_link_target,
                    a.image_zoom,
                    a.layout,
                    a.level,
                    f.description as image_description,
                    f.width as image_original_width,
                    f.height as image_original_height,
                    fd.width as image_width,
                    fd.height as image_height
                FROM
                    " . $GLOBALS['plugin']->getTable("newsmanager_chapters_v") . " as a LEFT JOIN 
                    " . $GLOBALS['plugin']->getTable("files") . " as f ON (f.id = a.image) LEFT JOIN 
                    " . $GLOBALS['plugin']->getTable("files_versions") . " as fd ON (fd.file_id = a.image AND fd.version = a.image_version)
                WHERE
                    a.id = " . $id . "
                    " . $active . "
                    AND a.rid = " . $article['rid'] . "
                    AND a.lang = '" . $GLOBALS['lang']->getLang() . "'
                GROUP BY
                    a.level
                ORDER BY
                    a.level ASC",__FILE__,__LINE__);
            
            $chapter_content = '';
            while($row = $result->FetchRow()){
                if($row['image_description'] == ''){
                    $row['image_description'] = $row['title'];
                }
                XT::assign("CHAPTER", $row);
                $layout = $row['layout'] != '' ? $row['layout'] : 'image_left.tpl';
                $chapter_content .= $GLOBALS['tpl']->fetch($GLOBALS['plugin']->tpl_location . 'chapters/' . $layout);
            }
            
            XT::assign("CHAPTERCONTENT", $chapter_content); 
        }
        
        $content = XT::build($style);
        
    } else {
    
        // Normal view
        $result = XT::query("
            SELECT
                a.id,
                a.title,
                a.subtitle,
                a.autor,
                a.introduction,
                a.maintext,
                a.creation_date,
                a.image,
                a.image_version,
                a.image_link,
                a.image_link_target,
                a.image_zoom,
                f.description as image_description
            FROM
                " . $GLOBALS['plugin']->getTable("newsmanager") . " as a LEFT JOIN 
                " . $GLOBALS['plugin']->getTable("files") . " as f ON (f.id = a.image)
            WHERE
                a.id = " . $id . "
                " . $active . "
                AND a.lang = '" . $GLOBALS['lang']->getLang() . "'
            ",__FILE__,__LINE__,0);
        
        $data = array();
        while($row = $result->FetchRow()){
            if($title != ''){
                XT::assign("TITLE", $title);
            } else {
                XT::assign("TITLE", $row['title']);
            }
            if($row['image_version'] != ''){
                XT::assign("IMAGE_VERSION", '_' . $row['image_version']);
            }
            $data[] = $row;
        }
        
        XT::assign("NEWS", $data[0]);
        
        $result = XT::query("
            SELECT
                a.id,
                a.title,
                a.subtitle,
                a.maintext,
                a.image,
                a.image_link,
                a.image_link_target,
                a.image_zoom,
                a.level,
                a.layout,
                f.description as image_description,
                f.width as image_original_width,
                f.height as image_original_height,
                fd.width as image_width,
                fd.height as image_height
            FROM
                " . $GLOBALS['plugin']->getTable("newsmanager_chapters") . " as a LEFT JOIN 
                " . $GLOBALS['plugin']->getTable("files") . " as f ON (f.id = a.image) LEFT JOIN 
                " . $GLOBALS['plugin']->getTable("files_versions") . " as fd ON (fd.file_id = a.image AND fd.version = a.image_version)
            WHERE
                a.id = " . $id . "
                " . $active . "
                AND a.lang = '" . $GLOBALS['lang']->getLang() . "'
            GROUP BY
                a.level
            ORDER BY
                a.level ASC",__FILE__,__LINE__);
        
        $chapter_content = '';
        while($row = $result->FetchRow()){
            if($row['image_description'] == ''){
                $row['image_description'] = $row['title'];
            }
            XT::assign("CHAPTER", $row);
            $layout = $row['layout'] != '' ? $row['layout'] : 'image_left.tpl';
            $chapter_content .= $GLOBALS['tpl']->fetch($GLOBALS['plugin']->tpl_location . 'chapters/' . $layout);
        }
        
        XT::assign("CHAPTERCONTENT", $chapter_content);        
        
        $content = XT::build($style);
        
    }
}

?>
