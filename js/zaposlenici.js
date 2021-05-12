var vZaposlenici=new Array();
$(document).ready(function(){
       LoadEmployees();
    });
function LoadEmployees(){
$.ajax({
        url: './json.php',
        type: 'GET',
        dataType:'json',
        data:{json_id:'get_all_employees'},
        error: console.error,
        success: function (oData) {
          var brojac=1;
          oData.forEach(x => {
          var tablica=$("#tbodyZaposlenici");
          var sRow=`<tr><td>${brojac}</td></td>
                       <td id="emp_no">${x.idZaposlenik}</td>
                       <td class="datumRodjenja">${x.datumRodjenja}</td>
                       <td class="ime">${x.ime}</td>
                       <td class="prezime">${x.prezime}</td>
                       <td class="spol">${x.spol}</td>
                       <td class="datumZaposlenja">${x.datumZaposlenja}</td>
                       <td><button style="cursor: pointer" class="btn btn-success glyphicon glyphicon-pencil" onclick="GetModal('modals.php?modal_id=edit_employee&emp_id=${x.idZaposlenik}')" aria-hidden="true"></button></td>
                    <td><button style="cursor: pointer" class="btn btn-danger glyphicon glyphicon-trash" onclick="GetModal('modals.php?modal_id=delete_employee&emp_id=${x.idZaposlenik}')" aria-hidden="true"></button></td>
                    </tr>`;
            brojac++;
            tablica.append(sRow);
            console.log(JSON.stringify(oData));
          });
        }
       });
}
function Ukloni()
{
    var result = $('form#deleteEmployee :input:lt(2)').serialize();
    $.ajax(
        {
            async: false,
            url: "action.php",
            type: "POST",
            data: result,
            success: function (response) {
                alert("Zaposlenik je obrisan");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
    Clear();
    LoadEmployees();
}
function Uredi()
{
    var result = $('form#editEmployee :input').serialize();
    $.ajax(
        {
            async: false,
            url: "action.php",
            type: "POST",
            data: result,
            success: function (response) {
                alert("Zaposlenik je ažuriran");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
    Clear();
    LoadEmployees();
}

function Spremi() {
  var result = $('form#addEmployee :input').serialize();
  $.ajax(
      {
          async: false,
          url: "action.php",
          type: "POST",
          data: result,
          success: function (response) {
              alert("Zaposlenik dodan");
          },
          error: function (jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
      }
  )
  Clear();
  LoadEmployees();

  $('form#addEmployee :input').each(function()
  {
      $(this).val("");
  })  
}

function Clear()
{
    $('#tablicaZapo tbody').empty();
    $('#modals').modal('hide');
}