<?php

class  Auth extends Model
{
    const ADMIN = 1;
    const CLIENT = 2;

    public function __construct()
    {
        parent::__construct();
        $this->table = "Utilisateur";
    }

    public function inscription($data)
    {
        $this->sql = "insert into " . $this->table . "(nom, 
                        prenom, 
                        email, telephone, date_naissance, 
                        id_role, mot_de_passe) value(:nom,:prenom, 
                        :email, :telephone, :date_naissance, 
                        :id_role, :mot_de_passe) ";

        return $this->getLines($data, null);
    }

    public function findByEmail($data)
    {
        $this->sql = "select b.*,r.description from " . $this->table . " b join Role r on b.id_role = r.id_role where email = :email";
        return $this->getLines($data, true);
    }

    public function updateById($data, $id_utilisateur)
{
    $this->sql = "UPDATE " . $this->table . " SET nom = :nom,
     prenom = :prenom,
     email = :email,
     telephone = :telephone,
     date_naissance = :date_naissance,
     mot_de_passe = :mot_de_passe,
     id_role = :id_role
     WHERE id_utilisateur = :id_utilisateur";
     
    // Ajoutez l'ID de l'utilisateur à $data
    $data['id_utilisateur'] = $id_utilisateur;
    
    // Exécutez la requête
    return $this->getLines($data, null);
}


    public function deleteById($data)
    {

        $this->sql = "delete from " . $this->table . " 
        where id_utilisateur = :id_utilisateur";
        return $this->getLines($data, null);


    }
    public function getAllUtilisateurs()
{
    $this->sql = "SELECT * FROM " . $this->table;
    return $this->getLines();
}
public function findById($data)
{
    $this->sql = "SELECT * FROM " . $this->table . " WHERE id_utilisateur = :id_utilisateur";
    return $this->getLines($data, true);
}




}
