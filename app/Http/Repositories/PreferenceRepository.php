<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Http;
use Konekt\Gears\Facades\Preferences;

class PreferenceRepository {
    private $settingRepo;

    public function __construct(SettingRepository $settingRepo) {
        $this->settingRepo = $settingRepo;
    }
    
    public function getOrdersTablePreferences() {
        if (Preferences::get('orders.table')) {
            return json_decode(Preferences::get('orders.table'));
        } else {
            $columns = $this->settingRepo->getOrdersTableDefault();
            Preferences::set('orders.table', json_encode($columns));
        }
        return json_decode(Preferences::get('orders.table'));
    }

    public function setOrdersTablePreferences($columns) {
        Preferences::set('orders.table', json_encode($columns));
    }
}