

let showDiv = document.getElementById("addRep");
let hiddenDiv = document.getElementById('hidden');
let flag = true;


    showDiv.addEventListener("click", function (){
        if(flag === true){
            let area = document.createElement('textarea');
            let button = document.createElement('button');
            button.setAttribute('type', 'submit');
            button.setAttribute('value', 'envoyer');
            button.innerHTML = 'Envoyer';
            area.id = "divRep";
            area.setAttribute('addRep','post');
            area.setAttribute('maxlength', 5000);
            area.setAttribute('cols',100);
            area.setAttribute('rows', 10);
            hiddenDiv.appendChild(area);
            hiddenDiv.appendChild(button);
            flag = false;
        }
    })






