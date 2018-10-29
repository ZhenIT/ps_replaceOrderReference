<?php

if ( ! defined('_PS_VERSION_')) {
    exit;
}

Class Order extends OrderCore
{

    public static function generateReference()
    {
        $option = Configuration::get('REPLACEORDERREFERENCE_OPTION');
        if ($option == 1) {
            $sql     = 'SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME   = \'' . _DB_PREFIX_ . 'orders\';';
            $last_id = Db::getInstance()->getValue($sql);

            return str_pad((int)$last_id, 9, '000000000', STR_PAD_LEFT);
        }
        return parent::generateReference();
    }

}