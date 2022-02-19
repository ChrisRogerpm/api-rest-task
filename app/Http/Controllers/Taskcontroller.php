<?php

namespace App\Http\Controllers;

use Exception;
use App\Model\Task;
use Illuminate\Http\Request;

class Taskcontroller extends Controller
{
    public function TaskListJson()
    {
        $data = "";
        $message = "";
        try {
            $data = Task::TaskList();
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return response()->json(['data' => $data, 'message' => $message]);
    }
    public function TaskRegisterJson(Request $request)
    {
        $message = "";
        $status = false;
        try {
            Task::TaskRegister($request);
            $status = true;
            $message = "The task has been registered successfully";
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return response()->json(['message' => $message, 'status' => $status]);
    }
    public function TaskUpdateJson(Request $request)
    {
        $message = "";
        $status = false;
        try {
            Task::TaskUpdate($request);
            $status = true;
            $message = "The task has been successfully updated";
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return response()->json(['message' => $message, 'status' => $status]);
    }
    public function TaskDeleteJson(Request $request)
    {
        $status = false;
        $message = "";
        try {
            Task::TaskDelete($request);
            $status = true;
            $message = "The task has been successfully deleted";
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        return response()->json(['message' => $message, 'status' => $status]);
    }
}
