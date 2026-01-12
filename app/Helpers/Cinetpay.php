<?php
/**
 * CinetPay
 *
 * LICENSE
 *
 * This source file is subject to the MIT License that is bundled
 * with this package in the file LICENSE.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to support@cinetpay.com so we can send you a copy immediately.
 *
 * @category   CinetPay
 * @package    cinetpay
 * @version    1.9.2
 * @license    MIT
 */

/**
 * Class CinetPay
 * @category   CinetPay
 * @package    cinetpay
 * @copyright  Copyright (c) 20015-2016 CinetPay Inc. (https://www.cinetpay.com)
 */

 namespace App\Herlpers;
 use Exeption;
class CinetPay
{
    protected ?string $BASE_URL;
    /**
     * An identifier
     * @var string
     */

     public int|float $amount;
     public string $currency = 'XOF';
     public ?string $transaction_id;
     public ?string $customer_name;
     public ?string $customer_surname;
     public ?string $description;
     public ?string $invoice_data;

     //variable facultative indentifiants
     public string $channels = 'ALL';
     public ?string $notify_url;
     public ?string $return_url;

     //toutes les variables

     public string $metadata = "";
     public string $alternative_currency = "";
     public string $customer_phone_number = "";
     public string $customer_adresse = "";
     public string $customer_city = "";
     public string $customer_country = "";
     public string $customer_state = "";
     public string $customer_zip_code = "";
     

     //variable des payment check

     public ?string $chk_payment_date;
     public ?string $chk_operator_id;
     public ?string $chk_payment_method;
     public ?string $chk_code;
     public ?string $chk_message;
     public ?string $chk_api_response_id;
     public ?string $chk_description;
     public ?string $chk_amount;
     public ?string $chk_currency;
     public ?string $chk_metadata;

     /**
      * cinetpay constuctor
      * @param $site_id
      * @param $api_key
      * @param $version
      * @param $param
      *
      */
      public function __construct(
        public int|float $site_id,
        public ?string $api_key,
        // verification ssl sur curl
        public bool $verifySsl = false
      ){
        $this->BASE_URL = 'https://api-checkout.Cinetpay.com/v2/payment';
        $this->apikey = $apikey;
        $this->site_id = $site_id;
      }
      public function generatePaymentLink(array $params): array
{
    try {
        // 1. Paramètres obligatoires
        $required = [
            'apikey', 'site_id', 'amount', 'currency', 'designation',
            'payment_config', 'page_action', 'version', 'language',
            'notify_url', 'return_url', 'cancel_url'
        ];
        foreach ($required as $key) {
            if (empty($params[$key])) {
                throw new Exception("Le paramètre '$key' est requis.");
            }
        }

        // 2. Date et ID de transaction
        $transDate = date('YmdHis');
        $transId = $params['trans_id'] ?? self::generateTransId();

        // 3. Construction de la data pour signature
        $signatureData = [
            'apikey' => $params['apikey'],
            'cpm_site_id' => $params['site_id'],
            'cpm_currency' => $params['currency'],
            'cpm_payment_config' => $params['payment_config'],
            'cpm_page_action' => $params['page_action'],
            'cpm_version' => $params['version'],
            'cpm_language' => $params['language'],
            'cpm_trans_date' => $transDate,
            'cpm_trans_id' => $transId,
            'cpm_designation' => $params['designation'],
            'cpm_amount' => $params['amount'],
        ];
        if (!empty($params['custom'])) {
            $signatureData['cpm_custom'] = $params['custom'];
        }

        // 4. Appel API pour obtenir la signature
        $signature = $this->callCinetpayWsMethod($signatureData, $this->getSignatureHost());

        if (!is_string($signature)) {
            throw new Exception("Erreur lors de la récupération de la signature");
        }

        $signatureDecoded = json_decode($signature, true);
        if (!isset($signatureDecoded['signature'])) {
            throw new Exception("Signature invalide ou manquante : " . $signature);
        }

        // 5. Construction du formulaire HTML
        $form = "<form id='form_cinetpay' action='" . $this->getCashDeskHost() . "' method='post'>";
        $fields = [
            'apikey' => $params['apikey'],
            'cpm_site_id' => $params['site_id'],
            'cpm_currency' => $params['currency'],
            'cpm_payment_config' => $params['payment_config'],
            'cpm_page_action' => $params['page_action'],
            'cpm_version' => $params['version'],
            'cpm_language' => $params['language'],
            'cpm_trans_date' => $transDate,
            'cpm_trans_id' => $transId,
            'cpm_designation' => $params['designation'],
            'cpm_amount' => $params['amount'],
            'signature' => $signatureDecoded['signature'],
            'notify_url' => $params['notify_url'],
            'return_url' => $params['return_url'],
            'cancel_url' => $params['cancel_url'],
        ];
        if (!empty($params['custom'])) {
            $fields['cpm_custom'] = $params['custom'];
        }

        foreach ($fields as $name => $value) {
            $form .= "<input type='hidden' name='" . htmlspecialchars($name) . "' value='" . htmlspecialchars($value) . "' />";
        }

        $form .= "<button type='submit'>Payer avec CinetPay</button>";
        $form .= "</form>";

        // 6. Retour des données
        return [
            'success' => true,
            'trans_id' => $transId,
            'form' => $form,
            'signature' => $signatureDecoded['signature']
        ];
    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
}


   

}