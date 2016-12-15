<?php
    define("CAD_OCORRENCIA", "Cadastrar nova ocorrência");
    define("PARQUE", "Parque de iluminação");
    define("CAD_PONTOS", "Cadastrar pontos de iluminação");
    define("MANUTENCAO", "Lista de manutenções cadastrdas");
    define("COMPONENTES", "Componentes");
    define("USUARIOS", "Lista de usaurios");
    define("RELATORIOS", "Relatorios");
?>
    <div class="col-sm-2">
        <div class="nav-side-menu" style="margin-top: 50px;">

            <div class="" style="clear: both; ">
                <ul id="menu-content" class="menu-content out" style="padding-right: 10px;">
                    <li></li>
<?php
                if ($_SESSION['isAdmin'] == Usuario::ADMIN){
?>

                    <li><a href="nova-ocorrenca.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            <?php echo CAD_OCORRENCIA?></a></li>
                    <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                            <?php echo PARQUE?></a></li>
                    <li><a href="cadastroPonto.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
                            <?php echo CAD_PONTOS?></a></li>
                    <li><a href="manutencao.php"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                            <?php echo MANUTENCAO?></a></li>
                    <li><a href="componentes.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i>
                            <?php echo COMPONENTES?></a></li>
                    <li><a href="usuario.php"><i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                            <?php echo USUARIOS?></a></li>
                    <li><a href="dashboard.php"><i class="glyphicon glyphicon-file" aria-hidden="true"></i>
                            <?php echo RELATORIOS?></a></li>
<?php
                } else if ($_SESSION['isAdmin'] == Usuario::TECNICO){
?>
                    <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                            <?php echo PARQUE?></a></li>
                    <li><a href="cadastroPonto.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
                            <?php echo CAD_PONTOS?></a></li>
                    <li><a href="manutencao.php"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                            <?php echo MANUTENCAO?></a></li>
                    <li><a href="componentes.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i>
                            <?php echo COMPONENTES?></a></li>
<?php
                } else if ($_SESSION['isAdmin'] == Usuario::USUARIO){
?>
                    <li ><a href="nova-ocorrenca.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            <?php echo CAD_OCORRENCIA?></a></li>
                    <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                            <?php echo PARQUE?></a></li>
<?php
                } else if ($_SESSION['isAdmin'] == Usuario::OPERADOR){
?>
                        <li ><a href="nova-ocorrenca.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                <?php echo CAD_OCORRENCIA?></a></li>
                        <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                                <?php echo PARQUE?></a></li>
                        <li><a href="cadastroPonto.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
                                <?php echo CAD_PONTOS?></a></li>
                        <li><a href="manutencao.php"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                                <?php echo MANUTENCAO?></a></li>
                        <li><a href="componentes.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i>
                                <?php echo COMPONENTES?></a></li>
                        <li><a href="usuario.php"><i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                <?php echo USUARIOS?></a></li>
                        <li><a href="dashboard.php"><i class="glyphicon glyphicon-file" aria-hidden="true"></i>
                                <?php echo RELATORIOS?></a></li>
<?php
                }
?>
                </ul>
            </div>
        </div>
    </div>