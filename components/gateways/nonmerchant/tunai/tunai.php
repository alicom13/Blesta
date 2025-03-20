<?php
/**
 * Tunai Payment Gateway
 *
 * Allows instructions to be displayed to the client informing them on how to submit payment tunai
 *
 * @package blesta
 * @subpackage blesta.components.gateways.tunai
 * @copyright Copyright (c) 2010, Phillips Data, Inc.
 * @license http://www.blesta.com/license/ The Blesta License Agreement
 * @link http://www.blesta.com/ Blesta
 */
class Tunai extends NonmerchantGateway
{
    private $meta;
    public function __construct()
    {
        $this->loadConfig(dirname(__FILE__) . DS . 'config.json');

        // Load components required by this gateway
        Loader::loadComponents($this, ['Input']);

        // Load the language required by this gateway
        Language::loadLang('tunai', null, dirname(__FILE__) . DS . 'language' . DS);
    }
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    public function getSettings(array $meta = null)
    {
        $this->view = $this->makeView('settings', 'default', str_replace(ROOTWEBDIR, '', dirname(__FILE__) . DS));

        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Form', 'Html']);

        $this->view->set('meta', $meta);

        return $this->view->fetch();
    }
    public function editSettings(array $meta)
    {
        // Verify meta data is valid
        $rules = [
            'instructions' => [
                'valid' => [
                    'rule' => 'isEmpty',
                    'negate' => true,
                    'message' => Language::_('Tunai.!error.instructions.valid', true)
                ]
            ]
        ];

        $this->Input->setRules($rules);

        // Validate the given meta data to ensure it meets the requirements
        $this->Input->validates($meta);
        // Return the meta data, no changes required regardless of success or failure for this gateway
        return $meta;
    }
    public function encryptableFields()
    {
        return [];
    }
    public function setMeta(array $meta = null)
    {
        $this->meta = $meta;
    }
    public function buildProcess(array $contact_info, $amount, array $invoice_amounts = null, array $options = null)
    {
        $this->view = $this->makeView('process', 'default', str_replace(ROOTWEBDIR, '', dirname(__FILE__) . DS));

        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Html', 'TextParser']);

        $this->view->set('meta', $this->meta);

        return $this->view->fetch();
    }
    public function validate(array $get, array $post)
    {
        $this->getCommonError('unsupported');
        return null;
    }
    public function success(array $get, array $post)
    {
        $this->getCommonError('unsupported');
        return null;
    }
}
