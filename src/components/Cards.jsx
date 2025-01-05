import React, { useState, useEffect } from 'react';
import gsap from 'gsap';

function Cards() {
  const [showAboutUs1, setShowAboutUs1] = useState(false);
  const [showAboutUs2, setShowAboutUs2] = useState(false);
  const [showAboutUs3, setShowAboutUs3] = useState(false);

  const handleAboutUsClick1 = () => setShowAboutUs1(!showAboutUs1);
  const handleAboutUsClick2 = () => setShowAboutUs2(!showAboutUs2);
  const handleAboutUsClick3 = () => setShowAboutUs3(!showAboutUs3);

 
  useEffect(() => {
    if (showAboutUs1) {
      gsap.to('.about-us-text1', {
        x: 0,
        opacity: 1,
        duration: 1,
        ease: 'power3.out',
      });
    } else {
      gsap.to('.about-us-text1', {
        x: '-100%',
        opacity: 0,
        duration: 1,
        ease: 'power3.out',
      });
    }
  }, [showAboutUs1]);

  useEffect(() => {
    if (showAboutUs2) {
      gsap.to('.about-us-text2', {
        x: 0,
        opacity: 1,
        duration: 1,
        ease: 'power3.out',
      });
    } else {
      gsap.to('.about-us-text2', {
        x: '-100%',
        opacity: 0,
        duration: 1,
        ease: 'power3.out',
      });
    }
  }, [showAboutUs2]);

  useEffect(() => {
    if (showAboutUs3) {
      gsap.to('.about-us-text3', {
        x: 0,
        opacity: 1,
        duration: 1,
        ease: 'power3.out',
      });
    } else {
      gsap.to('.about-us-text3', {
        x: '-100%',
        opacity: 0,
        duration: 1,
        ease: 'power3.out',
      });
    }
  }, [showAboutUs3]);

  return (
    <div className="w-full h-screen bg-white flex items-center px-32 gap-5">
      
      <div className="cardcontainer h-[50vh] w-1/2">
        <div className="card relative rounded-xl w-full h-full bg-[#004D43] flex items-center justify-center">
          
          {!showAboutUs1 ? (
            <img className="w-32 transition-all duration-500" src="images/logo.png" alt="Logo" />
          ) : (
            <div className="about-us-text1 absolute top-0 left-0 w-full h-full flex items-center justify-center text-white">
              <p className="text-center p-5">
                Ashra Travel Agency is dedicated to providing amazing travel experiences. Explore new destinations and create unforgettable memories with us!
              </p>
            </div>
          )}
          <button
            className="absolute px-5 py-1 rounded-full border-2 left-10 bottom-10"
            onClick={handleAboutUsClick1}
          >
            About Us
          </button>
        </div>
      </div>

   
      <div className="cardcontainer flex gap-5 h-[50vh] w-1/2">
        <div className="card relative rounded-xl w-1/2 h-full bg-[#192826] flex items-center justify-center">
         
          {!showAboutUs2 ? (
            <img className="w-32 transition-all duration-500" src="images/logo.png" alt="Logo" />
          ) : (
            <div className="about-us-text2 absolute top-0 left-0 w-full h-full flex items-center justify-center text-white">
              <p className="text-center p-5">
                At Ashra, we make your travel dreams a reality. Our team is here to craft a personalized experience, ensuring you enjoy every moment of your journey.
              </p>
            </div>
          )}
          <button
            className="absolute px-5 py-1 rounded-full border-2 left-10 bottom-10"
            onClick={handleAboutUsClick2}
          >
            About Us
          </button>
        </div>

        
        <div className="card relative rounded-xl w-1/2 h-full bg-[#192826] flex items-center justify-center">
         
          {!showAboutUs3 ? (
            <img className="w-32 transition-all duration-500" src="images/logo.png" alt="Logo" />
          ) : (
            <div className="about-us-text3 absolute top-0 left-0 w-full h-full flex items-center justify-center text-white">
              <p className="text-center p-5">
                Join us on an adventure! Discover the world's most beautiful places, enjoy custom travel packages, and make lasting memories with Ashra Travel Agency.
              </p>
            </div>
          )}
          <button
            className="absolute px-5 py-1 rounded-full border-2 left-10 bottom-10"
            onClick={handleAboutUsClick3}
          >
            About Us
          </button>
        </div>
      </div>
    </div>
  );
}

export default Cards;
