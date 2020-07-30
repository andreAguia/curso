<?php

namespace Source\Members;

class Config
{
    # As constantes são elementos da classe e não do objeto
    # Após o php 7 é que as constantes puderam usar as restrições de acesso

    public const COMPANY = "UpInside";
    protected const DOMAIN = "upinside.com.br";
    private const SECTOR = "Educação";

    # Agora em propriedades, podemos fazer o mesmo comportamento das constantes
    # Ou seja. Fazermos que elas sejam propriedades da Classe e não do objeto.
    # Faz-se isso definindo com static

    public static $company;
    public static $domain;
    public static $sector;

    # Agora com uma função que manipula as propriedades
    # eu poderia definí-las como private

    public static function setConfig($company, $domain, $sector)
    {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }

}
