<?php
namespace Tx\Guide\Hooks;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class PreHeaderRenderHook
 * @package Tx\Guide\Hooks
 */
class PreHeaderRenderHook {

	/**
	 * Alter the pageRenderer before starting the rendering
	 *
	 * @param array $arguments The list of arguments, including the pageRenderer
	 * @see \TYPO3\CMS\Core\Page\PageRenderer
	 */
	function renderHeader(array $arguments) {
		/** @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer*/
		$pageRenderer = $arguments['pageRenderer'];

		$css = $pageRenderer->backPath . ExtensionManagementUtility::extRelPath('guide') . 'Resources/Public/Stylesheets/hopscotch.css';
		$javascriptPath = $pageRenderer->backPath . ExtensionManagementUtility::extRelPath('guide') . 'Resources/Public/Javascripts/';

		$pageRenderer->addCssFile($css);
		$pageRenderer->loadJquery();
		$pageRenderer->addJsFile($javascriptPath . 'hopscotch.js');
		if ($pageRenderer->backPath === '') {
			$pageRenderer->addJsFile($javascriptPath . 'hopscotchadapter.js');
		}

	}
}
