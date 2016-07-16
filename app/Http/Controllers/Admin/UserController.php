<?php
/**
 * Author: Archie, Disono (webmonsph@gmail.com)
 * Website: http://www.webmons.com
 * License: Apache 2.0
 */

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Events\EventResetPassword;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * List data
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $content['title'] = app_title('Users');
        $content['request'] = $request;
        $content['countries'] = Country::all();

        $options = [];
        if ($request->get('search')) {
            $options['search'] = $request->get('search');
        }
        if (is_numeric($request->get('country_id'))) {
            $options['country_id'] = $request->get('country_id');
        }
        if (is_numeric($request->get('enabled'))) {
            $options['enabled'] = $request->get('enabled');
        }
        if (is_numeric($request->get('email_confirmed'))) {
            $options['email_confirmed'] = $request->get('email_confirmed');
        }
        if ($request->get('branch_id')) {
            $options['branch_id'] = $request->get('branch_id');
        }
        if ($request->get('date_from') && $request->get('date_to')) {
            $options['date_from'] = $request->get('date_from');
            $options['date_to'] = $request->get('date_to');
        }

        $content['users'] = User::get($options);

        return admin_view('user.index', $content);
    }

    /**
     * Create new data
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $content['title'] = app_title('Create User');
        $content['request'] = $request;
        $content['roles'] = Role::all();

        return admin_view('user.create', $content);
    }

    /**
     * Store new data
     *
     * @param Requests\Web\UserCreate $create
     * @return mixed
     */
    public function store(Requests\Web\UserCreate $create)
    {
        $data = $create->all();
        User::create([
            'first_name' => ucfirst($data['first_name']),
            'last_name' => ucfirst($data['last_name']),
            'username' => $data['username'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
            'email_confirmed' => (isset($data['email_confirmed'])) ? 1 : 0,
            'enabled' => 1
        ]);
        
        return redirect('admin/users');
    }

    /**
     * Login user
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login($id)
    {
        auth()->logout();
        auth()->loginUsingId($id);

        return redirect('/');
    }

    /**
     * Edit password
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function passwordEdit(Request $request, $id)
    {
        $content['title'] = app_title('Reset Password');
        $content['request'] = $request;
        $content['user'] = User::single($id);

        if (!$content['user']) {
            abort(404);
        }

        return admin_view('user.password_edit', $content);
    }

    /**
     * Update password
     *
     * @param Requests\Web\UserUpdatePassword $request
     * @return mixed
     */
    public function passwordUpdate(Requests\Web\UserUpdatePassword $request)
    {
        $update = User::edit($request->get('id'), $request->only([
            'password'
        ]));
        
        if ($update) {
            $user = User::single($request->get('id'));
            $user->new_password = $request->get('password');
            $user->sent_to = $request->get('email');

            // send email for password reset
            event(new EventResetPassword([
                'user' => $user
            ]));
        }

        return redirect('admin/users');
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function ajaxDestroy($id)
    {
        User::remove($id);
        return success_json_response('Successfully deleted user.');
    }
}
