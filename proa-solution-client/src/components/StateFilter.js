import React from "react";
import Select from "react-select";

function StateFilter(props) {
  const { handleChangeState } = props;
  const states = [
    { label: "All", value: "All" },
    { label: "WA", value: "WA" },
    { label: "TAS", value: "TAS" },
    { label: "SA", value: "SA" },
    { label: "VIC", value: "VIC" },
    { label: "NSW", value: "NSW" },
    { label: "QLD", value: "QLD" },
  ];

  return (
    <div className="state-filter-container">
      <div className="state-filter-title">Filter by state</div>
      <Select options={states} onChange={handleChangeState} />
    </div>
  );
}

export default StateFilter;
