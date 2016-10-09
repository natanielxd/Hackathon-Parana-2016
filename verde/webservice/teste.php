<?php
$server = "localhost/Hackathon2016";
?>
<html>
    Cadastro de usuario
    <form action="http://<?php echo $server; ?>/usuarios/salvar" method="post">
        <p>Login: <input type="text" name="login" /></p>
        <p>Senha: <input type="password" name="senha" /></p>
        <p><input type="submit" value="Salvar"></p>
        
    </form>
    <br><br>
    <?php
    $url = 'http://'.$server.'/linhas/listar_todos';
    $content = file_get_contents($url);
    $json = json_decode($content, true);
    
    ?>
    Cadastro de situação da linha
    <form action="http://<?php echo $server; ?>/linha_geos/salvar" method="post">
        <p>Linha: 
        <select name="linha" id="linha" class="form-control">
        <?php
            foreach ($json as $linha) {
                echo '<option value="'.$linha['idlinha'].'">'.$linha['linha'].'</option>';
            }        
        ?>
        </select>
        
        </p>
        <p>Latitude: <input type="text" name="latitude" /></p>
        <p>Longitude: <input type="text" name="longitude" /></p>
        <p>Linha: 
            <select name="texto_situacao" id="texto_situacao" class="form-control">
                <option value="#BusaoLotado">#BusaoLotado</option>
                <option value="#BusaoLivreTop">#BusaoLivreTop</option>
                <option value="#SentadoNoBusao">#SentadoNoBusao</option>
            </select>
        </p>
        <p><input type="submit" value="Salvar"></p>
        
    </form>
    
</html>