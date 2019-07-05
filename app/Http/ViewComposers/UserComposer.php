<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;

class UserComposer
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function compose($view)
    {
        $user = $this->userRepository->getAll();
        $view->with('userList', $user);
    }
}
