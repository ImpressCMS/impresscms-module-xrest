<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 xoops.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //

error_reporting(E_ALL);
if (isset($_POST['fct'])&&isset($_POST['op'])&&isset($_POST['module'])) {
	if (($_POST['fct']=='modulesadmin')&&($_POST['op']=='install_ok'||$_POST['op']=='uninstall_ok'||$_POST['op']=='update_ok')&&($_POST['module']=='xrest')) {
		set_time_limit(900);
	}
}

$modversion['name']		    	= 'X-REST API Server';
$modversion['modname'] 			= basename(dirname(__FILE__));
$modversion['version']			= 1.60;
$modversion['releasedate'] 		= "Monday: 12 Feburary 2012";
$modversion['status'] 			= "Mature";
$modversion['module_status']	= "Mature";
$modversion['author'] 			= "Chronolabs Australia";
$modversion['credits'] 			= "Simon Roberts";
$modversion['teammembers'] 		= "Wishcraft";
$modversion['license'] 			= "GPL 3.0";
$modversion['official'] 		= 1;
$modversion['description']		= 'REST API Service to exchange JSON, Serialised or XML Packages with external server.';
$modversion['help']		    	= "";
$modversion['smallicon']		= "images/xrest_small_icon.png";
$modversion['bigicon']			= "images/xrest_big_icon.png";
$modversion['image']			= "images/xrest_icms_logo.png";
$modversion['dirname']			= 'xrest';

$modversion['website']      	= "www.chronolabs.coop";

$modversion['module_website_url'] = 'http://www.chronolabs.coop/articles/ImpressCMS/X-REST-1.60/146.html';
$modversion['module_website_name'] = 'X-Payment @ Chronolabs Co-op';

$modversion['dirmoduleadmin'] = 'admin/';
$modversion['icons16'] = 'class/moduleclasses/icons/16';
$modversion['icons32'] = 'class/moduleclasses/icons/32';

$modversion['release_info'] = "Stable 2012/02/12";
$modversion['release_file'] = ICMS_URL."/modules/xrest/docs/changelog.txt";
$modversion['release_date'] = "2012/02/12";

$modversion['developer_email'] = "simon@chronolabs.coop";
$modversion['developer_website_url'] = "http://www.chronolabs.coop";
$modversion['developer_website_name'] = "Chronolabs Australia";

$modversion['people']['developers'][] = "[url=http://xoops.org/modules/profile/userinfo.php?uid=62352]wishcraft[/url] (Simon Roberts)";
$modversion['people']['testers'][] = "[url=http://xoops.org/modules/profile/userinfo.php?uid=62352]wishcraft[/url] (Simon Roberts)";
$modversion['people']['translators'][] = "";
$modversion['people']['documenters'][] = "";

$modversion['warning'] = "For ImpressCMS";

// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Tables created by sql file (without prefix!)
$modversion['tables'][0]	= 'xrest_tables';
$modversion['tables'][1]	= 'xrest_fields';
$modversion['tables'][2]	= 'xrest_plugins';

// Admin things
$modversion['hasAdmin']		= 1;
$modversion['adminindex']	= "admin/index.php";
$modversion['adminmenu']	= "admin/menu.php";

// Menu
$modversion['hasMain'] = 1;

// Smarty
$modversion['use_smarty'] = 0;

$i=0;
$i++;
$modversion['config'][$i]['name'] = 'site_user_auth';
$modversion['config'][$i]['title'] = '_XREST_MI_USERAUTH';
$modversion['config'][$i]['description'] = '_XREST_MI_USERAUTHDESC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;

