

document.querySelector("#btnSearch").addEventListener("click", () =>{
    let text = document.querySelector("#txtSearch").value;
    getWeather(text);
});


async function getWeather(name){
    try{

    const apiKey = "40c844aeb7b348af8cd95840222206";
    const url = `https://api.weatherapi.com/v1/forecast.json?key=${apiKey}&q=${name}&days=10&aqi=yes&alerts=yes`
    
    const response = await fetch(url);
    const data = await response.json();
    newData = [data];
    
    if(!response.ok)
    throw new Error("The result you were looking for were not found.");
    renderWeather(newData[0]);
    arrow(newData[0]);

    
    
    
    console.log(newData);
    console.log(typeof newData)
}

    catch(err){
        renderError(err);
    }
}


function renderWeather(data){
    document.querySelector("#countryDetails").innerHTML = "";
    document.querySelector("#days").innerHTML = "";

    let html = `
        <div class="col-4">
        <div class="row">
        
        <img src="${data.current.condition.icon}" class="img-fluid">
        <h2>${data.current.temp_c}</h2> °C
            </div>
            
        </div>
        <div class="col-8 ">
            <h3 class="card-title">${data.location.country}/${data.location.name}</h3>
        <hr>
        <div class="row mb-1">
             <div class="col-4">Weather</div>
             <div class="col-8">${data.current.condition.text}</div>
        </div>

        <div class="row mb-1">
             <div class="col-4">Humidity</div>
             <div class="col-8">${data.current.humidity}</div>
        </div>

        <div class="row mb-1">
             <div class="col-4">Wind Direction</div>
                <div class="col-8"><svg version="1.1" id="katman_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="30px" height="30px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                <path fill="#DAE2E7" d="M20,0.35C9.15,0.35,0.35,9.15,0.35,20c0,10.85,8.8,19.65,19.65,19.65c10.85,0,19.65-8.801,19.65-19.65
                C39.65,9.15,30.85,0.35,20,0.35z M20,36.5c-9.11,0-16.5-7.391-16.5-16.5c0-9.11,7.39-16.5,16.5-16.5c9.109,0,16.5,7.39,16.5,16.5
                C36.5,29.109,29.109,36.5,20,36.5z"/>
            <path fill="#33B3A0" d="M25.43,19.69l-5.41,9.5l-5.45-9.569l3.81,1.09V7.09c0.59-0.2,1.64-0.38,3.24-0.03v13.67L25.43,19.69z"/>
        </svg></div>
        </div>

        <div class="row mb-1">
             <div class="col-4">Feelslike</div>
             <div class="col-8">${data.current.feelslike_c}</div>
        </div>
        

        </div>

        </div>
    `

   

    let days = `

    <div class="col-md-4">
                <div class="card text-center">
                    <h4 class="card-title"><img src="${data.forecast.forecastday[0].day.condition.icon}"> ${data.forecast.forecastday[0].date }</h4>
                    <div class="card-body">
                        <div class="row">
                            <h6 class="col-6">Avg Temperature</h6>
                            <h5 class="col-6">${data.forecast.forecastday[0].day.avgtemp_c}</h5>
                        </div>

                        <div class="row">
                            <h6 class="col-6">Avg Humiditye</h6>
                            <h5 class="col-6">${data.forecast.forecastday[0].day.avghumidity}</h5>
                        </div>

                        <div class="row">
                            <h6 class="col-6">Sunset</h6>
                            <h6 class="col-6">${data.forecast.forecastday[0].astro.sunset}</h6>
                        </div>

                        <div class="row">
                            <h6 class="col-6">Sunrise</h6>
                            <h6 class="col-6">${data.forecast.forecastday[0].astro.sunrise}</h6>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center">
                    <h4 class="card-title"><img src="${data.forecast.forecastday[1].day.condition.icon}"> ${data.forecast.forecastday[1].date }</h4>
                    <div class="card-body ">
                       <div class="row justify-content-start">
                            <h6 class="col-6">Avg Temperature</h6>
                            <h5 class="col-6">${data.forecast.forecastday[1].day.avgtemp_c}</h5>
                        </div>

                        <div class="row justify-content-start">
                            <h6 class="col-6">Avg Humiditye</h6>
                            <h5 class="col-6">${data.forecast.forecastday[1].day.avghumidity}</h5>
                        </div>

                       <div class="row justify-content-start">
                            <h6 class="col-6">Sunset</h6>
                            <h6 class="col-6">${data.forecast.forecastday[1].astro.sunset}</h6>
                        </div>

                        <div class="row justify-content-start">
                            <h6 class="col-6">Sunrise</h6>
                            <h6 class="col-6">${data.forecast.forecastday[1].astro.sunrise}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center">
                    <h4 class="card-title"><img src="${data.forecast.forecastday[2].day.condition.icon}"> ${data.forecast.forecastday[2].date }</h4>
                    <div class="card-body">
                        <div class="row">
                            <h6 class="col-6">Avg Temperature</h6>
                            <h6 class="col-6">${data.forecast.forecastday[2].day.avgtemp_c}</h6>
                        </div>

                        <div class="row">
                            <h6 class="col-6">Avg Humiditye</h6>
                            <h5 class="col-6">${data.forecast.forecastday[2].day.avghumidity}</h5>
                        </div>

                        <div class="row">
                            <h6 class="col-6">Sunset</h6>
                            <h6 class="col-6">${data.forecast.forecastday[2].astro.sunset}</h6>
                        </div>

                        <div class="row">
                            <h6 class="col-6">Sunrise</h6>
                            <h6 class="col-6">${data.forecast.forecastday[2].astro.sunrise}</h6>
                        </div>
                    </div>
                </div>
            </div>
    
    
    `

    document.querySelector("#days").innerHTML = days;
    document.querySelector("#countryDetails").innerHTML = html;

}


function arrow(data){
    let dir = document.querySelector("#katman_1")

    if(data.current.wind_dir == "W"){
        dir.classList = "w"
    }

    else if(data.current.wind_dir == "E"){
        dir.classList = "e";
    }

    else if(data.current.wind_dir =="S"){
        dir.classList = "s";
    }

    else if(data.current.wind_dir == "N"){
        dir.classList = "n";
    }

    else if(data.current.wind_dir == "W"){
        dir.classList = "w";
    }

    else if(data.current.wind_dir == "NNE" || data.current.wind_dir == "ENE" || data.current.wind_dir == "NE"){ // kuzeyDoğu
        dir.classList = "ne";
    }

    else if(data.current.wind_dir == "SSE" || data.current.wind_dir == "ESE" || data.current.wind_dir == "SE"){ // güneyDoğu
        dir.classList = "se";
    }

    else if(data.current.wind_dir == "SSW" || data.current.wind_dir == "WSW" || data.current.wind_dir == "SW"){ // güneyBatı
        dir.classList = "sw";
    }

    else if(data.current.wind_dir == "WNW" || data.current.wind_dir == "NNW" || data.current.wind_dir == "NW"){ // kuzeyBatı
        dir.classList = "nw";
    }

    

}


function renderError(err){
    const html = `
    <div class="alert alert-danger">
        ${err.message}
    </div>
    `;
    setTimeout(function(){
        document.querySelector("#errors").innerHTML = "";
    },3000);
    document.querySelector("#errors").innerHTML = html;
}
