<?php

namespace app\controllers;

use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\Request;
use app\models\Task;
use app\models\TaskMain;

class TaskController extends Controller
{

    public $params;

    public function myDay()
    {
        $task = new Task();

        $tasks = $task->list();
        $subTasks = $task->listSubTask();
    
        return $this->render('/task/myDay', [
            'tasks' => $tasks,
            'subTasks' => $subTasks
        ]);
    }

    public function registerMainTask(Request $request)
    {
        $task = new Task();
        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('category', $_GET['category']);
        $task->__set('task_title', $_GET['task_title']);
        $task->__set('creation_day', date('d/m/y'));
        $task->__set('estimate_conclusion_day', $_GET['estimate_conclusion_day']);

        $task->registerMainTask();

        return $this->render('task/myDay');
    }

    public function registerSubTask(Request $request)
    {
        $task = new Task();
        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('category_id', $_GET['category_id']);
        $task->__set('task_name', $_GET['task_name']);
        $task->__set('task_main_id', $_GET['task_main_id']);

        $task->registerSubTask();

        return $this->render('task/myDay');
    }
    

    public function edit(Request $request)
    {
        $task = new Task();

        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('task_name', $_GET['task_name']);
        $task->__set('task_id', $_GET['task_id']);
        
        $task->edit();

        return $this->render('task/myDay');
    }

    public function edit_day(Request $request)
    {
        $task = new Task();

        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('expected_day', $_GET['expected_day']);
        $task->__set('task_id', $_GET['task_id']);
        
        $task->editDay();

        return $this->render('task/myDay');
    }

    public function edit_time(Request $request)
    {
        $task = new Task();

        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('expected_time', $_GET['expected_time']);
        $task->__set('task_id', $_GET['task_id']);
        
        $task->editTime();

        return $this->render('task/myDay');
    }

    public function update_status(Request $request)
    {
        $task = new Task();

        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('status', $_GET['status']);
        $task->__set('task_id', $_GET['task_id']);
        
        $task->updateStatus();

        return $this->render('task/myDay');
    }


    public function delete(Request $request)
    {
        $task = new Task();
        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('task_id', $_GET['task_id']);
        
        $task->delete();

        return $this->render('task/myDay');
    }

    public function delete_task_main(Request $request)
    {
        $task = new Task();
        
        $task->__set('user_id', $_SESSION['user']);
        $task->__set('task_main_id', $_GET['task_main_id']);
        
        $task->delete_task_main();

        return $this->render('task/myDay');
    }

}

    