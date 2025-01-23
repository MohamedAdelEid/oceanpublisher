<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lookup;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class MainController extends Controller
{
    protected $view;
    // protected $route;
	protected $data;
    protected $perPage = 30;
    protected $store_message = 'Request success, Added new source to storage.';
    protected $update_message = 'Request success, Updated specified source from storage.';
    protected $delete_message = 'Request success, Deleted specified source from storage.';
    protected $update_profile = 'Request success, Your profile has been updated successfully.';
    protected $destroytext = 'Error.. Can not be deleted because other data will be affected by the deletion!';
    protected $exception = 'Error.. General Exception happens we cannot proceed for your request!';

    
    /**
     * This is function to Generate SEO For Pages.
     */
    public function generateSEOForPage($page, $data)
    {
        $title = env('APP_NAME');
        $description = $canonical = $property = $image = '';
        $meta_tags = explode(',', $data['lookup']->meta_tags);
        $image = $data['lookup']->about_image;
        $property = 'WebPage';

        switch ($page)
        {
            case 'index':

                $title = $data['lookup']->pages_seo->home_title;
                $description = $data['lookup']->pages_seo->home_description;
                $canonical = route('/');

                break;
            case 'category':
            
                $title = $data['category']->name . ' - '.$title;
                $description = $data['category']->description;
                $image = $data['category']->image;
                $canonical = route('showCategory', $data['category']->slug);

                break;
            case 'subCategory':
            
                $title = $data['subCategory']->name . ' - '.$title;
                $description = $data['subCategory']->description;
                $image = $data['subCategory']->image;
                $canonical = route('showSubCategory', $data['subCategory']->slug);

                break;
            case 'product':
            
                $title = $data['product']->title . ' - '.$title;
                $description = $data['product']->intro;
                $image = $data['product']->image;
                $canonical = route('showProduct', $data['product']->slug);
                $property = 'article';

                break;
            case 'about':
    
                $title = $data['lookup']->pages_seo->about_title;
                $description = $data['lookup']->pages_seo->about_description;
                $canonical = route('aboutUs');

                break;
            case 'faqs':
            
                $title = $data['lookup']->pages_seo->faqs_title;
                $description = $data['lookup']->pages_seo->faqs_description;
                $canonical = route('faqs');

                break;
            case 'contact':
            
                $title = $data['lookup']->pages_seo->contact_title;
                $description = $data['lookup']->pages_seo->contact_description;
                $canonical = route('contactUs');

                break;
            case 'privacy':

                $title = $data['lookup']->pages_seo->privacy_title;
                $description = $data['lookup']->pages_seo->privacy_description;
                $canonical = route('privacyPolicy');

                break;
            case 'terms':

                $title = $data['lookup']->pages_seo->terms_title;
                $description = $data['lookup']->pages_seo->terms_description;
                $canonical = route('termsAndConditions');

                break;
            case 'login':

                $title = $data['lookup']->pages_seo->account_title;
                $description = $data['lookup']->pages_seo->account_description;
                $canonical = route('login');

                break;
                case 'register':

                    $title = $data['lookup']->pages_seo->account_title;
                    $description = $data['lookup']->pages_seo->account_description;
                    $canonical = route('register');
    
                    break;
            default:
                break;
        }

        /**
         * Adding SEO META Data.
         */
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($canonical);
        SEOMeta::addKeyword($meta_tags);
        if($page == 'product') {
            SEOMeta::addMeta('article:published_time', $data['product']->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:section', $data['product']->category->name, 'property');
            SEOMeta::addMeta('article:author', $data['product']->author, 'property');
        }

        /**
         * Adding OPENGRAPH Data.
         */
        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($canonical);
        OpenGraph::addProperty('type', $property);
        OpenGraph::addImage($image);
        OpenGraph::addProperty('locale', 'en-us');
        
        if($page == 'product') {
            OpenGraph::setArticle([
                'published_time' => $data['product']->created_at->toW3CString(),
                'author' => $data['product']->author,
                'section' => $data['product']->category->name,
            ]);
        }

        /**
         * Adding TWITTER CARD Data.
         */
        TwitterCard::setTitle($title);
        TwitterCard::setSite('@'.$data['lookup']->twitter);

        /**
         * Adding JSON ID Data.
         */
        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::setType($property);
        JsonLd::addImage($image);

        return true;
    }

}
