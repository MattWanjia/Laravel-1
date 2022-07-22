<?php

namespace App\Http\Controllers;
//use App\ListItem;
use App\Models\ListItem;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    //

    public function index(Request $request){

        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }


    public function saveItem(Request $request){
        \Log::info(json_encode($request->all()));

        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return redirect('/');
    }


    public function completeItem($id){
        \Log::info(json_encode($id));
        
        $listItem = ListItem::find($id);

        \Log::info(json_encode($listItem));

        $listItem->is_complete = 1;
        $listItem->save();

        \Log::info(json_encode($listItem));

        return redirect('/');
    }
}
