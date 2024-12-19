document.getElementById("footprint-form").addEventListener("submit", function(event) {
    event.preventDefault();

    // Az inputok lekérése
    const electricity = parseFloat(document.getElementById("electricity").value);  // kWh
    const car = parseFloat(document.getElementById("car").value);  // km
    const meat = parseFloat(document.getElementById("meat").value);  // adag
    const flights = parseFloat(document.getElementById("flights").value);  // alkalom

    // Áram ökolábnyoma (1 kWh ~ 0.92 kg CO2)
    const electricityFootprint = electricity * 0.92;

    // Autó ökolábnyoma (1 km autóval ~ 0.18 kg CO2, de ha elektromos autó, akkor alacsonyabb)
    const carFootprint = car === 0 ? 0 : car * 0.18; // Ha nincs autó, akkor 0 kg CO2

    // Hús ökolábnyoma (1 adag hús ~ 10 kg CO2, de ha nem eszik húst, akkor 0)
    const meatFootprint = meat === 0 ? 0 : meat * 10;

    // Repülőút ökolábnyoma (1 repülőút ~ 100 kg CO2, ha nincs repülés, akkor 0)
    const flightsFootprint = flights === 0 ? 0 : flights * 100;

    // Az összesített ökolábnyom kiszámítása
    const totalFootprint = electricityFootprint + carFootprint + meatFootprint + flightsFootprint;

    // Az eredmény megjelenítése
    document.getElementById("footprint-value").textContent = `A becsült ökolábnyoma: ${totalFootprint.toFixed(2)} kg CO2/hó`;

    let recommendation = "";

    // Kategóriák meghatározása a kapott eredmény alapján
    if (totalFootprint < 100) {
        recommendation = "Ez egy nagyon alacsony ökolábnyom. Gratulálunk a fenntartható életmódhoz!";
    } else if (totalFootprint >= 100 && totalFootprint < 250) {
        recommendation = "Ez egy átlagos ökolábnyom. Van még lehetőség a javításra!";
    } else if (totalFootprint >= 250 && totalFootprint < 400) {
        recommendation = "Ez a számítás a magas ökolábnyomot jelzi. Próbálja csökkenteni az energiafogyasztást és a repülőutakat.";
    } else {
        // Ha a felhasználó nem vegetáriánus, akkor jöhet a húsfogyasztás csökkentésére vonatkozó tanács is
        if (meat > 0) {
            recommendation = "A becsült ökolábnyoma nagyon magas. Próbáljon alternatívákat találni, mint a tömegközlekedés, elektromos autó, és csökkentse a húsfogyasztást.";
        } else {
            recommendation = "A becsült ökolábnyoma nagyon magas. Próbáljon alternatívákat találni, mint a tömegközlekedés és elektromos autó.";
        }
    }

    document.getElementById("recommendation").textContent = recommendation;

    // Az eredmény megjelenítése
    document.getElementById("result").classList.remove("hidden");
});
