# Les bases de PHP

## Inclusions de fichiers
- include : `include 'page.php';`
	inclut et excecute le fichier spécifié.
	
- require : `require 'page.php';`
	inclut et excecute le fichier spécifié, il produit également une erreur fatale quand survient une erreur.
	
## Boucles
- Boucle switch:  

```php
switch (n){  
	case "cas1" : 
		instructions a exécuter si cas1 = n;  
		break;  
	case "cas2":  
		instructions a exécuter si n = cas2;  
		break;  
	default :  
		instructions à exécuter si n est différents de tous les cas ci-dessus;  
}
```

## Conditions
- if / elseif / else :
```php
if(condition){
	instructructions à exécuter si la condition est `true`;
}elseif{
	instructructions à exécuter si la 1ère condition est `false` et que celle-ci est `true`;
}else{
	instructructions à exécuter si toutes les conditions sont `false`;
}
```

## Variables superglobales
- `$_GET` : Tableau associatif contenant des données collectées via les paramètres d'URL.
- `$_POST` : Tableau associatif contenant les données collectées lorsqu'un formulaire HTML est soumis avec la méthode POST.
