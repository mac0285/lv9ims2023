<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth; 

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
       // return view('livewire.password.password-manager');
    $setting = settings::select( 'id','branch_code','name','factory', 'telp', 'email','address','pic', 'config', 'default',
   'location','flag', 'log','current_team_id','active')
    ->where('current_team_id', auth()->user()->current_team_id)
    ->where('branch_code', auth()->user()->branch_code)
    ->when( $this->q, function($query) {
        return $query->where(function( $query) {
            $query->where('address', 'like', '%'.$this->q. '%')
                ->orWhere('user', 'like', '%' .$this->q. '%')
                ->orWhere('type', 'like', '%' .$this->q. '%');
            });
        })->when($this->active, function( $query) {
            return $query->active();
        })->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC');

        $passwords = $passwords->paginate(15);
        return view('livewire.password.password-manager', [
            'passwords' => $passwords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
