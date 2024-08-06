// Popular cities
const cities = [
    { name: 'Trondheim', lat: 63.4305, lon: 10.3951 },
    { name: 'Alesund', lat: 62.4722, lon: 6.1549 },
    { name: 'Oslo', lat: 59.9139, lon: 10.7522 },
    { name: 'Bergen', lat: 60.3928, lon: 5.3239 }
];

/**
 * 
 * @param {*} city fetches weather data from the YR API for a given city with coordinates (lat, lon)
 * @returns array containing weather data for the next 3 hours.
 */
async function fetchWeatherData(city) {
    const response = await fetch(`https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=${city.lat}&lon=${city.lon}`);
    const data = await response.json(); // Store API data
  
    const timeseries = data.properties.timeseries;
  
    // Get next three hourly timeseries datapoints
    const hourlyData = timeseries.slice(0, 3);
  
    return hourlyData;
  }

  /**
   * Updates the weather table with data from fetchWeatherData function. Iterates through
   * cities array and fetches weather data for the next 3 hours.
   */
  async function updateWeatherTable() {
    for (const city of cities) {
      const hourlyData = await fetchWeatherData(city);
  
      const tableCells = document.querySelectorAll(`.${city.name.toLowerCase()}, .${city.name.toLowerCase()}, .${city.name.toLowerCase()}`);
  
      for (let i = 0; i < hourlyData.length && i < tableCells.length; i++) {
        const temperature = hourlyData[i].data.instant.details.air_temperature;
        tableCells[i].textContent = temperature + ' °C';
      }
    }
  }

  /**
   * Updates the table header with the current hour and the next two hours.
   */
  function updateTableHeader() {
    const now = new Date();
  
    // Round up to the nearest hour
    now.setMinutes(0);
    now.setSeconds(0);
    now.setMilliseconds(0);
    if (now.getMinutes() > 0) {
      now.setHours(now.getHours() + 1);
    }
  
    /**
     * Format time as HH:MM.
     * @param {*} date the date object to format.
     * @returns the formatten time string.
     */
    function formatTime(date) {
      const hours = date.getHours().toString().padStart(2, '0');
      const minutes = date.getMinutes().toString().padStart(2, '0');
      return `${hours}:${minutes}`;
    }
  
    // Update   
    const headerRow = document.querySelector('.city-table thead tr');
    headerRow.children[1].textContent = formatTime(now);
    headerRow.children[2].textContent = formatTime(new Date(now.getTime() + 60 * 60 * 1000)); // Add 1 hour
    headerRow.children[3].textContent = formatTime(new Date(now.getTime() + 2 * 60 * 60 * 1000)); // Add 2 hours
  }

  updateTableHeader();
  
  setInterval(updateTableHeader, 3600000); // Update every hour

  updateWeatherTable();