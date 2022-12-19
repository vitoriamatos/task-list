<?php

namespace app\models;

use PDOStatement;
use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\Model;
use thecodeholic\phpmvc\Application;

define('ID_DEFAULT', 0);

class Task extends Model
{



    public int $task_id = 0;
    public int $user_id = 0;
    public int $category_id = 0;
    public string $task_name = '';
    public int $task_main_id = 0;
    

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
        return 'task';
    }

    public function attributes(): array
    {
        return ['task_id', 'user_id', 'category_id', 'task_name', 'task_main_id'];
    }

    public function labels(): array
    {
        return [
            'task_id' => 'Task Id',
            'user_id' => 'User Id',
            'category_id' => 'Category Id',
            'task_name' => 'Name',
            'status' => 'Status',
            'task_main_id' => 'Task Main ID'
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
        $statement->bindValue(':task_main_id', (int)$this->__get('task_main_id'));
        $statement->bindValue(':category_id', (int)$this->__get('category_id'));
        $statement->bindValue(':task_name', $this->__get('task_name'));
        $statement->bindValue(':status', 0);

        $statement->execute();
        return $this;
    }

    
    public function registerMainTask(): object
    {
        $query = "INSERT into Task_Main(user_id, category, task_title,  creation_day, estimate_conclusion_day, status ) value(:user_id, :category, :task_title,  :creation_day, :estimate_conclusion_day, :status)";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->bindValue(':user_id', (int)$this->__get('user_id'));
        $statement->bindValue(':category', (int)$this->__get('category'));
        $statement->bindValue(':task_title', $this->__get('task_title'));
        $statement->bindValue(':creation_day', $this->__get('creation_day'));
        $statement->bindValue(':estimate_conclusion_day', $this->__get('estimate_conclusion_day'));
        $statement->bindValue(':status', 0);

        $statement->execute();
        return $this;
    }

    public function edit(): object
    {
        $query = "UPDATE task SET task_name = :task_name WHERE user_id = :user_id AND task_id = :task_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->bindValue(':user_id', (int)$this->__get('user_id'));
        $statement->bindValue(':task_id', (int)$this->__get('task_id'));
        $statement->bindValue(':task_name', $this->__get('task_name'));

        $statement->execute();
        return $this;
    }

    public function editDay(): object
    {
        $query = "UPDATE task SET expected_day = :expected_day WHERE user_id = :user_id AND task_id = :task_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->bindValue(':user_id', (int)$this->__get('user_id'));
        $statement->bindValue(':task_id', (int)$this->__get('task_id'));
        $statement->bindValue(':expected_day', $this->__get('expected_day'));

        $statement->execute();
        return $this;
    }

    public function editTime(): object
    {
        $query = "UPDATE task SET expected_time = :expected_time WHERE user_id = :user_id AND task_id = :task_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->bindValue(':user_id', (int)$this->__get('user_id'));
        $statement->bindValue(':task_id', (int)$this->__get('task_id'));
        $statement->bindValue(':expected_time', $this->__get('expected_time'));

        $statement->execute();
        return $this;
    }

    public function updateStatus(): object
    {
        $query = "UPDATE task SET status = :status WHERE user_id = :user_id AND task_id = :task_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->bindValue(':user_id', (int)$this->__get('user_id'));
        $statement->bindValue(':task_id', (int)$this->__get('task_id'));
        $statement->bindValue(':status', $this->__get('status'));

        $statement->execute();
        return $this;
    }

    public function list(): array
    {
        $query = "SELECT task_main_id, user_id, task_title, creation_day, category, estimate_conclusion_day, status FROM Task_Main";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listSubTask(): array
    {
        $query = "SELECT task_id, user_id, task_main_id, category_id, task_name, status FROM task";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function delete(): object
    {
        $query = "DELETE FROM task WHERE user_id = :user_id AND task_id = :task_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);

        $statement->bindValue(':user_id', (int)$this->__get('user_id'));
        $statement->bindValue(':task_id', (int)$this->__get('task_id'));

        $statement->execute();
        return $this;
    }

    public function delete_task_main(): object
    {
        $query = "DELETE FROM Task_Main WHERE user_id = :user_id AND task_main_id = :task_main_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);
        
        $user_id = (int)$this->__get('user_id');
        $task_main_id = (int)$this->__get('task_main_id');

        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':task_main_id', $task_main_id);

        $this->delete_subtask($user_id, $task_main_id);

        $statement->execute();
        return $this;
    }

    public function delete_subtask($user_id, $task_main_id): object
    {
        $query = "DELETE FROM task WHERE user_id = :user_id AND task_main_id = :task_main_id";

        $db = Application::$app->db;
        $statement = $db->prepare($query);
        
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':task_main_id', $task_main_id);

        $statement->execute();
        return $this;
    }

}


