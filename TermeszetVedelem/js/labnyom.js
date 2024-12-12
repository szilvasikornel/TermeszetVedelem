document.getElementById("footprint-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const electricity = parseFloat(document.getElementById("electricity").value);
    const car = parseFloat(document.getElementById("car").value);
    const meat = parseFloat(document.getElementById("meat").value);
    const flights = parseFloat(document.getElementById("flights").value);

    const electricityFootprint = electricity * 0.92; // 1 kWh ~ 0.92 kg CO2
    const carFootprint = car * 0.18; // 1 km autóval ~ 0.18 kg CO2
    const meatFootprint = meat * 10; // 1 adag hús ~ 10 kg CO2
    const flightsFootprint = flights * 250; // 1 repülőút ~ 250 kg CO2

    const totalFootprint = electricityFootprint + carFootprint + meatFootprint + flightsFootprint;

    document.getElementById("footprint-value").textContent = `A becsült ökolábnyoma: ${totalFootprint.toFixed(2)} kg CO2/hó`;
    document.getElementById("result").classList.remove("hidden");
});
