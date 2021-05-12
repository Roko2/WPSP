<?php
include 'connection.php';
if(isset($_POST['action_id'])){
switch($_POST['action_id']){
    case 'dodajZaposlenika':{
        $sQueryGetLastId = "SELECT emp_no FROM employees ORDER BY emp_no DESC LIMIT 1";
        $resultQuery = $oConnection->query($sQueryGetLastId)->fetch();
        $result =  $resultQuery['emp_no'];
        $sQuery = "INSERT INTO employees (emp_no,birth_date, first_name, last_name, gender,
        hire_date) VALUES (:id, :birthDate, :firstName, :lastName, :gender, :hireDate)";
        $oStatement = $oConnection->prepare($sQuery);
        $oData = array(
         'id' => intval($result) + 1,
         'birthDate' => $_POST['datumRodjenja'],
         'firstName' => $_POST['ime'],
         'lastName' => $_POST['prezime'],
         'gender' => $_POST['spol'],
         'hireDate' => $_POST['datumZaposlenja']
        );
        $oStatement->execute($oData);
        break;
    }
    case 'azuriranjeZaposlenika':{
        $sQuery = "UPDATE employees SET (birth_date=:birthDate, first_name=:firstName, last_name=:lastName, gender=:gender, hire_date=:hireDate) WHERE emp_no=:id";
        $oStatement = $oConnection->prepare($sQuery);
        $oData = array(
         'id' => $_POST['id'],
         'birthDate' => $_POST['datumRodjenja'],
         'firstName' => $_POST['ime'],
         'lastName' => $_POST['prezime'],
         'gender' => $_POST['spol'],
         'hireDate' => $_POST['datumZaposlenja']
        );
        $oStatement->execute($oData);
        break;
    }
    case 'brisanjeZaposlenika':{
        $sQuery = "DELETE FROM employees WHERE emp_no=:id";
        $oStatement = $oConnection->prepare($sQuery);
        $oData = array(
            'id' => $_POST['empId']
        );
        $oStatement->execute($oData);
        break;
    }
    case "dodavanjeOdjela":{
        $sQueryGetLastId = "SELECT dept_no FROM departments ORDER BY dept_no DESC LIMIT 1";
        $resultQuery = $oConnection->query($sQueryGetLastId)->fetch();
        $result =  $resultQuery['dept_no'];
        $num = intval(substr($result, 1)) + 1;
        $digits = strlen($num);
        if ($digits == 1) {
            $num = sprintf('%03d', $num);
        }
        if ($digits == 2) {
            $num = sprintf('%02d', $num);
        }
        $combine = "d" . $num;
        $sQuery = "INSERT INTO departments (dept_no, dept_name) VALUES (:id,:nazivOdjela)";
        $oStatement = $oConnection->prepare($sQuery);
        $oData = array(
            'id' => $combine,
            'nazivOdjela' => $_POST['nazivOdjela']
        );
        $oStatement->execute($oData);
        break;
    }
    case "AzurirajOdjel":{
        $sQuery = "UPDATE departments SET dept_name=:nazivOdjela WHERE dept_no=:id ";
        $oStatement = $oConnection->prepare($sQuery);

        $oData = array(
            'id' => $_POST['depId'],
            'nazivOdjela' => $_POST['nazivOdjela']
        );
        $oStatement->execute($oData);
        break;
    }
    case "ObrisiOdjel":

        $sQuery = "DELETE FROM departments WHERE dept_no=:id ";
        $oStatement = $oConnection->prepare($sQuery);
        $oData = array(
            'id' => $_POST['depId']
        );
        $oStatement->execute($oData);
        break;
    }
}

?>