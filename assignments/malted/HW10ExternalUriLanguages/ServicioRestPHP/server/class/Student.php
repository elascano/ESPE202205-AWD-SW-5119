<?php

    class Student{

        private $id;
        private $name;
        private $lastname;
        private $genre;
        private $age;

        public function __construct($id, $name, $lastname, $genre, $age){
            $this-> id = $id;
            $this->name = $name;
            $this->lastname = $lastname;
            $this->genre = $genre;
            $this->age = $age;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }

        public function setLastname($lastname){
            $this->lastname = $lastname;
        }
        public function getLastname(){
            return $this->lastname;
        }

        public function setGenre($genre){
            $this->genre = $genre;
        }
        public function getGenre(){
            return $this->genre;
        }

        public function setAge($age){
            $this->age = $age;
        }
        public function getAge(){
            return $this->age;
        }

        public function _toString(){
            return $this->id . " " .$this->name. " " .$this->lastname. " " .$this->genre. " " .$this->age;
        }

        //CRUD
        public function saveStudent(){
            $fileContent = file_get_contents("../data/students.json");
            $students = json_decode($fileContent, true);
            $students[] = array(
                "id" => $this->id,
                "name" => $this->name,
                "lastname" => $this->lastname,
                "genre" => $this->genre,
                "age" => $this->age
            );
            $file = fopen("../data/students.json", "w");
            fwrite($file, json_encode($students));
            fclose($file);
        }

        public static function getStudent(){
            $fileContent = file_get_contents("../data/students.json");
            echo $fileContent;
        }
        public static function getStudentId($id){
            $fileContent = file_get_contents("../data/students.json");
            $students = json_decode($fileContent, true);
            echo json_encode($students[$id]);
        }

        public function updateStudent($id){
            $fileContent = file_get_contents("../data/students.json");
            $students = json_decode($fileContent, true);
            $student = $students[$id];
            $student = array(
                'id' => $this->id,
                'name'=> $this->name,
                'lastname'=> $this->lastname,
                'genre'=> $this->genre,
                'age'=> $this->age

            );
            $students[$id] = $student;
            $file = fopen("../data/students.json", "w");
            fwrite($file, json_encode($students));
            fclose($file);
        }

        public static function deleteStudent($id){
            $fileContent = file_get_contents("../data/students.json");
            $students = json_decode($fileContent, true);
            array_splice($students, $id, 1);
            $file = fopen("../data/students.json", "w");
            fwrite($file, json_encode($students));
            fclose($file);
        }
    }
?>