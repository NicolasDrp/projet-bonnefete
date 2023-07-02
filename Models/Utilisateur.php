<?php

namespace App\Models;

// Création de la classe Utilisateur pour représenter l'utilisateur

class Utilisateur {
    protected int $id_utilisateur;
    protected string $prenom_utilisateur;
    protected string $nom_utilisateur;
    protected string $email_utilisateur;
    protected string $password_utilisateur;
    protected string $bio_utilisateur;
    protected bool $est_moderateur;
    protected bool $est_super_admin;

    // getters et setters de la classe Utilisateur

    public function getIdUtilisateur(): int {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(int $id_utilisateur): void {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getPrenomUtilisateur(): string {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): void {
        $this->prenom_utilisateur = $prenom_utilisateur;
    }

    public function getNomUtilisateur(): string {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): void {
        $this->nom_utilisateur = $nom_utilisateur;
    }

    public function getEmailUtilisateur(): string {
        return $this->email_utilisateur;
    }

    public function setEmailUtilisateur(string $email_utilisateur): void {
        $this->email_utilisateur = $email_utilisateur;
    }

    public function getPasswordUtilisateur(): string {
        return $this->password_utilisateur;
    }

    public function setPasswordUtilisateur(string $password_utilisateur): void {
        $this->password_utilisateur = $password_utilisateur;
    }

    public function getBioUtilisateur(): string {
        return $this->bio_utilisateur;
    }

    public function setBioUtilisateur(string $bio_utilisateur): void {
        $this->bio_utilisateur = $bio_utilisateur;
    }

    public function isEstModerateur(): bool {
        return $this->est_moderateur;
    }

    public function setEstModerateur(bool $est_moderateur): void {
        $this->est_moderateur = $est_moderateur;
    }

    public function isEstSuperAdmin(): bool {
        return $this->est_super_admin;
    }

    public function setEstSuperAdmin(bool $est_super_admin): void {
        $this->est_super_admin = $est_super_admin;
    }
}