$i++;
$modversion['config'][$i]['name'] = 'run_cleanup';
$modversion['config'][$i]['title'] = '_XREST_MI_SECONDS_TO_CLEANUP';
$modversion['config'][$i]['description'] = '_XREST_MI_SECONDS_TO_CLEANUP_DESC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 86400;
$modversion['config'][$i]['options'] = array(_XREST_MI_SECONDS_2419200 => 2419200, _XREST_MI_SECONDS_604800 => 604800, _XREST_MI_SECONDS_86400 => 86400, _XREST_MI_SECONDS_43200 => 43200,
											_XREST_MI_SECONDS_3600 => 3600, _XREST_MI_SECONDS_1800 => 1800, _XREST_MI_SECONDS_1200 => 1200, _XREST_MI_SECONDS_600 => 600,
											_XREST_MI_SECONDS_300 => 300, _XREST_MI_SECONDS_180 => 180, _XREST_MI_SECONDS_60 => 60, _XREST_MI_SECONDS_30 => 30);

$i++;
$modversion['config'][$i]['name'] = 'plugin_list_cache';
$modversion['config'][$i]['title'] = '_XREST_MI_SECONDS_LIST_CACHE';
$modversion['config'][$i]['description'] = '_XREST_MI_SECONDS_LIST_CACHE_DESC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 3600;
$modversion['config'][$i]['options'] = array(_XREST_MI_SECONDS_2419200 => 2419200, _XREST_MI_SECONDS_604800 => 604800, _XREST_MI_SECONDS_86400 => 86400, _XREST_MI_SECONDS_43200 => 43200,
											_XREST_MI_SECONDS_3600 => 3600, _XREST_MI_SECONDS_1800 => 1800, _XREST_MI_SECONDS_1200 => 1200, _XREST_MI_SECONDS_600 => 600,
											_XREST_MI_SECONDS_300 => 300, _XREST_MI_SECONDS_180 => 180, _XREST_MI_SECONDS_60 => 60, _XREST_MI_SECONDS_30 => 30);
											
$i++;
$modversion['config'][$i]['name'] = 'lock_seconds';
$modversion['config'][$i]['title'] = '_XREST_MI_SECONDS';
$modversion['config'][$i]['description'] = '_XREST_MI_SECONDS_DESC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 180;
$modversion['config'][$i]['options'] = array(_XREST_MI_SECONDS_3600 => 3600, _XREST_MI_SECONDS_1800 => 1800, _XREST_MI_SECONDS_1200 => 1200, _XREST_MI_SECONDS_600 => 600,
											_XREST_MI_SECONDS_300 => 300, _XREST_MI_SECONDS_180 => 180, _XREST_MI_SECONDS_60 => 60, _XREST_MI_SECONDS_30 => 30);

srand((((float)('0' . substr(microtime(), strpos(microtime(), ' ') + 1, strlen(microtime()) - strpos(microtime(), ' ') + 1))) * mt_rand(30, 99999)));
srand((((float)('0' . substr(microtime(), strpos(microtime(), ' ') + 1, strlen(microtime()) - strpos(microtime(), ' ') + 1))) * mt_rand(30, 99999)));											
$i++;
$modversion['config'][$i]['name'] = 'lock_random_seed';
$modversion['config'][$i]['title'] = '_XREST_MI_USERANDOMLOCK';
$modversion['config'][$i]['description'] = '_XREST_MI_USERANDOMLOCK_DESC';
$modversion['config'][$i]['formtype'] = 'text';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = mt_rand(30, 170);
												
$i++;
$modversion['config'][$i]['name'] = 'cache_seconds';
$modversion['config'][$i]['title'] = '_XREST_MI_SECONDSCACHE';
$modversion['config'][$i]['description'] = '_XREST_MI_SECONDSCACHE_DESC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 3600;
$modversion['config'][$i]['options'] = array(_XREST_MI_SECONDS_3600 => 3600, _XREST_MI_SECONDS_1800 => 1800, _XREST_MI_SECONDS_1200 => 1200, _XREST_MI_SECONDS_600 => 600,
											_XREST_MI_SECONDS_300 => 300, _XREST_MI_SECONDS_180 => 180, _XREST_MI_SECONDS_60 => 60, _XREST_MI_SECONDS_30 => 30);											
?>
