import React from 'react';

function Navbar() {
  return (
    <div style={{ width: '100%', padding: '20px', display: 'flex', justifyContent: 'space-between', alignItems: 'center', fontFamily: "'Neue Montreal', sans-serif" }}>
      <div className="logo">
        <img src="logo.png" alt="Logo" style={{ height: '70px', width: '150px' }} />
      </div>
      <div style={{ display: 'flex', gap: '10px' }}>
        {["Booking", "Our Work", "About Us", "Insights", "Contact"].map((item, index) => (
          <a
            key={index}
            href={item === "Booking" ? "src/frontend/login.html" : "index.html"}
           
          >
            {item}
          </a>
        ))}
      </div>
    </div>
  );
}

export default Navbar;