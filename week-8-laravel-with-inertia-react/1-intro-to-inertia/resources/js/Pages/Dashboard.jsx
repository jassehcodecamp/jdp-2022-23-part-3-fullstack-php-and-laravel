import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Dashboard({ auth, games }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white grid grid-cols-3 gap-6 flex-wrap dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        {games.results.map((game) => {
                            return (
                                <div class="relative flex col-span-1 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                                    <div class="relative mx-4 -mt-6 h-56 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                                        <img
                                            src={game.background_image}
                                            alt="img-blur-shadow"
                                            className="absolute inset-0 w-full h-full object-cover object-center"
                                            layout="fill"
                                        />
                                    </div>
                                    <div class="p-6">
                                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                            {game.name}
                                        </h5>
                                        {/* <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                                            The place is close to Barceloneta .
                                        </p> */}
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
