<?php

namespace App\Models;

// Création de la classe User pour représenter l'utilisateur

class User 
{
    protected int $id_utilisateur;
    protected string $prenom_utilisateur;
    protected string $nom_utilisateur;
    protected string $email_utilisateur;
    protected string $password_utilisateur;
    protected string $bio_utilisateur;  

    // getters et setters de la classe User

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_utilisateur;
    }

    /**
     * @param int $id
     */
    public function setId(int $id_utilisateur): void
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email_utilisateur;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email_utilisateur): void
    {
        $this->email_utilisateur = $email_utilisateur;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->prenom_utilisateur;
    }

    /**
     * @param string $name
     */
    public function setName(string $prenom_utilisateur): void
    {
        $this->prenom_utilisateur = $prenom_utilisateur;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->nom_utilisateur;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $nom_utilisateur): void
    {
        $this->nom_utilisateur = $nom_utilisateur;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password_utilisateur;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password_utilisateur): void
    {
        $this->password_utilisateur = $password_utilisateur;
    }

    /**
     * @return string
     */

    public function getBio(): string
    {
        return $this->bio_utilisateur;
    }

     /**
     * @param string $password
     */

     public function setBio(string $bio_utilisateur): void
     {
         $this->bio_utilisateur = $bio_utilisateur;
     }

}