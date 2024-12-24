import React from 'react';
import Navbar from './components/Navbar';
import LandingPage from'./components/LandingPage';
import Marquee from './components/Marquee';
function App() {
  return (
    <div className='w-full h-screen bg-white text-black'>
  
      <Navbar />
      <LandingPage/>
      <Marquee/>
    </div>
    
  )
}

export default App;