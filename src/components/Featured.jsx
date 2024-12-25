import { motion } from 'framer-motion';
import React from 'react'

function Featured() {
  return (
    <div className='w-full py-20'>
        <div className= 'w-full px-20 border-b-[1px] border-zinc-900  bg-white pb-20'>
            <h1 className='text-7xl font-["Neue_Montreal"] tracking-tight'> Featured Projects</h1>
            
        </div>
        <div className="px-20">
        <div className="cards w-full flex gap-10 mt-10"> 
                <div onMouseEnter={()=>handleHover()} className='cardcontainer relative w-1/2 h-[75vh]'>
                <h1 className="absolute flex overflow-hidden right-full translate-x-1/2 top-1/2 -translate-y-1/2 z-[9] leading-none tracking-tighter -mb-20 font-semibold font-['Founders Grotesk'] text-8xl text-[#CDEA68]">ADVENTURE
                {"ASHRA" .split('').map((item, index)=>(<motion.span initial={{y: "100%"}} className="inline-block">{item}</motion.span>))}
                </h1>
                <div className='card w-full h-full rounded-xl  overflow-hidden'>
                <img className="w-full h-full bg-cover" src="imgg.jpg" alt="Trip"  />
                </div>
                </div>
                <div className='cardcontainer relative w-1/2 h-[75vh]'>
                <h1 className="absolute right-full translate-x-1/2 top-1/2 -translate-y-1/2 z-[9] leading-none tracking-tighter -mb-20 font-semibold font-['Founders Grotesk'] text-8xl text-[#CDEA68]">ADVENTURE
                {"ADVENTURE" .split('').map((item, index)=><span>{item}</span>)}
                </h1>
                <div className='card w-full h-full rounded-xl  overflow-hidden'>

                <img className="w-full h-full bg-cover" src="images.jpg" alt="Trip"  />
                </div>
                </div>
            
    </div></div> </div>
  )
}

export default Featured;


