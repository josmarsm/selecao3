<?php ?>
<table id = "mytable" cellpadding="10" border="1">
    <thead>
    <th><input type = "checkbox" id = "checkall" /></th>
    <th>Subcritério</th>
    <th style="width:90px">Arquivo</th>
    <th style="width:130px">Pontos Solicitados</th>
    <th style="width:110px">Pontos Avaliados</th>
    <th>Edit / Delete </th>    
</thead>
<tbody>
    <tr>
        <td><input type = "checkbox" class = "checkthis" /></td>
        <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
        <td>arquivo</td>
        <td>22</td>
        <td>15</td>        
        <td>
            
                <button class = "btn btn-primary btn-xs" data-title = "Edit" data-toggle = "modal" data-target = "#edit" >
                    <span class = "glyphicon glyphicon-pencil"></span>
                </button>
           
            
                <button class = "btn btn-danger btn-xs" data-title = "Delete" data-toggle = "modal" data-target = "#delete" >
                    <span class = "glyphicon glyphicon-trash"></span>
                </button>
           
        </td>
    </tr>
    <tr id="new_row">
        <td></td>
        <td COLSPAN="4"></td>
               
        <td>
            <p data-placement = "top" data-toggle = "tooltip" title = "Delete">
                <button class = "btn btn-danger btn-xs" data-title = "Delete" data-toggle = "modal" data-target = "#delete" >
                    <span class = "glyphicon glyphicon-trash"></span>
                </button>
            </p>
        </td>
    </tr>
</tbody>
</table>