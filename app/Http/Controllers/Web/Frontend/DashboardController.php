<?php

namespace VanguardDK\Http\Controllers\Web\Frontend;

use VanguardDK\Http\Controllers\Controller;
use VanguardDK\Repositories\Activity\ActivityRepository;
use VanguardDK\Repositories\User\UserRepository;
use VanguardDK\Support\Enum\UserStatus;
use VanguardDK\Transaction;
use Auth;
use Carbon\Carbon;
use jeremykenedy\LaravelRoles\Models\Role;

class DashboardController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var ActivityRepository
     */
    private $activities;

    /**
     * DashboardController constructor.
     * @param UserRepository $users
     * @param ActivityRepository $activities
     */
    public function __construct(UserRepository $users, ActivityRepository $activities)
    {
        $this->middleware('auth');
        $this->users = $users;
        $this->activities = $activities;
    }

    /**
     * Displays dashboard based on user's role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->defaultDashboard();
    }

    
    /**
     * Displays default dashboard for non-admin users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function defaultDashboard()
    {
        $activities = $this->activities->userActivityForPeriod(
            Auth::user()->id,
            Carbon::now()->subWeeks(2),
            Carbon::now()
        )->toArray();

        return view('frontend.dashboard.default', compact('activities'));
    }
	
	
    public function statistics(){
		
		$user = Auth::user();		
		$statistics = Transaction::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(20);	
		
        return view('frontend.user.stat', compact('user', 'statistics'));
    }
}
