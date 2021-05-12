<!DOCTYPE html>
<html lang="en">
<head>
 <title>Zaposlenici</title>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 <div class="container">
 <div class="jumbotron">
 <h1>Zaposlenici</h1>
 <a class="btn btn-success btn-lg" href="index.php" role="button">Pocetna</a>

 </div>
 <div class="modal fade" id="modals" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content"></div>
        </div>
        </div>
 <div class="row">
 <button onclick="GetModal('modals.php?modal_id=new_employee')" class="btn btn-primary">Dodaj zaposlenika</button>

 <table id="tablicaZapo" style="border: 1px solid black; border-collapse: collapse;width:100%;text-align:left;margin-top:5px;">
 <thead>
        <tr style="border: 1px solid black;">
            <th>Rbr.</th>
            <th>Id</th>
            <th>Birth Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Hire Date</th>
            <th>Uređivaje</th>
            <th>Brisanje</th>
        </tr>
        </thead>
    <tbody id="tbodyZaposlenici">
    </tbody>
</table>
 </div>
 </div>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
 <script src="js/globals.js"></script>
 <script src="js/zaposlenici.js"></script>

</body>
</html>
