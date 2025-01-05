import { easeIn, motion, useAnimation } from "framer-motion";
import React from "react";

function Featured() {
  const cards = [
    useAnimation(),
    useAnimation(),
    useAnimation(),
    useAnimation(),
  ];

  const handleHover = (index) => {
    cards[index].start({ y: "0" });
  };

  const handleHoverEnd = (index) => {
    cards[index].start({ y: "100%" });
  };

  return (
    <div className="w-full py-20">
      <div
        className="w-full px-[4.5vw] border-b-[1px]
       border-zinc-700 pb-10"
      >
        <h1 className="text-[4vw] tracking-tighter "> Featured projects</h1>
      </div>

      <div className="cards w-full flex gap-[4vw] pt-[6vw] px-[4.5vw]">
        <motion.div
          onHoverStart={() => handleHover(0)}
          onHoverEnd={() => handleHoverEnd(0)}
          className="card relative w-1/2 h-[70vh]"
        >
          <h1
            className="absolute flex overflow-hidden left-full -translate-x-1/2 -translate-y-1/2 top-1/2 text-[#CDEA68] z-[9] leading-none tracking-tighter text-[6vw] font-bold"
          >
            {"ASHRA".split("").map((item, index) => (
              <motion.span
                initial={{ y: "100%" }}
                animate={cards[0]}
                transition={{ ease: [0.22, 1, 0.36, 1], delay: index * 0.06 }}
                className="inline-block"
              >
                {item}
              </motion.span>
            ))}
          </h1>
          <img
            className="rounded-lg overflow-hidden w-full h-full object-cover"
            src="images/images.jpg"
            alt="img"
          />
        </motion.div>

        <motion.div
          onHoverStart={() => handleHover(1)}
          onHoverEnd={() => handleHoverEnd(1)}
          className="card relative w-1/2 h-[70vh]"
        >
          <h1 className="absolute flex overflow-hidden right-full translate-x-1/2 -translate-y-1/2 top-1/2 text-[#CDEA68] z-[9] leading-none tracking-tighter text-[7vw] font-bold">
            {"ADVENTURE".split("").map((item, index) => (
              <motion.span
                initial={{ y: "100%" }}
                animate={cards[1]}
                transition={{ ease: [0.22, 1, 0.36, 1], delay: index * 0.06 }}
                className="inline-block"
              >
                {item}
              </motion.span>
            ))}
          </h1>
          <img
            className="rounded-lg overflow-hidden w-full h-full object-cover"
            src="images/Imgg.jpg"
            alt="img"
          />
        </motion.div>
      </div>

      <div className="cards w-full flex gap-[4vw] pt-[6vw] px-[4.5vw]">
        <motion.div
          onHoverStart={() => handleHover(2)}
          onHoverEnd={() => handleHoverEnd(2)}
          className="card relative w-1/2 h-[70vh]"
        >
          <h1 className="absolute flex overflow-hidden left-full -translate-x-1/2 -translate-y-1/2 top-1/2 text-[#CDEA68] z-[9] leading-none tracking-tighter text-[6vw] font-bold">
            {"TRAVEL".split("").map((item, index) => (
              <motion.span
                initial={{ y: "100%" }}
                animate={cards[2]}
                transition={{ ease: [0.22, 1, 0.36, 1], delay: index * 0.09 }}
                className="inline-block"
              >
                {item}
              </motion.span>
            ))}
          </h1>
          <img
            className="rounded-lg overflow-hidden w-full h-full object-cover"
            src="images/ima.webp"
            alt="img"
          />
        </motion.div>

        <motion.div
          onHoverStart={() => handleHover(3)}
          onHoverEnd={() => handleHoverEnd(3)}
          className="card relative w-1/2 h-[70vh]"
        >
          <h1 className="absolute flex overflow-hidden right-full translate-x-1/2 -translate-y-1/2 top-1/2 text-[#CDEA68] z-[9] leading-none tracking-tighter text-[6vw] font-bold">
            {"PREMIUM".split("").map((item, index) => (
              <motion.span
                initial={{ y: "100%" }}
                animate={cards[3]}
                transition={{ ease: [0.22, 1, 0.36, 1], delay: index * 0.09 }}
                className="inline-block"
              >
                {item}
              </motion.span>
            ))}
          </h1>
          <img
            className="rounded-lg overflow-hidden w-full h-full object-cover"
            src="images/imag.webp"
            alt="img"
          />
        </motion.div>
      </div>

      </div>
  );
}

export default Featured;
