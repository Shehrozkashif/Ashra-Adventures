import React from 'react';

function navbar() {
  return (
    <div className="w-full px-20 py-8">
        <div className="logo"> 
            c:\Users\Computer link\Desktop\logo.png
        </div>
        <div className="links"> 
            {["Services", "Our Work", "About Us", "Insights"].map((item, index) => (
                <a key={index} className="text-md font-semibold">{item}</a> ))}
    </div>
  </div>
  );
}

export default navbar;