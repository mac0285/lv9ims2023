<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use App\Models\Password;
use Livewire\WithPagination;
use Carbon\Carbon;
use Auth;
use Validator;
use Illuminate\Validation\Rule;

class UserController extends Component
{

    public $current_team_id,$active,$is_admin;
    public $password_id;
    public $isModalOpen = 0;
    public $isModalEdit = 0;
    public $level = [];
    public $item;
    public function render()
    {
        $users = User::select('name','email','email_verified_at','password','branch_code','current_team_id','is_admin','active')
        ->where('current_team_id', auth()->user()->current_team_id)
        ->where('branch_code', auth()->user()->branch_code)
        ->where('is_admin','<>','1')
        ->paginate(15);
       return view('livewire.user.user-crud',compact('users'));


       //return view('livewire.user.user-crud', [
       // 'users' => $users]);



    }

    public function detail(User $item)
    {
        //$item->active = "Close";
       // $item->active = false;
       // $item->save();
       session()->flash('message', 'not change anything');
      //dd($item);
    }

    public function store()
    {
        $this->validate([
	        'name'=>'required|min:4',
            'email' => 'required|email|unique:users',
	        'password'=>'required|min:6'
        ]);
       User::Create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'branch_code'=>\Auth::user()->branch_code,
            'current_team_id'=>\Auth::user()->current_team_id,
            'is_admin'=>false,
            'active'=>true,
            'profile_photo_path'=>'dummy.png',
        ]);
        session()->flash('message', 'Data added successfully.');
        $this->resetCreateForm();
        $this->closeModal();
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function openModalEdit()
    {
        $this->isModalEdit = true;
    }
    public function closeModalEdit()
    {
        $this->isModalEdit = false;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->name= '';
        $this->email='';
        $this->password= '';
    }
}
