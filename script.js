let weather = {
    apikey : "45a80b2081fb8e7cb8caf2c4b0647939",
    fetchWeather:function(city) {
        fetch("https://api.openweathermap.org/data/2.5/weather?q=" 
        + city 
        + "&appid="
        + this.apikey )
        .then((response)=>response.json()) 
        .then((data)=> this.displayWeather(data));
    },
    displayWeather : function(data){
        const {name} = data;
        const {icon,description} = data.weather[0];
        const {temp,humidity} = data.main;
        const {speed} = data.wind;
        document.querySelector(".city").innerText = "Weather in "+name;
        document.querySelector(".icon").src="https://openweathermap.org/img/wn/"
         + icon + "@2x.png";
        document.querySelector(".description").innerText=description;
        document.querySelector(".temp").innerText=temp +"°";
        document.querySelector(".humidity").innerText="Humidity : "
        +humidity+"%";
        document.querySelector(".wind").innerText="Wind Speed : "
        +speed+"km/h";
        document.querySelector(".weather").classList.remove("loading");
    },
    search:  function(){
        this.fetchWeather(document.querySelector(".search-bar").value);
    },

};
document.querySelector(".search button").addEventListener("click",function (){
    weather.search();

});
document.querySelector(".search-bar").addEventListener("keyup",function(event){
    if(event.key == "Enter"){
        weather.search();
    }
});
weather.fetchWeather("Pune");