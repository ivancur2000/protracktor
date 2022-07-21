<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'Introduction', 
            'sms' => true, 
            'preview' => true,
            'edit' => true, 
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        
        Event::create([
            'name' => 'Required Disclosures',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Consumer Awareness',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Commitment Delivery',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Seller Affadavit',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Closing Notice',
            'sms' => true,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Signing Reminder',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Wire Confirmation',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Congratulations',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Final Policy',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Title Commitment',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Congratulations',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Fraud',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Sellers Affadavit Follow Up',
            'sms' => true,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Presign',
            'sms' => true,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Closing Notice Update',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Wire Received',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

        Event::create([
            'name' => 'Settlement Statement',
            'sms' => false,
            'preview' => true,
            'edit' => true,
            'config' => true,
            'user_id_created' => 1,
            // 'event_version_id' => '',
        ]);

    }
}
