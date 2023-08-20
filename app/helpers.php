<?php

if (!function_exists('montaTelefone')) {
    function montaTelefone($telefone)
    {
        $telefone = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));
        $telefone = '(' . substr($telefone,0,2) . ') ' . substr($telefone,2,5) .'-'.substr($telefone,7,4);
        return $telefone;
    }
}

if (!function_exists('getFormato')) {
    
    function getFormato($formato)
    {
        switch($formato) {
            case 'MM':
                return 'Mata a Mata';
            case 'PC':
                return 'Pontos Corridos';
            case 'CP':
                return 'Copa';
        }
    }



}

if (!function_exists('validaCPF')) {
 
function validaCPF($cpf) { 
    // Verifica  se ha numero
    if(empty($cpf)) {
        return false;
    }
 
    // Elimina  máscara
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se a qnt é igual a 11
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica  sequências inválidas 
    
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     // Calcula os dígitos verificadores 
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
 
        return true;
    }
}


}
