import React from 'react'

function Footer() {
  return (
    <div className="w-full flex gap-5 h-screen p-20"> 
    <div className="w-1/2 flex flex-col justify-between font-['Founders Grotesk']">
    <div clasname="heading">
    <h1 className="text-[7vw] uppercase leading-none -mb-13">Eye-</h1>
    <h1 className="text-[7vw] uppercase leading-none -mb-13">Opening</h1>
    </div>
    
    </div>
    <div className="w-1/2">9
    <h1 className="text-[5vw] uppercase leading-none -mb-13">Planned trips</h1>

    <div className="Details mt-10">
    <a className="block text-xl font-light" href="#">Facebook</a>
    <a className="block text-xl font-light" href="#">Instagram</a>
    <a className="block text-xl font-light" href="#">Youtube</a>

    </div>
    </div>
</div>




  );


}

export default Footer;