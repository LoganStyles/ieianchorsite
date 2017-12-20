<?php

namespace App\Http\Controllers;

use App\Site;
use App\Siteimages;
use App\About;
use App\Aboutimages;
use App\Service;
use App\Serviceimage;
use App\Testimonial;
use App\Testimonialimage;
use App\Newsitem;
use App\Newsitemimage;
use App\Board;
use App\Boardimages;
use App\Banner;
use App\Bannerimage;
use App\Management;
use App\Managementimage;
use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {//items for the sites home page
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();
        
        $serviceitems = DB::table('services')
                ->leftjoin('serviceimages', 'services.id', '=', 'serviceimages.itemid')
                ->select('services.*', 'serviceimages.filename', 'serviceimages.itemid as imageid', 'serviceimages.alt', 'serviceimages.caption', 'serviceimages.main')
                ->get();
        
        $service_arrays = [];
        foreach ($serviceitems as $object) {
            $service_arrays[] = (array) $object;
        }
        
        $testimonials = DB::table('testimonials')
                ->leftjoin('testimonialimages', 'testimonials.id', '=', 'testimonialimages.itemid')
                ->select('testimonials.*', 'testimonialimages.filename', 'testimonialimages.itemid as imageid', 'testimonialimages.alt', 'testimonialimages.caption', 'testimonialimages.main')
                ->get();
        
        $testimonial_arrays = [];
        foreach ($testimonials as $object) {
            $testimonial_arrays[] = (array) $object;
        }
        
        $newsitems = DB::table('newsitems')
                ->leftjoin('newsitemimages', 'newsitems.id', '=', 'newsitemimages.itemid')
                ->select('newsitems.*', 'newsitemimages.filename', 'newsitemimages.itemid as imageid', 'newsitemimages.alt', 'newsitemimages.caption', 'newsitemimages.main')
                ->latest()
                ->first();
        
        //GET unit prices
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
                
        return view('/site/index', 
            [
                'siteitems' => $siteitems,
                'serviceitems'=>$service_arrays,
                'testimonials'=>$testimonial_arrays,
                'newsitem'=>$newsitems,
                'latest_unitprices'=>$latest_prices,
                'page_name' => 'home'
            ]);
    }

    /* process site info */

    public function updateSite(Request $request) {
        if ($request['id'] > 0) {
            $this->validate($request, [
                'url' => 'required|url',
                'email' => 'required|email',
                'opening' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            Site::where('id', $request['id'])->update([
                'url' => $request['url'],
                'email' => $request['email'],
                'phone1' => $request['phone1'],
                'phone2' => $request['phone2'],
                'facebook' => $request['facebook'],
                'twitter' => $request['twitter'],
                'instagram' => $request['instagram'],
                'youtube' => $request['youtube'],
                'linkedin' => $request['linkedin'],
                'opening' => $request['opening'],
                'client_url' => $request['client_url'],
                'office' => $request['office']
            ]);

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //insert the image
                $siteimage = new Siteimages();
                $siteimage->filename = $input['imagename'];
                $siteimage->itemid = $request['id'];
                $siteimage->alt = $request['caption'];
                $siteimage->caption = $request['caption'];
                $siteimage->main = $request['main'];
                $siteimage->save();
            }
        } else {
            $this->validate($request, [
                'url' => 'required|url',
                'email' => 'required|email',
                'opening' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //insert siteitems                    
            $siteinfo = new Site();
            $siteinfo->url = $request['url'];
            $siteinfo->email = trim($request['email']);
            $siteinfo->phone1 = $request['phone1'];
            $siteinfo->facebook = $request['facebook'];
            $siteinfo->twitter = $request['twitter'];
            $siteinfo->instagram = $request['instagram'];
            $siteinfo->youtube = $request['youtube'];
            $siteinfo->linkedin = $request['linkedin'];
            $siteinfo->opening = $request['opening'];
            $siteinfo->office = $request['office'];
            $siteinfo->client_url = $request['client_url'];
            $siteinfo->save();

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //save the image
                $siteimage = new Siteimages();
                $siteimage->filename = $input['imagename'];
                $siteimage->itemid = $siteinfo->id;
                $siteimage->alt = $request['caption'];
                $siteimage->caption = $request['caption'];
                $siteimage->main = $request['main'];
                $siteimage->save();
            }
        }
        return redirect()->back();
    }

    /* fetch site data */

    public function setup() {
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();
        $arrays = [];
        foreach ($siteitems as $object) {
            $arrays[] = (array) $object;
        }
        if (count($arrays) <= 0) {//provide defaults
            $sub_array = [];
            $sub_array['id'] = 0;
            $sub_array['url'] = "";
            $sub_array['email'] = "";
            $sub_array['phone1'] = "";
            $sub_array['phone2'] = "";
            $sub_array['facebook'] = "";
            $sub_array['twitter'] = "";
            $sub_array['instagram'] = "";
            $sub_array['youtube'] = "";
            $sub_array['linkedin'] = "";
            $sub_array['client_url'] = "";
            $sub_array['opening'] = "";
            $sub_array['office'] = "";
            $sub_array['filename'] = "";
            $sub_array['imageid'] = "";
            $sub_array['alt'] = "";
            $sub_array['caption'] = "";
            $sub_array['main'] = "";
            $arrays[] = $sub_array;
        }
//        print_r($arrays);exit;
        return view('/templates/setup', ['siteitems' => $arrays, 'page_name' => 'setup']);
    }

    /*display module (about,services etc) info on the site
        or display subitem of a module
     */
    public function show($item, $subitem = NULL) {
        //get site info
        $fetched_item = [];
        $view = "/site/" . $item;
        
        //GET unit prices
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
        
        //site info needed for header
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();
        
        $newsitems = DB::table('newsitems')
                ->leftjoin('newsitemimages', 'newsitems.id', '=', 'newsitemimages.itemid')
                ->select('newsitems.*', 'newsitemimages.filename', 'newsitemimages.itemid as imageid', 'newsitemimages.alt', 'newsitemimages.caption', 'newsitemimages.main')
                ->latest()
                ->first();
        
        //service items info needed for navigation bar
        $serviceitems = DB::table('services')
                ->leftjoin('serviceimages', 'services.id', '=', 'serviceimages.itemid')
                ->select('services.*', 'serviceimages.filename', 'serviceimages.itemid as imageid', 'serviceimages.alt', 'serviceimages.caption', 'serviceimages.main')
                ->get();
        
        $service_arrays = [];
        foreach ($serviceitems as $object) {
            $service_arrays[] = (array) $object;
        }
        
        //get a 
        if ($subitem) {
            //get a specific subitem from an item based on a link_label
            $itemimages = $item . 'images';
            $items = $item . 's';
            $moduleitems = DB::table($items)
                    ->leftjoin($itemimages, $items . '.id', '=', $itemimages . '.itemid')
                    ->select($items . '.*', $itemimages . '.filename', $itemimages . '.itemid as imageid', $itemimages . '.alt', $itemimages . '.caption', $itemimages . '.main')
                    ->where($items . '.link_label', $subitem)
                    ->get();
            
            foreach ($moduleitems as $object) {
                    $fetched_item[] = (array) $object;
                }
       

            if($item=="newsitem"){//fetch last 5 news stories
                $moduleitems=DB::table($items)
                        ->limit(5)
                        ->get();
            }
            
            if($item=="board" || $item=="management"){
                $view = "/site/".$item."_details";
            }
        
        
        } else {
            $itemimages = $item . 'images';
            $items = $item . 's';
            $moduleitems = DB::table($items)
                    ->leftjoin($itemimages, $items . '.id', '=', $itemimages . '.itemid')
                    ->select($items . '.*', $itemimages . '.filename', $itemimages . '.itemid as imageid', $itemimages . '.alt', $itemimages . '.caption', $itemimages . '.main')
                    ->get();
        }
        $arrays = [];
        foreach ($moduleitems as $object) {
            $arrays[] = (array) $object;
        }
        
        return view($view, ['moduleitems' => $arrays, 'siteitems' => $siteitems, 'page_name' => $item,'serviceitems'=>$service_arrays,'fetched_item'=>$fetched_item,'latest_unitprices'=>$latest_prices,'newsitem'=>$newsitems]);
    }
    
    /* display the investment strategy*/

    public function showInvestment() {
        
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();
        
        $serviceitems = DB::table('services')
                ->leftjoin('serviceimages', 'services.id', '=', 'serviceimages.itemid')
                ->select('services.*', 'serviceimages.filename', 'serviceimages.itemid as imageid', 'serviceimages.alt', 'serviceimages.caption', 'serviceimages.main')
                ->get();
        
        $service_arrays = [];
        foreach ($serviceitems as $object) {
            $service_arrays[] = (array) $object;
        }       
                
        $newsitems = DB::table('newsitems')
                ->leftjoin('newsitemimages', 'newsitems.id', '=', 'newsitemimages.itemid')
                ->select('newsitems.*', 'newsitemimages.filename', 'newsitemimages.itemid as imageid', 'newsitemimages.alt', 'newsitemimages.caption', 'newsitemimages.main')
                ->latest()
                ->first();
        
        //GET unit prices
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
        
        return view('/site/investment', 
            [
                'siteitems' => $siteitems,
                'serviceitems'=>$service_arrays,
                'newsitem'=>$newsitems,
                'latest_unitprices'=>$latest_prices,
                'page_name' => 'investment'
            ]);
    }
    
    /* display the investment strategy*/

    public function showContact() {
        
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();
        
        $serviceitems = DB::table('services')
                ->leftjoin('serviceimages', 'services.id', '=', 'serviceimages.itemid')
                ->select('services.*', 'serviceimages.filename', 'serviceimages.itemid as imageid', 'serviceimages.alt', 'serviceimages.caption', 'serviceimages.main')
                ->get();
        
        $service_arrays = [];
        foreach ($serviceitems as $object) {
            $service_arrays[] = (array) $object;
        }       
                
        $newsitems = DB::table('newsitems')
                ->leftjoin('newsitemimages', 'newsitems.id', '=', 'newsitemimages.itemid')
                ->select('newsitems.*', 'newsitemimages.filename', 'newsitemimages.itemid as imageid', 'newsitemimages.alt', 'newsitemimages.caption', 'newsitemimages.main')
                ->latest()
                ->first();
        
        //GET unit prices
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
        
        return view('/site/contact', 
            [
                'siteitems' => $siteitems,
                'serviceitems'=>$service_arrays,
                'newsitem'=>$newsitems,
                'latest_unitprices'=>$latest_prices,
                'page_name' => 'contact'
            ]);
    }
    
    /* display the some specific page*/

    public function showPage($page) {
        
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();
        
        $serviceitems = DB::table('services')
                ->leftjoin('serviceimages', 'services.id', '=', 'serviceimages.itemid')
                ->select('services.*', 'serviceimages.filename', 'serviceimages.itemid as imageid', 'serviceimages.alt', 'serviceimages.caption', 'serviceimages.main')
                ->get();
        
        $service_arrays = [];
        foreach ($serviceitems as $object) {
            $service_arrays[] = (array) $object;
        }       
                
        $newsitems = DB::table('newsitems')
                ->leftjoin('newsitemimages', 'newsitems.id', '=', 'newsitemimages.itemid')
                ->select('newsitems.*', 'newsitemimages.filename', 'newsitemimages.itemid as imageid', 'newsitemimages.alt', 'newsitemimages.caption', 'newsitemimages.main')
                ->latest()
                ->first();
        
        //GET unit prices
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
        
        return view('/site/'.$page, 
            [
                'siteitems' => $siteitems,
                'serviceitems'=>$service_arrays,
                'newsitem'=>$newsitems,
                'latest_unitprices'=>$latest_prices,
                'page_name' => $page
            ]);
    }
    
    /*display module (pension_calculator) info on the site*/
    public function showCalculator($item) {
        //get site info
        $service = [];
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();
        
        $serviceitems = DB::table('services')
                ->leftjoin('serviceimages', 'services.id', '=', 'serviceimages.itemid')
                ->select('services.*', 'serviceimages.filename', 'serviceimages.itemid as imageid', 'serviceimages.alt', 'serviceimages.caption', 'serviceimages.main')
                ->get();
        
        $service_arrays = [];
        foreach ($serviceitems as $object) {
            $service_arrays[] = (array) $object;
        }
        
        //default values
        $result = array('lumpsum' => '0.00',
            'monthly_pension' => '0.00',
            'qualify_for_lumpsum' => 'No',
            'qualify_for_programmed_withdrawal' => 'No',
            'total_package' => '0.00');
        
        //GET unit prices
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
        
         $newsitems = DB::table('newsitems')
                ->leftjoin('newsitemimages', 'newsitems.id', '=', 'newsitemimages.itemid')
                ->select('newsitems.*', 'newsitemimages.filename', 'newsitemimages.itemid as imageid', 'newsitemimages.alt', 'newsitemimages.caption', 'newsitemimages.main')
                ->latest()
                ->first();
        
        
        $view = "/site/" . $item;
        return view($view, ['resultitems' => $result,'newsitem'=>$newsitems, 'latest_unitprices'=>$latest_prices,'siteitems' => $siteitems, 'page_name' => $item,'serviceitems'=>$service_arrays,'service'=>$service]);
    }

    /* fetch data for each module */

    public function showModule($item) {

        $itemimages = $item . 'images';
        $items = $item . 's';
        $moduleitems = DB::table($items)
                ->leftjoin($itemimages, $items . '.id', '=', $itemimages . '.itemid')
                ->select($items . '.*', $itemimages . '.filename', $itemimages . '.itemid as imageid', $itemimages . '.alt', $itemimages . '.caption', $itemimages . '.main')
                ->get();

        $arrays = [];
        foreach ($moduleitems as $object) {
            $arrays[] = (array) $object;
        }

        if (count($arrays) <= 0) {//provide defaults
            $sub_array = [];
            $sub_array['id'] = 0;
            $sub_array['title'] = "";
            $sub_array['details'] = "";
            $sub_array['link_label'] = "";
            $sub_array['position'] = 1;
            $sub_array['display'] = 1;
            $sub_array['keywords'] = "";
            $sub_array['description'] = "";
            $sub_array['excerpt'] = "";
            $sub_array['type'] = $item;
            $sub_array['filename'] = "";
            $sub_array['imageid'] = "";
            $sub_array['alt'] = "";
            $sub_array['caption'] = "";
            $sub_array['main'] = "";
            $arrays[] = $sub_array;
        }

//        print_r($arrays);exit;
        $view = "/templates/" . $item;
        return view($view, ['moduleitems' => $arrays, 'page_name' => $item]);
    }
    
    public function getActivity() {
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();
        //print_r($latest_prices);exit;
        return view('/templates/activity');
    }
    
    /* process modules create & edit */

    public function processModule(Request $request) {

        if ($request['id'] > 0) {//validate and already existing module item
            $this->validate($request, [
                'title' => 'required',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //chk for module type
            switch ($request['type']) {//chk for module type
                case'about':
                    About::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display'],
                        'link_label'=>preg_replace('/[^A-Za-z0-9]/', '_', strtolower($request['title'])),
                        'excerpt'=>substr($request['details'],0,100)
                    ]);
                    $moduleimage = new Aboutimages();
                    break;
                
                case'service':
                    Service::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display'],
                        'link_label'=>preg_replace('/[^A-Za-z0-9]/', '_', strtolower($request['title'])),
                        'excerpt'=>substr($request['details'],0,100)
                    ]);
                    $moduleimage = new Serviceimage();
                    break;
                
                case'testimonial':
                    Testimonial::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display'],
                        'link_label'=>preg_replace('/[^A-Za-z0-9]/', '_', strtolower($request['title'])),
                        'excerpt'=>substr($request['details'],0,100)
                    ]);
                    $moduleimage = new Testimonialimage();
                    break;
                
                case'board':
                    Board::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display'],
                        'link_label'=>preg_replace('/[^A-Za-z0-9]/', '_', strtolower($request['title'])),
                        'excerpt'=>substr($request['details'],0,100)
                    ]);
                    $moduleimage = new Boardimages();
                    break;
                
                case'management':
                    Management::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display'],
                        'link_label'=>preg_replace('/[^A-Za-z0-9]/', '_', strtolower($request['title'])),
                        'excerpt'=>substr($request['details'],0,100)
                    ]);
                    $moduleimage = new Managementimage();
                    break;
                
                case'newsitem':
                    Newsitem::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'position' => $request['position'],
                        'display' => $request['display'],
                        'link_label'=>preg_replace('/[^A-Za-z0-9]/', '_', strtolower($request['title'])),
                        'excerpt'=>substr($request['details'],0,100)
                    ]);
                    $moduleimage = new Newsitemimage();
                    break;
            }

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //insert the image                
                $moduleimage->filename = $input['imagename'];
                $moduleimage->itemid = $request['id'];
                $moduleimage->alt = $request['caption'];
                $moduleimage->caption = $request['caption'];
                $moduleimage->main = $request['main'];
                $moduleimage->save();
            }
        } else {
            //validate and already existing module item
            $this->validate($request, [
                'title' => 'required|unique:abouts',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
            ]);

            //chk for module type
            switch ($request['type']) {
                case'about':
                    $moduleitem = new About();
                    $moduleimage = new Aboutimages();
                    break;

                case'service':
                    $moduleitem = new Service();
                    $moduleimage = new Serviceimage();
                    break;
                
                case'testimonial':
                    $moduleitem = new Testimonial();
                    $moduleimage = new Testimonialimage();
                    break;
                
                case'newsitem':
                    $moduleitem = new Newsitem();
                    $moduleimage = new Newsitemimage();
                    break;
                
                case'board':
                    $moduleitem = new Board();
                    $moduleimage = new Boardimages();
                    break;
                
                case'management':
                    $moduleitem =  new Management();
                    $moduleimage = new Managementimage();
                    break;
                
            }

            //insert modules            
            $moduleitem->title = $request['title'];
            $moduleitem->details = trim($request['details']);
            $moduleitem->position = $request['position'];
            $moduleitem->display = $request['display'];
            $moduleitem->link_label = preg_replace('/[^A-Za-z0-9]/', '_', strtolower($request['title']));
            $moduleitem->excerpt = substr($request['details'],0,100);
            $moduleitem->save();

            //if image exists
            $image = $request->file('image');
            if (!empty($image)) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/site/img');
                $image->move($destinationPath, $input['imagename']);

                //save the image                
                $moduleimage->filename = $input['imagename'];
                $moduleimage->itemid = $moduleitem->id;
                $moduleimage->alt = $request['caption'];
                $moduleimage->caption = $request['caption'];
                $moduleimage->main = $request['main'];
                $moduleimage->save();
            }
        }

        //    return redirect()->route('view');
        return redirect()->back();
    }
    
    
    /* process modules create & edit */

    public function processContact(Request $request) {

        if ($request['id'] > 0) {//validate and already existing module item
            $this->validate($request, [
                'title' => 'required',
                'details' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required'
            ]);
            
            Feedback::where('id', $request['id'])->update([
                        'title' => $request['title'],
                        'details' => trim($request['details']),
                        'email' => $request['email'],
                        'phone' => $request['phone'],
                'ticket_id' => '1',
                        'subject' => $request['subject']
                    ]);
            
        } else {
            //validate and already existing module item
            $this->validate($request, [
                'title' => 'required',
                'details' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required'
            ]);
            
            $moduleitem = new Feedback();            

            //insert modules            
            $moduleitem->title = $request['title'];
            $moduleitem->details = trim($request['details']);
            $moduleitem->email = $request['email'];
            $moduleitem->phone = $request['phone'];
            $moduleitem->subject = $request['subject'];
            $moduleitem->ticket_id = '1';
            $moduleitem->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

        //chk for module type
        switch ($request['type']) {
            case'about':
                $moduleitem = About::find($request['id']);
                $moduleitem->delete();
                break;

            case'service':
                $moduleitem = Service::find($request['id']);
                $moduleitem->delete();
                break;
            
            case'testimonial':
                $moduleitem = Testimonial::find($request['id']);
                $moduleitem->delete();
                break;
            
            case'banner':
                $moduleitem = Banner::find($request['id']);
                $moduleitem->delete();
                break;
            
            case'board':
                $moduleitem = Board::find($request['id']);
                $moduleitem->delete();
                break;
            
            case'management':
                $moduleitem = Management::find($request['id']);
                $moduleitem->delete();
                break;
            
            case'newsitem':
                $moduleitem = Newsitem::find($request['id']);
                $moduleitem->delete();
                break;
        }

        return redirect()->back();
    }
    
    /*
     * pension calculator
     * validates data received then calculates total package
     */
    public function pensionCalculator(Request $request) {
        //default values
        $result = array('lumpsum' => '0.00',
            'monthly_pension' => '0.00',
            'qualify_for_lumpsum' => 'No',
            'qualify_for_programmed_withdrawal' => 'No',
            'total_package' => '0.00');

        $this->validate($request, [
            'rsa_balance' => 'numeric',
            'monthly_contribution' => 'numeric',
            'years_before_retirement' => 'numeric',
            'percentage_return' => 'numeric'
        ]);

        $percentageReturn = ($request['percentage_return']) / 100;
        $totalPackage = ($request['monthly_contribution'] * $request['years_before_retirement'] * 12) + ($request['rsa_balance'] * pow((1 + $request['percentage_return']), $request['years_before_retirement']));

        //format & set total package
        $result['total_package'] = number_format($totalPackage, 2);

        if ($totalPackage > 550000) {
            $result['qualify_for_lumpsum'] = 'Yes';
            $result['lumpsum'] = number_format(($totalPackage * .25), 2);
            $result['qualify_for_programmed_withdrawal'] = 'Yes';
            $result['monthly_pension'] = number_format(((0.75 * $totalPackage) / 120), 2);
        } else {
            $result['qualify_for_lumpsum'] = 'No';
            $result['lumpsum'] = $totalPackage;
            $result['qualify_for_programmed_withdrawal'] = 'No';
        }

        //get site info
        $service = [];
        $siteitems = DB::table('sites')
                ->leftjoin('siteimages', 'sites.id', '=', 'siteimages.itemid')
                ->select('sites.*', 'siteimages.filename', 'siteimages.itemid as imageid', 'siteimages.alt', 'siteimages.caption', 'siteimages.main')
                ->get();

        $serviceitems = DB::table('services')
                ->leftjoin('serviceimages', 'services.id', '=', 'serviceimages.itemid')
                ->select('services.*', 'serviceimages.filename', 'serviceimages.itemid as imageid', 'serviceimages.alt', 'serviceimages.caption', 'serviceimages.main')
                ->get();

        $service_arrays = [];
        foreach ($serviceitems as $object) {
            $service_arrays[] = (array) $object;
        }
        
        $newsitems = DB::table('newsitems')
                ->leftjoin('newsitemimages', 'newsitems.id', '=', 'newsitemimages.itemid')
                ->select('newsitems.*', 'newsitemimages.filename', 'newsitemimages.itemid as imageid', 'newsitemimages.alt', 'newsitemimages.caption', 'newsitemimages.main')
                ->latest()
                ->first();
        
        //GET unit prices
        $latest_prices=DB::table('unit_prices')
                        ->orderBy('report_date','desc')
                        ->first();

        $page = 'site/pension_calculator';
        return view($page, ['resultitems' => $result, 'page_name' => $page,'newsitem'=>$newsitems, 'latest_unitprices'=>$latest_prices, 'siteitems' => $siteitems, 'serviceitems' => $service_arrays, 'service' => $service]);
    }
    
    /*
     * handles file downloads
     * implement headers later
     */
    public function downloadFile($item){
        $pathToFile=public_path('/site/downloads/'.$item);
        return response()->download($pathToFile);
    }
    
    public function fetchRangeOfPrices(Request $request) {
        //fetch range of unit prices
        $result=[];
        $from_date  = ($request['startDate'])?($request['startDate']):(date('m/d/Y'));
        $to_date    = ($request['endDate'])?($request['endDate']):(date('m/d/Y'));

        $from = date('Y-m-d' . ' 00:00:00', strtotime($from_date));
        $to = date('Y-m-d' . ' 00:00:00', strtotime($to_date));

        $range_of_prices = DB::table('unit_prices')
                ->whereBetween('report_date', [$from, $to])
                ->orderBy('report_date', 'desc')
                ->get();
//        print_r($range_of_prices);exit;
        if($range_of_prices){
            $result=$range_of_prices;
        }
        return json_encode($result);
    }

}
