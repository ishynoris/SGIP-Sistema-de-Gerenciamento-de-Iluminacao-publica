<?php
    include 'header.php';
    include 'menu-top.php';
    include 'controller/PontoIluminacaoController.class.php';
    include 'classes/Usuario.class.php'
?>

    <style>
        .line{
            padding: 30px;
            margin: 70px 20px 0px 50px;
        }
        .filter{
            background: #fff;
            color: #000;
            border: 1px solid #ccc;padding: 0px !important;
        }
    </style>
    <script type="text/javascript" src="js/mapas.js"></script>

    <div class="row">

<?php
    include 'menu-left.php';
?>
        <div class="col-sm-10">
            <div class="bk line" >
                <legend style="padding-bottom:10px; margin-bottom: 50px"><span
                            class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;&nbsp;Parque de iluminação</legend>
                <form id="select-city" method="get">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Selecione a cidade que vc deseja exibir no mapa</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" >
                            <select id="citys" class="form-control">
                                <option class="form-control" value="0">LISTAR TODAS</option>
                                <option class="form-control" value="DIVINA+PASTORA">DIVINA PASTORA</option>
                                <option class="form-control" value="NOSSA+SENHORA+DO+SOCORRO">NOSSA SENHORA DO SOCORRO</option>
                            </select>
                        </div>
                    </div>
                </form>
                    <div id="mapDiv"></div>
            </div>
        </div>
    </div>
