import gsap,{Power2, Power4, ScrollTrigger } from "gsap/all";
import React, {useEffect, useRef} from 'react';

function About() {
  return (
    <div className="w-full p-20 bg-[#CDEA68] rounded-tl-3xl rounded-tr-3xl text-black">
        <h1 className="font-['Neue_Montreal'] text-[3vw] leading-[3.5vw] tracking-tight">
        Ashra Travel Agency redefines exploration with tailored journeys crafted to inspire and captivate. Offering seamless adventures, 
        we blend luxury with authenticity, ensuring every trip is a unique experience.

        </h1>
        <div className="w-full flex gap-5 border-t-[1px] pt-10 mt-20 border-[#a1b562]">
            <div className="w-1/2">
            <h1 className="text-7xl"> Our Approach: </h1>
            <a href="html/about_us.html">
            <button className="flex uppercase gap-10 items-center px-10 py-6 bg-zinc-900 mt-10 rounded-full text-white">Read More
            <div classname="w-2 h-2 bg-zinc-100 rounded-full"></div>
            </button> </a> </div>
            <img
            className="rounded-lg overflow-hidden w-full h-full object-cover"
            src="images/iima.jpeg"
            alt="img"
          /></div>
        </div>
   
  );
}

export default About;



