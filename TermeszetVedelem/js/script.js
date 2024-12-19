let prevScrollPos = window.pageYOffset; // Az előző görgetési pozíció
let header = document.querySelector("header"); // A header elem lekérése

// Az ablak görgetése
window.onscroll = function() {
    let currentScrollPos = window.pageYOffset; // Az aktuális görgetési pozíció

    // Ha az oldal tetején vagyunk
    if (currentScrollPos === 0) {
        header.style.top = "0"; // Az oldal tetejénél mindig ott legyen a menü
    } 
    // Ha lefelé görgetünk
    else if (prevScrollPos < currentScrollPos) {
        header.style.top = "-80px"; // Eltüntetjük a menüt, ha lefelé görgetünk
    }
    // Ha felfelé görgetünk és nem vagyunk az oldal tetején
    else if (prevScrollPos > currentScrollPos && currentScrollPos > 0) {
        // A menü ne jelenjen meg felfelé görgetéskor, ha nem vagyunk az oldal tetején
        header.style.top = "-80px"; 
    }

    // Frissítjük az előző pozíciót
    prevScrollPos = currentScrollPos;
};

