import React from 'react';
import {motion} from "framer-motion";
import { FaArrowUpLong } from "react-icons/fa6";

function LandingPage() {

  return (
    <div data-scroll data-scroll-section data-scroll-speed="-.3" className="w-full h-screen bg-green-200 text-black pt-1">
     
      <div className="textstructure mt-59 px-20">
        {["Travel Farther,", " Live Fuller", " With ASHRA"].map((item, index) => {
           
          return (
            <div className="masker">
                <div className="w-fit flex items-center">
                    {index === 1&& (
                      <motion.div initial={{width: 0}} animate={{width: "9vw"}} transition={{ease: [0.76, 0, 0.24, 1], duration: 1}} className="w-[9vw] h-[5vw]  bg-red-500"></motion.div>)}
                
                 <h1 className="uppercase text-[7.5vw] leading-[6vw] tracking-tighter font-['Founders_Grotesk'] font-medium">
                {item}
              </h1>
              </div>
            </div>
          );
        })}
      </div>

      <div className="border-t-[1px] border-zinc-800 mt-32 flex justify-between items-center py-5 px-20">
       
        <p className="text-md font-light tracking-tight leading-none">
         Explore Pakistan's wonder with us
        </p>

      
        <p className="text-md font-light tracking-tight leading-none">
          EAT, SLEEP, TRAVEL 
        </p>

       
        <div className="start flex items-center gap-2">
        <a href="http://localhost/ashra/php/login.php">
          <div className="px-4 py-1 border-[1px] border-zinc-400 font-light text-sm uppercase rounded-full flex items-center">
            Start the Trip
            <div className="w-8 h-8 flex items-center justify-center border-[2px] border-zinc-500 rounded-full ml-2">
              <FaArrowUpLong className="rotate-45 text-xs" />
            </div>
          </div> </a>
        </div>
      </div>
    </div>
  );
}

export default LandingPage;
