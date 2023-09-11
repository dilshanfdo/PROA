import React from "react";

function PopupWindow(props) {
  const { selectedStation, latestWeatherInfo } = props;

  return (
    <div className="popup-window-container">
      <div className="popup-window-title">{selectedStation.ws_name}</div>
      <div className="popup-window-info-wrapper">
        <span>
          <strong>Site:</strong>
        </span>
        <span>{selectedStation.site}</span>
      </div>
      <div className="popup-window-info-wrapper">
        <span>
          <strong>Portfolio:</strong>
        </span>
        <span>{selectedStation.portfolio}</span>
      </div>
      {props.latestWeatherInfo.map((measurement) => (
        <div key={measurement.name} className="popup-window-info-wrapper">
          <span>
            <strong>{measurement.long_name}:</strong>
          </span>
          <span>{measurement.value}</span>
          <span>{measurement.unit}</span>
        </div>
      ))}
      <div className="popup-window-info-wrapper">
        <span>
          <strong>Timestamp:</strong>
        </span>
        <span>{latestWeatherInfo[0].timestamp}</span>
      </div>
    </div>
  );
}

export default PopupWindow;
