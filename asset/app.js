

let showDiv = document.getElementById("addRep");
let hiddenDiv = document.getElementById('hidden');
let flag = true;


    showDiv.addEventListener("click", function (){
        if(flag === true){
            hiddenDiv.style.display= 'block';

            flag = false;
        }
    })






