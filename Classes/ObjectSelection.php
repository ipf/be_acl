<?php

namespace Ipf\BeAcl;

class ObjectSelection {
	/**
	 * Populates the "object_id" field of a "tx_beacl_acl" record depending on
	 * whether the field "type" is set to "User" or "Group"
	 *
	 * @param        array        field configuration
	 * @param        object
	 * @return    void
	 */
	function select($PA, $fobj) {
		if (!array_key_exists('row', $PA)) {
			return;
		}
		if (!array_key_exists('type', $PA['row'])) {
			return;
		}

		// Resetting the SELECT field items
		$PA['items'] = array(
			0 => array(
				0 => '',
				1 => '',
			),
		);

		// Get users or groups - The function copies functionality of the method acl_objectSelector()
		// of ux_SC_mod_web_perm_index class as for non-admins it returns only:
		// 1) Users which are members of the groups of the current user.
		// 2) Groups that the current user is a member of.
		switch ($PA['row']['type']) {
			// In case users shall be returned
			case '0':
				$items = \TYPO3\CMS\Backend\Utility\BackendUtility::getUserNames();
				if (!$GLOBALS['BE_USER']->isAdmin()) {
					$items = \TYPO3\CMS\Backend\Utility\BackendUtility::blindUserNames($items, $GLOBALS['BE_USER']->userGroupsUID, 1);
				}

				foreach ($items as $row) {
					$PA['items'][] = array(
						0 => $row['username'],
						1 => $row['uid'],
					);
				}
				break;

			// In case groups shall be returned
			case '1':
				$items = \TYPO3\CMS\Backend\Utility\BackendUtility::getGroupNames();
				if (!$GLOBALS['BE_USER']->isAdmin()) {
					$items = \TYPO3\CMS\Backend\Utility\BackendUtility::blindGroupNames($items, $GLOBALS['BE_USER']->userGroupsUID, 1);
				}

				foreach ($items as $row) {
					$PA['items'][] = array(
						0 => $row['title'],
						1 => $row['uid'],
					);
				}
				break;

			default:
				return;
		}

		return;
	}
}

?>