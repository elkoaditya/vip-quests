<?php

namespace App\Http\Controllers\Admin;

use App\Events\TriggerRoot;
use App\Helper\Alert;
use App\Helper\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Imports\VipImport;
use App\Models\QuestVip;
use Illuminate\Http\Request;
use Excel;

class HomeController extends Controller
{
    public function index() {
        $quests = QuestVip::get();
        return view('admin.home.index', compact('quests'));
    }
    public function addVip(Request $request) {
        $validator = new ValidatorHelper($request, [
            'name' => 'required|string',
            'jabatan' => 'required|string',
        ]);
        if ($validator->isValid()) return redirect()->back();
        try {
            QuestVip::create([
                'name' => $validator->validated()['name'],
                'jabatan' => $validator->validated()['jabatan'],
            ]);
            Alert::simple('success', 'Berhasil menambahkan vip');
            return redirect()->back();
        } catch (\Exception $err) {
            Alert::simple('danger', $err->getMessage());
            return redirect()->back();
        }
    }
    public function showVip(Request $request) {
        $quest= QuestVip::where('id', $request->id)->first();
        broadcast(new \App\Events\TriggerRoot($quest->name, $quest->jabatan));
        Alert::simple('success', 'Berhasil menampilkan vip');
        return true;
    }
    public function importVip(Request $request) {
        $validator = new ValidatorHelper($request, [
            'file' => 'required|file|mimes:xlsx,xls',
        ]);
        if ($validator->isValid()) return redirect()->back();
        try {
            Excel::import(new VipImport(), $request->file('file')->store('temp'));
            return redirect()->back();
        } catch (\Exception $err) {
            Alert::simple('danger', $err->getMessage());
            return redirect()->back();
        }
    }
}
