function valider(){
	var select1=document.querySelector("#processeur");
	var select2=document.querySelector("#carte_mere");
	var select3=document.querySelector("#disque_dur");
	var select4=document.querySelector("#RAM");
	var select5=document.querySelector("#carte_graphique");
	
    if(select1.value=='' || select2.value=='' || select3.value=='' || select4.value=='' || select5.value==''){
    	alert("Veuillez selectionner tous les composants du PC.");    return false;                            }
	else{return true;}
                    }