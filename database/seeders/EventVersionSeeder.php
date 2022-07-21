<?php

namespace Database\Seeders;

use App\Models\EventVersion;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::get();
        foreach ($events as $event) {
            $event_version = EventVersion::create([
                'event_id' => $event->id, 
                'name' => '1', 
                'user_id_created' => 1, 
            ]);
            $event->event_version_id = $event_version->id;
            $event->update();
        }
    }
}
