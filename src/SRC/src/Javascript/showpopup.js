const popup = document.getElementById("popUp");

function showItem(item) {
    const movie = document.getElementsByClassName(item);
    for (let i = 0; i < movie.length; i++) {
        movie[i].style.display = "initial";
    }
    popup.style.display = "initial";


}

function closepopUp() {
    const movieinfo = document.getElementsByClassName("popUpInfo")
    popup.style.display = "";
    for (let i = 0; i < movieinfo.length; i++) {
        movieinfo[i].style.display = "";
    }
    
}