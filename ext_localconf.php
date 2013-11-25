<?php
if (!defined("TYPO3_MODE")) die ("Access denied.");
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	options.saveDocNew.tx_beacl_acl=1
');

require_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('be_acl') . 'res/class.tx_beacl_userauthgroup.php');
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_userauthgroup.php']['calcPerms'][] = 'tx_beacl_userAuthGroup->calcPerms';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_userauthgroup.php']['getPagePermsClause'][] = 'tx_beacl_userAuthGroup->getPagePermsClause';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Perm\\Controller\\PermissionModuleController'] = array(
	'className' => 'Ipf\\BeAcl\\Xclass\\Permissions',
);

// Hook for clear cache
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][$_EXTKEY] = 'EXT:be_acl/res/class.tx_beacl_userauthgroup.php:tx_beacl_userAuthGroup->clearCache';
//TCEmain Hooks
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY] = 'EXT:be_acl/res/class.tx_beacl_userauthgroup.php:&tx_beacl_userAuthGroup';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][$_EXTKEY] = 'EXT:be_acl/res/class.tx_beacl_userauthgroup.php:&tx_beacl_userAuthGroup';

?>