<?php

if (!defined('XOOPS_ROOT_PATH')) {
	exit();
}

if (!class_exists('IcmsCache')) {	require_once(ICMS_ROOT_PATH.'/modules/xrest/class/cache/icmscache.php'); }

/**
 * Class for Blue Room Xrest 1.52
 * @author Simon Roberts <simon@chronolabs.coop>
 * @copyright copyright (c) 2012-2011 chronolabs.coop
 * @package kernel
 */
class XrestTables extends icms_core_Object
{
	
    function XrestTables($id = null)
    {
        $this->initVar('tbl_id', XOBJ_DTYPE_INT, null, false);
		$this->initVar('tablename', XOBJ_DTYPE_TXTBOX, null, false, 220);
		$this->initVar('allowpost', XOBJ_DTYPE_INT, null, false);
		$this->initVar('allowretrieve', XOBJ_DTYPE_INT, null, false);
		$this->initVar('allowupdate', XOBJ_DTYPE_INT, null, false);	
		$this->initVar('visible', XOBJ_DTYPE_INT, null, false);
		$this->initVar('view', XOBJ_DTYPE_INT, null, false);
		
    	foreach($this->vars as $key => $data) {
			$this->vars[$key]['persistent'] = true;
		}
	}

}

/**
 * Class for Blue Room XRest 1.52
 * @author Simon Roberts <simon@chronolabs.coop>
 * @copyright copyright (c) 2012-2011 chronolabs.coop
 * @package kernel
 */
class XrestMysqlTables extends icms_core_Object
{
	
    function XrestMysqlTables()
    {
		$this->initVar('Name', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Engine', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Version', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Row_format', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Rows', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Avg_row_length', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Data_length', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Max_data_length', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Index_length', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Data_free', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Auto_increment', XOBJ_DTYPE_INT, null, false);
		$this->initVar('Created_time', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Updated_time', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Check_time', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Collation', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Checksum', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Create_options', XOBJ_DTYPE_OTHER, null, false);
		$this->initVar('Comment', XOBJ_DTYPE_OTHER, null, false);
	}

}


/**
* XOOPS policies handler class.
* This class is responsible for providing data access mechanisms to the data source
* of XOOPS user class objects.
*
* @author  Simon Roberts <simon@chronolabs.coop>
* @package kernel
*/
class XrestTablesHandler extends icms_ipf_Handler
{
    function __construct(&$db) 
    {
		$this->db = $db;
        parent::__construct($db, 'tables', "tbl_id", "tablename", "", "xrest");
    }
    
    public function getTablesInDatabase($database, $prefix = '') {
    	if (empty($prefix)) {
    		$sql = "SHOW TABLE STATUS FROM `".$database.'`';
    	} else { 
    		$sql = "SHOW TABLE STATUS FROM `".$database.'` LIKE "'.$prefix.'%"';
    	}
		$result = $GLOBALS['xoopsDB']->queryF($sql);
		$ret = array();
		$i=1;
		while($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
			if ($row['Comment'] != 'VIEW' && $row['Comment'] != 'TRIGGER'  && $row['Comment'] != 'STORE PROCEEDURE' ) {
				$ret[$i] = new XrestMysqlTables();
				$ret[$i]->assignVars($row);
				$i++;
			}	
		}
		return $ret;
    }
    
	public function getViewsInDatabase($database) {
    	$sql = "SHOW TABLE STATUS FROM `".$database.'`';
		$result = $GLOBALS['xoopsDB']->queryF($sql);
		$ret = array();
		$i=1;
		while($row = $GLOBALS['xoopsDB']->fetchArray($result)) {
			if ($row['Comment'] == 'VIEW') {
				$ret[$i] = new XrestMysqlTables();
				$ret[$i]->assignVars($row);
				$i++;
			}	
		}
		return $ret;
    }
    
    public function getTableWithName($tablename, $view = false) {
    	$criteria = new icms_db_criteria_Compo(new icms_db_criteria_Item('`tablename`', $tablename));
    	$criteria->add(new icms_db_criteria_Item('`view`', $view));
    	if ($this->getCount($criteria)==0) {
    		return false;
    	} elseif ($objects = $this->getObjects($criteria, false)) {
    		if (isset($objects[0]))
    			return $objects[0];
    		else 
    			return false;
    	}
    	return false;
    }
    
    public function getViewWithName($viewname) {
    	return $this->getTableWithName($viewname, true);
    }
}

?>