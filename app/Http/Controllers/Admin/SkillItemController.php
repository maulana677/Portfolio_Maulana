<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class SkillItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillItem = SkillItem::all();
        return view('admin.skill-item.index', compact('skillItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'percent' => ['required', 'numeric', 'max:100']
        ]);

        $skill = new SkillItem();
        $skill->name = $request->name;
        $skill->percent = $request->percent;
        $skill->save();

        session()->flash("success", "Data Created Successfully");

        return redirect()->route('admin.skill-item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = SkillItem::findOrFail($id);
        return view('admin.skill-item.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'percent' => ['required', 'numeric', 'max:100']
        ]);

        $skill = SkillItem::findOrFail($id);
        $skill->name = $request->name;
        $skill->percent = $request->percent;
        $skill->save();

        session()->flash("success", "Data Updated Successfully");

        return redirect()->route('admin.skill-item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = SkillItem::findOrFail($id);
        $skill->delete();
    }
}
