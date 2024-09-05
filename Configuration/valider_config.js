function modif_prix(){
    var choix=document.querySelector("#se");
    var prix=document.querySelector("#prix");
    var se=choix.options[choix.selectedIndex].value;
    
    if(se==1){prix.value="3000 dhs";}
    if(se==2){prix.value="4500 dhs";}
    if(se==3){prix.value="5000 dhs";}
                        }
function modif_couleur(){
    var choix=document.querySelector("#couleur");
    var image=document.querySelector("#img");
    var couleur=choix.options[choix.selectedIndex].value;

    if(couleur==1){image.src="boitier_bleu.jpg";}
    if(couleur==2){image.src="boitier_rouge.jpg";}
    if(couleur==3){image.src="boitier_vert.jpg";}    
}