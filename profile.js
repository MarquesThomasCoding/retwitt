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

const updateButton = () => {
    console.log("test")
    const pProfile = document.querySelector(".infos>p")
    const formProfile = document.querySelector(".form-log-sign")
    const button = document.querySelector(".modif-button")
    pProfile.classList.add("hidden")
    button.classList.add("hidden")
    formProfile.classList.remove("hidden")
}