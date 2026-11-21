import random
def compar_listes(list1,list2):
    if list1==list2 :
       return 1
    else :
        return 0
    

def exist_dans_listes(list1,carac):
    j=0
    deja=0
    taille=len(list1)
    while j<taille and deja==0:
        if list1[j]==carac :
           deja=1
        j=j+1
    return deja



#Debut partie individuelle sans niveaux
def individuel_sans_niveau():
    #lorsque le joueur choisit de jouer seul  
     words=open("fichiermot.txt","r") #lecture du fichier
     lignes=words.readlines()
     mot1=random.choice(lignes) # mot1 est le mot choisi
     tab1=[] #contient les caractères du mot choisi
     tab2=[] #contient les caractères du mot qui sera completé au fur et à mesure
     verifdstab1=0
     verifdstab2=0
     i=0
     longueur_mot1=len(mot1)
     while i<longueur_mot1-1:
         tab1.append(mot1[i])#Rempllissage de tab1 par les caractères de mot1
         tab2.append("_")
         i=i+1
     totalvie=8
     perdu=0
     restevie=totalvie-perdu
     print('Devinez le mot !')
     print("il vous reste "+str(restevie)+" vie(s)")
     print(" ".join(tab2))#affiche tab2 coe chaine de caractère
     print(" ")
     true=compar_listes(tab1,tab2)#recoit le résultat de comparaison de tab1 et tab2
     while perdu < totalvie and true==0:
         lettre=input('choisissez une lettre: ')
         lettre=lettre.lower()
         verifdstab1= exist_dans_listes(tab1,lettre) #return 1 si lettre existe dans
         verifdstab2= exist_dans_listes(tab2,lettre)
         if verifdstab1==0 or verifdstab2==1 : #si lettre n'éxiste pas dans tab1 ou éxiste dans tab2
             echec=1 #augmente le nombre de perte
         else :
             echec=0 #nombre de perte constant
             j=0
             while j<longueur_mot1-1:
                 if tab1[j]==lettre :     #recherche les positions de lettre
                    tab2[j]=lettre        #remplace le _ par la lettre juste
                 j=j+1
         perdu=perdu+echec
         true=compar_listes(tab1,tab2)#recoit le résultat de comparaison de tab1 et tab2
         if true==1 :
             perdu=totalvie
             print(" ".join(tab2))#affiche tab2 coe chaine de caractère
             print("bien joué")
         else :
             restevie=totalvie-perdu
             print('Devinez le mot !')
             print("il vous reste "+str(restevie)+" vie(s)") #affiche tab2 coe chaine de caractère
             print(" ".join(tab2))
             print(" ")
#fin de la partie du jeu individuel_sans_niveau



#Debut partie individuelle à plusieurs niveaux
def individuel_plusieurs_niveaux():
      tableau_des_mots=['victoire','livre','croire','racontrer','television']
      k=0
      totalvie=8
      perdu=0
      niveau=1
      restevie=totalvie-perdu
      taille=len(tableau_des_mots)
      while k<taille and perdu < totalvie:
        print("******** Niveau "+str(niveau)+" *******")
        print(" ")
        mot=tableau_des_mots[k]
        tab1=[] #contient les caractères du mot 
        tab2=[] #contient les caractères du mot qui sera completé au fur et à mesure
        verifdstab1=0
        verifdstab2=0

        i=0
        longueur_mot=len(mot)
        while i<longueur_mot:
	        tab1.append(mot[i])#Rempllissage de tab1 par les caractères de mot
	        tab2.append("_")
	        i=i+1
	
        print('Devinez le mot !')
        print("il vous reste "+str(restevie)+" vie(s)")
        print(" ".join(tab2))#affiche tab2 coe chaine de caractère 
        print(" ")
        true=compar_listes(tab1,tab2)#recoit le résultat de comparaison de tab1 et tab2
        while perdu < totalvie and true==0:
           lettre=input('choisissez une lettre: ')
           lettre=lettre.lower()
           
           verifdstab1= exist_dans_listes(tab1,lettre) #return 1 si lettre existe dans tab1
           verifdstab2= exist_dans_listes(tab2,lettre)
           
                 
           if verifdstab1==0 or verifdstab2==1 : #si lettre n'éxiste pas dans tab1 ou éxiste dans tab2
              echec=1 #augmente le nombre de perte
           else :
              echec=0 #nombre de perte constant
              j=0
              while j<longueur_mot:
                 if tab1[j]==lettre :     #recherche les positions de lettre
                   tab2[j]=lettre        #remplace le _ par la lettre juste
                 j=j+1

           perdu=perdu+echec
           true=compar_listes(tab1,tab2)#recoit le résultat de comparaison de tab1 et tab2
           if true==1 :
                print(" ".join(tab2))#affiche tab2 coe chaine de caractère
                print("bien joué")


           else :
                restevie=totalvie-perdu
                print('Devinez le mot !')
                print("il vous reste "+str(restevie)+" vie(s)") #affiche tab2 coe chaine de caractère
                print(" ".join(tab2))
                print(" ")
        niveau=niveau+1
        k=k+1
        if k==taille:
            print("Vous avez délivré ce jeu")
            print("Felicitations !!!!!!!!!!!")
#fin de la partie du jeu individuel_à plusieurs niveaux
individuel_plusieurs_niveaux()  
