var config = {
    cUrl: 'https://countriesnow.space/api/v0.1/countries',
};

function loadCountries() {
    let apiEndPoint = config.cUrl;

    fetch(apiEndPoint)
        .then(Response => Response.json())
        .then(data => {
            console.log(data);
            let countries = data.data;

            let countrySelect = document.getElementById('countryList');

            // Create placeholder option
            let placeholderOption = document.createElement('option');
            placeholderOption.value = '';
            placeholderOption.textContent = 'Select Country';
            placeholderOption.disabled = true;
            placeholderOption.selected = true;
            countrySelect.appendChild(placeholderOption);

            countries.forEach(country => {
                let option = document.createElement('option');
                option.value = country.country;
                option.textContent = country.country;
                countrySelect.appendChild(option);
            });
        })
        .catch(error => {
            console.log("Error fetching country", error);
        });
}

window.onload = loadCountries;
