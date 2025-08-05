$(document).ready(function(){

    let table = $('#patient_appointment_report_table').DataTable(
        {
        lengthMenu: [10],
        dom:'rtip',
        buttons:['csv']
    }  
);
$('#export_csv').on('click',function(){
table.button(0).trigger();
});
});


