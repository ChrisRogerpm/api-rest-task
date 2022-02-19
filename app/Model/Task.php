<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'completed',
    ];
    protected $casts = ['completed' => 'boolean'];
    public $timestamps = false;

    public static function TaskList()
    {
        return Task::all();
    }
    public static function TaskRegister(Request $request)
    {
        $data = new Task();
        $data->name = $request->input('name');
        $data->completed = $request->input('completed');
        $data->save();
        return $data;
    }
    public static function TaskUpdate(Request $request)
    {
        $data = Task::findOrfail($request->input('id'));
        $data->completed = !$data->completed;
        $data->save();
        return $data;
    }
    public static function TaskDelete(Request $request)
    {
        $data = Task::findOrfail($request->input('id'));
        $data->delete();
        return $data;
    }
}
