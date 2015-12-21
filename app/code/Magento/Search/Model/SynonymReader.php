<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Search\Model;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Data\Collection\AbstractDb as DbCollection;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;

/**
 * Data model to retrieve synonyms by passed in phrase
 *
 * @method \Magento\Search\Model\ResourceModel\SynonymReader _getResource()
 * @method \Magento\Search\Model\ResourceModel\SynonymReader getResource()
 * @method \Magento\Search\Model\SynonymReader setGroupId(int $group)
 * @method int getGroupId()
 * @method \Magento\Search\Model\SynonymReader setScopeId(int $scope)
 * @method int getScopeId()
 * @method \Magento\Search\Model\SynonymReader setScopeType(string $scopeType)
 * @method string getScopeType()
 * @method \Magento\Search\Model\SynonymReader setSynonyms(string $value)
 * @method string getSynonyms()
 */
class SynonymReader extends AbstractModel
{
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'search_synonyms';

    /**
     * Event object key name
     *
     * @var string
     */
    protected $_eventObject = 'search_synonyms';

    /**
     * Construct
     *
     * @param \Magento\Framework\Model\Context $context
     * @param Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param DbCollection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        DbCollection $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Init resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magento\Search\Model\ResourceModel\SynonymReader');
    }

    /**
     * Load synonyms by user query phrase in context of current store view
     *
     * @param string $phrase
     * @return $this
     */
    public function loadByPhrase($phrase)
    {
        $this->_getResource()->loadByPhrase($this, strtolower($phrase));
        $this->_afterLoad();
        $this->setOrigData();
        return $this;
    }
}
