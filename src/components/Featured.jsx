import { motion, useAnimation } from "framer-motion";
import React from "react";

function Featured() {
  const cards = [useAnimation(), useAnimation()]; // Separate controllers for each card

  const handleHover = (index) => {
    cards[index].start({
      y: "0%", // Text will be fully visible
    });
  };

  const handleHoverEnd = (index) => {
    cards[index].start({
      y: "100%", // Text moves out of view
    });
  };

  const textVariant = {
    initial: { y: "100%" }, // Start below the card
    animate: { y: "0%" }, // Move to the front of the card
  };

  const imageVariant = {
    initial: { scale: 1 },
    hover: { scale: 1.1 },
  };

  return (
    <div data-scroll data-scroll-section className="relative w-full py-20">
      <div className="w-full px-20 border-b-[1px] border-zinc-900 bg-white pb-20">
        <h1 className="text-7xl font-['Neue_Montreal'] tracking-tight">
          Featured Projects
        </h1>
      </div>
      <div className="px-20">
        <div className="cards w-full flex gap-10 mt-10">
          {/* Card 1 */}
          <motion.div
            onHoverStart={() => handleHover(0)}
            onHoverEnd={() => handleHoverEnd(0)}
            className="cardcontainer relative w-1/2 h-[75vh] overflow-hidden rounded-xl"
          >
            {/* Animated Text */}
            <motion.h1
              className="absolute flex overflow-hidden left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-[9] leading-none tracking-tighter font-semibold font-['Founders Grotesk'] text-8xl text-[#CDEA68]"
              initial="initial"
              animate={cards[0]}
              transition={{
                ease: [0.22, 1, 0.36, 1],
                staggerChildren: 0.05,
              }}
            >
              {"ASHRA".split("").map((char, index) => (
                <motion.span
                  key={index}
                  variants={textVariant}
                  className="inline-block"
                >
                  {char}
                </motion.span>
              ))}
            </motion.h1>

            {/* Background Image */}
            <motion.img
              className="w-full h-full bg-cover"
              src="imgg.jpg"
              alt="Trip"
              variants={imageVariant}
              initial="initial"
              whileHover="hover"
              transition={{ duration: 0.5 }}
            />
          </motion.div>

          {/* Card 2 */}
          <motion.div
            onHoverStart={() => handleHover(1)}
            onHoverEnd={() => handleHoverEnd(1)}
            className="cardcontainer relative w-1/2 h-[75vh] overflow-hidden rounded-xl"
          >
            {/* Animated Text */}
            <motion.h1
              className="absolute flex overflow-hidden left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-[9] leading-none tracking-tighter font-semibold font-['Founders Grotesk'] text-8xl text-[#CDEA68]"
              initial="initial"
              animate={cards[1]}
              transition={{
                ease: [0.22, 1, 0.36, 1],
                staggerChildren: 0.05,
              }}
            >
              {"ADVENTURE".split("").map((char, index) => (
                <motion.span
                  key={index}
                  variants={textVariant}
                  className="inline-block"
                >
                  {char}
                </motion.span>
              ))}
            </motion.h1>

            {/* Background Image */}
            <motion.img
              className="w-full h-full bg-cover"
              src="images.jpg"
              alt="Trip"
              variants={imageVariant}
              initial="initial"
              whileHover="hover"
              transition={{ duration: 0.5 }}
            />
          </motion.div>
        </div>
      </div>
    </div>
  );
}

export default Featured;
