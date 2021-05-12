<?php
include 'connection.php';

if (isset($_GET['modal_id'])) {
switch($_GET['modal_id']){
    case 'new_employee':{
        echo '<div class="modal-body" style="padding:0">
        <div class="modal-header" style="margin-bottom:25px;">
        <button style="color:white" type="button" class="close" data-dismiss="modal"
    aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="color:white">Title</h4>
        </div>
        <form class="form-horizontal" id="addEmployee">
        <input type="hidden" value="dodajZaposlenika" name="action_id">
        <div class="form-group">
        <label class="col-md-3 control-label">Birth date</label>
        <div class="col-md-8">
        <input required type="date" class="form-control" placeholder="" name="datumRodjenja" /></div>
    <label class="col-md-3 control-label">First name</label>
        <div class="col-md-8">
        <input required type="text" class="form-control" name="ime" placeholder="Ime" /></div>
    <label class="col-md-3 control-label">Last name</label>
        <div class="col-md-8">
        <input required type="text" class="form-control" name="prezime" placeholder="Prezime" /></div>
    <label class="col-md-3 control-label">Gender</label>
        <div class="col-md-8">
        <input required type="text" class="form-control" name="spol" value="M" pattern="M|F" size="32" title="only letter M or F is allowed"/></div>
    <label class="col-md-3 control-label">Hire date</label>
        <div class="col-md-8">
        <input required type="date" class="form-control" name="datumZaposlenja" placeholder="" /></div>
        </div>
        </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-success btn-s" onclick="Spremi()">Spremi</button>
        <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
        </div>
    </div>';
            break;
        }
    case 'edit_employee':{
        if (isset($_GET['emp_id'])) {

            $query = "SELECT * FROM employees WHERE emp_no = '". $_GET['emp_id']."'";
            $oResult = $oConnection->query($query);
            $row = array();
            while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                $row[] = $oRow;
            }
            $result = $row[0];

            echo '<div class="modal-body" style="padding:0">
            <div class="modal-header" style="margin-bottom:25px;">
            <button style="color:white" type="button" class="close" data-dismiss="modal"
           aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="color:white">Title</h4>
            </div>
            <form class="form-horizontal" id="editEmployee">
            <input type="hidden" value="azuriranjeZaposlenika" name="action_id">
            <input type="hidden" value="' . $result['emp_no'] . '" name="empId">
            <div class="form-group">
            <label class="col-md-3 control-label">Birth date</label>
            <div class="col-md-8">
            <input required type="date" class="form-control" placeholder="" name="datumRodjenja" value="' . $result['birth_date'] . '"/></div>
           <label class="col-md-3 control-label">First name</label>
            <div class="col-md-8">
            <input required type="text" class="form-control" name="ime" placeholder="" value="' . $result['first_name'] . '" /></div>
           <label class="col-md-3 control-label">Last name</label>
            <div class="col-md-8">
            <input required type="text" class="form-control" name="prezime" placeholder="" value="' . $result['last_name'] . '" /></div>
           <label class="col-md-3 control-label">Gender</label>
            <div class="col-md-8">
            <input required type="text" class="form-control" name="spol" pattern="M|F" size="32" title="only letter M or F is allowed" value="' . $result['gender'] . '" /></div>
           <label class="col-md-3 control-label">Hire date</label>
            <div class="col-md-8">
            <input required type="date" class="form-control" name="datumZaposlenja" placeholder="" value="' . $result['hire_date'] . '" /></div>
            </div>
            </form>
            <div class="modal-footer">
            <button type="button" class="btn btn-success btn-s" onclick="Uredi()">Spremi</button>
            <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
            </div>
           </div>';
        }

        break;
    }
    case 'delete_employee':{
        if (isset($_GET['emp_id'])) {
            $query = "SELECT * FROM employees WHERE emp_no = '". $_GET['emp_id']."'";
            $oResult = $oConnection->query($query);
            $row = array();
            while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                $row[] = $oRow;
            }
            $result = $row[0];

            echo '<div class="modal-body" style="padding:0">
            <div class="modal-header" style="margin-bottom:25px;">
            <button style="color:white" type="button" class="close" data-dismiss="modal"
           aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="color:white">Title</h4>
            </div>
            <form class="form-horizontal" id="deleteEmployee">
            <input type="hidden" value="brisanjeZaposlenika" name="action_id">
            <input type="hidden" id="emp_id" value="' . $result['emp_no'] . '" name="empId">
            <div class="form-group">
            <label class="col-md-3 control-label">Birth date</label>
            <div class="col-md-8">
            <input required type="date" class="form-control" placeholder="" disabled name="datumRodjenja" value="' . $result['birth_date'] . '"/></div>
           <label class="col-md-3 control-label">First name</label>
            <div class="col-md-8">
            <input required type="text" class="form-control" name="ime" disabled placeholder="" value="' . $result['first_name'] . '" /></div>
           <label class="col-md-3 control-label">Last name</label>
            <div class="col-md-8">
            <input required type="text" class="form-control" name="prezime" disabled placeholder="" value="' . $result['last_name'] . '" /></div>
           <label class="col-md-3 control-label">Gender</label>
            <div class="col-md-8">
            <input required type="text" class="form-control" name="spol" disabled pattern="M|F" size="32" title="only letter M or F is allowed" value="' . $result['gender'] . '" /></div>
           <label class="col-md-3 control-label">Hire date</label>
            <div class="col-md-8">
            <input required type="date" class="form-control" name="datumZaposlenja" disabled placeholder="" value="' . $result['hire_date'] . '" /></div>
            </div>
            </form>
            <div class="modal-footer">
            <button type="button" class="btn btn-success btn-s" onclick="Ukloni()">Obriši</button>
            <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
            </div>
           </div>';
        }
        break;
    }
    case 'new_department':{
        echo '<div class="modal-body" style="padding:0">
        <div class="modal-header" style="margin-bottom:25px;">
        <button style="color:white" type="button" class="close" data-dismiss="modal"
        aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="color:white">Title</h4>
        </div>
        <form class="form-horizontal" id="addDepartment">
        <input type="hidden" value="dodavanjeOdjela" name="action_id">
        <div class="form-group">
        <label class="col-md-3 control-label">Naziv odjela</label>
        <div class="col-md-8">
        <input required type="text" id="nam" class="form-control" placeholder="Naziv odjela" name="nazivOdjela"  /></div>
        </div>
        </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-success btn-s" onclick="Spremi()">Spremi</button>
        <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
        </div>
       </div>';
    break;
    }
    case 'edit_department':{
        if (isset($_GET['dep_id'])) {

            $query = "SELECT * FROM departments WHERE dept_no = '".$_GET['dep_id']."'";
             $oResult = $oConnection->query($query);
             $row = array();
             while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                 $row[] = $oRow;
             }
             $result = $row[0];

             echo '<div class="modal-body" style="padding:0">
             <div class="modal-header" style="margin-bottom:25px;">
             <button style="color:white" type="button" class="close" data-dismiss="modal"
             aria-hidden="true">&times;</button>
             <h4 class="modal-title" style="color:white">Title</h4>
             </div>
             <form class="form-horizontal" id="editDepartment">
             <input type="hidden" value="AzurirajOdjel" name="action_id">
             <input type="hidden" value="'.$result['dept_no'].'" name="depId">
             <div class="form-group">
             <label class="col-md-3 control-label">Naziv odjela</label>
             <div class="col-md-8">
             <input required type="text" id="nam" class="form-control" placeholder="" name="nazivOdjela" value="'.$result['dept_name'].'" /></div>
             </div>
             </form>
             <div class="modal-footer">
             <button type="button" class="btn btn-success btn-s" onclick="Uredi()">Spremi</button>
             <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
             </div>
            </div>';
         }
         break;
    }
    case 'delete_department':{
        if (isset($_GET['dep_id'])) {

            $query = "SELECT * FROM departments WHERE dept_no = '".$_GET['dep_id']."'";
            $oResult = $oConnection->query($query);
            $row = array();
            while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                $row[] = $oRow;
            }
            $result = $row[0];

            echo '<div class="modal-body" style="padding:0">
            <div class="modal-header" style="margin-bottom:25px;">
            <button style="color:white" type="button" class="close" data-dismiss="modal"
            aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="color:white">Title</h4>
            </div>
            <form class="form-horizontal" id="deleteDepartment">
            <input type="hidden" value="ObrisiOdjel" name="action_id">
            <input type="hidden"  value="'.$result['dept_no'].'" name="depId">
            <div class="form-group">
            <label class="col-md-3 control-label">Naziv odjela</label>
            <div class="col-md-8">
            <input required disabled type="text" id="nam" class="form-control" placeholder="" name="nazivOdjela" value="'.$result['dept_name'].'" /></div>
            </div>
            </form>
            <div class="modal-footer">
            <button type="button" class="btn btn-success btn-s" onclick="Ukloni()">Obriši</button>
            <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
            </div>
           </div>';
        }
        break;
    }
    default:{
        break;
    }
}
}

