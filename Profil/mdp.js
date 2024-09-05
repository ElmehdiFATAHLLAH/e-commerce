function check_mdp(){
	var mdp=document.querySelector("#mdp").value;
    if(mdp.length<8){err1=true;}
    else{err1=false;}
    var c_mdp=document.querySelector("#c_mdp").value;
    if(mdp!=c_mdp){err2=true;}
    else{err2=false;}

    if(!err1 && !err2){return true;}
    if(err1 && !err2){alert("Mot de passe min. 8 caractères"); return false;}
    if(!err1 && err2){alert("Confirmation mot de passe incorrect"); return false;}
    if(err1 && err2){alert("Mot de passe min. 8 caractères"); return false;}


}