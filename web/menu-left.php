<?php
    define("HOME", "Página inicial");
    define("OCORRENCIA", "Ocorrências");
    define("PARQUE", "Parque de iluminação");
    define("CAD_PONTOS", "Pontos de iluminação");
    define("MANUTENCAO", "Ocorrências cadastrdas");
    define("COMPONENTES", "Componentes");
    define("USUARIOS", "Lista de usaurios");
    define("RELATORIOS", "Relatorios");
?>
    <div class="col-sm-2">
        <div class="nav-side-menu" style="margin-top: 50px;">

            <div class="" style="clear: both; ">
                <ul id="menu-content" class="menu-content out" style="padding-right: 10px;">
                    <li></li>
                    <li><a href="home.php"><i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                            <?php echo HOME?></a></li>
                    <li><a href="parque-de-iluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                            <?php echo PARQUE?></a></li>
<?php
                if ($_SESSION['isAdmin'] == Usuario::ADMIN){
?>
                    <li><a href="ocorrencia.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            <?php echo OCORRENCIA?></a></li>
                    <li><a href="pontos-iluminacao.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
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
                    <li><a href="pontos-iluminacao.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
                            <?php echo CAD_PONTOS?></a></li>
                    <li><a href="manutencao.php"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                            <?php echo MANUTENCAO?></a></li>
                    <li><a href="componentes.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i>
                            <?php echo COMPONENTES?></a></li>
<?php
                } else if ($_SESSION['isAdmin'] == Usuario::USUARIO){
?>
                    <li><a href="ocorrencia.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            <?php echo OCORRENCIA?></a></li>
<?php
                } else if ($_SESSION['isAdmin'] == Usuario::ATENDENTE){
?>
                    <li ><a href="nova-ocorrenca.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            <?php echo OCORRENCIA?></a></li>
                    <li><a href="pontos-iluminacao.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
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