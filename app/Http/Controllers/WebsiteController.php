<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Lookup;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\FAQ;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Serial;
use Carbon\Carbon;
use App\Notifications\NewMessageNotification;
use App\Notifications\NewsletterNotification;
use App\Notifications\SerialUsedNotification;
use Notification;

class WebsiteController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data['menu_categories'] = Category::where('show_menu', true)->where('status', true)->whereNull('parent_id')->get();
        $this->data['lookup'] = Lookup::first();

        $this->view = 'website.';
    }

    /**
     * Show the website index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['sliders'] = Slider::where('status', true)->get();
        $this->data['categories'] = Category::where('status', true)->whereNull('parent_id')->get();
        $this->data['testimonials'] = Testimonial::where('status', true)->get();

    	$data = $this->data;
        // dd($data);
        $this->generateSEOForPage('index', $data);

        return view($this->view.'index', compact('data'));
    }

    /**
     * Show the website Category page. [HOLDED]
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory(Category $category)
    {
        $this->data['category'] = $category;
        $this->data['subCategories'] = $category->children;

    	$data = $this->data;
        // dd($data);
        $this->generateSEOForPage('category', $data);

        return view($this->view.'subCategories', compact('data'));
    }


    /**
     * Show the website Category page. [HOLDED]
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubCategory(Category $category)
    {
        $this->data['subCategory'] = $category;
        $this->data['products'] = Product::where('status', true)->get();

    	$data = $this->data;
        // dd($data);
        $this->generateSEOForPage('subCategory', $data);

        return view($this->view.'products', compact('data'));
    }

    /**
     * Show the website Category Products page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategoryProducts(Category $category)
    {
        $this->data['category'] = $category;
        $this->data['products'] = Product::where('category_id', $category->id)->where('status', true)->get();

    	$data = $this->data;
        // dd($data);
        $this->generateSEOForPage('category', $data);

        return view($this->view.'products', compact('data'));
    }

    /**
     * Show the website show Product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct(Product $product)
    {
        $this->data['product'] = $product;
        $this->data['related'] = Product::where('category_id', $product->category_id)->where('status', true)->limit(6);

    	$data = $this->data;
        // dd($data);
        $this->generateSEOForPage('product', $data);

        return view($this->view.'productDetails', compact('data'));
    }

    /**
     * Show the website about us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
    	$data = $this->data;
        $this->generateSEOForPage('about', $data);
        
        return view($this->view.'about', compact('data'));
    }

    /**
     * Show the website FAQs page.
     *
     * @return \Illuminate\Http\Response
     */
    public function FAQs()
    {
        $this->data['faqs'] = FAQ::where('status', true)->get();
    	$data = $this->data;
        $this->generateSEOForPage('faqs', $data);
        
        return view($this->view.'faqs', compact('data'));
    }

    /**
     * Show the website career page.
     *
     * @return \Illuminate\Http\Response
     */
    public function careerForm()
    {
    	$data = $this->data;
        $this->generateSEOForPage('contact', $data);
        
        return view($this->view.'career', compact('data'));
    }

    /**
     * Show the website contact us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
    	$data = $this->data;
        $this->generateSEOForPage('contact', $data);
        
        return view($this->view.'contact', compact('data'));
    }
    
    /**
     * Show the website Privacy Policy page.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacyPolicy()
    {	
        $data = $this->data;
        $this->generateSEOForPage('privacy', $data);
        
        return view($this->view.'privacyPolicy', compact('data'));
    }
    
    /**
     * Show the website Terms And Conditions page.
     *
     * @return \Illuminate\Http\Response
     */
    public function termsAndConditions()
    {
        $data = $this->data;
        $this->generateSEOForPage('terms', $data);
        
        return view($this->view.'termsAndConditions', compact('data'));
    }
    
    /**
     * Show the website Store contact message page.
     *
     * @param  string  $page
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactMessage(Request $request, $page)
    {
        if($page == 'career') {
            $validator = Validator::make($request->all(), [
                'type'      => 'required|string|in:career,message',
                'name'      => 'required|string|min:5|max:250',
                'email'     => 'required|email|min:5|max:250',
                'phone'     => 'required|numeric',
                'job_post'  => 'required|string|max:255',
                'educational_degree'   => 'required|string|max:255',
                'cv_file'   => 'required|mimes:pdf|max:2048',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'type'      => 'required|string|in:career,message',
                'name'      => 'required|string|min:5|max:250',
                'email'     => 'required|email|min:5|max:250',
                'subject'   => 'required|string|min:5|max:100',
                'message'   => 'required|string|min:20|max:2000',
            ]);
        }

        if ($validator->fails()) {
            if($page == 'home') {
                return redirect()->to('/#contact')->withInput()->withErrors($validator->errors());
            } elseif($page == 'contact') {
                return redirect()->to('/contact-us#contact')->withInput()->withErrors($validator->errors());
            } if($page == 'career') {
                return redirect()->to('/career#contact')->withInput()->withErrors($validator->errors());
            }
        }

        $user_id = (auth()->check()) ? auth()->id() : null;
        if($request->type == 'message')
        {
            $message = Message::create([
                'user_id'   => $user_id,
                'type'      => $request->type,
                'name'      => $request->name,
                'email'     => $request->email,
                'subject'   => $request->subject,
                'message'   => $request->message
            ]);
        } else {
            $message = Message::create([
                'user_id'   => $user_id,
                'type'      => $request->type,
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'job_post'  => $request->job_post,
                'educational_degree' => $request->educational_degree,
            ]);

            $message->addMediaFromRequest('cv_file')->toMediaCollection('cvs');
        }
        
        // Send Notification
        Notification::send(get_admins_stuff(), new NewMessageNotification([
            'body'  => '['.strtoupper($request->type).'] New Message has been created!',
            'url'   => route('messages.show', $message->id),
        ]));

        // Redirect.
        if($page == 'home') {
            return redirect()->to('/#contact')->with('success', 'Your message has been sent. Thank you!');
        } elseif($page == 'contact') {
            return redirect()->to('/contact-us#contact')->with('success', 'Your message has been sent. Thank you!');
        } if($page == 'career') {
            return redirect()->to('/career#contact')->with('success', 'Your application has been sent. Thank you!');
        }
    }

    /**
     * Subscribe On Newsletter.
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subscribeNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:5|max:250|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()->first()
            ];
        }

        // Create newsletter
        Newsletter::create([
            'email' => $request->email,
            'active' => true,
        ]);

        // Send Notification
        Notification::send(get_admins_stuff(), new NewsletterNotification([
            'body'  => 'Newsletters subscription created!',
            'url'   => route('newsletters.index'),
        ]));

        return [
            'status' => true,
            'message' => 'Your subscription has been completed. Thank you!'
        ];
    }

    /**
     * Download Product Source.
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function downloadSource(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'serial' => 'required|string',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()->first()
            ];
        }

        $serialRow = Serial::where('product_id', $request->product_id)->where('number', $request->serial)->first();
        if(! $serialRow) {
            return [
                'status' => false,
                'message' => 'Invalid serial number!',
            ];
        }

        // Check Serial is valid.
        if(! $serialRow->is_valid) {
            return [
                'status' => false,
                'message' => 'Invalid serial number!',
            ];
        }

        // Check Serial is valid.
        $startDate = Carbon::createFromFormat('Y-m-d', $serialRow->startdate);
        $endDate = Carbon::createFromFormat('Y-m-d', $serialRow->enddate);
        $checkDates = Carbon::now()->between($startDate, $endDate);
        if(! $checkDates) {
            return [
                'status' => false,
                'message' => 'Invalid serial number!',
            ];
        }

        // Check the Serial capacity.
        if($serialRow->capacity >= 5) {
            return [
                'status' => false,
                'message' => 'Invalid serial number!',
            ];
        }
        
        // increase the serial data. 
        $capacity = $serialRow->capacity + 1;
        $serialRow->is_valid = ($capacity >= 5) ? false : true;
        $serialRow->capacity = $capacity;
        $serialRow->save();

        $product = Product::find($request->product_id);
        
        // Send Notification
        Notification::send(get_admins_stuff(), new SerialUsedNotification([
            'body'  => 'Serial has been used!',
            'url'   => route('serials.index', ['product='.$product->id]),
        ]));

        return [
            'status' => true,
            'file_url' => $product->source,
            'message' => 'Your book is ready. Just download!',
        ];
    }

    /**
     * Searching for product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searching(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'required|string',
        ]);
        
        $this->data['category'] = (object) [
            'name' => 'Search Results',
        ];

        $search = $request->keyword;
        $this->data['products'] = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('intro', 'LIKE', '%'.$search.'%')->where('status', true)->get();
    	$data = $this->data;

        return view($this->view.'products', compact('data'));
    }
}