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

    /**
     * Obtient l'identifiant de l'utilisateur.
     *
     * @return int L'identifiant de l'utilisateur.
     */
    public function getIdUtilisateur(): int {
        return $this->id_utilisateur;
    }

    /**
     * Définit l'identifiant de l'utilisateur.
     *
     * @param int $id_utilisateur L'identifiant de l'utilisateur.
     */
    public function setIdUtilisateur(int $id_utilisateur): void {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * Obtient le prénom de l'utilisateur.
     *
     * @return string Le prénom de l'utilisateur.
     */
    public function getPrenomUtilisateur(): string {
        return $this->prenom_utilisateur;
    }

    /**
     * Définit le prénom de l'utilisateur.
     *
     * @param string $prenom_utilisateur Le prénom de l'utilisateur.
     */
    public function setPrenomUtilisateur(string $prenom_utilisateur): void {
        $this->prenom_utilisateur = $prenom_utilisateur;
    }

    /**
     * Obtient le nom de l'utilisateur.
     *
     * @return string Le nom de l'utilisateur.
     */
    public function getNomUtilisateur(): string {
        return $this->nom_utilisateur;
    }

    /**
     * Définit le nom de l'utilisateur.
     *
     * @param string $nom_utilisateur Le nom de l'utilisateur.
     */
    public function setNomUtilisateur(string $nom_utilisateur): void {
        $this->nom_utilisateur = $nom_utilisateur;
    }

    /**
     * Obtient l'email de l'utilisateur.
     *
     * @return string L'email de l'utilisateur.
     */
    public function getEmailUtilisateur(): string {
        return $this->email_utilisateur;
    }

    /**
     * Définit l'email de l'utilisateur.
     *
     * @param string $email_utilisateur L'email de l'utilisateur.
     */
    public function setEmailUtilisateur(string $email_utilisateur): void {
        $this->email_utilisateur = $email_utilisateur;
    }

    /**
     * Obtient le mot de passe de l'utilisateur.
     *
     * @return string Le mot de passe de l'utilisateur.
     */
    public function getPasswordUtilisateur(): string {
        return $this->password_utilisateur;
    }

    /**
     * Définit le mot de passe de l'utilisateur.
     *
     * @param string $password_utilisateur Le mot de passe de l'utilisateur.
     */
    public function setPasswordUtilisateur(string $password_utilisateur): void {
        $this->password_utilisateur = $password_utilisateur;
    }

    /**
     * Obtient la biographie de l'utilisateur.
     *
     * @return string La biographie de l'utilisateur.
     */
    public function getBioUtilisateur(): string {
        return $this->bio_utilisateur;
    }

    /**
     * Définit la biographie de l'utilisateur.
     *
     * @param string $bio_utilisateur La biographie de l'utilisateur.
     */
    public function setBioUtilisateur(string $bio_utilisateur): void {
        $this->bio_utilisateur = $bio_utilisateur;
    }

    /**
     * Vérifie si l'utilisateur est modérateur.
     *
     * @return bool True si l'utilisateur est modérateur, sinon False.
     */
    public function isEstModerateur(): bool {
        return $this->est_moderateur;
    }

    /**
     * Définit si l'utilisateur est modérateur.
     *
     * @param bool $est_moderateur True si l'utilisateur est modérateur, sinon False.
     */
    public function setEstModerateur(bool $est_moderateur): void {
        $this->est_moderateur = $est_moderateur;
    }

    /**
     * Vérifie si l'utilisateur est super admin.
     *
     * @return bool True si l'utilisateur est super admin, sinon False.
     */
    public function isEstSuperAdmin(): bool {
        return $this->est_super_admin;
    }

    /**
     * Définit si l'utilisateur est super admin.
     *
     * @param bool $est_super_admin True si l'utilisateur est super admin, sinon False.
     */
    public function setEstSuperAdmin(bool $est_super_admin): void {
        $this->est_super_admin = $est_super_admin;
    }
}
