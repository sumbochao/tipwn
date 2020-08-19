<?php

namespace VanguardDK\Http\Controllers\Web\Backend;

use VanguardDK\Events\User\Banned;
use VanguardDK\Events\User\Deleted;
use VanguardDK\Events\User\TwoFactorDisabledByAdmin;
use VanguardDK\Events\User\TwoFactorEnabledByAdmin;
use VanguardDK\Events\User\UpdatedByAdmin;
use VanguardDK\Http\Controllers\Controller;
use VanguardDK\Http\Requests\User\CreateUserRequest;
use VanguardDK\Http\Requests\User\EnableTwoFactorRequest;
use VanguardDK\Http\Requests\User\UpdateDetailsRequest;
use VanguardDK\Http\Requests\User\UpdateLoginDetailsRequest;
use VanguardDK\Repositories\Activity\ActivityRepository;
use VanguardDK\Repositories\Country\CountryRepository;
use VanguardDK\Repositories\Role\RoleRepository;
use VanguardDK\Repositories\Session\SessionRepository;
use VanguardDK\Repositories\User\UserRepository;
use VanguardDK\Services\Upload\UserAvatarManager;
use VanguardDK\Support\Enum\UserStatus;
use VanguardDK\User;
use VanguardDK\Game;
use VanguardDK\Page;
use VanguardDK\Category;
use VanguardDK\StatGame;
use VanguardDK\GameWin;
use Auth;
use Authy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/**
 * Class UsersController
 * @package VanguardDK\Http\Controllers
 */
class PagesController extends Controller
{
    
	/**
     * CategoriesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('permission:access.admin.panel');
    }
	
    /**
     * Display paginated list of all users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
				
		$pages = Page::get();
		return view('backend.pages.list', compact('pages'));
		        
    }

    /**
     * Displays form for creating a new user.
     *
     * @param CountryRepository $countryRepository
     * @param RoleRepository $roleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {		
		return view('backend.pages.add');
    }
    
    /**
     * Stores new user into the database.
     *
     * @param CreateUserRequest $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // When user is created by administrator, we will set his
        $data = $request->all();
		
		$request->validate([
			'path' => 'required|unique:pages|max:255',
			'body' => 'required',
		]);

        Page::create($data);
		
        return redirect()->route('backend.pages.list')
            ->withSuccess(trans('app.page_created'));
    }

    /**
     * Displays edit user form.
     *
     * @param User $user
     * @param CountryRepository $countryRepository
     * @param RoleRepository $roleRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( $page ){
        
        $page = Page::where('id', $page)->first();
		
        return view(
            'backend.pages.edit',
            compact('page')
        );
    }
	
	
	/**
     * Update category in the database.
     *
     * @param CreateUserRequest $request
     * @return mixed
     */
    public function update(Request $request, $page)
    {		
        $data = $request->only(['title', 'sub_title', 'keywords', 'description', 'body', 'path', 'type', 'view']);
																
        Page::where('id', $page)->update($data);
		
        return redirect()->route('backend.pages.list')
            ->withSuccess(trans('app.page_updated'));
    }

    
    /**
     * Removes the user from database.
     *
     * @param User $user
     * @return $this
     */
    public function delete($page){
		
		$page = Page::where('id', $page)->first();
		
		if( $page->type != 2 ){
			return redirect()->route('backend.pages.list');
		}
		
		$page = Page::where('id', $page->id)->delete();

        return redirect()->route('backend.pages.list')
            ->withSuccess(trans('app.page_deleted'));
    }

}
