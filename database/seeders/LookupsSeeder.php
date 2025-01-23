<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lookup;

class LookupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path().'\panel\images';
        
        $lookup = Lookup::create([
            'admin_prefix' => 'admin',
            'title' => 'title',
            'meta_tags' => 'meta_tags',
            'address' => 'address',
            'email' => 'email',
            'phone' => 'phone',
            'whatsapp' => 'whatsapp',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'instagram' => 'instagram',
            'about_us' => 'about_us',
            'mission' => 'mission',
            'vision' => 'vision',
            'goals' => 'goals',
            'privacy_policy' => 'privacy_policy',
            'terms_conditions' => 'terms_conditions',
            'pages_seo' => [
                'home_title' => 'Page Title',
                'home_description' => 'Page Description',

                'about_title' => 'Page Title',
                'about_description' => 'Page Description',

                'contact_title' => 'Page Title',
                'contact_description' => 'Page Description',
                
                'faqs_title' => 'Page Title',
                'faqs_description' => 'Page Description',
                
                'privacy_title' => 'Page Title',
                'privacy_description' => 'Page Description',
                
                'terms_title' => 'Page Title',
                'terms_description' => 'Page Description',
                
                'account_title' => 'Page Title',
                'account_description' => 'Page Description',
            ],
        ]);
        $lookup->addMedia($path.'\about.png')->preservingOriginal()->toMediaCollection('lookup_about');
        $lookup->addMedia($path.'\logo.png')->preservingOriginal()->toMediaCollection('lookup_logo');
        $lookup->addMedia($path.'\favicon.png')->preservingOriginal()->toMediaCollection('lookup_favicon');
    }
}
