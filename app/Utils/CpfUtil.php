<?php

namespace App\Utils;

class CpfUtil
{
    /**
     * @param string $cpf
     * @return string
     * Método responsável por formatar um CPF
     */
    public static function format(string $cpf): string
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $cpf);
    }

    /**
     * @param string $cpf
     * @return string
     * Método responsável por desformatar um CPF
     */
    public static function unformat(string $cpf): string
    {
        return preg_replace('/[^0-9]/is', '', $cpf);
    }

    /**
     * @param string $cpf
     * @return bool
     * Método responsável por validar um CPF.
     * Validações feitas:
     * - Verificação de comprimento.
     * - Verificação de sequências repetidas (como "111.111.111-11").
     * - Validação dos dígitos verificadores.
     */
    public static function validate(string $cpf)
    {
        $cpf = self::unformat($cpf);

        // Verifica se o comprimento do CPF é exatamente 11 caracteres.
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se o CPF é composto por uma sequência repetitiva (ex.: "11111111111").
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Laço para validar os dois dígitos verificadores do CPF.
        for ($t = 9; $t < 11; $t++) {
            $d = 0;

            // Calcula o somatório para o dígito verificador correspondente.
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            // Calcula o dígito verificador (resto da divisão do somatório por 11).
            $d = ((10 * $d) % 11) % 10;

            // Verifica se o dígito verificador calculado é igual ao dígito do CPF.
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
