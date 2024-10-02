<?php

class Panier
{
    const PANIERS = "Paniers";

    public function __construct()
    {
        if (!(isset($_SESSION[self::PANIERS]))) {
            $_SESSION[self::PANIERS] = [];
        }
    }

    public function ajouter($id_bijoux, $quantite)
    {
        $_SESSION[self::PANIERS][$id_bijoux] = $quantite;
    }

    public function supprimer($id_bijoux)
    {
        unset($_SESSION[self::PANIERS][$id_bijoux]);
    }

    public function getAll()
    {
        $Bijouxs = [];
        foreach ($_SESSION[self::PANIERS] as $id_bijoux => $quantite) {
            $Bijoux = new Bijoux();
            $Bijouxs[] = [$quantite, $Bijoux->getOneById(compact('id_bijoux'))];
        }
        return $Bijouxs;

    }

}