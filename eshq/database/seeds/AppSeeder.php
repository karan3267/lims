<?php

namespace App\Database\Seeds;
use Illuminate\Database\Seeder;
use App\Models\App;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App::create(['name' => 'Calibration & Maintenance', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Complaint Management', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Employee Training', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Proficiency Testing', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Validation & Verification', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'LAB Dashboard', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Audit Management', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Batch Records', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Change Control', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'CAPA (Corrective and Preventive Actions)', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Deviation Management', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Device History Record (DHR)', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Document Control ', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Employee Training', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Failure Mode and Effects Analysis (FMEA)', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Feedback Management ', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Incident Management ', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Inspection Management', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Job Hazard Analysis', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Management Review', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Nonconformance', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Risk Management', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Supplier Management', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'Vendor Management', 'icon' => 'app1.png', 'link' => '']);
        App::create(['name' => 'IOT', 'icon' => 'app1.png', 'link' => '']);
        // Add more apps here
    }
}
