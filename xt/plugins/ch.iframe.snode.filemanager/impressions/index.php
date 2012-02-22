<?php

// Parameter :: category
$category = XT::getParam("category") != '' ? XT::getParam("category") : 1;

// Parameter :: count
$count = XT::getParam("count") != '' ? XT::getParam("count") : 1;

// Parameter :: image_version
$version = XT::getParam("image_version") != '' ? XT::getParam("image_version") : 1;

// Parameter :: width
$min_width = XT::getParam("min_width") != '' ? XT::getParam("min_width") : 0;

// Parameter :: Style
$style = XT::getParam('style') != '' ? XT::getParam('style') : 'default.tpl';

$additional = '';
// Build query additionals
if($min_width > 0){
    $additional .= " AND f.width > " . $min_width . " ";
}

// Parameter :: recursive
$recursive = XT::getParam("recursive") != '' ? XT::getParam("recursive") : false;
if($recursive){
    $recursivity = "tree.l >= tree2.l AND tree.r <= tree2.r AND";
}else {
	$recursivity = "tree.l = tree2.l AND tree.r = tree2.r AND";
}

// Get files for the active folder
$result = XT::query("
    SELECT
        det.title,
        f.id,
        f.filesize,
        det.description
    FROM
        " . XT::getTable("files_tree") . " as tree,
        " . XT::getTable("files_tree") . " as tree2,
        " . XT::getTable("files_rel") . " as rel LEFT JOIN
        " . XT::getTable("files") . " as f ON (f.id = rel.file_id)
    LEFT JOIN
        " . $GLOBALS['plugin']->getTable("files_details") . " as det ON (rel.file_id = det.id AND det.lang = '" . XT::getLang() .  "')
    WHERE
        tree2.id IN (" . $category . ") AND
        " . $recursivity . "
        f.type = 1 AND
        rel.node_id = tree.id
        " . $additional . "
    GROUP BY
        f.id
    ORDER BY
        RAND()
    LIMIT " . $count . "
",__FILE__,__LINE__);

$data = array();
while($row = $result->FetchRow()){
    $data[] = $row;
}

XT::assign("VERSION", $version);
XT::assign("FILES", $data);

$content = XT::build($style);

?>