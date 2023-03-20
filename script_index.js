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
    'home': ['flex', 0],
    'compte': ['block', 1],
    'add_cours': ['block',2],
    'add_question': ['block',3],
    'chapitres': ['block',4],
}

function afficher(e){
    for(i = 0; i < sections.length; i++){
        sections[i].style.display = 'none';
    }

    sections[display_pages[e][1]].style.display = display_pages[e][0];
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

    var params = new URLSearchParams();
    params.append('matiere', matiere);

    fetch('fetch/envoie_matiere.php', {
      method: 'POST',
      body: params
    });
});

/* =================================================================
    Recherche matiere
================================================================= */

let Imatiere = document.getElementById('input_matiere');
let matieres = document.querySelectorAll('#liste_matiere p');

Imatiere.addEventListener('keyup', function(){

    var re = new RegExp('.*' + Imatiere.value + '.*');

    for(i = 0; i < matieres.length; i++){
        if(matieres[i].innerHTML.match(re)){
            matieres[i].style.display = 'block';
        }else{
            matieres[i].style.display = 'none';
        }
    }
});

/* =================================================================
    Ajouter Chapitre
================================================================= */

let ajouter_chapitre = document.getElementById('b_add_chapitre');

ajouter_chapitre.addEventListener('click', function(){
    
    let chapitre = document.getElementById('chapitre').value;
    let n_chapitre = document.getElementById('n_chapitre').value;
    let matiere = document.getElementById('matiere_select_chapitre').value;

    if(chapitre != '' && matiere != '' && n_chapitre != ''){
        console.log(chapitre, matiere, n_chapitre);
        var params = new URLSearchParams();
        params.append('titre', chapitre);
        params.append('matiere', matiere);
        params.append('n_chapitre', n_chapitre);
        fetch('fetch/envoie_chapitre.php', {
            method: 'POST',
            body: params
        })
    }else{
        alert('Veuillez remplir tous les champs');
    }
});

/* =================================================================
    Ajouter Question
================================================================= */

let ajouter_question = document.getElementById('b_add_question');

ajouter_question.addEventListener('click', function(){
    let question = document.getElementById("question").value;
    let matiere = document.getElementById("matiere_select_question").value;
    let chapitre = document.getElementById("chapitre_select_question").value;
    var re = new RegExp('-\w*.*');
    chapitre = chapitre.substring(chapitre.match(re)['index']+2)

    console.log(question,matiere,chapitre);
    
    var params = new URLSearchParams();
    params.append('question', question);
    params.append('matiere', matiere);
    params.append('chapitre', chapitre);

    fetch('fetch/envoie_question.php', {
        method: 'POST',
        body: params
        })

});
/* =================================================================
    Choisir chapitre
================================================================= */

let chapitres_matiere = document.getElementById("chapitres");
let liste_chapitres_matiere = document.getElementById("liste_chapitres");
var chapitres;

matieres.forEach(function(matiere) {
    matiere.addEventListener('click', function() {
        var params = new URLSearchParams();
        params.append('matiere', matiere.textContent);

        fetch('fetch/liste_chapitres.php', {
        method: 'POST',
        body: params
        }).then(response => response.json())
        .then(result => {
            liste_chapitres_matiere.innerHTML = '';
            for(i = 0; i < result.length; i++){
                liste_chapitres_matiere.innerHTML += '<p>' + result[i][0] + ' - ' + result[i][1] + '</p>';
            }

            afficher(chapitres_matiere.getAttribute('id'));

            chapitres = document.querySelectorAll('#liste_chapitres p');
            console.log(chapitres);
        })
        
    });
});

/* =================================================================
    Choix chapitre ajout question
================================================================= */

let select_matiere = document.getElementById('matiere_select_question');

select_matiere.addEventListener('change', function(e){
    console.log(e.target.value);
    fetch('fetch/liste_chapitres.php', {
    method: 'POST',
    body: params
    }).then(result => result.json())
    .then(result => {
        let select_chapitre = document.getElementById('chapitre_select_question');
        select_chapitre.innerHTML = '';
        for(i = 0; i < result.length; i++){
            select_chapitre.innerHTML += '<option data="' + $chapitre['titre'] + '">' + result[i][0] + ' - ' + result[i][1] + '</option>'
        }
        console.log(result);
    })
});

/* =================================================================
    Lancer Quiz
================================================================= */

let quiz = document.getAnimations("quiz");

chapitres_matiere.addEventListener('click', function(e){
    chapitres.forEach(function(chapitre) {

        if(chapitre.textContent == e.target.textContent){
            var params = new URLSearchParams();
            params.append('chapitre', chapitre.textContent);
            console.log(e.target.textContent);

            // fetch('fetch/liste_questions.php', {
            // method: 'POST',
            // body: params
            // }).then(response => response.json())
            // .then(result => {
            //     console.log(result);
            // })
        }
    });
});
