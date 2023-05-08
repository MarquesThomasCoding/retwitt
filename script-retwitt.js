const all = document.querySelector("*")

const menu = document.querySelector("i.menu")
const sideBarMobile = document.querySelector(".side-bar-mobile")


menu.addEventListener('click', reaction => {
    sideBarMobile.classList.toggle("oppened")
    all.classList.toggle("no-overflow")
})

const reload = document.querySelector("#reload")

reload.addEventListener("click", reaction => {
    reload.style.transform = "rotate(360deg)"
    setTimeout(function(){
        window.location.reload();
     }, 2000);
})

const options = document.querySelectorAll(".options")

options.forEach(option => {
    option.addEventListener("mouseover", reaction => {
        option.style.cursor = "pointer"
        option.classList.remove("fa-regular")
        option.classList.add("fa-solid")
    })
    option.addEventListener("mouseout", reaction => {
        option.style.cursor = "pointer"
        option.classList.remove("fa-solid")
        option.classList.add("fa-regular")
    })
})

const filters = document.querySelector(".filters")
const tagsFilters = document.querySelector(".tags-filter")
const tagsMenu = document.querySelector(".tags-menu")
const tagsContent = document.querySelector(".tags-content")
const tagI = tagsFilters.querySelector("i")

tagsMenu.addEventListener("click", reaction => {
    if(getComputedStyle(tagsContent).display === "none") {
        filters.style.marginBottom = "5.5vh"
        tagI.style.transform = "rotate(180deg)"
        tagsContent.style.display = "flex"
    }
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

tagChoice.forEach(tag => {
    tag.addEventListener("click", reaction => {
        tag.classList.add("tag-active")
        tagChoice.forEach(t => {
            if(t != tag) {
                t.classList.remove("tag-active")
            }
        })

        tags.forEach(tagged => {
            if(tag.id == "all") {
                post.forEach(p => { p.classList.remove("hidden") })
            }
            else if(tagged == tag.id) {
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

const newPost = document.querySelector("#new-post")

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

newPost.addEventListener('click', reaction => {
    posts.classList.toggle("blur")
    all.classList.toggle("no-overflow")
    if(getComputedStyle(newPostContent).display === "flex") {
        newPostContent.style.display = "none"
    }
    else {
        newPostContent.style.display = "flex"
    }
})