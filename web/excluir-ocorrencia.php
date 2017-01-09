<?php
include './header.php';
include './menu-top.php';
include_once './controller/OcorrenciaController.class.php';

$protocolo = $_GET['pid'];
$uid = $_SESSION['id'];

if(empty($protocolo) || empty($uid)){

    header("Location: home.php");
    exit;
} else {

    if ($uid == $_SESSION['id']) {

        $uid = $_SESSION['id'];
        OcorrenciaController::delete($protocolo, $uid);
        echo "<script>
                alert('A ocorrência foi removida. Você será redirecionado para a página inicial.');
                location.href = 'home.php';
            </script>";
    }
}
?>
