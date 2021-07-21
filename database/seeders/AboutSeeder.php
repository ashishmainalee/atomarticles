<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = About::create([
            'site_name' => 'Online News',
            'site_logo' => '',
            'site_image' => '',
            'site_banner' => '',
            'address' => 'Dudhe',
            'contact_number' => '0987654321',
            'email' => 'onlinenews@hotmail.com',
            'facebook' => 'fb.com/onlinenews',
            'site_description' => 'Culpa possimus debitis consequatur est voluptatem fugiat tempora. Quo ipsam nobis soluta repudiandae quibusdam voluptas at dolorum temporibus. Quam officiis possimus odit. Corporis tempora odit quam. Sit aut id et maxime quod excepturi illum quod.
                                    t eum accusantium. Maiores hic ut sapiente sint officia corporis vitae. Optio accusantium quo odio quod. Esse et aut sed laudantium veritatis laudantium. Culpa aut illum sed et in voluptas. Aut sunt deserunt adipisci dolorem quo deleniti.
                                    Perspiciatis in rerum fugit accusamus occaecati animi sunt est sint. Tempora dignissimos tenetur qui quod iure non natus sapiente. Quis et a facilis. Quae incidunt excepturi voluptas sequi non non sequi quae voluptatem. Quis quis alias ut adipisci impedit velit.',
            'site_terms' => 'Nesciunt eaque id voluptas repellat distinctio sint. Omnis dolorem sit id quod. Occaecati et consequatur dolorum dolore veniam dolorem quos porro earum.',
            'site_policy' => 'Site Policy goes here..',
        ]);
    }
}
