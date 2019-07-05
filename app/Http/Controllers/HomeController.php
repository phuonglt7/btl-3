<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\ChangeRequest;
use App\Repositories\UserRepository;
use App\Mail\PassEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Mail;

class HomeController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('home');
    }

    public function getChangePassword()
    {
        return view('auth.passwords.changePassword');
    }

    public function postChangePassword(ChangeRequest $request)
    {
        $hashPass = Auth::user()->password;
        if (Hash::check($request->password_old, $hashPass)) {
            if (Auth::user()->email) {
                $change = $this->userRepository->find(Auth::id());
                $change->update(['password' => bcrypt($request->password), 'count' => 1]);
            } else {
                $change = $this->userRepository->find(Auth::id());
                $change->update([
                    'password' => bcrypt($request->password),
                    'email' => $request->email,
                    'count' => 1,
                ]);
            }
            Auth::logout();
            return \Redirect::to('/login')
            ->with('status', 'Đổi mật khẩu thành công! Đăng nhập lại bằng mật khẩu mới!');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu cũ sai!');
        }
    }

    public function resetPassword(Request $request)
    {
        foreach ($request->reset as $id) {
            $result = $this->userRepository->find($id);
            if ($result) {
                $pass = ['password' => str_random(5)];
                $result->update($pass);
                \Mail::to($result->email)->send(new PassEmail($pass));
            }
        }
        return redirect(route('user.index'))->with('status', 'Reset thành công');
    }
}
