// everything's in lower case for simplicity's sake.
const europeanCountries = [
  "albania",
  "andorra",
  "austria",
  "belarus",
  "belgium",
  "bosnia",
  "bulgaria",
  "croatia",
  "cyprus",
  "czech republic",
  "czechia",
  "denmark",
  "estonia",
  "finland",
  "france",
  "germany",
  "greece",
  "hungary",
  "iceland",
  "ireland",
  "italy",
  "kosovo",
  "latvia",
  "liechtenstein",
  "lithuania",
  "luxembourg",
  "malta",
  "moldova",
  "monaco",
  "montenegro",
  "netherlands",
  "macedonia",
  "norway",
  "poland",
  "portugal",
  "romania",
  "russia",
  "san marino",
  "serbia",
  "slovakia",
  "slovenia",
  "spain",
  "sweden",
  "switzerland",
  "ukraine",
  "united kingdom",
  "Great Britain",
  "vatican",
];

// API utilization
document.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    search();
  }
});

// API data aquisition
function search() {
  const searchCountry = document.querySelector(".search-country").value;

  let checkName = searchCountry == "czechia" ? "Czech Republic" : searchCountry;

  // this piece of code sets up a cookie, the cookie is passed over to info.php where it can be utilized for SQL manipulation
  document.cookie = "js_var_value = " + checkName;

  // this piece of code reloads the php part of the app so the cookie is always up to date

  if (europeanCountries.includes(searchCountry.toLowerCase().trim())) {
    // searching for Ireland outputs United Kingdom by default, this code serves to fix API bug.
    let apiUrl =
      searchCountry === "ireland"
        ? `https://restcountries.com/v3.1/alpha?codes=372`
        : `https://restcountries.com/v3.1/name/${searchCountry}`;

    if (searchCountry)
      fetch(apiUrl)
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          // console.log(data);
          // country name
          const countryName = data[0].name.common;
          document.querySelector(".country-name").innerHTML = countryName;

          //national flag
          const srcNF = data[0].flags.png;
          let nationalFlag = document.querySelector(".national-flag");
          nationalFlag.src = srcNF;
          //  coat of arms
          const srcCOA = data[0].coatOfArms.png;
          let coatOfArms = document.querySelector(".coat-of-arms");
          coatOfArms.src = srcCOA;
          // un flag
          const isMemberOfUn = data[0].unMember;
          let unitedNations = document.querySelector(".united-nations-flag");
          if (isMemberOfUn === true) {
            const srcUNF =
              "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Flag_of_the_United_Nations.svg/1200px-Flag_of_the_United_Nations.svg.png";
            unitedNations.src = srcUNF;
          } else {
            const srcNUNF =
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Anti-UN.png/800px-Anti-UN.png";
            unitedNations.src = srcNUNF;
          }
          // geo information
          let geoMapContainer = document.querySelector(".geo-map-container");

          // region
          const srcRegion =
            "<p class='region-name'> Region: " + data[0].region + " </p>";

          document.querySelector(".region").innerHTML = srcRegion;

          // sub-region
          const srcSubRegion = data[0].subregion;
          document.querySelector(".sub-region").innerHTML =
            "Sub-region: " + srcSubRegion;
          // capital
          const srcCapital = data[0].capital[0];
          document.querySelector(".capital").srcCapital;
          // land-lock validation
          const srcLandLocked = data[0].landlocked;
          if (srcLandLocked === true) {
            document.querySelector(".land-lock").innerHTML =
              countryName + " is a land locked country.";
          } else {
            document.querySelector(".land-lock").innerHTML =
              countryName + " is not a land locked country.";
          }
          // independence validation
          const srcIndependent = data[0].independent;
          if (srcIndependent === true) {
            document.querySelector(".independence").innerHTML =
              countryName + " is an independent country.";
          } else {
            document.querySelector(".independence").innerHTML =
              countryName + " is not an independent country.";
          }
          // population
          const srcPopulation = data[0].population;
          document.querySelector(".population").innerHTML =
            countryName +
            " has an approximate population of " +
            (srcPopulation / 1000000).toFixed(2) +
            " million people.";
          // map url
          const srcMap = data[0].maps.openStreetMaps;
          let createAnchor = document.createElement("a");
          createAnchor.href = srcMap;
          createAnchor.innerHTML = `take a look at ${countryName} on openStreetMaps`;
          createAnchor.target = "_blank";
          while (geoMapContainer.firstChild) {
            geoMapContainer.removeChild(geoMapContainer.firstChild);
          }
          geoMapContainer.appendChild(createAnchor);

          // API INFO APPEARS ONLY WHEN API IS CALLED ***IMPORTANT***
          document.querySelector(".country-info").style.visibility = "visible";

          // INFO.PHP CODE *****IMPORTANT*******
          var iframe = document.getElementById("phpframe");
          iframe.src = iframe.src;
          iframe.style.display = "block";

          // ------------------------------------------------------------------------------------

          // the following block of code loops over the "neighborList" array
          //and passes each array value to the Async URL
          //the purpose of this block is to return the array of the selected country's neighbors' flags
          //       const neighborList = data[0].borders;
          //       for(let i = 0; i < neighborList.length; i++) {
          //       const neighborUrl = `https://restcountries.com/v3.1/alpha?codes=${data[0].borders[i]}`;
          //       fetch(neighborUrl)
          //       .then((response) => {
          //         return response.json();
          //       })
          //         .then((data) => {

          //           const neighbor = document.querySelector('.neighbor');
          //           const neighborFlag = data[0].flags.png;
          //           let imageLi = document.createElement('img');
          //           imageLi.src = neighborFlag;
          //           imageLi.alt = "Flag image";
          //           neighbor.appendChild(imageLi);
          //         })
          //       };
        });
  }
}
// This block of code utilizies ASYNC to send values from JS to PHP
// function getData() {
//   var tar_country = document.querySelector('.search-country').value;

//   if (tar_country.length > 1) {
//     let xhttp = new XMLHttpRequest();

//     xhttp.onreadystatechange = function() {
//       if (xhttp.readyState === 4 && xhttp.status === 200) {
//         // Handle the response from the PHP script here
//         var response = xhttp.responseText;
//         console.log(response);
//       }
//     };

//     xhttp.open("POST", "index.php?country=" + encodeURIComponent(tar_country));
//     xhttp.send();
//   }
// }
