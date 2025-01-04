import React from 'react';

function Footer() {
  return (
    <div className="font-sans" id="footer">
      {/* Top Section */}
      <div className="bg-teal-700 text-white py-16 px-10">
        <h1 className="text-4xl font-bold text-center mb-8">Get In Touch</h1>
        <div className="flex flex-wrap justify-center gap-10">
          {/* Address */}
          <div className="text-center max-w-xs">
            <div className="mb-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                strokeWidth="2"
                stroke="currentColor"
                className="w-12 h-12 mx-auto"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M3 10.5a8.381 8.381 0 00.879 3.788c.408.77 1.208 2.005 2.466 3.212C7.627 19.106 9.695 20.5 12 20.5s4.373-1.394 5.655-2.5c1.258-1.207 2.058-2.442 2.466-3.212a8.381 8.381 0 00.879-3.788c0-3.75-3.028-6.5-6.5-6.5s-6.5 2.75-6.5 6.5z"
                />
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                />
              </svg>
            </div>
            <h2 className="text-xl font-semibold mb-2">Address</h2>
            <p>
              UIT University
              <br />
              Karachi, Pakistan
            </p>
          </div>

          {/* Phone */}
          <div className="text-center max-w-xs">
            <div className="mb-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                strokeWidth="2"
                stroke="currentColor"
                className="w-12 h-12 mx-auto"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M3 10.5a8.381 8.381 0 00.879 3.788c.408.77 1.208 2.005 2.466 3.212C7.627 19.106 9.695 20.5 12 20.5s4.373-1.394 5.655-2.5c1.258-1.207 2.058-2.442 2.466-3.212a8.381 8.381 0 00.879-3.788c0-3.75-3.028-6.5-6.5-6.5s-6.5 2.75-6.5 6.5z"
                />
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M9.75 9.75h4.5m-4.5 3h4.5"
                />
              </svg>
            </div>
            <h2 className="text-xl font-semibold mb-2">Phone</h2>
            <p>+123 456 7890</p>
          </div>

          {/* Email */}
          <div className="text-center max-w-xs">
            <div className="mb-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                strokeWidth="2"
                stroke="currentColor"
                className="w-12 h-12 mx-auto"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M21.75 7.125c0-1.05-.84-1.875-1.875-1.875H4.125C3.075 5.25 2.25 6.075 2.25 7.125v9.75c0 1.05.825 1.875 1.875 1.875h15.75c1.05 0 1.875-.825 1.875-1.875V7.125z"
                />
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d="M2.625 5.625L12 12l9.375-6.375"
                />
              </svg>
            </div>
            <h2 className="text-xl font-semibold mb-2">Email</h2>
            <p>ASHRA@gmail.com</p>
          </div>
        </div>
      </div>

      {/* Message Us Section */}
      <div className="py-16 px-10 bg-gray-100">
        <h1 className="text-4xl font-bold text-center mb-8">Message Us</h1>
        <form className="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 space-y-6">
          <div className="flex flex-wrap gap-4">
            <input
              type="text"
              placeholder="Your Name"
              className="w-full md:w-1/2 p-3 border border-gray-300 rounded"
            />
            <input
              type="email"
              placeholder="Your Email"
              className="w-full md:w-1/2 p-3 border border-gray-300 rounded"
            />
          </div>
          <textarea
            placeholder="Your Message"
            rows="5"
            className="w-full p-3 border border-gray-300 rounded"
          ></textarea>
          <button
            type="submit"
            className="w-full bg-teal-700 text-white py-3 rounded hover:bg-teal-800 transition"
          >
            Submit
          </button>
        </form>
      </div>
    </div>
  );
}

export default Footer;
