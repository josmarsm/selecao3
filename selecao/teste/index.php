<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="thumbnail">

            <div class="container">
                <h2>Inline form</h2>
                <p>Make the viewport larger than 768px wide to see that all of the form elements are inline, left aligned, and the labels are alongside.</p>
                <form class="form-inline" method="post" action="upload.php"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="doc_descricao">Descrição:</label>
                        <input type="text" class="form-control"  placeholder="Descrição" name="doc_descricao">
                    </div>

                    <div class="form-group">
                        <label for="doc_subcriterio">Subcritério:</label>
                        <input type="text" class="form-control" id="doc_subcriterio" placeholder="Subcritério" name="doc_subcriterio">
                    </div>

                    <div class="form-group">
                        <label for="doc_valor">Pontuação:</label>
                        <input type="text" class="form-control" id="doc_valor" placeholder="Pontuação" name="doc_valor">
                    </div>

                    <div class="checkbox">                           
                        <input type="file" name="doc_file">
                    </div>
                    <button type="submit" name="Submit" class="btn btn-default">Submit</button>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Descricao</th>
                            <th>Subcritério</th>
                            <th>Pontuação</th>
                            <th>Arquivo</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>  
                    <?php
                    include('db.php');
                    //query for selecting database table

                    $results = $db_con->prepare("select * from curriculo where id_candidato = 1 LIMIT 0 , 10");
                    $results->execute();
                    // this while statement displays rows of database table
                    while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        ?>   

                        <tbody>
                            <tr>
                                <td><?php echo $row['descricao']; ?></td>
                                <td><?php echo $row['id_subcriterio']; ?></td>
                                <td><?php echo $row['valor']; ?></td>
                                <td><img src="uploads/<?php echo $row['arquivo']; ?>" class="img-rounded" alt="image" style="width:60px" height="60px;">
                                </td>
                                <td> <a href="editform.php?id=<?php echo $row['id_curriculo']; ?>" class="btn btn-warning">Update</a></td>
                                <td><a href="delete.php?post_id=<?php echo $post_id; ?>" class="btn btn-danger">Delete</a> </td>

                            </tr>
                        </tbody>
                        <?php
                    }
                    ?>   
                </table>
            </div>           
        </div>        
    </body>
</html>