# Contacts PHP + SQL sécurisé

        - Template de juin 2025 : Formulaire + bdd SQL + Interface Admin


<img width="960" alt="Capture d'écran_20250627_095037" src="https://github.com/user-attachments/assets/75134733-7a35-4d42-9cb8-7a63f6c93ba8" />

## Formulaire de contact

        - ✅ 6 input de renseignement (mail, nom, statut, siteweb, numéro, message)
        - ✅ redirection user
        - ✅ enregistrement dans bdd SQL
        - ⚠️ Vérifier l'envoie de mail auto au client en plus de l'enregistrement dans la bdd

<img width="960" alt="Capture d'écran_20250616_224313" src="https://github.com/user-attachments/assets/e314ea0a-55f0-43f1-8239-8383273232b5" />

## Interface admin


        - ✅ Accés via mdp (hashé)
        - ✅ Récup bdd
        - ✅ Recherche par mot clef / date etc
        - ✅ Réponse par mail via lien
        - ✅ mdp hashé
        - ⚠️ mdp bdd en clair ( à finir ou config dans hébergeur)
        - ⚠️ Features (Export / import de bdd, alert de mess reçu) non fonctionnel !
        - ⚙️ Ajouter "créer une facture à partir du mail reçu".

<img width="960" alt="dev (4)" src="https://github.com/user-attachments/assets/015d676d-e676-43a1-a087-53aabbda9547" />


#### Bonne base de travail à revoir niveau sécurité (testé via SQLMap)
