<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Konekt\Gears\Facades\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_columns = $this->getOrdersTableColumns();
        $global_api_keys = $this->getGlobalApiKeys();
        $audience_default = $this->getAudienceDefault();
        
        Settings::set('orders.table_default', json_encode($order_columns));
        Settings::set('global.api_keys', json_encode($global_api_keys));
        Settings::set('event_blocks.audience_default', json_encode($audience_default));
    }

    private function getOrdersTableColumns() 
    {
        return [
            [
                "description" => "Settlement Date",
                "key" => "settlementDate",
                "value" => true,
            ], [
                "description" => "Order ID",
                "key" => "orderId",
                "value" => true,
            ], [
                "description" => "Product Type",
                "key" => "productType",
                "value" => true,
            ], [
                "description" => "Property Address",
                "key" => "propertyAddress",
                "value" => true,
            ], [
                "description" => "Escrow Officer",
                "key" => "escrowOfficer",
                "value" => true,
            ], [
                "description" => "Closing Office",
                "key" => "closingOffice",
                "value" => true,
            ], [
                "description" => "Order Status",
                "key" => "orderStatus",
                "value" => true,
            ], [
                "description" => "Buying Agent",
                "key" => "buyingAgent",
                "value" => false
            ], [
                "description" => "Listing Agent",
                "key" => "listingAgent",
                "value" => false
            ], [
                "description" => "Optin Status",
                "key" => "optinStatus",
                "value" => false
            ], [
                "description" => "Perferred Closing Location",
                "key" => "perferredCLosingLocation",
                "value" => false
            ], [
                "description" => "Closing Team",
                "key" => "closingTeam",
                "value" => false
            ], [
                "description" => "Addtional Field",
                "key" => "addtionalField",
                "value" => false
            ]
        ];
    }

    private function getGlobalApiKeys()
    {
        return [
            [
                'label' => 'Softpro SDK',
                'app_id' => '',
                'app_secret_id' => ''
            ], [
                'label' => 'Outlook API',
                'app_id' => '',
                'app_secret_id' => ''
            ], [
                'label' => 'Telenex API',
                'app_id' => '',
                'app_secret_id' => ''
            ], [
                'label' => 'Softpro',
                'app_id' => '',
                'app_secret_id' => ''
            ], [
                'label' => 'Jotforms API',
                'app_id' => '',
                'app_secret_id' => ''
            ], [
                'label' => 'Sharefile API',
                'app_id' => '',
                'app_secret_id' => ''
            ], [
                'label' => 'SMTP Settings',
                'app_id' => '',
                'app_secret_id' => ''
            ], [
                'label' => 'Jotform or SendGrid API',
                'app_id' => '',
                'app_secret_id' => ''
            ]
        ];
    }

    public function getAudienceDefault() 
    {
        return [
            'buyer' => [
                'desc' => 'Buyer',
                'checked' => true
            ],
            'listing_agent' => [
                'desc' => 'Listing Agent',
                'checked' => true
            ],
            'lender' => [
                'desc' => 'Lender',
                'checked' => true
            ],
            'seller' => [
                'desc' => 'Seller',
                'checked' => true
            ],
            'buying_agent' => [
                'desc' => 'Buying Agent',
                'checked' => true
            ],
            'settlement_agent' => [
                'desc' => 'Settlement Agent',
                'checked' => true
            ],
            'title_company' => [
                'desc' => 'Title Company',
                'checked' => true
            ],
        ];
    }
}
