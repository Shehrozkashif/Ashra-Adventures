import React from 'react';

function ContactUs() {
  return (
    <div className="w-full flex gap-5 h-screen p-20">
     
      <div className="w-1/2 flex flex-col justify-between font-['Founders Grotesk']">
        <div className="heading">
          <h1 className="text-[7vw] uppercase leading-none -mb-13">Contact</h1>
          <h1 className="text-[7vw] uppercase leading-none -mb-13">Us</h1>
        </div>
        <div className="mt-10 text-xl font-light">
          <p><strong>Phone:</strong> +123 456 7890</p>
          <p><strong>Email:</strong> ASHRA@gmail.com</p>
          <p><strong>Address:</strong> UIT University , Karachi, Pakistan</p>
        </div>
      </div>

     
      <div className="w-1/2">
        <h1 className="text-[5vw] uppercase leading-none -mb-13">Follow Us</h1>
        <div className="Details mt-10">
          <a className="block text-xl font-light" href="https://facebook.com" target="_blank" rel="noopener noreferrer">Facebook</a>
          <a className="block text-xl font-light" href="https://instagram.com" target="_blank" rel="noopener noreferrer">Instagram</a>
          <a className="block text-xl font-light" href="https://youtube.com" target="_blank" rel="noopener noreferrer">YouTube</a>
        </div>
      </div>
    </div>
  );
}

export default ContactUs;
