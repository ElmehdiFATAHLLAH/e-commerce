function verif_email(){
var adr=document.getElementById("email").value,test=adr.includes("@");
if(test==false){document.getElementById('msg1').innerHTML="Adresse email invalide !";}
else{document.getElementById('msg1').innerHTML="";}
                      }

function comfirm_mdp(){
 var x=document.getElementById("mdp").value;
 var y=document.getElementById("c_mdp").value;
if(x!=y){
   var r = document.querySelector(':root');

r.style.setProperty('--bc1', '#EC0909');
r.style.setProperty('--dc1', 'inline');
        }
    else{var r = document.querySelector(':root');
    
        r.style.setProperty('--bc1', '#1B1290');
        r.style.setProperty('--dc1', 'none');}                     
                        }

function verif_mdp(){
var x=document.getElementById("mdp").value;
if(x.length<8){
var r = document.querySelector(':root');

        r.style.setProperty('--bc', '#EC0909');
        r.style.setProperty('--dc', 'inline');
}
else{
    var r = document.querySelector(':root');
    
    r.style.setProperty('--bc', '#1B1290');
r.style.setProperty('--dc', 'none');} 
                     }

var captcha;


function printmsg() {
    if(document.getElementById("res").innerHTML=="Captcha reussi"){alert("Test deja reussi.");}
    else{
    const champ = document.getElementById("code").value;
    
    if (champ == captcha.innerHTML) {
        test=true;
        var r = document.querySelector(':root');
    
    r.style.setProperty('--bc2', '#1B1290');
r.style.setProperty('--dc2', 'none');
    }
    else {
        test=false;
        var r = document.querySelector(':root');

        r.style.setProperty('--bc2', '#EC0909');
        r.style.setProperty('--dc2', 'inline');
        generate();
        }
        }
                    }

function generate() {

   // Si le test est deja reussi faire un alert - Lier avec le submit 
    captcha = document.getElementById("image");
    var char = "";

    const liste =
"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for ( i = 0; i < 5; i++) {
        char = char + liste.charAt(Math.round(Math.random() * liste.length));
                              }

    captcha.innerHTML = char;
            
                   }
         
