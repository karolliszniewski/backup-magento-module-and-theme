<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace AnimeKingdom\AnimeModule\Block;


use Magento\Catalog\Block\Product\ListProduct;

/**
 * Product list
 * @api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @since 100.0.2
 */
class Slider extends ListProduct
{

    public function LatestProducts()
    {
        $collection = $this->getLoadedProductCollection();
        $collection->clear();

        $collection->setPageSize(false);
        $collection->setCurPage(1);

        $collection->getSelect()->reset(\Zend_Db_Select::LIMIT_COUNT);
        $collection->getSelect()->reset(\Zend_Db_Select::LIMIT_OFFSET);

        $collection->getSelect()->reset(\Zend_Db_Select::ORDER);
        $collection->getSelect()->order('e.entity_id DESC');

        $collection->getSelect()->reset(\Zend_Db_Select::WHERE);

        $collection->getSelect()->where('stock_status_index.stock_status = ?', 1);
        $collection->setOrder('entity_id', 'DESC');

        $collection->getSelect()->limit(10);


        return $collection;
    }
}
