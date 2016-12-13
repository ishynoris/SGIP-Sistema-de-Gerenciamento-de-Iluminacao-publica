<?php
include './header.php';
include './menu.php';
include_once './controller/NovaOcorrenciaController.class.php';

$protocolo = $_GET['pid'];
$uid = $_SESSION['id'];

if(empty($protocolo) || empty($uid)){

    header("Location: home.php");
    exit;
} else {

    if ($uid == $_SESSION['id']) {

        $uid = $_SESSION['id'];
        echo NovaOcorrenciaController::delete($protocolo, $uid);
        echo "<script>
                alert('A ocorrência Você será redirecionado para a página inicial.');
                location.href = 'home.php';
            </script>";
    }
}
?>
