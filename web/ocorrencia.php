<?php
include 'header.php';
include 'menu-top.php';
include './controller/OcorrenciaController.class.php';
include './controller/HomeController.class.php';

$protocol = '';
?>
    <style>
        .line{
            padding: 30px;
            margin: 70px 20px 0px 50px;
        }
    </style>

    <script>
        function setGet() {
            doc = document.getElementById("pid");
            input = document.getElementById("protocol");

            doc.href = "pesquisar-ocorrencia.php";
            if(input.value != ""){
                doc.href += "?pid=" + input.value;
            }
        }
    </script>
    <div class="row">

<?php
        include 'menu-left.php';
?>
        <div class="col-sm-10">
            <div class="bk line" >
            <legend style="padding-bottom:10px; margin-bottom: 50px"><span
                    class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;Ocorrências</legend>

            <div class="form-group" >
                <div class="row">
                    <label class="col-sm-2 text-right">Protocolo</label>
                    <div class="col-sm-3">
                        <input id="protocol" name="protocol" class="form-control" value="201659715"
                               placeholder="Digite aqui o número do protocolo">
                    </div>

                    <div class="col-sm-1">
                        <a id="pid" href="#">
                            <button onclick="setGet()" type="submit" name="<?php echo OcorrenciaController::BTN_SEARCH ?>" class="btn btn-primary" style="float: left">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="nova-ocorrenca.php" style="float: right">
                            <button class="btn btn-primary" >Nova ocorrência</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
