<?php

class ContaCorrente extends Conta {
    public $limite;
    // metodo construtor sobrescrito //
    public function __construct($agencia, $codigo, $datacriacao, $titular, $senha, $saldo, $limite) {
        // chamada do método construtor da classe pai //
        parent::__construct($agencia, $codigo, $datacriacao, $titular, $senha, $saldo);
        $this->limite = $limite;
    }

    // metodo retirar sobrescrito
    public function retirar($quantia) {
        $cpmf = 0.05;

        if ($this->saldo + $this->limite >= $quantia) {
            parent::retirar($quantia);
            parent::retirar($quantia * $cpmf);
        } else {
            echo "Retirada não permitida... \n";
            return false;
        }
        return true;
    }
}