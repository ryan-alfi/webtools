<?php
/**
 *
 * PHP AJAX Calendar
 * http://www.script-tutorials.com/datatables-data-from-ajax-edit-in-place/
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Script Tutorials
 * http://www.script-tutorials.com/
 */

// set error reporting level
if (version_compare(phpversion(), '5.3.0', '>=') == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);


if ($_GET) {
    require_once('classes/CMySQL.php');
    switch ($_GET['action']) {
        case 'getMembersAjx':
            getMembersAjx();
            break;
        case 'updateMemberAjx':
            updateMemberAjx();
            break;
        case 'deleteMember':
            deleteMember();
            break;
    }
    exit;
}

function getMembersAjx() {

    // SQL limit
    $sLimit = '';
    if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
        $sLimit = 'LIMIT ' . (int)$_GET['iDisplayStart'] . ', ' . (int)$_GET['iDisplayLength'];
    }

    // SQL order
    $aColumns = array('kata', 'pos');
    $sOrder = '';
    if (isset($_GET['iSortCol_0'])) {
        $sOrder = 'ORDER BY  ';
        for ($i=0 ; $i<(int)$_GET['iSortingCols'] ; $i++) {
            if ( $_GET[ 'bSortable_'.(int)$_GET['iSortCol_'.$i] ] == 'true' ) {
                $sOrder .= '`'.$aColumns[ (int)$_GET['iSortCol_'.$i] ].'` '.
                    ($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .', ';
            }
        }

        $sOrder = substr_replace($sOrder, '', -2);
        if ($sOrder == 'ORDER BY') {
            $sOrder = '';
        }
    }

    // SQL where
    $sWhere = 'WHERE 1';
    if (isset($_GET['sSearch']) && $_GET['sSearch'] != '') {
        $sWhere = 'WHERE 1 AND (';
        for ($i=0; $i<count($aColumns) ; $i++) {
            if (isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == 'true') {
                $sWhere .= '`' . $aColumns[$i]."` LIKE '%".mysql_real_escape_string($_GET['sSearch'])."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, '', -3 );
        $sWhere .= ')';
    }

    $aMembers = $GLOBALS['MySQL']->getAll("SELECT * FROM `tkata` {$sWhere} {$sOrder} {$sLimit}");
    $iCnt = (int)$GLOBALS['MySQL']->getOne("SELECT COUNT(`id_kata`) AS 'Cnt' FROM `tkata` WHERE 1");

    $output = array(
        'sEcho' => intval($_GET['sEcho']),
        'iTotalRecords' => count($aMembers),
        'iTotalDisplayRecords' => $iCnt,
        'aaData' => array()
    );
    foreach ($aMembers as $iID => $aInfo) {
        $aItem = array(
            $aInfo['kata'], $aInfo['pos'], 'DT_RowId' => $aInfo['id_kata']
        );
        $output['aaData'][] = $aItem;
    }
    echo json_encode($output);
}
function updateMemberAjx() {
    $sVal = $GLOBALS['MySQL']->escape($_POST['kata']);
    $iId = (int)$_POST['id_kata'];

    if ($iId && $sVal !== FALSE) {
        switch ($_POST['columnName']) {
            case 'kata':
                $GLOBALS['MySQL']->res("UPDATE `tkata` SET `kata`='{$sVal}' WHERE `id_kata`='{$iId}'");
                break;
            case 'pos':
                $GLOBALS['MySQL']->res("UPDATE `tkata` SET `pos`='{$sVal}' WHERE `id_kata`='{$iId}'");
                break;
        }
        echo 'Successfully saved';
    }else{
        echo 'Cannor Saved';
    }
    exit;
}
function deleteMember() {
    $iId = (int)$_POST['id_kata'];
    if ($iId) {
        $GLOBALS['MySQL']->res("DELETE FROM `tkata` WHERE `id_kata`='{$iId}'");
        return;
    }
    echo 'Error';exit;
}