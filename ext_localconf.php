<?php
if (!defined("TYPO3_MODE")) {
	die ("Access denied.");
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	options.saveDocNew.tx_beacl_acl=1
');

$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_userauthgroup.php']['calcPerms'][] = 'Ipf\\BeAcl\\User\\AuthGroup->calcPerms';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_userauthgroup.php']['getPagePermsClause'][] = 'Ipf\\BeAcl\\User\\AuthGroup->getPagePermsClause';

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Perm\\Controller\\PermissionModuleController'] = array(
	'className' => 'Ipf\\BeAcl\\Xclass\\Permissions',
);

// Hook for clear cache
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][$_EXTKEY] = 'EXT:be_acl/Classes/User/AuthGroup.php:Ipf\\BeAcl\\User\\AuthGroup->clearCache';
//TCEmain Hooks
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][$_EXTKEY] = 'EXT:be_acl/Classes/User/AuthGroup.php:&Ipf\\BeAcl\\User\\AuthGroup';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass'][$_EXTKEY] = 'EXT:be_acl/Classes/User/AuthGroup.php:&Ipf\\BeAcl\\User\\AuthGroup';

?>