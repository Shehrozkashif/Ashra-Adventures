import React from 'react'

function About() {
  return (
    <div className="w-full p-20 bg-[#CDEA68] rounded-tr-3xl text-black">
        <h1 className="font-['Neue_Montreal'] text-[3vw] leading-[3.5vw] tracking-tight">
        Ashra Travel Agency redefines exploration with tailored journeys crafted to inspire and captivate. Offering seamless adventures, 
        we blend luxury with authenticity, ensuring every trip is a unique experience.

        </h1>
        <div className="w-full border-t-[1px] mt-18 border-[#a1b562]">
            <div className="w-1/2">
            <h1> Our Approach </h1>
            <button className="px-10 py-6 bg-zinc-9-- rounded-full text-white">Read More</button>
            </div>

        </div>
    </div>
  );
}

export default About;