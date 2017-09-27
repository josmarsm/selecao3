<?php
include('db.php');
if (isset($_POST['Submit'])) {
    //$id_candidato = $_SESSION['id_usuario'];
    $id_candidato = 1;
    $doc_descricao = $_POST['doc_descricao'];
    $doc_subcriteio = $_POST['doc_subcriterio'];
    $doc_valor = $_POST['doc_valor'];
    $doc_file = $_FILES["doc_file"]["name"];

    echo 'id candidato'.$id_candidato.'<br>';
    echo 'descricao'.$doc_descricao.'<br>';
    echo 'subcriterio'.$doc_subcriteio.'<br>';
    echo 'valor'.$doc_valor.'<br>';
    echo 'file'.$doc_file.'<br>';
}

try {
    move_uploaded_file($_FILES["doc_file"]["tmp_name"], "uploads/" . $_FILES["doc_file"]["name"]);
    $stmt = $db_con->prepare("INSERT INTO curriculo(id_candidato,id_subcriterio,descricao,arquivo,valor) VALUES( :id_candidato, :id_subcriterio, :descricao, :arquivo, :valor)");
    $stmt->bindParam(":id_candidato", $id_candidato);
    $stmt->bindParam(":id_subcriterio", $doc_subcriteio);
    $stmt->bindParam(":descricao", $doc_descricao);
    $stmt->bindParam(":arquivo", $doc_file);
    $stmt->bindParam(":valor", $doc_valor);
    //print_r($stmt->execute());
    if ($stmt->execute()) {
        echo "<script>alert('Successfully Added..')</script>";
        //echo "<script>window.open('index.php','_self')</script>";
    } else {
        echo "Query Problem";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>