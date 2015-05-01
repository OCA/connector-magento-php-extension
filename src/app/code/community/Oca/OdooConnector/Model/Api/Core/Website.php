<?php
/*
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 */

class Oca_OdooConnector_Model_Api_Core_Website extends Mage_Catalog_Model_Api_Resource
{
    /**
     * Returns array of website ids
     *
     * @param array $filters
     * @return array
     */
    public function search($filters)
    {
        /** @var Mage_Core_Model_Resource_Website_Collection $websiteCollection */
        $websiteCollection = Mage::getModel('core/website')->getCollection();
        if (is_array($filters)) {
            try {
                foreach ($filters as $field => $value) {
                    $websiteCollection->addFieldToFilter($field, $value);
                }
            } catch (Mage_Core_Exception $e) {
                $this->_fault('filters_invalid', $e->getMessage());
            }
        }

        return $websiteCollection->getAllIds();
    }
}