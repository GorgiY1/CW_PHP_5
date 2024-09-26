<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP_PHP</title>
    <style>
        body {
    background: linear-gradient(135deg, #000428, #004e92); /* Градієнтний фон */
    color: #fff; /* Білий текст */
    font-family: 'Roboto', sans-serif; /* Сучасний шрифт */
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
    </style>
</head>
<body>
    <?php 
        // class Person {
        //     private $name = "undefine", $age = 18;
        //     function __construct($name, $age)
        //     {
        //         $this->name = $name;
        //         $this->age = $age;
        //     }
        //     function __destruct()
        //     {
        //         echo "destructor";
        //     }
        //     function display_info() {
        //         echo "<h2>Name: $this->name, age: $this->age</h2>";
        //     }
        //     function print_person($person) {
        //         echo $person;
        //     }
        // }

        // $bob = new Person ("Bob",25);
        // //$bob->print_person("Name: Bob, Age: 25");
        // $bob->display_info();

    //     $person = new class("Bob") { 
    //         private $name = "alex";
    //         function __construct($name)
    //         {
    //             $this->name = $name;
    //         }
    //         function get_name() {
    //             return $this->name;
    //         }
    //     };

    //    echo $person->get_name();

    //    echo "<br>";
        
        // class Employee {
        //     private $id, $name, $role;
        //     function __construct($id, $name, $role) {
        //         echo "Parent constract!";
        //         $this->id = $id;
        //         $this->name = $name;
        //         $this->role = $role;
        //     }
        //     function print_employee() {
        //         echo "<p>id: $this->id, name: $this->name, role: $this->role";
        //     }
        //     function get_id() {  return $this->id; }
        //     function set_id($id) {  $this->id = $id; }

        //     public function __get($property) {
        //         $properties = ['id', 'name', 'role'];
        //         if (in_array($property, $properties)) {
        //             return $this->$property;
        //         }
        //         //else { throw new Exeption('Error'); }
                
        //     }
        //     public function __set($property, $value) {
        //         if($property === "id")
        //         {
        //             return;
        //         }
        //         $this->$property = $value;
        //     }
        // }
        // final class HRManager extends Employee {
        //     function _constructor($id, $name, $role) {
        //         echo "Child constract!";
        //         // 1
        //         Employee::__construct($id, $name, $role);
        //         // 2
        //         // $this->id = $id;
        //         // $this->name = $name;
        //         // $this->role = $role;

        //     }
        // }

        // final class Admin extends Employee {  }
        // $manager = new HRManager(5,"Tom","HR");
        // $manager->print_employee();

        // echo $res = $manager instanceof Employee ? "TRUE " : "False ";
        // echo $res = $manager instanceof HRManager ? "TRUE " : "False ";
        // echo $res = $manager instanceof Admin ? "TRUE " : "False ";

        // $manager->id = 50;
        // $manager->print_employee();
        // $manager->print_employee();
        // echo "</br>".$manager->hello = "Hello";

        // class Blog {
        //     private int|string|Closure $id;
        //     private string $title;
        //     function __construct(int|string|Closure $id, string $title)
        //     {
        //         $this->id = $id;
        //         $this->title = $title;
        //     }

        //     public function __get($property)
        //     {
        //         $properties = ['id', 'title'];
        //         if (in_array($property, $properties))
        //             return $this->$property;
        //         else
        //             throw new Exception("Error property!");
        //     }
        //     public function __set($property, $value)
        //     {
        //         $this->$property = $value;
        //     }
        //     static function get_blog() : Blog|null {
        //         return new Blog(4,"Hello");
        //     }
        // }

        // $blog = new Blog("erdfsg34", "My blog");
        // echo "<h1>$blog->title</h1>";
        // echo "<h3>$blog->id</h3>";

        // $blog = new Blog(52, "My blog 2");
        // echo "<h1>$blog->title</h1>";
        // echo "<h3>$blog->id</h3>";

        // //$blog->get_blog();
        // echo Blog::get_blog()->title;

        class Student
        {
            // Властивості з статичною типізацією
            private string $first_name;
            private string $last_name;
            private DateTime $birth_date;
        
            // Конструктор для ініціалізації властивостей
            public function __construct(string $first_name, string $last_name, DateTime $birth_date)
            {
                $this->first_name = $first_name;
                $this->last_name = $last_name;
                $this->birth_date = $birth_date;
            }
        
            // Метод для форматування повного імені
            public function getFullName(): string
            {
                return ucwords(strtolower("$this->first_name $this->last_name"));
            }
        
            // Метод для розрахунку віку на основі дати народження
            public function getAge(): int
            {
                $currentDate = new DateTime();
                $age = $currentDate->diff($this->birth_date);
                return $age->y;
            }
            public function __get($property)
            {
                $properties = ['birth_date', 'last_name','first_name'];
                if (in_array($property, $properties))
                    return $this->$property;
                else
                    throw new Exception("Error property!");
            }
            public function __set($property, $value)
            {
                $this->$property = $value;
            }
            // Метод для повернення студенту в форматі HTML
            public function toHtml(): string
            {
                $fullName = $this->getFullName();
                $age = $this->getAge();
                return "
                    <div style='border: 2px solid lightblue; padding: 10px; margin: 10px; border-radius: 5px; box-shadow: 0 0 50px rgba(0, 255, 255, 0.5);'>
                        <h2 style='color: #007bff;'>Student Information</h2>
                        <p><strong>Name:</strong> $fullName</p>
                        <p><strong>Age:</strong> $age years old</p>
                    </div>
                ";
            }
        
            // Метод для повернення рядкового представлення об'єкта
            public function __toString(): string
            {
                $fullName = $this->getFullName();
                $age = $this->getAge();
                return "Student: $fullName, Age: $age";
            }
        }
        
        // Приклад використання класу
        $birth_date = new DateTime('2000-06-15');
        $student = new Student("john", "doe", $birth_date);
        
        // Виведення даних студента у форматі HTML
        echo $student->toHtml(); // Виведе HTML код
        echo $student->first_name;
        // Виведення рядкового представлення об'єкта
        //echo $student; // Виведе: Student: John Doe, Age: 24
        ?>
</body>
</html>