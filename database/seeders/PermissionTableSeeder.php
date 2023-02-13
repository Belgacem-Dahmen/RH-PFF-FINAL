<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            

'Espace gestion des demandes',
'Espace principal',
'Attestations',
'ETAT DES DEMANDES PAPIERS ADMINISTRATIF',
'Attestations de travail',
'Attestations de salaire annuel brut',
'Attestions de non bénéfice de prêt',
'Titre de congé payé',
'Certificat de retenue d`impôt sur le revenu',
'ARCHIVES DEMANDES PAPIERS ADMINISTRATIF',
'Congés et Autorisations',
'Etat des Demandes Congés',
'Les congés payés',
'Les congés sans solde',
'Les autorisations de sortie',
'Formulaire de retard',
'ARCHIVES DES DEMANDES',
'Reporting',
'Reporting congés',
'Reporting Demandes Attestations',
'Reporting employés',
'Les Utilisateurs',
'Liste des Utilisateurs',
'Roles Des Utilisateurs',
'les paramètres de gestion',
'Services',
'Equipes',

'Edit Demande Congé',
'Changement Statut',
'Suppr Congé',
'Supp PJ',

'Ajout service',
'Editer service',
'Supprimer service',

'Ajout Equipe',
'Editer Equipes',
'Supprimer Equipes',
'Ajout Roles pour les Utilsateurs',
'Modifier Roles',
'Update Permissions',
'Roles Utilisateur',
'Ajout Role',
'View role',
'Edit role',
'Voir Permissions',
'Ajout Utilisateurs',
'Edit Utilisateur',
'Show User',
            
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}