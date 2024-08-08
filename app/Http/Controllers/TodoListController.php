<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItem;

class TodoListController extends Controller
{
    //
    public function index()
    {
        // dd(listItem::all());    
        return view("main", ['listItems' => listItem::where('is_complete', 0)->get()]); // es un select que hace un fetch de todos 
                                                                                        //los items donde is_complete valga 0
    }

    public function saveItem(Request $request)
    {
        // dd($request->all());
        $newListItem = new listItem;
        $newListItem->name = $request->itemInput;
        $newListItem->is_complete = 0;
        $newListItem->save();
        return redirect("/");
    }

    public function markComplete($id)
    {
        $listItem =listItem::find($id);
        // dd($listItem);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect("/");
    }
}
