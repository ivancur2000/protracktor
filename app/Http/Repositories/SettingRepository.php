<?php

namespace App\Http\Repositories;

use Konekt\Gears\Facades\Settings;

class SettingRepository 
{
    public function getOrdersTableDefault() {
        return json_decode(Settings::get('orders.table_default'));
    }
    
    public function getApiKeys() {
        $api_keys = json_decode(Settings::get('global.api_keys'));
        return json_decode(json_encode($api_keys), true);
    }

    public function updaApiKey($index, $api_key) {
        $api_keys = $this->getApiKeys();
        $replace = [$index => $api_key];
        $api_keys = array_replace($api_keys, $replace);
        Settings::set('global.api_keys', json_encode($api_keys));
    }

    public function getAudienceDefault() {
        $audience_default = json_decode(Settings::get('event_blocks.audience_default'));
        return json_decode(json_encode($audience_default), true);
    }
}