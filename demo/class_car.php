<?php 
    class Car{

        var $wheel = 4;
        var $hood = 1;
        var $engine = 1;
        var $door = 4;

        function moveWheels(){
            $this->wheel = 10;
        }

        function __construct()
        {
            echo $this->wheel = 20;
        }
    }

    $bmw = new Car();
    $truck = new Car();

    // echo $bmw->wheel . "<br>";
    // echo $truck->wheel = 10;
?>