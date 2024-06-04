<?php

namespace App\Http\Controllers\Admin;

use App\Pipelines\Pipeline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsRequest;
use App\Http\Requests\Admin\Settings\UpdateRequest;

class SettingsController extends Controller
{
    protected $pipeline;

    public function __construct()
    {
        $this->pipeline = app(Pipeline::class)->setModel('Setting');
    }

    public function index(Request $request)
    {
        $data = collect($this->pipeline->get());
        
        $privacy = $data->where('key','privacy')->first()->value ?? '';
        $about = $data->where('key','about')->first()->value ?? '';

        $twitter = $data->where('key','twitter')->first()->value ?? '';
        $instagram = $data->where('key','instagram')->first()->value ?? '';
        $facebook = $data->where('key','facebook')->first()->value ?? '';
        $website = $data->where('key','website')->first()->value ?? '';

        return view('admin.settings.index')->with([
            'privacy' => $privacy,
            'about'=> $about,
            'twitter'=> $twitter,
            'instagram'=> $instagram,
            'facebook'=> $facebook,
            'website'=> $website,
        ]);
    }
    
    
    public function update(SettingsRequest $request)
    {
        \DB::beginTransaction();
        try {
            $this->pipeline->delete();
            
            foreach($request->except('_token') as $key => $value) {
                $data[] = [
                    'key' => $key,
                    'value' => $value,
                    'type' => 'data',
                ];
            }
            
            $this->pipeline->insert($data);

            \DB::commit();
        } catch(\Exception $ex) {
            dd($ex->getMessage());
        }
        return redirect()->back()->with($data);
    }
}
