// Effets du clic sur le menu :

// Selection de tous les éléments du document
const all = document.querySelector("*")

// Sélection de l'élément "menu" et de la barre de navigation sur mobile
const menu = document.querySelector("i.menu")
const sideBarMobile = document.querySelector(".side-bar-mobile")

menu.addEventListener('click', reaction => {
    // Ajout ou suppression de la class "oppened" de la barre de navigation mobile (la faisant apparaitre ou disparaitre)
    sideBarMobile.classList.toggle("oppened")
    // Ajout ou suppression de la class "no-overflow" de tous les éléments du document (permettant ou non de scroller)
    all.classList.toggle("no-overflow")
})



// Rechargement de la page via le symbole situé sur la barre de navigation :

const reload = document.querySelector("#reload")

reload.addEventListener("click", reaction => {
    // Changement du style de l'élément, en le faisant tourner de 360 degrés
    reload.style.transform = "rotate(360deg)"
    // Intervalle de 2 secondes avant de recharger la page
    setTimeout(function(){
        window.location.reload();
     }, 2000);
})



// Style appliqué sur les options situées au bas des posts lors du survol avec la souris :

const options = document.querySelectorAll(".options")

options.forEach(option => {
    option.addEventListener("mouseover", reaction => {
        // Souris sur l'option -> l'icone apparait "rempli"
        option.classList.remove("fa-regular")
        option.classList.add("fa-solid")
    })
    option.addEventListener("mouseout", reaction => {
        // Souris sortie -> l'icone apparait "vide"
        option.classList.remove("fa-solid")
        option.classList.add("fa-regular")
    })
})



// Sélection des tags pour filtrer les posts :

const filters = document.querySelector(".filters")
const tagsFilters = document.querySelector(".tags-filter")
const tagsMenu = document.querySelector(".tags-menu")
const tagsContent = document.querySelector(".tags-content")
const tagI = tagsFilters.querySelector("i")

tagsMenu.addEventListener("click", reaction => {
    // Si les tags ne sont pas visibles, on les fait apparaitre
    if(getComputedStyle(tagsContent).display === "none") {
        filters.style.marginBottom = "5.5vh"
        tagI.style.transform = "rotate(180deg)"
        tagsContent.style.display = "flex"
    }
    // Sinon on les cache
    else {
        filters.style.marginBottom = "0"
        tagI.style.transform = "rotate(0deg)"
        tagsContent.style.display = "none"
    }
})

const tagChoice = document.querySelectorAll(".tag-choice")
const tags = [
    "voyage",
    "jeu-video",
    "innovation",
    "musique",
    "television",
    "animaux",
    "peinture",
    "lecture",
    "sport",
    "loisirs"
]

const post = document.querySelectorAll(".post")

// Pour chaque post, on ajoute un écouteur de clic
tagChoice.forEach(tag => {
    tag.addEventListener("click", reaction => {
        //Lors du clic sur un tag, on le définit en "actif" et on enlève cette class aux autres tags
        tag.classList.add("tag-active")
        tagChoice.forEach(t => {
            if(t != tag) {
                t.classList.remove("tag-active")
            }
        })

        // On affiche uniquement les posts possedant le tag sélectionné
        tags.forEach(tagged => {
            if(tag.classList.contains("all")) {
                post.forEach(p => { p.classList.remove("hidden") })
            }
            else if(tagged == tag.classList[1]) {
                post.forEach(p => {
                    if(!p.classList.contains(tagged)) {
                        p.classList.add("hidden")
                    }
                    else {
                        p.classList.remove("hidden")
                    }
                })
            }
        })
    })
})



// Création d'un nouveau post :

const newPost = document.querySelector("#new-post")

// Style appliqué au bouton pour faire un nouveau post
newPost.addEventListener('mouseover', reaction => {
    newPost.classList.remove("fa-regular")
    newPost.classList.add("fa-solid")
})

newPost.addEventListener('mouseout', reaction => {
    newPost.classList.remove("fa-solid")
    newPost.classList.add("fa-regular")
})


const newPostContent = document.querySelector(".new-post-content")
const posts = document.querySelector(".posts")
const profile = document.querySelector(".profile-card")
const twittContent = newPostContent.querySelector("#twitt-content")

// On vérifie si l'utilisateur avait déjà commencé à écrire quelque chose
if(localStorage.getItem('twitt-content') == null) {
    twittContent.value = ""
}
else {
    twittContent.value = localStorage.getItem('twitt-content')
}

// On floute les éléments situés sous le pop-up du nouveau post, on empêche le scroll et on affiche le pop-up
newPost.addEventListener('click', reaction => {
    posts.classList.toggle("blur")
    if(profile) {
        profile.classList.toggle("blur")
    }
    all.classList.toggle("no-overflow")
    if(getComputedStyle(newPostContent).display === "flex") {
        newPostContent.style.display = "none"
    }
    else {
        newPostContent.style.display = "flex"
    }
    // Sauvegarde du texte écrit par l'utilisateur lors de la fermeture du pop-up sans publication du post
    localStorage.setItem('twitt-content', twittContent.value)
})