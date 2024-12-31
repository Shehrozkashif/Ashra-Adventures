import React from 'react';

function Cards() {
  return (
    <div className='w-full h-screen bg-white flex items-center px-32 gap-5'>
      {/* First Card */}
      <div className='cardcontainer h-[50vh] w-1/2'>
        <div className='card relative rounded-xl w-full h-full bg-[#004D43] flex items-center justify-center'>
          <img className='w-32' src="logo.png" alt="Logo" />
          <button className='absolute px-5 py-1 rounded-full border-2 left-10 bottom-10'>
            About Us
          </button>
        </div>
      </div>

      {/* Second Card Section */}
      <div className='cardcontainer flex gap-5 h-[50vh] w-1/2'>
        {/* Left Card */}
        <div className='card relative rounded-xl w-1/2 h-full bg-[#192826] flex items-center justify-center'>
          <img className='w-32' src="logo.png" alt="Logo" />
          <button className='absolute px-5 py-1 rounded-full border-2 left-10 bottom-10'>
            About Us
          </button>
        </div>

        {/* Right Card */}
        <div className='card relative rounded-xl w-1/2 h-full bg-[#192826] flex items-center justify-center'>
          <img className='w-32' src="logo.png" alt="Logo" />
          <button className='absolute px-5 py-1 rounded-full border-2 left-10 bottom-10'>
            About Us
          </button>
        </div>
      </div>
    </div>
  );
}

export default Cards;
