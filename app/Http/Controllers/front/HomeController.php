<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\ContactFormRequest;
use App\Models\Inquiry;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

/**
 * Class HomeController
 */
class HomeController extends AppBaseController
{
    /**
     * @param  ContactFormRequest  $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function sendContact(ContactFormRequest $request)
    {
        $input = $request->all();
        Inquiry::create($input);
        addNotification([
            Notification::INQUIRY_CREATE,
            User::where('user_type', User::ADMIN)->first()->id,
            Notification::ADMIN,
            $input['name'].' had an Inquiry.',
        ]);
        Flash::success('Thanks for connecting us, We will get back to as soon as!');
        return redirect(url('/'));
    }

    /**
     * @return Application|Factory|View
     */
    public function contactUs()
    {
        return view('front.home.contact');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function aboutUs()
    {
        $data['testimonial'] = Testimonial::where('is_active', true)->get();
        
        return view('front.home.about', compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function blog()
    {
        $blogs = Post::with('user')->where('is_active', true)->get();
        
        return view('front.home.blog', compact('blogs'));
    }
    
    public function blogShow($id)
    {
        $blog = Post::find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');
            return redirect(route('blog'));
        }

        return view('front.home.show_blog', compact('blog'));
    }
}
