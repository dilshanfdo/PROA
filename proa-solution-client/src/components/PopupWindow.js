import React from "react";

function PopupWindow(props) {
  const { selectedStation } = props;

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
    </div>
  );
}

export default PopupWindow;
