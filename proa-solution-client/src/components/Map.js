import React, { useEffect, useMemo, useState } from "react";
import axios from "axios";
import {
  useJsApiLoader,
  GoogleMap,
  Marker,
  InfoWindow,
} from "@react-google-maps/api";
import PopupWindow from "./PopupWindow";

// const center = { lat: -37.840935, lng: 144.946457 };

function Map() {
  const [weatherStations, setWeatherStations] = useState([]);
  const [selectedStation, setSelectedStation] = useState(null);

  const { isLoaded } = useJsApiLoader({
    googleMapsApiKey: process.env.GoogleMap_API,
  });

  const center = useMemo(() => ({ lat: -25.274399, lng: 133.775131 }), []);

  useEffect(() => {
    getWeatherStations();
  }, []);

  const getWeatherStations = () => {
    axios
      .get(`http://localhost:8000/api/weather-station`)
      .then((response) => {
        setWeatherStations(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  if (!isLoaded) {
    return <div>Loading...</div>;
  }
  return (
    <div className="map-container">
      <GoogleMap
        center={center}
        zoom={5}
        mapContainerStyle={{ width: "100%", height: "100%" }}
        options={{
          mapTypeControl: true,
        }}
      >
        {weatherStations.map((weatherStation) => (
          <Marker
            key={weatherStation.id}
            position={{
              lat: parseFloat(weatherStation.latitude),
              lng: parseFloat(weatherStation.longitude),
            }}
            onClick={(e) => setSelectedStation(weatherStation)}
          ></Marker>
        ))}
        {selectedStation && (
          <InfoWindow
            position={{
              lat: parseFloat(selectedStation.latitude),
              lng: parseFloat(selectedStation.longitude),
            }}
            // icon={{
            //   url:'/iconName.png',
            //   scaledSize: new window.google.maps.Size(25, 25)
            // }}
            onCloseClick={() => {
              setSelectedStation(null);
            }}
          >
            <PopupWindow selectedStation={selectedStation}></PopupWindow>
          </InfoWindow>
        )}
      </GoogleMap>
    </div>
  );
}

export default Map;
