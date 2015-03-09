<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Rene Nitzsche (rene@system25.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 *
 * tx_mkmailer_util_wizicon
 *
 * @package 		TYPO3
 * @subpackage	 	mkmailer
 * @author 			René Nitzsche <dev@dmk-ebusiness.de>
 * @license 		http://www.gnu.org/licenses/lgpl.html
 * 					GNU Lesser General Public License, version 3 or later
 */
class tx_mkmailer_util_wizicon {

	/**
	 * Adds the Netfewo plugin wizard icon
	 *
	 * @param array Input array with wizard items for plugins
	 * @return array Modified input array, having the items for Netfewo plugins added.
	 */
	function proc($wizardItems)	{
		global $LANG;

		$LL = $this->includeLocalLang();
		$wizardItems['plugins_tx_mkmailer'] = array(
			'icon'=>t3lib_extMgm::extRelPath('mkmailer').'/ext_icon.gif',
			'title'=>$LANG->getLLL('plugin.mkmailer.label',$LL),
			'description'=>$LANG->getLLL('plugin.mkmailer.description',$LL),
			'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=tx_mkmailer'
		);

		return $wizardItems;
	}

	/**
	 * @return array
	 */
	function includeLocalLang()	{
		$llFile = t3lib_extMgm::extPath('mkmailer').'locallang_db.xml';
		if (tx_rnbase_util_TYPO3::isTYPO46OrHigher()) {
			$llXmlParser = tx_rnbase::makeInstance('t3lib_l10n_parser_Llxml');
			$LOCAL_LANG =  $llXmlParser->getParsedData($llFile, $GLOBALS['LANG']->lang);
		}
		else {
			$LOCAL_LANG = t3lib_div::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);
		}
		return $LOCAL_LANG;
	}
}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/mkmailer/util/class.tx_mkmailer_util_wizicon.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/mkmailer/util/class.tx_mkmailer_util_wizicon.php']);
}