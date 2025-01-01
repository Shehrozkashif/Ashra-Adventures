import { motion } from 'framer-motion';
import React from 'react';

function Marquee() {
  return (
    <div data-scroll data-scroll-section data-scroll-speed="-.1" className="w-full py-20 rounded-3xl bg-green-800 overflow-hidden">
     
      <motion.div
        initial={{ x: "100%" }}
        animate={{ x: "-100%" }}
        transition={{ ease: "linear", repeat: Infinity, duration: 15 }} 
        className="flex gap-10 whitespace-nowrap"
      >
      
        <h1 className="text-[8vw] leading-none font-['Founders_Grotesk'] uppercase font-semibold text-white pr-20">
          We are ASHRA
        </h1>
        <h1 className="text-[8vw] leading-none font-['Founders_Grotesk'] uppercase font-semibold text-white pr-20">
          We are ASHRA
        </h1>
        <h1 className="text-[8vw] leading-none font-['Founders_Grotesk'] uppercase font-semibold text-white pr-20">
          We are ASHRA
        </h1>
        <h1 className="text-[8vw] leading-none font-['Founders_Grotesk'] uppercase font-semibold text-white pr-20">
          We are ASHRA
        </h1>
      </motion.div>
    </div>
  );
}

export default Marquee;
