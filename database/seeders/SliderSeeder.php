<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path().'\panel\images';

        $slider_1 = Slider::create([
            'title' => "Slider 1",
            'link' => "https://oceanpublishing.com",
            'status' => true,
        ]);
        $slider_1->addMedia($path.'\slider_1.png')->preservingOriginal()->toMediaCollection('sliders');

        
        $slider_2 = Slider::create([
            'title' => "Slider 2",
            'link' => "https://oceanpublishing.com",
            'status' => true,
        ]);
        $slider_2->addMedia($path.'\slider_2.png')->preservingOriginal()->toMediaCollection('sliders');

        
        $slider_3 = Slider::create([
            'title' => "Slider 3",
            'link' => "https://oceanpublishing.com",
            'status' => true,
        ]);
        $slider_3->addMedia($path.'\slider_3.png')->preservingOriginal()->toMediaCollection('sliders');
        
        $slider_4 = Slider::create([
            'title' => "Slider 4",
            'link' => "https://oceanpublishing.com",
            'status' => true,
        ]);
        $slider_4->addMedia($path.'\slider_4.png')->preservingOriginal()->toMediaCollection('sliders');
    }
}
