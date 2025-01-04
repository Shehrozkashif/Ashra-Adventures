import React from 'react';

function Navbar() {
  return (
    <div style={{ width: '100%', padding: '20px', display: 'flex', justifyContent: 'space-between', alignItems: 'center', fontFamily: "'Neue Montreal', sans-serif" }}>
      <div className="logo">
        <img src="logo.png" alt="Logo" style={{ height: '70px', width: '150px' }} />
      </div>
      <div style={{ display: 'flex', gap: '10px' }}>
        {["Booking", "Our Work", "About Us", "Contact"].map((item, index) => {
          let link = ''; 

          if (item === "Booking") {
            link = "http://localhost/ashra/login.php";
          } else if (item === "Our Work") {
            link = "Featured.jsx";
          } else if (item === "Abbout.jsx") {
            link = "Cards.jsx";
          } else if (item === "footer.jsx") {
            link = "Footer.jsx";
          }

          return (
            <a key={index} href={link}>
              {item}
            </a>
          );
        })}
      </div>
    </div>
  );
}

export default Navbar;
