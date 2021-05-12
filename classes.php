<?php 
class Configuration{
    public $host='localhost'; 
    public $dbname='employees'; 
    public $username='root'; 
    public $password=''; 
}

class Employee{

    public $idZaposlenik;
    public $datumRodjenja;
    public $ime;
    public $prezime;
    public $spol;
    public $datumZaposlenja;

    public function __construct($emp_no,$birth_date,$first_name,$last_name,$gender,$hire_date){
        $this->idZaposlenik=$emp_no;
        $this->datumRodjenja=$birth_date;
        $this->ime=$first_name;
        $this->prezime=$last_name;
        $this->spol=$gender;
        $this->datumZaposlenja=$hire_date;
    }
}

class Department{
    public $idOdjela;
    public $imeOdjela;

    public function __construct($dept_no,$dept_name){
        $this->idOdjela=$dept_no;
        $this->imeOdjela=$dept_name;
    }
}
?>