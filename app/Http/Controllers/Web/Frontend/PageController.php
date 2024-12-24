<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enums\Page;
use App\Models\CMS;
use App\Models\User;
use App\Enums\Section;
use App\Models\Community;
use App\Models\DynamicPage;
use Illuminate\Http\Request;
use App\Models\OperatingHour;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function index()
    {
        $dynamicContents = CMS::where('section', Section::CONNECT_COMMUNITY)->where('page', Page::WELCOME_PAGE)->where('status', 'active')->limit(3)->get();
        $heroStatic = CMS::where('section', Section::HERO_BANNER_CONTENT)->where('page', Page::WELCOME_PAGE)->where('status', 'active')->first();
        $maximizeStatic = CMS::where('section', Section::MAXIMIZE_COMMUNITY)->where('page', Page::WELCOME_PAGE)->where('status', 'active')->first();
        $communityStatic = CMS::where('section', Section::COMMUNITY_CLOASE)->where('page', Page::WELCOME_PAGE)->where('status', 'active')->first();
        $dynamicPages = DynamicPage::all();

        $viewData = [
            'dynamicContents' => $dynamicContents,
            'heroStatic' => $heroStatic,
            'maximizeStatic' => $maximizeStatic,
            'communityStatic' => $communityStatic,
            'dynamicPages' => $dynamicPages
        ];

        return view('web.frontend.layouts.index', $viewData);
    }

    public function login()
    {

        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.login');
    }

    public function forgotPassword()
    {
        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.forgot_password');
    }

    public function signUp()
    {
        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.signUp');
    }

    public function signUpWithCode()
    {
        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.signUp_Code');
    }

    public function selectType()
    {
        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.select_type');
    }

    public function profileInformation()
    {
        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.profile_information');
    }

    public function userHomePage(Request $request)
    {

        $request->validate([
            'user_type' => 'nullable|in:business,professional',
        ]);
        // dd('validation passed',$request->all());


        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $lookingFor = CMS::where('section', Section::LOOKING_FOR)->where('page', Page::USER_HOMEPAGE)->first();
        $featured = CMS::where('section', Section::FEATURED)->where('page', Page::USER_HOMEPAGE)->first();
        $query = User::query();

        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Apply user type filter
        if ($request->has('user_type') && in_array($request->user_type, ['professional', 'business'])) {
            $query->where('user_type', $request->user_type);
        }

        // Retrieve results with pagination
        $users = $query->where('status', 1)
            ->whereIn('user_type', ['individual', 'business', 'professional'])
            ->with(['businessAddress', 'comments', 'operatingHour'])
            ->has('businessAddress')
            ->orderByDesc('created_at')
            ->paginate(9);

        $viewData = [
            'lookingFor' => $lookingFor,
            'featured' => $featured,
            'users' => $users
        ];

        return view('web.frontend.layouts.user_homepage', $viewData);
    }

    public function detailsPage($id)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Retrieve the user along with their comments
        $user = User::with(['comments.commentator'])->findOrFail($id);

        // Retrieve the user's operating hours
        $user->operatingHour = OperatingHour::where('user_id', $user->id)->first();

        $operatingHoursFormatted = [];
        foreach (['friday', 'saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday'] as $day) {
            $operatingHoursFormatted[$day] = $this->formatOperatingHours($user->operatingHour->{$day});
        }

        return view('web.frontend.layouts.details', compact('user', 'operatingHoursFormatted'));
    }

    public function communityJoin()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('web.frontend.layouts.community_join');
    }

    public function communityInbox(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $data = Community::with('user')
            ->latest()
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('F d, Y');
            });

        return view('web.frontend.layouts.community_inbox', compact('data'));
    }

    public function account()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('web.frontend.layouts.account');
    }

    public function updatePersonalInformation()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('web.frontend.layouts.update_personal_information');
    }

    public function loginAndSecurity()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('web.frontend.layouts.loginAndSecurity');
    }

    public function profile()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('web.frontend.layouts.profile');
    }

    public function personalInformation()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->user_type != 'individual' && Auth::user()->user_type != 'admin') {
            return redirect()->route('professionalPersonalInfo');
        }

        return view('web.frontend.layouts.personal_information');
    }

    public function businessInformation()
    {
        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.business_information');
    }

    public function businessPhoto()
    {

        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.business_photo');
    }

    public function businessDescription()
    {

        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.business_description');
    }

    public function operatingHours()
    {

        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.operating_hours');
    }

    public function professionalPersonalInfo()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->user_type == 'individual' || Auth::user()->user_type == 'admin') {
            return redirect()->route('personalInformation');
        }

        $operatingHours = OperatingHour::where('user_id', Auth::id())->first();

        $operatingHoursFormatted = [];
        foreach (['friday', 'saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday'] as $day) {
            $operatingHoursFormatted[$day] = $this->formatOperatingHours($operatingHours->{$day});
        }

        return view('web.frontend.layouts.professional_personal_info', compact('operatingHours', 'operatingHoursFormatted'));
    }

    public function formatOperatingHours($dayJson)
    {
        // Decode as an associative array
        $decoded = json_decode($dayJson, true);

        if (is_array($decoded) && isset($decoded[2], $decoded[3])) {
            return $decoded[2] . ' - ' . $decoded[3];
        }

        return 'Closed';
    }


    /* public function formatOperatingHours($dayJson)
    {
        $decoded = json_decode($dayJson);
        if (isset($decoded[1], $decoded[2])) {
            return $decoded[1] . ' - ' . $decoded[2];
        }
        return 'Closed';
    } */

    public function submitVerification()
    {

        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.submit_verification');
    }

    public function verifyEmail()
    {

        if (Auth::check()) {
            return redirect()->route('userHomePage');
        }

        return view('web.frontend.layouts.auth.verify_email');
    }
}
