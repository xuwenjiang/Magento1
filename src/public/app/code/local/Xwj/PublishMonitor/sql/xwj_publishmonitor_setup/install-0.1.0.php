<?php

/* @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'published_at', array(
    'group'            => 'General',
    'type'             => 'datetime',
    'label'            => 'Published At',
    'backend'          => 'eav/entity_attribute_backend_datetime',
    'required'         => false,
    'is_configurable'  => false,
    'global'           => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$installer->endSetup();
