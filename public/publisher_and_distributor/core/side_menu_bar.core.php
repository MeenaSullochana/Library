<?php
include "plugin.core.php";

$ConfigData[]       =   '';
$naviData[]         =   '';

$condition = ['where' => ['id' => '1']];
$siteConfigData = $viewController->getRows($table['tbl_settings'], $condition);
if (!empty($siteConfigData)) {
    foreach ($siteConfigData as $siteConfig) {
        $ConfigData = $siteConfig;
    }
}

/*****************************************************************************/
/*                             Home Page                                     */
/*                         Navigation System                                 */
/*****************************************************************************/
// $ConfigData[] = '';
$catecondition = [
    // 'where'=>['id'=>'1'],
    'order_by' => 'id'
];
$cateConfigData = $viewController->getRows($table['category'], $catecondition);
// echo "<pre>";
// print_r($cateConfigData);
// echo "<pre>";
if (!empty($cateConfigData)) {
    foreach ($cateConfigData as $siteCate) {
        $naviData = $siteCate;
    }
}
?>