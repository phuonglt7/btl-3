<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\Mail\UserEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Mail;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.add');
    }

    public function store(UserRequest $request)
    {

        $data = array_merge($request->all(), ['password' => str_random(5)]);
        $user = $this->userRepository->create($data);
        if ($user) {
            \Mail::to($request->email)->send(new UserEmail($data));
            return redirect(route('store.index'))->with('status', 'Thêm tai khoan thành công!');
        } else {
            return redirect()->back()->with('error', 'Thêm tai khoan không thành công!');
        }
    }
}
