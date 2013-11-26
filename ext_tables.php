<?php
if (!defined("TYPO3_MODE")) {
	die ("Access denied.");
}

if (TYPO3_MODE == 'BE') {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
		'web_func',
		'tx_temp_modfunc1',
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'modfunc1/class.tx_temp_modfunc1.php',
		'LLL:EXT:temp/locallang_db.php:moduleFunction.tx_temp_modfunc1'
	);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages("tx_beacl_acl");

$TCA["tx_beacl_acl"] = Array(
	"ctrl" => Array(
		"title" => "LLL:EXT:be_acl/Resources/Private/Language/locallang_db.xlf:tx_beacl_acl",
		"label" => "uid",
		"tstamp" => "tstamp",
		"crdate" => "crdate",
		"cruser_id" => "cruser_id",
		"type" => "type",
		"default_sortby" => "ORDER BY type",
		"dynamicConfigFile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/Tca/Acl.php',
		"iconfile" => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Images/icon_tx_beacl_acl.gif',
	),
	"feInterface" => Array(
		"fe_admin_fieldList" => "type, object_id, permissions, recursive",
	)
);

?>