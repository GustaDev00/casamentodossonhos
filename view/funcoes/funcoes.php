<?php

function validar_cnpj($cnpj)
{
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
}

function criar_mascara_ip($email)
{
    $ip_array = explode('.', $email);
    $ip_mask = "$ip_array[0].$ip_array[1].$ip_array[2]";
    return $ip_mask;
}

function check_bannedips($email)
{
    $banned_array = file('../Banimento.php/checkBan.txt'); // carregar lista de ips numa array
    for ($counter=0; $counter < sizeof($banned_array); $counter++) {
        if (criar_mascara_ip($email) == criar_mascara_ip($banned_array[$counter])) {
            echo 'Seu IP foi banido do site';
            exit;
        }
    }
}


