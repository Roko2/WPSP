
<?php
include 'connection.php';
switch($_GET['json_id']){
    case 'get_all_employees':
        {
            // echo "<table style='border: 1px solid black; border-collapse: collapse;'>
            //         <tr style='border: 1px solid black;'>
            //             <th>Rbr.</th>
            //             <th>Id</th>
            //             <th>Birth Date</th>
            //             <th>First Name</th>
            //             <th>Last Name</th>
            //             <th>Gender</th>
            //             <th>Hire Date</th>
            //         </tr>";
        ini_set('memory_limit', '2048M');
        $sQuery = "SELECT * FROM employees";
        $oRecord = $oConnection->query($sQuery);
        $brojac=0;
        $poljeZaposlenika=array();
        while($oRow = $oRecord->fetch(PDO::FETCH_BOTH) and $brojac<500)
     {
        if(isset($_GET['employee_id']) && $oRow['emp_no']==$_GET['employee_id']){
        //  echo '<tr style="border: 1px solid black;">';
        //  echo '<td>'. $brojac .'</td>';
        //  echo '<td>'. $oRow['emp_no'] .'</td>';
        //  echo '<td>'. $oRow['birth_date'] .'</td>';
        //  echo '<td>'. $oRow['first_name'] .'</td>';
        //  echo '<td>'. $oRow['last_name'] .'</td>';
        //  echo '<td>'. $oRow['gender'] .'</td>';
        //  echo '<td>'. $oRow['hire_date'] .'</td>';
        //  echo '</tr>';
        $zaposlenik=new Employee($oRow['emp_no'],$oRow['birth_date'],$oRow['first_name'],$oRow['last_name'],$oRow['gender'],$oRow['hire_date']);
        array_push($poljeZaposlenika,$zaposlenik);
         $brojac++;
        }
        else if(isset($_GET['employee_id'])==false){
            $zaposlenik=new Employee($oRow['emp_no'],$oRow['birth_date'],$oRow['first_name'],$oRow['last_name'],$oRow['gender'],$oRow['hire_date']);
            array_push($poljeZaposlenika,$zaposlenik);
            // echo '<tr style="border: 1px solid black;">';
            // echo '<td>'. $brojac .'</td>';
            // echo '<td>'. $oRow['emp_no'] .'</td>';
            // echo '<td>'. $oRow['birth_date'] .'</td>';
            // echo '<td>'. $oRow['first_name'] .'</td>';
            // echo '<td>'. $oRow['last_name'] .'</td>';
            // echo '<td>'. $oRow['gender'] .'</td>';
            // echo '<td>'. $oRow['hire_date'] .'</td>';
            // echo '</tr>';
            $brojac++;
        }
    }
    echo json_encode($poljeZaposlenika);
        break;
        }
  
    case 'get_all_departments':
        {
            // echo "<table style='border: 1px solid black; border-collapse: collapse;'>
            // <tr style='border: 1px solid black;'>
            // <th>Rbr.</th>
            // <th>Id</th>
            // <th>Naziv odjela</th>
            // </tr>";
            ini_set('memory_limit', '2048M');
            $sQuery = "SELECT * FROM departments";
            $oRecord = $oConnection->query($sQuery);
            $brojac=0;
            $poljeOdjela=array();
            while($oRow = $oRecord->fetch(PDO::FETCH_BOTH) and $brojac<500)
            {
                $odjel=new Department($oRow['dept_no'],$oRow['dept_name']);
                array_push($poljeOdjela,$odjel);
                // echo $oRow['dept_no'];
                // echo $oRow['dept_name']."\n";
                // echo '<tr style="border: 1px solid black;">';
                // echo '<td>'. $brojac .'</td>';
                // echo '<td>'. $oRow['dept_no'] .'</td>';
                // echo '<td>'. $oRow['dept_name'] .'</td>';
                // echo '</tr>';
                $brojac++;
            }
           echo json_encode($poljeOdjela);
        break;
        }
}

