# Gestion d'un hotel

Vous souhaitez créer **une api** permettant d'effectuer une réservation d'une chambre d'hotel.

### Création d'une réservation
Lors de la réservation, les informations suivantes sont demandées :
- numéro de la chambre
- date et heure d'arrivée
- date et heure de départ
- petit déjeuner inclus ou non
- nombre de personnes

### Vérification du formulaire :
- vérifier que la chambre existe
- vérifier que la chambre est bien disponible à ces dates (et non déjà réservée)
- dates non passées
- Départ > arrivée
- nombre de personnes <= capacité de la chambre

### Retours
- Si ok : création de la réservation
- Si nok : retour erreur détaillée

### Informations
- Créer une page contenant un formulaire basique pour tester
- Penser à créer les tests unitaires
- *Il n'est pas obligatoire de gérer l'authentification à l'API (mais c'est un plus)*
- *Vous pouvez utiliser tous les bundles que vous souhaitez*

### PROCESS

####Framwork 
* Symfony

####Bundle
* Api Platform

####Entity
  *  Room
     *   id
     *  number
     *  stairs
     *  comment
     *  available sleeps
     *  Price
        
   * Booking
      * id
      *  utiliser
      *  Room
      * dateArrival
      * DateDeparture
      * Breackfast (bool)
      * numberOfPax
        
   * user
      * id
      * name
      * email
      * password
        
        
### TODO

* User handle
* Form in client part

### DONE

* Entities
* Data Validation


