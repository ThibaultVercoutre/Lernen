/* =================================================================
    Initialisation
================================================================= */

let sections = document.querySelectorAll('section');

for(i = 1; i < sections.length; i++){
    sections[i].style.display = 'none';
}

/* =================================================================
    Navigation
================================================================= */

let display_pages = {
    'home': 'flex',
    'compte': 'block',
    'add_cours': 'block',
    'add_question': 'block'
}

function afficher(e){
    console.log(e);

    for(i = 0; i < sections.length; i++){
        sections[i].style.display = 'none';
    }

    var i = 0;

    switch(e){
        case 'home': i = 0; break;
        case 'compte': i = 1; break;
        case 'add_cours': i = 2; break;
        case 'add_question': i = 3; break;
    }
    console.log(i, sections[i]);
    sections[i].style.display = display_pages[e];
}

let home = document.getElementById('home');
let compte = document.getElementById('compte');
let add_cours = document.getElementById('add_cours');
let add_question = document.getElementById('add_question');

home.addEventListener('click', function(){
    afficher(home.getAttribute('id'));
})

compte.addEventListener('click', function(){
    afficher(compte.getAttribute('id'));
})

add_cours.addEventListener('click', function(){
    afficher(add_cours.getAttribute('id'));
})

add_question.addEventListener('click', function(){
    afficher(add_question.getAttribute('id'));
})


/* =================================================================
    Nouvelle matiere
================================================================= */

let Bmatiere = document.getElementById('b_add_matiere');


Bmatiere.addEventListener('click', function(){

    let matiere = document.getElementById('matiere').value;
    console.log(matiere);
    var params = new URLSearchParams();
    params.append('matiere', matiere);

    fetch('fetch/envoie_matiere.php', {
      method: 'POST',
      body: params
    })
});