<?php  

require("../../../../../../wp-load.php");

$correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=24340000&sCepDestino=24340160&nVlPeso=4&nCdFormato=1&nVlComprimento=27&nVlAltura=9&nVlLargura=18&sCdMaoPropria=n&nVlValorDeclarado=0.50&sCdAvisoRecebimento=s&nCdServico=41106&nVlDiametro=10&StrRetorno=xml";

$xml = simplexml_load_file($correios);
print_r($xml);
 ?>