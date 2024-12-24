import React from 'react';
import { FaArrowUpLong } from "react-icons/fa6";

function LandingPage() {
  return (
    <div className="w-full h-screen bg-green-200 text-black pt-1">
     
      <div className="textstructure mt-59 px-20">
        {["Travel Farther,", " Live Fuller", " With ASHRA"].map((item, index) => {
           
          return (
            <div className="masker">
                <div className="w-fit flex items-center">
                    {index === 1&& (<div className="w-[9vw] h-[5vw]  bg-red-500"></div>)}
                
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
          For public and private companies
        </p>

      
        <p className="text-md font-light tracking-tight leading-none">
          From the first pitch to IPO
        </p>

        
        <div className="start flex items-center gap-2">
          <div className="px-4 py-1 border-[1px] border-zinc-400 font-light text-sm uppercase rounded-full flex items-center">
            Start the Project
            <div className="w-8 h-8 flex items-center justify-center border-[2px] border-zinc-500 rounded-full ml-2">
              <FaArrowUpLong className="rotate-45 text-xs" />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default LandingPage;
