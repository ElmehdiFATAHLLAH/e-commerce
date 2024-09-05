function check_ajout_modif(){
    var nom=document.querySelector("#nom").value;
    var select=document.querySelector("#type");
    var type=select.options[select.selectedIndex].value;
    var qte=document.querySelector("#qte").value;
    var prix=document.querySelector("#prix").value;
    var desc=document.querySelector("#desc").value;
    var img=document.querySelector("#img").value;

    if(nom=='' || type=='' || qte=='' || prix=='' || desc=='' || img==''){
    	alert("Veuillez inserer toutes les donnees."); return false;   }
    else{return true;}	 
}