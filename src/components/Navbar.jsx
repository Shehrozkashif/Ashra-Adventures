import React from 'react';

function navbar() {
  return (
    <div className="w-full px-20 py-8 font-['Neue Montreal'] flex justify-between items-center">
        <div className="logo"> 
        <img src="logo.png" height="200px" width="150px"></img>
        </div>
        <div className="links flex gap-10"> 
            {["Services", "Our Work", "About Us", "Insights", "Contact"].map((item, index) => (
                <a key={index} className={'text-lg capitalize font-light ${index === 4 && "ml-32"}'}>{item}</a> ))}
    </div>
  </div>
  );
}

export default navbar;