<?php


namespace App\Helper;


use GuzzleHttp\Client;

class PaymooneyService
{

    private $client;
    /**
     * @var string
     */
    private $base_url;

    /**
     * PaymooneyService constructor.
     */
    public function __construct()
    {
        $this->base_url =  'https://www.paymooney.com/api/v1.0/';
        $this->client = new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json charset=UTF-8 ',

            ],
        ]);
    }
    public function make_payment($value)
    {
        try {
            $data_ = array(
                'amount' => intval($value['amount']),
                'currency_code' => 'XAF',
                'ccode' => 'CM',
                'lang' => 'fr',
                'item_ref' => $value['vote_id'],
                'item_name' => ''.env('APP_NAME'),
                'description' => 'Vote pour '.$value['rubrique'],
                'email' => 'exemple@email.com',
                'phone' => '+14388830022',
                'first_name' => 'Name',
                'last_name' => 'Surname',
                'public_key' => 'PK_M3bEkEq6CelazAR2JyK2',
                'logo' => 'https://paymooney.com/images/logo_paymooney2.png',
                'environement' => 'test'
            );
            $data = array(
                'amount' => intval($value['amount']),
                'currency_code' => 'XAF',
                'ccode' => 'CM',
                'lang' => 'fr',
                'item_ref' => $value['vote_id'],
                'item_name' => ''.env('APP_NAME'),
                'description' => 'Vote pour '.$value['rubrique'],
                'email' => 'exemple@email.com',
                'phone' => '+2376895463',
                'redirectOnFailureUrl' => route('cancel').'?vote_id='.$value['vote_id'],
                'callbackUrl' => route('callback').'?vote_id='.$value['vote_id'],
                'callbackOnFailureUrl' => route('callback').'?vote_id='.$value['vote_id'],
                'redirectUrl'=>route('home'),
                'last_name' => 'Surname',
                'public_key' => 'PK_M3bEkEq6CelazAR2JyK2',
                'logo' => asset('front/images/logo.png'),
                'environement' => 'test',
                "redirectTarget" => "TOP",
            );
            $options = [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($data)
            ];
            // logger($options);
            $res = $this->client->post("payment_url",$options);
            $response= $res->getBody();

            $response_decoded = json_decode($response,true);
            if ($response_decoded['response'] == "success") {
                return [
                    'url'=>$response_decoded['payment_url'],
                    'status'=>$response_decoded['response']
                ];

            } else {
                logger($response_decoded['message']);
                return [
                    'status'=>$response_decoded['response']
                ];
            }
        } catch (\Exception $exception) {
            logger($exception);
            return '';
        }
    }

}
