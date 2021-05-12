$(document).ready(function(){
    LoadDepartments();
});
function LoadDepartments(){
    $.ajax(
        {
            url: "json.php?json_id=get_all_departments",
            type: "GET",
            success: function (oData) {
                var obj = JSON.parse(oData);
                obj.forEach((element, index) => {
                    console.log(element.imeOdjela);
                    $('#tablica > tbody').append(`<tr> 
                    <td>${index}</td> 
                    <td id="emp_no">${element.idOdjela}</td> 
                    <td>${element.imeOdjela}</td> 
                    <td><span style="cursor: pointer" class="btn btn-success glyphicon glyphicon-pencil" onclick="GetModal('modals.php?modal_id=edit_department&dep_id=${element.idOdjela}')" aria-hidden="true"></td>
                    <td><span style="cursor: pointer" class="btn btn-danger glyphicon glyphicon-trash" onclick="GetModal('modals.php?modal_id=delete_department&dep_id=${element.idOdjela}')" aria-hidden="true"></td>
                    </tr>`);
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
}
function Obrisi()
{
    $('#tablica tbody').empty();
    $('#modals').modal('hide');
    LoadDepartments();
}

function Spremi()
{
    var result = $('form#addDepartment :input').serialize();

    $.ajax(
        {
            async: false,
            url: "action.php",
            type: "POST",
            data: result,
            success: function (response) {
                console.log("Odjel je dodan");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
    Obrisi();
    $('form#addDepartment :input').each(function()
    {
        $(this).val("");
    })
}

function Uredi()
{
    var result = $('form#editDepartment :input').serialize();

    $.ajax(
        {
            async: false,
            url: "action.php",
            type: "POST",
            data: result,
            success: function (response) {
                alert("Odjel je ažuriran");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }   
    )
    Obrisi();
}

function Ukloni()
{
    var result = $('form#deleteDepartment :input').serialize();
    $.ajax(
        {   
            async: false,
            url: "action.php",
            type: "POST",
            data: result,
            success: function (response) {
                alert("Odjel je obrisan");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
    Obrisi();
}