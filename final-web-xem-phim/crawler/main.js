let tab01 = document.getElementById("tab-01");
let moviesHrefTab01 = [...tab01.getElementsByClassName("film-poster-ahref")]

moviesHrefTab01.forEach(function(movieHref) {
    console.log(movieHref.href)    
})


// tab02
let moviesHref = [...document.getElementsByClassName("film-poster-ahref")]

moviesHref.forEach(function(movieHref) {
    console.log(movieHref.href)    
})