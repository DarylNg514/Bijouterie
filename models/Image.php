<?php

class Image extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "Image";
    }

    /**
     * @param $data
     * @return bool
     */
    public function ajouter($data)
    {
        $this->sql = "insert into $this->table(id_bijoux,chemin_image) 
                                        value(:id_bijoux,:chemin_image)";
        return $this->getLines($data, null);
    }
    public function update($id_bijoux, $nouveau_chemin)
    {
        $this->sql = "UPDATE $this->table 
                      SET chemin_image = :nouveau_chemin 
                      WHERE id_bijoux = :id_bijoux";
        $params = [
            'id_bijoux' => $id_bijoux,
            'nouveau_chemin' => $nouveau_chemin
        ];
        return $this->getLines($params, null);
    }

}