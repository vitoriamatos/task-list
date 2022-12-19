<?php

namespace app\models;

use PDOStatement;
use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\Model;
use thecodeholic\phpmvc\Application;

define('ID_DEFAULT', 0);

class TaskMain extends Model
{


    public int $task_main_id = 0;
    public string $task_title = '';
    public string $creation_day = '';
    public string $estimate_conclusion_day = '';
    public int $status = 0;
    public int $category = 0;
    public int $user_id = 0;
    
   
    

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public static function tableName(): string
    {
        return 'Task_Main';
    }

    public function attributes(): array
    {
        return ['task_main_id', 'task_title', 'creation_day', 'estimate_conclusion_day', 'status', 'category', 'user_id'];
    }

    public function labels(): array
    {
        return [
            'task_main_id' => 'Task Main Id',
            'task_title'=> 'Task Title',
            'creation_day' => 'Creation Day',
            'estimate_conclusion_day' => 'Estimate Conclusion Day',
            'status' => 'Status',
            'category' => 'Category', 
            'user_id' => 'User Id'
        ];
    }

    public function getDisplayName(): string
    {
        return $this->name;
    }

    public function registerSubTask(): object
    {
        $query = "INSERT into task(user_id, task_main_id, category_id, task_name, status) value(:user_id, :task_main_id, :category_id, :task_name, :status)";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->bindValue(':user_id', (int)$this->__get('user_id'));
        $statement->bindValue(':task_main_id,', (int)$this->__get('task_main_id,'));
        $statement->bindValue(':category_id', (int)$this->__get('category_id'));
        $statement->bindValue(':task_name', $this->__get('task_name'));
        $statement->bindValue(':status', 0);

        die(var_dump($statement->execute()));
        $statement->execute();
        return $this;
    }

    public function delete(): object
    {
        $query = "DELETE FROM Task_Main WHERE user_id = :user_id AND task_main_id = :task_main_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);
        
        $user_id = (int)$this->__get('user_id');
        $task_main_id = (int)$this->__get('task_id');

        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':task_id', $task_main_id);

        $this->delete_subtask($user_id, $task_main_id);

        $statement->execute();
        return $this;
    }

    public function delete_subtask($user_id, $task_main_id): object
    {
        $query = "DELETE FROM task WHERE user_id = :user_id AND task_main_id = :task_main_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $user_id = (int)$this->__get('user_id');
        $task_main_id = (int)$this->__get('task_id');
        
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':task_id', $task_main_id);

        $statement->execute();
        return $this;
    }

    
}
