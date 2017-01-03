<?php

    if(isset($_SESSION)){
        header("Location: index.php");
        exit;
    }

    session_start();
    ob_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <!-- Estilos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/chosen.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://js.arcgis.com/4.0/esri/css/main.css">
    <link rel="stylesheet" href="//js.arcgis.com/3.10/js/esri/css/esri.css">
    <link rel="stylesheet" href="//esri.github.io/bootstrap-map-js/src/css/bootstrapmap.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>
    <!-- <script src="https://github.com/robertocr/cidades-estados-js/blob/master/cidades-estados-1.4-utf8.js"></script> -->
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="vendor/terraformer/terraformer.min.js"></script>
    <script type="text/javascript" src="vendor/terraformer-arcgis-parser/terraformer-arcgis-parser.min.js"></script>
    <script type="text/javascript" src="http://js.arcgis.com/3.10"></script>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js" ></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!--
    <script type="text/javascript">
        window.onload = function() {
            new dgCidadesEstados(
                document.getElementById('estado'),
                document.getElementById('cidade'),
                true
            );
        }
    </script>
    -->
    <script>
        //Função usada para filtrar as tabelas
        $(function(){
            $("#tabela input").keyup(function(){
                var index = $(this).parent().index();
                var nth = "#tabela td:nth-child("+(index+1).toString()+")";
                var valor = $(this).val().toUpperCase();
                $("#tabela tbody tr").show();
                $(nth).each(function(){
                    if($(this).text().toUpperCase().indexOf(valor) < 0){
                        if($(this).parent().attr("id") != "titulo") { //impede que o titulo da tabela seja apagado
                            $(this).parent().hide();
                        }
                    }
                });
            });

            $("#tabela input").blur(function(){
                $(this).val("");
            });
        });

        function printPageArea(){
            var divToPrint=document.getElementById("tabela");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
    </script>

    <title>Sistema de Iluminação Pública</title>
</head>

