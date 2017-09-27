<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$vars = [$id];
$sql = "SELECT * FROM candidato WHERE id_candidato =?";
$candidato = get_data($sql, $vars);
//var_dump($candidato);
?>

<div class="wrapper" role="main">
    <div class="container">
       <!DOCTYPE html>
<html>
<head>
    <title>Smart Wizard - a JavaScript jQuery Step Wizard plugin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Include SmartWizard CSS -->
    <link href="css/smartWizard/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Optional SmartWizard theme -->
    <link href="css/smartWizard/smart_wizard_theme_circles.min.css" rel="stylesheet" type="text/css" />
    <link href="css/smartWizard/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
    <link href="css/smartWizard/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
        <div class="container">
        
        <form class="form-inline">
            <label>External Buttons:</label>
            <div class="btn-group navbar-btn" role="group">
                <button class="btn btn-success" id="prev-btn" type="button">Back</button>
                <button class="btn btn-success" id="next-btn" type="button">Next</button>
                <button class="btn btn-primary" id="reset-btn" type="button">Reset</button>
            </div>
        </form>

        <br /><br /><br />
        
        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1<br /><small>Step 1 description</small></a></li>
                <li><a href="#step-2">Step 2<br /><small>Step 2 description</small></a></li>
                <li><a href="#step-3">Step 3<br /><small>Step 3 description</small></a></li>
                <li><a href="#step-4">Step 4<br /><small>Step 4 description</small></a></li>
            </ul>
            
            <div>
                <div id="step-1" class="">
                    <h2>The content for step 1</h2>
                    Write content here for step 1.
                </div>
                <div id="step-2" class="">
                    <h2>Step 2 Content</h2>
                    <div>Information for step 2</div>
                </div>
                <div id="step-3" class="">
                      You may use a form as well!
                </div>
                <div id="step-4" class="">
                    <h2>Step 4 Content</h2>
                    <div class="panel panel-default">
                        <div class="panel-heading">My Details</div>
                        <table class="table">
                            <tbody>
                                <tr> <th>Name:</th> <td>Your Name</td> </tr>
                                <tr> <th>Email:</th> <td>abc@example.com</td> </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="js/smartWizard/jquery.smartWizard.min.js"></script>

   <script type="text/javascript">
        $(document).ready(function(){
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
                    selected: 0, 
                    theme: 'default',
                    transitionEffect:'slide',
                    toolbarSettings: {toolbarPosition: 'both',
                                      toolbarExtraButtons: [
                                            {label: 'Finish', css: 'btn-success', onClick: function(){ alert('Finish Clicked'); }},
                                            {label: 'Cancel', css: 'btn-warning', onClick: function(){ $('#smartwizard').smartWizard("reset"); }}
                                        ]
                                    }
                 });
                                         
            
            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });
            
            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            
            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
            
                $('#smartwizard').smartWizard("theme", "arrows");
            
        });   
    </script>  
    
    