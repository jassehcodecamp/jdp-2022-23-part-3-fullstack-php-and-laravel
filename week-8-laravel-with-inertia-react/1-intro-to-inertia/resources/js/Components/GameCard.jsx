import React from "react";
import { Link } from "@inertiajs/react";

const GameCard = ({ image, name, slug }) => {
    return (
        <div className="relative flex col-span-1 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div className="relative mx-4 my-3 h-56 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                <img
                    src={image}
                    alt="img-blur-shadow"
                    className="absolute inset-0 w-full h-full object-cover object-center"
                    layout="fill"
                />
            </div>
            <div className="p-6">
                <h5 className="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    <Link href={`/games/${slug}`}>{name}</Link>
                </h5>
                {/* <p className="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                            The place is close to Barceloneta .
                                        </p> */}
            </div>
        </div>
    );
};

export default GameCard;
