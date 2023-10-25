<?php
##########################################################################################
# Ficha Catalográfica para Teses e Dissertações - ICMC
#
##########################################################################################
# CRÉDITOS 
# Universidade de São Paulo
# Instituto de Ciências Matemáticas e de Computação (ICMC).
# Autoria: Maria Alice Soares de Castro - STI-ICMC
# Contato: Seção Técnica de Informática - sti@icmc.usp.br 
#          Biblioteca Prof. Achille Bassi - biblio@icmc.usp.br
# Todos os códigos são livres para serem utilizados e/ou modificados, desde que seja autorizado 
# pelo autor e estes créditos sejam mantidos no início de cada código fonte.
# Proibida redistribuição dos códigos sem a prévia autorização do autor.
#
# Este aplicativo utiliza o pacote PHP Pdf, que pode ser baixado a partir de 
# http://sourceforge.net/projects/pdf-php/
#
# Modificações: 
# 	22/11/12 - integração no novo site do ICMC: inseridas chamadas de rotinas de layout
#			   e aplicação da função utf8_decode para compatibilidade com o novo ambiente.
#			   Esta versão **não deve** ser distribuída!
#   28/01/15 - acrescentado o programa Interinstitucional em Estatística
#
# Os arquivos associados ao quadro de ajuda estão disponíveis em
# http://www.icmc.usp.br/Portal/Sistemas/Biblioteca/ficha.php
#
##########################################################################################
// Verifica se foi entrado um nome no formulário
// Se não houver valor para nome, apresenta o formulário para ser preenchido
if (!isset($_POST["nome"])) {
    
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ficha Catalogr&aacute;fica</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <style type='text/css'>
            .bloco-conteudo {
                min-height: 510px;
            }
        </style>

        <div class='container'>
            <div class='bloco-conteudo'>
                <h3>FICHA CATALOGR&Aacute;FICA</h3>

                <style>
                    a { color:#276DD1; }
                    body { font-size: 12px; }
                    fieldset {
                        border: 1px solid #526F9B;
                        width: 650px;
                    }
                    label {
                        float:left;
                        width:25%;
                        margin-right:0.5em;
                        padding-top:0.2em;
                        text-align:right;
                        font-weight:bold;
                        height: 10px;
                    }
                    legend {
                        color: #fff;
                        background: #84A4D4;
                        border: 1px solid #526F9B;
                        padding: 2px 6px;
                        font-size: 16px;
                    } 
                </style>

                <form name="ficha" method="post" action="ficha.php">

                    <!-- quadro com links para tutorial e ajuda -->	
                    <div style="background-color:white; border: 1px solid #526F9B; font-size:11px; width: 125px; float:right; padding: 3px"><div style="background: #84A4D4; padding:3px; color:white;font-weight:bold;">Ajuda</div>- <a href="Tutorial_fichacat_2011.pdf" target="_blank">Tutorial para preenchimento</a> (pdf)<br />- <a href="FichaCat_diretrizes_2011.pdf" target="_blank">Orienta&ccedil;&otilde;es b&aacute;sicas</a> (pdf)</div>
                    <!-- fim do quadro com links para tutorial e ajuda -->
                    <fieldset>
                        <legend>Dados para ficha catalogr&aacute;fica</legend>

                        <label>Nome:</label> <input type="text" name="nome" size="70"><br />
                        <label>Sobrenome:</label> <input type="text" name="sobrenome" size="70">
                        <br />
                        <label>T&iacute;tulo do trabalho:</label> <input type="text" name="titulo" size="70">
                        <br />
                        <label>C&oacute;digo Cutter:</label> <input type="text" name="cutter" size="6"> <a href="http://conteudo.icmc.usp.br/Portal/Sistemas/Biblioteca/cutter/" target="_blank">Ver tabela</a>
                        <br />
                        <label>Trabalho:</label>
                        <input type="radio" name="trabalho" value="Tese" checked> Tese <br />
                        <label></label><input type="radio" name="trabalho" value="DissertaÃ§Ã£o"> Disserta&ccedil;&atilde;o<br /><br />
                        <label>Programa:</label> 
                        <input type="radio" name="programa" value="em MatemÃ¡tica" checked> Matem&aacute;tica&nbsp;<br />
                        <label></label><input type="radio" name="programa" value="em CiÃªncias de ComputaÃ§Ã£o e MatemÃ¡tica Computacional"> Ci&ecirc;ncias de Computa&ccedil;&atilde;o e Matem&aacute;tica Computacional<br />
                        <label></label><input type="radio" name="programa" value="em Mestrado Profissional em MatemÃ¡tica em Rede Nacional"> Mestrado Profissional em Matem&aacute;tica em Rede Nacional<br />
                        <label></label><input type="radio" name="programa" value="Interinstitucional"> Interinstitucional de P&oacute;s-gradua&ccedil;&atilde;o em Estat&iacute;stica<br /><br />
                        <label>Nome do orientador:</label> <input type="text" name="nome_ori" size="50"><br />
                        <label>Sobrenome do orientador:</label> <input type="text" name="sobrenome_ori" size="50"> 
                        <input type="checkbox" name="orientadora" value="a"> orientadora<br /><br />

                        <label>Nome do coorientador:</label> <input type="text" name="nome_coori" size="50"><br />
                        <label>Sobrenome do coorientador:</label> <input type="text" name="sobrenome_coori" size="50"> 
                        <input type="checkbox" name="coorientadora" value="a"> coorientadora<br /><br />

                        <label>Ano:</label>  <input type="text" name="ano" size="6"><br />
                        <label>n<sup>o</sup> de p&aacute;ginas:</label>  <input type="text" name="pags" size="6"><br /><br />
                        <label>Assuntos (min. 1, max. 5): </label><br />
                        <label>&nbsp;</label> 1. <input type="text" name="assunto1" size="50"> <div style="background-color:#f0f0f0; text-align:center; font-size:11px; width: 100px; float:right; padding: 3px"><a href="http://143.107.154.62/Vocab/" target="_blank">Consulta opcional ao Vocabul&aacute;rio Controlado da USP</a></div><br />
                        <label>&nbsp;</label> 2. <input type="text" name="assunto2" size="50"> <br />
                        <label>&nbsp;</label> 3. <input type="text" name="assunto3" size="50"> <br />
                        <label>&nbsp;</label> 4. <input type="text" name="assunto4" size="50"> <br />
                        <label>&nbsp;</label> 5. <input type="text" name="assunto5" size="50"> <br /><br />
                        <label></label>

                        <input type="submit" name="Enviar" value="Enviar" class="btn btn-sm btn-primary" />
                        <input type="reset" name="Limpar" value="Limpar" class="btn btn-sm btn-default" />
                        <br /><br />
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
} else {
// há alguma informação no formulário de entrada
// carrega o pacote de geração de PDF

    date_default_timezone_set('America/Sao_Paulo');

    require('pdf-php/class.ezpdf.php');

    $nome = utf8_decode($_POST["nome"]);
    $sobrenome = utf8_decode($_POST["sobrenome"]);
    $titulo = utf8_decode($_POST["titulo"]);
    $cutter = $_POST["cutter"];
    $trabalho = utf8_decode($_POST["trabalho"]);  // tese / dissertação
    $programa = utf8_decode($_POST["programa"]);  // Programa Matemática / CCMC / Interinstitucional
    $nome_ori = utf8_decode($_POST["nome_ori"]); // nome do orientador
    $sobrenome_ori = utf8_decode($_POST["sobrenome_ori"]); // sobrenome do orientador
    $orientadora = $_POST["orientadora"]; // se sexo feminino, vale "a"

    $nome_coori = utf8_decode($_POST["nome_coori"]); // nome do coorientador
    $sobrenome_coori = utf8_decode($_POST["sobrenome_coori"]); // sobrenome do coorientador
    $coorientadora = $_POST["coorientadora"]; // se sexo feminino, vale "a"	

    $ano = $_POST["ano"];
    $pags = $_POST["pags"];
    $assunto1 = utf8_decode($_POST["assunto1"]);
    $assunto2 = utf8_decode($_POST["assunto2"]);
    $assunto3 = utf8_decode($_POST["assunto3"]);
    $assunto4 = utf8_decode($_POST["assunto4"]);
    $assunto5 = utf8_decode($_POST["assunto5"]);

    $codigo1 = substr($sobrenome, 0, 1);

    // separa o título por espaços em branco e verifica a primeira palavra
    // se a primeira palavra for uma stopword, o $codigo2 será a primeira letra da segunda palavra do título

    $vetitulo = explode(" ", $titulo);

    $stopwords = array("o", "a", "os", "as", "um", "uns", "uma", "umas", "de", "do", "da", "dos", "das", "no", "na", "nos", "nas", "ao", "aos", "Ã ", "Ã s", "pelo", "pela", "pelos", "pelas", "duma", "dumas", "dum", "duns", "num", "numa", "nuns", "numas", "com", "por", "em");

    if (in_array(strtolower($vetitulo[0]), $stopwords))
        $codigo2 = strtolower(substr($vetitulo[1], 0, 1));
    else
        $codigo2 = strtolower(substr($vetitulo[0], 0, 1));

// monta o Código Cutter

    $codigo = $codigo1 . $cutter . $codigo2;

// monta informações da ficha catalográfica

    $texto = $sobrenome . ", " . $nome . "\n   " . $titulo . " / " . $nome . " " . $sobrenome . "; orientador$orientadora " . $nome_ori . " " . $sobrenome_ori;
    if (!empty($nome_coori))
        $texto .= "; co-orientador$coorientadora " . $nome_coori . " " . $sobrenome_coori;
    $texto .= utf8_decode(". -- SÃ£o Carlos, " . $ano . ".\n   $pags p.\n\n\n   ");
    $texto .= $trabalho;
    if ($trabalho == "Tese")
        $texto .= " (Doutorado";
    else
        $texto .= " (Mestrado";

    // alterado em janeiro de 2015 para incluir o Interinstitucional de Pós-Graduação em Estatística
    if ($programa == "Interinstitucional")
        $texto .= utf8_decode(" - Programa Interinstitucional de PÃ³s-graduaÃ§Ã£o em EstatÃ­stica");
    else
        $texto .= utf8_decode(" - Programa de PÃ³s-GraduaÃ§Ã£o ") . $programa;

    $texto .= utf8_decode(") -- Instituto de CiÃªncias MatemÃ¡ticas e de ComputaÃ§Ã£o, Universidade de SÃ£o Paulo, $ano.\n\n\n");
    $texto .= "   1. " . $assunto1 . ". ";
    if (!empty($assunto2))
        $texto .= "2. $assunto2. ";
    if (!empty($assunto3))
        $texto .= "3. $assunto3. ";
    if (!empty($assunto4))
        $texto .= "4. $assunto4. ";
    if (!empty($assunto5))
        $texto .= "5. $assunto5. ";

    if (empty($nome_coori))
        $texto .= "I. $sobrenome_ori, $nome_ori, orient. II. ";
    else
        $texto .= "I. $sobrenome_ori, $nome_ori, orient. II. $sobrenome_coori, $nome_coori, co-orient. III. ";
    $texto .= utf8_decode("TÃ­tulo. ");


    $pdf = new Cezpdf();

    $ficha = array(array('cod' => "\n" . $codigo, 'ficha' => $texto));

// Gera a ficha em pdf

    $pdf->selectFont('pdf-php/fonts/Helvetica.afm');
    $pdf->ezText("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n");
    $pdf->rectangle(116, 90, 350, 210);
    $pdf->ezText(utf8_decode("Ficha catalogrÃ¡fica elaborada pela Biblioteca Prof. Achille Bassi \ne SeÃ§Ã£o TÃ©cnica de InformÃ¡tica, ICMC/USP, \ncom os dados fornecidos pelo(a) autor(a)\n\n"), 10, array('justification' => 'center'));
    $pdf->selectFont('pdf-php/fonts/Courier.afm');
    $pdf->ezTable($ficha, '', '', array('fontSize' => 9, 'showHeadings' => 0, 'showLines' => 0, 'width' => 340, 'cols' => array('cod' => array('width' => 45))));


    $pdf->ezStream();
}
