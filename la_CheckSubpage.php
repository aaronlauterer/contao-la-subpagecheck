 <?php 
 /**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Aaron Lauterer 2009-2015
 * @author     Aaron Lauterer <aaron@lauterer.at>
 * @package    la_subpagecheck
 * @license    LGPL
 */
 
 class la_CheckSubpage extends Frontend
 {
    public function replaceTag($strTag)
    {
        $arrSplit = explode('::', $strTag);
 
        if ($arrSplit[0] == 'has_subpage')
        {
            if (isset($arrSplit[1]))
            {
                return $this->getSubPageCount($arrSplit[1]);
            }
        }
        
        return false;
    }
    
    private function getSubPageCount($id)
    {
        $id=trim($id); // otherweise spaces would make it a string
        
        if(!is_numeric($id))
        {
            return $id.' is no integer';
        }
        
        $objResult = $this->Database->prepare("SELECT COUNT(id) FROM tl_page WHERE pid=? AND published=1")
                             ->execute($id);
        
        if($objResult->fetchAllAssoc()[0]['COUNT(id)'] > 0)
        {
            return 'true';
        }
        else
        {
            return 'false';
        }
        
    }
 }
 ?>