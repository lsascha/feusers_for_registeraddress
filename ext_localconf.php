<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// Register Hook
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = \Lsascha\Feusersforregisteraddress\Hook\DataHandlerHook::class;
